<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Application;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Page\Asset;
use \Bitrix\Main\Loader;
use \Bitrix\Highloadblock as HL;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Sale\PaySystem;
use Bitrix\Sale\Delivery;

define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");

class CProfitkitFormSimple extends CBitrixComponent implements Controllerable
{

    private $product;

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
		\Bitrix\Main\Loader::IncludeModule("iblock");

        Asset::getInstance()->addJs($this->getPath(). "/script.js");

		$arResult = array();

        $res = CIBlockElement::GetByID((int)$this->arParams['ID']);
        if($ar_res = $res->GetNext()) {
            $arResult['PRODUCT_NAME'] = $ar_res['NAME'];
            $this->product = $ar_res;
        }
        else
            return 'Error';
			
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
                //LocalRedirect('/personal/order/make/?ORDER_ID='.$result['result']);
                //unset($arResult['data']);
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
	    global $APPLICATION;
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
		
		$fields_name = array('NAME'=>'Имя', 'EMAIL'=>'Email', 'PHONE'=>'Телефон');
		
        $result = array();
        foreach ($this->arParams['FIELDS'] as $field) {
            if (isset($request[$field])) {
                if (is_array($request[$field]))
                    $data[$field] = $request[$field];
                else
                    $data[$field] = self::clean($request[$field]);
            }

            if (in_array($field, $this->arParams['REQUIRED']) and !$data[$field])
                $result['error'][$field] = 'Заполните поле '.$fields_name[$field].'';
        }

        foreach ($this->arParams['PROPERTY'] as $prop) {
            if (isset($request[$prop])) {
                if (is_array($request[$prop]))
                    $data['property'][$prop] = $request[$prop];
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

        if ($this->arParams['CAPTCHA'] == 'Y') {
            if ($APPLICATION->CaptchaCheckCode($request['captcha_word'], $request['captcha_sid'])) {

            } else {
                $result['error']['captcha'] = 'Подтвердите, что вы не робот';
            }
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

        CModule::IncludeModule("sale");
        CModule::IncludeModule("catalog");
        global $USER;

        $arPrice = CCatalogProduct::GetOptimalPrice($this->arParams['ID'], 1, $USER->GetUserGroupArray());
        if (!$arPrice || count($arPrice) <= 0)
        {
            if ($nearestQuantity = CCatalogProduct::GetNearestQuantityPrice($this->arParams['ID'], 1, $USER->GetUserGroupArray()))
            {
                $quantity = $nearestQuantity;
                $arPrice = CCatalogProduct::GetOptimalPrice($this->arParams['ID'], $quantity, $USER->GetUserGroupArray());
            }
        }
        $res_ib = CIBlock::GetByID($this->product['IBLOCK_ID']);
        $ar_iblock = $res_ib->GetNext();
        $products = array(
            array('PRODUCT_ID' => $this->arParams['ID'], 'NAME' => $this->product['NAME'], 'PRICE' => $arPrice['DISCOUNT_PRICE'], 'CURRENCY' => 'RUB', 'QUANTITY' => 1, 'PRODUCT_PROVIDER_CLASS'=>'CCatalogProductProvider', 'CATALOG_XML_ID'=>$ar_iblock['XML_ID'], 'PRODUCT_XML_ID'=>$this->product['XML_ID'])
        );
        $basket = Bitrix\Sale\Basket::create(SITE_ID);

        foreach ($products as $product)
        {
            $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
            unset($product["PRODUCT_ID"]);
            $item->setFields($product);
        }

        if ($USER->GetID() > 0)
            $user_id = $USER->GetID();
        else {
            //$filter = Array("LOGIC"=>"OR", "EMAIL"=>$data['EMAIL'], "LOGIN_EQUAL"=>$data['EMAIL']);
            $arSpecUser = false;
            $filter = array("LOGIN_EQUAL" => $data['EMAIL']);
            $rsUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);
            if ($arUser = $rsUsers->Fetch()) {
                $arSpecUser = $arUser;
            }
            if ($arSpecUser['EMAIL'] == $data['EMAIL'])
                $user_id = $arSpecUser['ID'];
            else {

                $filter = array("EMAIL" => $data['EMAIL']);
                $rsUsers = CUser::GetList(($by = "ID"), ($order = "asc"), $filter);
                if ($arUser = $rsUsers->Fetch()) {
                    $user_id = $arUser['ID'];
                }
                else {
                    $user_id = $this->createuser($data, $arSpecUser);
                }

            }
        }

        $order = Bitrix\Sale\Order::create(SITE_ID, $user_id);
        $order->setPersonTypeId($this->arParams['PERSON_TYPE_ID']);
        $order->setBasket($basket);

        // Создаём оплату со способом #1
        $paymentCollection = $order->getPaymentCollection();
        $payment = $paymentCollection->createItem();
        $paySystemService = PaySystem\Manager::getObjectById($this->arParams['PAYMENT_ID']);
        $payment->setFields(array(
            'PAY_SYSTEM_ID' => $paySystemService->getField("ID"),
            'PAY_SYSTEM_NAME' => $paySystemService->getField("NAME"),
        ));

        // Создаём одну отгрузку и устанавливаем способ доставки - "Без доставки" (он служебный)
        $shipmentCollection = $order->getShipmentCollection();
        $shipment = $shipmentCollection->createItem();
        $service = Delivery\Services\Manager::getById($this->arParams['DELIVERY_ID']);
        $shipment->setFields(array(
            'DELIVERY_ID' => $service['ID'],
            'DELIVERY_NAME' => $service['NAME'],
        ));
        $shipmentItemCollection = $shipment->getShipmentItemCollection();
        $shipmentItem = $shipmentItemCollection->createItem($item);
        $shipmentItem->setQuantity($item->getQuantity());

        $props = array(2=>'NAME', 3=>'EMAIL', 5=>'PHONE');
		$propertyCollection = $order->getPropertyCollection();
	
        foreach ($props as $k => $prop) {
            $somePropValue = $propertyCollection->getItemByOrderPropertyId($k);
			if ($somePropValue)
            	$somePropValue->setValue($data[$prop]);
        }

        $res = $order->save();
        if (!$res->isSuccess())
        {
            $result['error'] = $res->getErrors();
        }
        $result['result'] = $res->getId();

        $this->sendSms(array('ORDER_ID'=>$result['result'], 'PRICE'=>$arPrice['DISCOUNT_PRICE'], 'PHONE_TO'=>$data['PHONE']));

        setcookie("pk_order_id", $result['result'], time()+3600000, "/", $_SERVER['HTTP_HOST']);
		setcookie("pk_order_time", date("d.m.Y H:i"), time()+3600000, "/", $_SERVER['HTTP_HOST']);
        return $result;
    }

    private function createuser($data, $arSpecUser)
    {
        global $USER;
        if ($arSpecUser) {
            $login_add = randString(4, array(
                "abcdefghijklnmopqrstuvwxyz",
                "0123456789",
            ));
            $login = str_replace("@", $login_add . "@", $data['EMAIL']);
        }
        else
            $login = $data['EMAIL'];
        $password = randString(7);
        $user = new CUser;
        $arFields = Array(
            "NAME"              => $data['NAME'],
            "EMAIL"             => $data['EMAIL'],
            "LOGIN"             => $login,
            "ACTIVE"            => "Y",
            "GROUP_ID"          => array(2,6),
            "PASSWORD"          => $password,
            "CONFIRM_PASSWORD"  => $password,
        );

        $ID = $user->Add($arFields);
        if (intval($ID) > 0) {
            /*$arEventFields = array(
                "NAME" => $data['NAME'],
                "LOGIN" => $login,
                "USER_ID" => $ID,
            );
            $arrSITE =  's1';
            CEvent::Send("USER_INFO", $arrSITE, $arEventFields);*/

            //создаём профиль
            //PERSON_TYPE_ID - идентификатор типа плательщика, для которого создаётся профиль
            $arProfileFields = array(
                "NAME" => "Профиль покупателя (".$login.')',
                "USER_ID" => $ID,
                "PERSON_TYPE_ID" => 3
            );
            $PROFILE_ID = CSaleOrderUserProps::Add($arProfileFields);

            CUser::SendUserInfo($ID, SITE_ID, "Приветствуем Вас как нового пользователя нашего сайта!");
            $USER->Authorize($ID);
            return $ID;
        }
        else
            return 1;
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

        $arrSITE =  's1';
        CEvent::Send("FORM_TO_ADMIN", $arrSITE, $arEventFields);
        /*  $this->fileDump($data); */
        if($data['property']['EMAIL']) {
            $arEventFields['EMAIL'] = $data['property']['EMAIL'];
            CEvent::Send("SEND_USER_FORM", $arrSITE, $arEventFields);
        }

    }

    function sendSms($data) {

        $arEventFields = $data;

        $arrSITE =  's1';
        CEvent::Send("SMS4B_ADMIN_SALE_NEW_ORDER", $arrSITE, $arEventFields);

        CEvent::Send("SMS4B_SALE_NEW_ORDER", $arrSITE, $arEventFields);


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