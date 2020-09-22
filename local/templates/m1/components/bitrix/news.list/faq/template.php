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
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/bootstrap-collapse.js");
?>
<div class="faq_list">
<? foreach ($arResult['SECTION_ITEMS'] as $arSection) { ?>
    <h2><?=$arSection['NAME'];?></h2>
    <p><?=$arSection['DESCRIPTION'];?></p>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?foreach($arSection["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="panel panel-default" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="panel-heading" role="tab" id="heading<?=$arItem['ID'];?>">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$arItem['ID'];?>" aria-expanded="false" aria-controls="collapse<?=$arItem['ID'];?>">
                    <?=$arItem['NAME'];?>
                </a>
            </h4>
        </div>
        <div id="collapse<?=$arItem['ID'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$arItem['ID'];?>">
            <div class="panel-body">
                <?=$arItem['PREVIEW_TEXT'];?>
            </div>
        </div>
    </div>
<?endforeach;?>
    </div>
    <? } ?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
