<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?
foreach ($arResult['ITEMS'] as $k => &$arSection)
{
    if ($k <=3)
        $resize = array('width'=>400, 'height'=>200);
    else
        $resize = array('width'=>800, 'height'=>300);
    $file = CFile::ResizeImageGet($arSection['PREVIEW_PICTURE'], $resize, BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $sect[$k] = '<div data-tilt class="popular_service_item" id="'.$this->GetEditAreaId($arSection['ID']).'">
         <a href="'.$arSection['DETAIL_PAGE_URL'].'" style="background:url('.$file['src'].') center center; background-repeat: no-repeat; background-size: cover;">
                                
                                <span class="popular_title">'.$arSection['NAME'].'</span>
         </a>
    </div>';
}
?>
<div class="popular_service">
    <div class="container">
        <div class="h2"><?=$arParams['PAGER_TITLE'];?></div>
        <a href="/uslugi/" class="popular_more">Все услуги</a>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col"><?=$sect[0];?></div>
                    <div class="col"><?=$sect[1];?></div>
                    <div class="col"><?=$sect[2];?></div>
                    <div class="col"><?=$sect[3];?></div>
                </div>
                <div class="row">
                    <div class="col item_horizontal"><?=$sect[4];?></div>
                    <div class="col item_horizontal"><?=$sect[5];?></div>
                </div>
            </div>
        </div>
    </div>
</div>