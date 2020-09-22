<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Application;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Page\Asset;
use \Bitrix\Main\Loader;
use \Bitrix\Highloadblock as HL;
use \Bitrix\Main\Localization\Loc;

define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");

class CProfitkitFormSimple extends CBitrixComponent implements Controllerable
{

    function fileDump(&$arFields,$paramName = "arrName"){
        AddMessage2Log($paramName.' = '.print_r($arFields, true),'');
    }

	public function onPrepareComponentParams($arParams)
    {
        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();

        if ($request['field'] and $request['value'] and !$arParams['READ_FIELD'] and !$arParams['READ_VALUE']) {
            $arParams['READ_FIELD'] = $request['field'];
            $arParams['READ_VALUE'] = $request['value'];
        }

        if (!isset($arParams['PROPERTY']))
            $arParams['PROPERTY'] = array();
        if (!isset($arParams['FIELDS']))
            $arParams['FIELDS'] = array();
        if (!isset($arParams['REQUIRED']))
            $arParams['REQUIRED'] = array();

		return $arParams;
	}
	
	/**
	 * @return array
	 */
	public function configureActions()
	{
		return [
			'submit' => [
				'prefilters' => [
					/*new ActionFilter\Authentication()*/
				],
				'postfilters' => []
			]
		];
	}
	
    public function executeComponent()
    {
		if (!$this->arParams['IBLOCK_ID']) {
            return;
        }

		\Bitrix\Main\Loader::IncludeModule("iblock");

        Asset::getInstance()->addJs($this->getPath(). "/script.js");

		$arResult = array();

        $res = CIBlock::GetByID($this->arParams['IBLOCK_ID']);
        if($ar_res = $res->GetNext()) {
            if ($ar_res['IBLOCK_TYPE_ID'] != 'profitkit_forms') {
                echo Loc::getMessage("IBLOCK_TYPE_ERROR");
                return false;
            }
            $arResult['FORM_NAME'] = $ar_res['NAME'];
            $arResult['FORM_DESCRIPTION'] = $ar_res['DESCRIPTION'];
        }
        else
            return false;

        $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$this->arParams['IBLOCK_ID']));
        while ($prop_fields = $properties->GetNext())
        {
            $arResult['formFields'][$prop_fields['CODE']] = $prop_fields;
            $this->arParams['PROPERTY'][] = $prop_fields['CODE'];
            if ($prop_fields['IS_REQUIRED'] == 'Y')
                $this->arParams['REQUIRED'][] = $prop_fields['CODE'];

        }
        $this->arResult = $arResult;
		$context = Application::getInstance()->getContext();
		$request = $context->getRequest();
        $submit = self::clean($request['submit']);
        if ($submit)
        {
            $result = $this->submitAction();
            $arResult['data'] = $result['data'];
            if ($result['error'])
            {
                $arResult['error'] = $result['error'];
            }
            else
            {
                if ($this->arParams['AJAX'] != 'Y') {
                    LocalRedirect(strtok($_SERVER['REQUEST_URI'], "?").'?result='.$result['result']);
                }
                unset($arResult['data']);
                $arResult['result'] = (int)$result['result'];
            }
        }

        if ($this->arParams['READ_FIELD'] and $this->arParams['READ_VALUE'] and $arResult['formFields'][$this->arParams['READ_FIELD']]) {
            $arResult['data']['property'][$this->arParams['READ_FIELD']] = $this->arParams['READ_VALUE'];
            $arResult['formFields'][$this->arParams['READ_FIELD']]['notedit'] = 'Y';
        }

        if ((int)$request['result'])
            $arResult['result'] = (int)$request['result'];

        global $APPLICATION;
        if ($this->arParams['LOAD_JS_CSS'] == 'Y' or ($submit and $this->arParams['AJAX'] == 'Y')) {
            //$APPLICATION->ShowHead();
            //$this->addExternalJS($componentPath . "/script.js");
            //Bitrix\Main\Page\Asset::getInstance()->addJs(__DIR__. "/script.js");
        }

		$this->arResult = $arResult;
		$this->includeComponentTemplate();


    }

	
	function submitAction()
	{
		$context = Application::getInstance()->getContext();
		$request = $context->getRequest();

		if (!$this->arParams['IBLOCK_ID']) {
            $request->addFilter(new \Bitrix\Main\Web\PostDecodeFilter);
            $signer = new \Bitrix\Main\Security\Sign\Signer;
            try
            {
                $signedParamsString = $request->get('signedParamsString') ?: '';
                $params = $signer->unsign($signedParamsString, 'form.simple');
                $this->arParams = unserialize(base64_decode($params));
            }
            catch (\Bitrix\Main\Security\Sign\BadSignatureException $e)
            {
                var_dump($e->getMessage());
                die();
            }
        }

        $result = array();
        foreach ($this->arParams['FIELDS'] as $field) {
            if (isset($request[$field])) {
                if (is_array($request[$field]))
                    $data[$field] = $request[$field];
                else
                    $data[$field] = self::clean($request[$field]);
            }

            if (in_array($field, $this->arParams['REQUIRED']) and !$data[$field])
                $result['error'][$field] = 'Заполните поле '.$field.'#NAME#';
        }

        foreach ($this->arParams['PROPERTY'] as $prop) {
            if (isset($request[$prop])) {
                if (is_array($request[$prop]))
                    $data['property'][$prop] = $request[$prop];
                elseif ($this->arResult['formFields'][$prop]['USER_TYPE'] == 'HTML')
                    $data['property'][$prop] = Array("VALUE" => Array ("TEXT" => self::clean($request[$prop]), "TYPE" => "text"));
                else
                    $data['property'][$prop] = self::clean($request[$prop]);
            }

            if (in_array($prop, $this->arParams['REQUIRED']) and !$data['property'][$prop])
                $result['error'][$prop] = 'Заполните поле #NAME#';
        }
        if ($this->arParams['SOGLASIE'] == 'Y') {
            $data['SOGLASIE'] = $request['SOGLASIE'];
            if ($request['SOGLASIE'] != 'Y')
                $result['error']['req_SOGLASIE'] = 'Примите согласие';
        }
        $result['data'] = $data;

		if ($result['error'])
		{
			return $result;	
		}

		$res = $this->saveData($data);
        $result = array_merge($result, $res);
		
		return $result;
	}

	function saveData($data)
    {

        CModule::IncludeModule("iblock");
        global $USER;
        if (!$data['NAME'])
            $data['NAME'] = 'Заявка от '.date("d.m.Y");
        $newFields = Array(
            "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
            "IBLOCK_ID"      => $this->arParams['IBLOCK_ID'],
            "PROPERTY_VALUES"=> $data['property'],
            "NAME"           => $data['NAME'],
            "ACTIVE"         => "Y",            // активен
        );

        //return $newFields;
        $el = new CIBlockElement;

        if($ID = $el->Add($newFields)) {
            $result['result'] = $ID;
            $this->sendMail($data);
        } else {
            $result['error'][] = $el->LAST_ERROR;
        }
        return $result;
    }

    function sendMail($data) {

        $arEventFields = array(
            "FORM_NAME" => $this->arParams['FORM_NAME'],
        );
        if($data['NAME']) {
            $arEventFields['NAME'] = $data['NAME'];
        }

        if($data['property']) {
            $mail_props = '';
            foreach ($data['property'] as $k => $props) {
                $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$this->arParams['IBLOCK_ID'], "CODE" => $k));
                while ($prop_fields = $properties->GetNext())
                {
                    $props_val = '';
                    if($prop_fields['USER_TYPE_SETTINGS']['TABLE_NAME']) {
                        $sTableName = $prop_fields['USER_TYPE_SETTINGS']['TABLE_NAME'];
                        if(is_array($props)) {

                            foreach ($props as $p) {
                                $props_val .= $this->getHlValue($sTableName, $p).', ';
                            }

                        } else {
                            $props_val = $this->getHlValue($sTableName, $props);
                        }

                        $mail_props .= $prop_fields['NAME'].': '.$props_val.'</br>';

                    } else {

                        if(is_array($props)) {

                            foreach ($props as $p) {
                                $props_val .= $p.', ';
                            }

                        } else {
                            $props_val = $props;
                        }

                        $mail_props .= $prop_fields['NAME'].': '.$props_val.'</br>';
                    }

                }
            }

            $arEventFields['PROPS'] = $mail_props;
        }

        $arrSITE =  SITE_ID;
        CEvent::Send("PK_FORM_TO_ADMIN", $arrSITE, $arEventFields);
        /*  $this->fileDump($data); */
        if($data['property']['EMAIL']) {
            $arEventFields['EMAIL'] = $data['property']['EMAIL'];
            CEvent::Send("PK_SEND_USER_FORM", $arrSITE, $arEventFields);
        }

    }

    function getHlValue($sTableName, $arHighloadProperty) {

        if ( Loader::IncludeModule('highloadblock') && !empty($sTableName) && !empty($arHighloadProperty) )
        {
            $hlblock = HL\HighloadBlockTable::getRow([
                'filter' => [
                    '=TABLE_NAME' => $sTableName
                ],
            ]);

            if ( $hlblock )
            {
                $entity      = HL\HighloadBlockTable::compileEntity( $hlblock );
                $entityClass = $entity->getDataClass();

                $arRecords = $entityClass::getList([
                    'filter' => [
                        'UF_XML_ID' => $arHighloadProperty
                    ],
                ]);
                foreach ($arRecords as $record)
                {
                    $val = $record['UF_NAME'];
                }

                return $val;

            }
        }

    }

    public static function clean($value = "") {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }
}
?>