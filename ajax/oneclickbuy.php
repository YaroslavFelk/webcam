<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?php
use Bitrix\Main\Application;
define('STOP_STATISTICS', true);
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC','Y');
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);
define('NOT_CHECK_PERMISSIONS', true);
$APPLICATION->ShowAjaxHead();
$form_id = 6;
$context = Application::getInstance()->getContext();
$request = $context->getRequest();
if ((int)$request['product_id'] > 0)
    $product_id = (int)$request['product_id'];
?>
<?$APPLICATION->IncludeComponent(
    "profitkit:oneclickbuy",
    "",
    Array('ID'=>$product_id,
        "AJAX"=>"Y",
        "LOAD_JS_CSS" => "Y",
        "SOGLASIE" => "Y",
        "CAPTCHA" => "N",
        "PERSON_TYPE_ID" => 1,
        "PAYMENT_ID"=>1,
        "DELIVERY_ID"=>1,
        'FIELDS'=>array('NAME', 'EMAIL', 'PHONE'),
        'REQUIRED'=>array('NAME', 'EMAIL', 'PHONE'))
);?>
