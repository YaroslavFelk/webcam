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
$this->addExternalCss(SITE_TEMPLATE_PATH."/css/magnific-popup.css");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/jquery.magnific-popup.min.js");
$this->addExternalCss(SITE_TEMPLATE_PATH."/css/slick.css");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/slick.min.js");
?>
<div class="container popup-gallery_container">
    <div class="h2"><?=$arParams['PAGER_TITLE'];?></div>
<div class="row popup-gallery">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="col-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
<a href="<?=($arItem["DETAIL_PICTURE"]["SRC"]?$arItem["DETAIL_PICTURE"]["SRC"]:$arItem["PREVIEW_PICTURE"]["SRC"])?>" title="<?=$arItem['NAME'];?>">
				<img
					class="preview_picture"
					border="0"
					src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
					/>
</a>
    </div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
</div>
