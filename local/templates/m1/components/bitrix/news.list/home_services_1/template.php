<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Localization\Loc;
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

<div class="articles">
    <div class="container">
        <div class="h2" data-aos="fade-up"><?=Loc::getMessage("PK_HD_SERVICES") ?></div>
        <a href="" class="article_more"><?=Loc::getMessage("PK_ALL_SERVICES") ?></a>
        <div class="row">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
        <a data-aos="flip-left" href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="col-4 article_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="article_img"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>"> </div>
            <div class="article_title"><?=$arItem['NAME'];?></div>
            <? if ($arParams['DISPLAY_PREVIEW_TEXT'] == 'Y') { ?><div class="article_text"><?=$arItem['PREVIEW_TEXT'];?></div><? } ?>
        </a>
<?endforeach;?>
        </div>
    </div>
</div>