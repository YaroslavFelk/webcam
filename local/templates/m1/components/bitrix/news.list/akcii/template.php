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
<?$listLink=strstr($arResult['LIST_PAGE_URL'], '/');?>
<div class="articles">
    <div class="container">
        <div class="h2" data-aos="zoom-in" data-aos-delay="100">Акции и распродажи</div>
        <a href="<?=$listLink;?>" class="article_more">Все акции</a>
        <div class="row">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
        <a data-aos="flip-up" data-aos-delay="400" href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="col-4 article_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="article_img"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>"> </div>
            <div class="article_title"><?=$arItem['NAME'];?></div>
            <div class="article_text"><?=$arItem['PREVIEW_TEXT'];?></div>
        </a>
<?endforeach;?>
        </div>
    </div>
</div>