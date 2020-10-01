<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?><?$APPLICATION->IncludeComponent("profitkit:order.start", "", Array(
    'CART_URL' => '/cart/',
    'CATALOG_URL' => '/katalog/',
    'SOGLASIE' => 'Y',
    'USE_PERSONS' => 'Y',
    'USE_DELIVERY' => 'Y',
    'USE_PAYMENT' => 'Y',
    'SAVE_PROFILE' => 'Y',
    'SAVE_PROFILE_NOT' => array('EMAIL')
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>