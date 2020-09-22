<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arResult['LINK_GOODS'] = $arResult['PROPERTIES']['LINK_GOODS']['VALUE'];
$arResult['LINK_SERVICES'] = $arResult['PROPERTIES']['LINK_SERVICES']['VALUE'];
$arResult['BNR_TOP_BG'] = $arResult['PROPERTIES']['BNR_TOP_BG']['VALUE'];
$this->__component->SetResultCacheKeys(array("LINK_GOODS", "LINK_SERVICES", "BNR_TOP_BG"));