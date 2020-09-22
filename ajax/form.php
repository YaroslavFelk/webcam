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
$form_id = \Local\Profitkit\Finder::iblockId('profitkit_callback', 'profitkit_forms');
$context = Application::getInstance()->getContext();
$request = $context->getRequest();
if ((int)$request['form_id'] > 0)
    $form_id = (int)$request['form_id'];
?>
<?$APPLICATION->IncludeComponent(
    "profitkit:form.simple",
    "callback",
    Array('IBLOCK_ID'=>$form_id,
        "AJAX"=>"Y",
        "LOAD_JS_CSS" => "Y",
        "SOGLASIE" => "Y"
        /*'FIELDS'=>array('NAME'),
        'PROPERTY'=>array('NAME','PHONE'),
        'REQUIRED'=>array('NAME', 'PHONE')*/)
);?>
