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
foreach ($arResult['SECTIONS'] as $k => &$arSection)
{
    if ($k == 4)
        $resize = array('width'=>350, 'height'=>350);
    else
        $resize = array('width'=>200, 'height'=>100);
    $file = CFile::ResizeImageGet($arSection['PICTURE'], $resize, BX_RESIZE_IMAGE_PROPORTIONAL, true);
    $sect[$k] = '<div class="popular_category_item" id="'.$this->GetEditAreaId($arSection['ID']).'">
         <a href="'.$arSection['SECTION_PAGE_URL'].'">
                                <img src="'.$file['src'].'">
                                <span class="popular_title">'.$arSection['NAME'].'
                                    <span class="popular_description">'.num_word($arSection['ELEMENT_CNT'], array('товар', 'товара', 'товаров')).' </span>
                                </span>
         </a>
    </div>';
}
?>
<div class="popular_category">
    <div class="container">
        <div class="h2"><?=$arParams['TITLE_NAME'];?></div>
        <a href="<?=$arParams['LIST_URL'];?>" class="popular_more"><?=GetMessage('CT_BCSL_MORE');?></a>
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col"><?=$sect[0];?></div>
                    <div class="col"><?=$sect[1];?></div>
                    <div class="col"><?=$sect[2];?></div>
                    <div class="col"><?=$sect[3];?></div>
                </div>
                <div class="row">
                    <div class="col item_horizontal"><?=$sect[5];?></div>
                    <div class="col item_horizontal"><?=$sect[6];?></div>
                </div>
            </div>
            <div class="col-3" style=""><?=$sect[4];?></div>

        </div>
    </div>
</div>