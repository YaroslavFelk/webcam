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
<div class="partners_list">
<? foreach ($arResult['SECTION_ITEMS'] as $arSection) { ?>
    <h2><?=$arSection['NAME'];?></h2>
    <p><?=$arSection['DESCRIPTION'];?></p>
    <div class="row">
<?foreach($arSection["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="partners_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="partners_img"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>"></div>
        <a href=""><?=$arItem['NAME'];?></a>
        <p><?=$arItem['PREVIEW_TEXT'];?></p>
        <div class="partners_site"><?=$arItem['PROPERTIES']['SITE']['VALUE'];?></div>
        <div class="partners_phone"><?=$arItem['PROPERTIES']['PHONE']['VALUE'];?></div>
        <div class="partners_slogan"><?=$arItem['PROPERTIES']['SLOGAN']['VALUE'];?></div>
	</div>
<?endforeach;?>
    </div>
    <? } ?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
