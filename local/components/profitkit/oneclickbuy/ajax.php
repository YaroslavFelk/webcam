<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
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
$request->addFilter(new \Bitrix\Main\Web\PostDecodeFilter);
$signer = new \Bitrix\Main\Security\Sign\Signer;
try
{
    $signedParamsString = $request->get('signedParamsString') ?: '';
    $params = $signer->unsign($signedParamsString, 'form.simple');
    //var_dump($params);
    $params = unserialize(base64_decode($params));
    //var_dump($params);
}
catch (\Bitrix\Main\Security\Sign\BadSignatureException $e)
{
    var_dump($e->getMessage());
    die();
}

if (isset($request['template'])){
    $template = $request['template'];
}
if (!$template)
    $template = '.default';
?>
<? $APPLICATION->IncludeComponent(
"profitkit:oneclickbuy",
    $template,
    $params,
false
);?>