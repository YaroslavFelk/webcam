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
$context = Application::getInstance()->getContext();
$request = $context->getRequest();
if ((int)$request['id'] > 0)
    $id = (int)$request['id'];
?>
<h2>Доставка</h2>
<p>Информация о доставке</p>
