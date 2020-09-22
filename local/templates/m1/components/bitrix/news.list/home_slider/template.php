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

$this->addExternalCss(SITE_TEMPLATE_PATH."/css/slick.css");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/slick.min.js");

//Asset::getInstance()->addJs($templateFolder."/script.js");
?>
<div class="main_slider<?=($arResult["ITEMS"][0]['PROPERTIES']['ELEMENT_COLOR']['VALUE']=='Светлый'?" element_color_white":"");?>" data-slick='{"autoplay": <?=($arParams['AUTOPLAY']=='Y'?'true':'false');?>, "autoplaySpeed": <?=($arParams['AUTOPLAY_SPEED']>0?$arParams['AUTOPLAY_SPEED']:'5000');?>}'>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="slider_item<?=($arItem['PROPERTIES']['FONT_COLOR']['VALUE']=='Светлый'?" font_color_white":"");?><?=($arItem['PROPERTIES']['ELEMENT_COLOR']['VALUE']=='Светлый'?" element_color_white":"");?>" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>')"
         id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="container">
            <div class="row">
                <div class="col-6 slide_info">
                    <div>
                        <div class="slider_text">
                            <h2><?=$arItem['NAME'];?></h2>
                            <?=$arItem['PREVIEW_TEXT'];?>
                        </div>
                        <div class="slider_btn"><a class="btn_style" href="<?=$arItem['PROPERTIES']['BTN_URL']['VALUE'];?>"><?=$arItem['PROPERTIES']['BTN_TEXT']['VALUE'];?></a></div>
                    </div>
                </div>
                <div class="col-6 slide_img">
                    <img src="<?=$arItem['DETAIL_PICTURE']['SRC'];?>">
                </div>
            </div>
        </div>
    </div>
<?endforeach;?>
</div>