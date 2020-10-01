<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
$aMenuLinksExt=$APPLICATION->IncludeComponent("profitkit:menu.sections", "", array(
    "IS_SEF" => "Y",
    "SEF_BASE_URL" => "/katalog-3/",
    "SECTION_PAGE_URL" => "#SECTION_CODE_PATH#/",
    "DETAIL_PAGE_URL" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
    "IBLOCK_TYPE" => "content_m1",
    "IBLOCK_ID" => \Local\Profitkit\Finder::iblockId('pk_start_catalog'),
    "DEPTH_LEVEL" => "3",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000"
),
    false
);
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
?>
