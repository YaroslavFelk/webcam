<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Application;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Page\Asset;
use \Bitrix\Main\Loader;
use \Bitrix\Highloadblock as HL;
use \Bitrix\Main\Localization\Loc;
use \Profitkit\Shopstart\Basket\BasketTable;
use \Profitkit\Shopstart\OwnerTable;
use \Profitkit\Shopstart\Shop;
use \Profitkit\Shopstart\Property\PropertyTable;
use \Profitkit\Shopstart\Delivery\DeliveryTable;
use \Profitkit\Shopstart\Payment\PaymentTable;
use \Profitkit\Shopstart\Order\OrderTable;
use \Profitkit\Shopstart\OrderPropertyTable;

define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");

class CProfitkitFormSimple extends CBitrixComponent implements Controllerable
{

    function fileDump(&$arFields,$paramName = "arrName"){
        AddMessage2Log($paramName.' = '.print_r($arFields, true),'');
    }

	public function onPrepareComponentParams($arParams)
    {
        if (!isset($arParams['EVENT']))
            $arParams['EVENT'] = array('PK_NEW_ORDER');

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
        /*
         * Сохранения заполненных поле в cookie
         *
         *
         *
         */
        $arResult = array();

        \Bitrix\Main\Loader::IncludeModule("profitkit.shopstart");
        /*
                $insert = array('NAME'=>'Дом, корпус', 'CODE'=>'', 'GROUP_ID'=>2, 'PERSON_TYPE_ID'=>PropertyTable::FIZ, 'LID'=>'m1', 'TYPE'=>'string',
                    'SETTING' => array('col'=>'col-3'),
                    'DATATIME_INSERT' => new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s'),
                    'DATATIME_UPDATE' => new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s'));
                //$res = PropertyTable::add($insert);
                $update = array('SETTING' => array('delivery'=>array(1,3)));
                $res = PropertyTable::update(6, $update);
                if (!$res->isSuccess()) {
                    echo "<pre>";
                    var_dump($res->getErrors());
                    echo "</pre>";
                }
                else
                    echo $res->getId();
        */
        $owner_id = OwnerTable::getOwnerId();
        $arResult['OWNER_ID'] = $owner_id;

        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();



        if ($this->arParams['USE_PERSONS'] == 'Y') {
            $arResult['PERSONS'] = Shop::getPersonTypes();

            if (!isset($arResult['PERSONS'][$request['person_type_id']]))
                $arResult['person_type_id'] = 1;
            else
                $arResult['person_type_id'] = $request['person_type_id'];
        }
        else
            $arResult['person_type_id'] = 1;

        if ($request['order_comment'])
            $arResult['order_comment'] = $request['order_comment'];
        else
            $arResult['order_comment'] = '';

        $filter = array('OWNER_ID'=>$owner_id, 'DELAY'=>0);
        $basket = BasketTable::getBasket($filter);
        if (count($basket) == 0) {
            LocalRedirect($this->arParams['CART_URL']);
            exit;
        }
        $arResult['SUM_ITEMS'] = $basket['SUM_ITEMS'];
        $arResult['QUANTITY'] = $basket['QUANTITY'];
        $arResult['ITEMS'] = $basket['ITEMS'];
        $arResult['DISCOUNT_ALL'] = $basket['DISCOUNT_ALL'];

        $arResult['SUM_ITEMS_formated'] = Shop::getPriceFormated($arResult['SUM_ITEMS']);
        if ((int)$arResult['DISCOUNT_ALL'] > 0)
            $arResult['DISCOUNT_ALL_formated'] = Shop::getPriceFormated($arResult['DISCOUNT_ALL']);

        $arResult['SUM_DELIVERY'] = 0;


        $property = PropertyTable::getOrderFields($arResult['person_type_id']);
        $arResult['CITY'] = $property['city'];

        if ($this->arParams['USE_DELIVERY'] == 'Y') {
            $delivery = DeliveryTable::getDelivery($property['city']);
            $delivery_id = $delivery['selected'];
            $arResult['DELIVERY'] = $delivery['items'];
            $arResult['DELIVERY_ID'] = $delivery['selected'];
            $arResult['SUM_DELIVERY'] = (int)preg_replace("/[^0-9]/", "", $arResult['DELIVERY'][$arResult['DELIVERY_ID']]['PRICE']);;
        }
        else
            $delivery_id = false;

        $actual_fields = Shop::getActualFields($property['items'], $delivery_id);
        $arResult['FIELDS'] = $actual_fields['items'];
        $arResult['IS_DELIVERY_FIELDS'] = $actual_fields['delivery_fields'];
        if ($this->arParams['USE_PAYMENT'] == 'Y') {
            $payment = PaymentTable::getPayment();
            $arResult['PAYMENT'] = $payment['items'];
            $arResult['PAYMENT_ID'] = $payment['selected'];
        }

        $arResult['SUM_ALL'] = $arResult['SUM_ITEMS'] + $arResult['SUM_DELIVERY'];
        $arResult['SUM_ALL_formated'] = Shop::getPriceFormated($arResult['SUM_ALL']);
        $arResult['SUM_DELIVERY_formated'] = Shop::getPriceFormated($arResult['SUM_DELIVERY']);


        $action = self::clean($request['action']);
        if ($action == 'submit')
        {
            $result = $this->submitAction($arResult);
            $arResult['data'] = $result['data'];
            if ($result['error'])
            {
                $arResult['error'] = $result['error'];
            }
            else
            {
               /* if ($this->arParams['AJAX'] != 'Y') {
                    LocalRedirect(strtok($_SERVER['REQUEST_URI'], "?").'?result='.$result['result']);
                }*/
                unset($arResult['data']);
                $arResult['result'] = (int)$result['result'];
                $arResult['ORDER_ID'] = (int)$result['ORDER_ID'];
            }
        }
        elseif ($action == 'reload') {

        }

		$this->arResult = $arResult;
		$this->includeComponentTemplate();


    }

	
	function submitAction($arResult)
	{
		$context = Application::getInstance()->getContext();
		$request = $context->getRequest();

        $result = array();
        foreach ($arResult['FIELDS'] as $k => $field) {
            //$code = 'orderprop_'.$field['ID'];
            /*if (isset($request[$code])) {
                if (is_array($request[$code]))
                    $arResult['FIELDS'][$k][''] = $request[$code];
                else
                    $data['props'][$field['ID']] = self::clean($request[$code]);
            }*/
            if ($field['REQUIRED'] == 1 and !$field['DEFAULT_VALUE'])
                $result['error'][$field['ID']] = 'Заполните поле '.$field['NAME'];

            /*
             * Проверка корректности номера телефона, электронной почты
             * */
        }

        if ($this->arParams['USE_DELIVERY'] == 'Y' and !$arResult['DELIVERY_ID']) {
            $result['error']['req_DELIVERY'] = 'Выберите способ доставки';
        }

        if ($this->arParams['USE_PAYMENT'] == 'Y' and !$arResult['PAYMENT_ID']) {
            $result['error']['req_PAYMENT'] = 'Выберите способ оплаты';
        }

        if ($this->arParams['SOGLASIE'] == 'Y') {
            $data['SOGLASIE'] = $request['SOGLASIE'];
            /*if ($request['SOGLASIE'] != 'Y')
                $result['error']['req_SOGLASIE'] = 'Примите согласие';*/
        }
        $result['data'] = $data;

		if ($result['error'])
		{
			return $result;	
		}

		$res = $this->saveData($arResult);
        $result = array_merge($result, $res);
		
		return $result;
	}

	function saveData($data)
    {

        CModule::IncludeModule("iblock");
        global $USER;


        /*if($ID = $el->Add($newFields)) {
            $result['result'] = $ID;
            //$this->sendMail($data);
        } else {
            $result['error'][] = $el->LAST_ERROR;
        }*/
        /*
         * Созать заказ
         * Создать свойства заказа
         * Создать оплату
         * Создать доставку
         * Привязать корзину
         * Очистить корзину
         * Сохранить данные в профиле
         * Отправить уведомления
         */
        $insert = array(
            'LID' => SITE_ID,
            'DATATIME_INSERT' => new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s'),
            'DATATIME_UPDATE' => new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s'),
            'ORDER_STATUS_ID' => Shop::STATUS_NEW,
            'PAYED' => 0,
            'DELIVER_ID' => $data['DELIVERY_ID'],
            'RESULT_PRICE' => $data['SUM_ALL'],
            'DEVILERY_PRICE' => $data['SUM_DELIVERY'],
            'PAYED_PRICE' => 0,
            'DISCOUNT_VALUE' => (int)$data['DISCOUNT_ALL'],
            'TAX_VALUE' => 0,
            'BLOCKED' => 0,
            'DESCRIPTION' => $this->clean($data['order_comment']),
            'CANSELED' => 0,
            'CREATED_BY_ID' => $USER->GetID(),
            'MODIFIED_BY_ID' => $USER->GetID(),
            'OWNER_ID' => $data['OWNER_ID'],
            'COUPON_ID' => 0,
        );
        $res = OrderTable::add($insert);
        if (!$res->isSuccess()) {
            /*echo "<pre>";
            var_dump($res->getErrors());
            echo "</pre>";*/
            return array('error'=>$res->getErrors());
        }
        else
            $order_id = $res->getId();

        foreach ($data['FIELDS'] as $field) {
            $insert = array(
                'ORDER_ID' => $order_id,
                'PROPERTY_ID' => $field['ID'],
                'NAME' => $field['NAME'],
                'VALUE' => $this->clean($field['DEFAULT_VALUE']),
            );
            OrderPropertyTable::add($insert);
        }

        foreach ($data['ITEMS'] as $item) {
            $basket_update = array('ORDER_ID' => $order_id);
            BasketTable::update($item['ID'], $basket_update);
        }

        OwnerTable::delete($data['OWNER_ID']);

        if ($this->arParams['SAVE_PROFILE'] == 'Y' and $USER->GetID() > 0) {
            $user_up = array();
            foreach ($data['FIELDS'] as $field) {
                if (!$field['CODE'])
                    continue;
                if (in_array($field['CODE'], $this->arParams['SAVE_PROFILE_NOT']))
                    continue;
                if (!key_exists($field['CODE'], PropertyTable::$user_profile))
                    continue;
                if ($this->arParams['SAVE_PROFILE_NEW'] == 'Y' and !PropertyTable::$user_profile[$field['CODE']])
                    $user_up[$field['CODE']] = $field['DEFAULT_VALUE'];
                elseif ($this->arParams['SAVE_PROFILE_NEW'] != 'Y')
                    $user_up[$field['CODE']] = $field['DEFAULT_VALUE'];
            }
            if (count($user_up) > 0) {
                $user = new CUser;
                $user->Update($USER->GetID(), $user_up);
            }

        }

        $data['ORDER_ID'] = $order_id;
        $this->sendMail($data, $this->arParams['EVENT']);

        $result = array('result'=>1, 'ORDER_ID'=>$order_id);

        return $result;
    }

    function sendMail($data, $event) {

        $arEventFields = array(
            'ORDER_ID' => $data['ORDER_ID'],
            'DELIVER' => $data['DELIVERY'][$data['DELIVERY_ID']]['NAME'],
            'PAYMENT' => $data['PAYMENT'][$data['PAYMENT_ID']]['NAME'],
            'RESULT_PRICE' => $data['SUM_ALL_formated'],
            'DEVILERY_PRICE' => $data['SUM_DELIVERY_formated'],
            'DISCOUNT_VALUE' => (int)$data['DISCOUNT_ALL'],
            'DESCRIPTION' => $data['order_comment'],
        );

        foreach ($data['FIELDS'] as $field) {
            $arEventFields['PROP_'.$field['ID']] = $field['DEFAULT_VALUE'];
        }

        $basket = '';
        foreach ($data['ITEMS'] as $item) {
            $basket .= "{$item['NAME']} - {$item['QUANTITY']}шт. - {$item['SUM_formated']}<br>";
        }
        $arEventFields['BASKET'] = $basket;

        $arrSITE =  SITE_ID;
        foreach ($event as $val) {
            CEvent::Send($val, $arrSITE, $arEventFields);
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