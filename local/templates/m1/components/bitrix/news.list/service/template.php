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
<div class="service_items">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="service_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="service_item_img"><a  href="<?=$arItem['DETAIL_PAGE_URL'];?>"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>"></a></div>
        <div>
            <a class="h2" href="<?=$arItem['DETAIL_PAGE_URL'];?>"><?=$arItem['NAME'];?></a>
            <p><?=$arItem['PREVIEW_TEXT'];?></p>
            <? if ($arItem['PROPERTIES']['PRICE']['VALUE']) { ?>
            <div class="service_item_price">
                <span><?=$arItem['PROPERTIES']['PRICE']['VALUE'];?></span>
                <? if ($arItem['PROPERTIES']['PRICEOLD']['VALUE']) { ?><span class="price_old"><?=$arItem['PROPERTIES']['PRICEOLD']['VALUE'];?></span><? } ?>
            </div>
            <? } ?>
            <a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="btn">Подробнее</a>
        </div>

	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>