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
if ($arResult['PROPERTIES']['PHOTOS']['VALUE']) {
    $this->addExternalCss(SITE_TEMPLATE_PATH."/css/magnific-popup.css");
    $this->addExternalJS(SITE_TEMPLATE_PATH."/js/jquery.magnific-popup.min.js");
    $this->addExternalCss(SITE_TEMPLATE_PATH."/css/slick.css");
    $this->addExternalJS(SITE_TEMPLATE_PATH."/js/slick.min.js");
}
?>
<?$this->SetViewTarget("main_banner");?>
<?php
if ($arResult["PROPERTIES"]["BNR_TOP_BG"]["VALUE"]) {
$big_picture = CFile::GetPath($arResult["PROPERTIES"]["BNR_TOP_BG"]["VALUE"]);
$bnr_img = CFile::GetPath($arResult["PROPERTIES"]["BNR_TOP_IMG"]["VALUE"]);
?>
<div style="background: url('<?=$big_picture;?>') no-repeat top center; height: 450px;" class="banner_item">
    <div class="container">
        <div class="row">
            <div class="col-6 slide_info">
                <div>
                    <div class="slider_text">
                        <h1><?=$arResult['NAME'];?></h1>
                        <p>
                            <?=$arResult['PREIVIEW_TEXT'];?>
                        </p>                        </div>
                    <div class="slider_btn">
                        <a class="btn" data-toggle="pkModal" data-target="#callbackModal" data-ajax="/ajax/form.php?form_id=<?=\Local\Profitkit\Finder::iblockId('profitkit_order_services', 'profitkit_forms');?>&field=SERVICE&value=<?=$arResult['NAME'];?>">Заказать</a>
                        <a class="btn_white" data-toggle="pkModal" data-target="#callbackModal" data-ajax="/ajax/form.php?form_id=<?=\Local\Profitkit\Finder::iblockId('profitkit_question', 'profitkit_forms');?>&field=NEED_PRODUCT&value=<?=$arResult['NAME'];?>">Задать вопрос</a>
                    </div>
                </div>
            </div>
            <div class="col-6 slide_img">
                <img src="<?=$bnr_img;?>">
            </div>
        </div>
    </div>
</div>
    <style>
        .breadcrumbs {display: none;}
        main>.container>h1 {display: none;}
    </style>
<? } ?>
<?$this->EndViewTarget();?>
<?/*$this->SetViewTarget("left_sidebar");?>
<div>left_sidebar</div>
<?$this->EndViewTarget();*/?>
<div class="service_detail">
    <div class="row service_detail_main_info">
        <? if (!$arResult["PROPERTIES"]["BNR_TOP_BG"]["VALUE"]) { ?>
        <div class="service_detail_img">
            <img
                    class="detail_picture"
                    border="0"
                    src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                    alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                    title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
            />
        </div>
        <? } ?>
        <div class="service_detail_actions">
            <? if ($arResult['DISPLAY_PROPERTIES']) { ?>
            <? foreach ($arResult['DISPLAY_PROPERTIES'] as $prop) { ?>
                <div class="service_detail_props"><div class="prop_name"><?=$prop['NAME'];?></div><div><?=$prop['DISPLAY_VALUE'];?></div></div>
            <? } ?>
            <? } ?>
            <? if ($arResult['PROPERTIES']['PRICE']['VALUE']) { ?>
            <div class="service_detail_price">
                <span><?=$arResult['PROPERTIES']['PRICE']['VALUE'];?></span>
                <? if ($arResult['PROPERTIES']['PRICEOLD']['VALUE']) { ?><span class="price_old"><?=$arResult['PROPERTIES']['PRICEOLD']['VALUE'];?></span><? } ?>
            </div>
            <? } ?>
            <a class="btn" data-toggle="pkModal" data-target="#callbackModal" data-ajax="/ajax/form.php?form_id=34&field=SERVICE&value=<?=$arResult['NAME'];?>">Заказать</a>
            <a class="btn_white" data-toggle="pkModal" data-target="#callbackModal" data-ajax="/ajax/form.php?form_id=38&field=NEED_PRODUCT&value=<?=$arResult['NAME'];?>">Задать вопрос</a>
        </div>
    </div>
    <div class="service_detail_description">
        <?=$arResult['DETAIL_TEXT'];?>
    </div>

    <div class="buy_block">
        <i><svg xmlns="http://www.w3.org/2000/svg" width="47" height="55" viewBox="0 0 47 55">

                <path class="oscls-1" d="M34.5,55A12.5,12.5,0,1,1,47,42.5,12.5,12.5,0,0,1,34.5,55Zm0-23A10.5,10.5,0,1,0,45,42.5,10.5,10.5,0,0,0,34.5,32ZM33.757,46.647c-0.018.021-.024,0.047-0.044,0.066a1.026,1.026,0,0,1-1.427,0c-0.02-.02-0.026-0.046-0.044-0.066l-3.956-3.956a0.993,0.993,0,0,1,1.4-1.4L33,44.6l6.309-6.309a0.993,0.993,0,0,1,1.4,1.4ZM41,28a1,1,0,0,1-1-1V5H32.859A3.991,3.991,0,0,1,29,8H13A3.991,3.991,0,0,1,9.141,5H2V48H19a1,1,0,0,1,0,2H2a2,2,0,0,1-2-2V5A2,2,0,0,1,2,3H9.141A3.991,3.991,0,0,1,13,0H29a3.991,3.991,0,0,1,3.859,3H40a2,2,0,0,1,2,2V27A1,1,0,0,1,41,28ZM29,2H13a2,2,0,0,0,0,4H29A2,2,0,0,0,29,2Zm2,24H11a1,1,0,0,1,0-2H31A1,1,0,0,1,31,26Zm0-10H11a1,1,0,0,1,0-2H31A1,1,0,0,1,31,16Zm0,5H11a1,1,0,0,1,0-2H31A1,1,0,0,1,31,21ZM10,30a1,1,0,0,1,1-1H21a1,1,0,0,1,0,2H11A1,1,0,0,1,10,30Z"></path>
            </svg></i>
        <div>Оформите заявку на услугу, мы свяжемся с вами в ближайшее время и ответим на все интересующие вопросы.</div>
        <a class="btn" data-toggle="pkModal" data-target="#callbackModal" data-ajax="/ajax/form.php?form_id=34&field=SERVICE&value=<?=$arResult['NAME'];?>">Заказать</a>
    </div>
    <? if ($arResult['PROPERTIES']['PHOTOS']['VALUE']) {?>
    <div class="service_detail_products">
        <div class="h2">Галерея</div>
        <div class="row service-gallery">
            <? foreach ($arResult['PROPERTIES']['PHOTOS']['VALUE'] as $v) {
                $big_picture = CFile::GetPath($v);
                ?>
            <div class="col-3">
                <a href="<?=$big_picture;?>"><img src="<?=$big_picture;?>" width="100%"> </a>
            </div>
            <? } ?>
        </div>
    </div>
    <? } ?>
    <? if ($arResult['PROPERTIES']['DOCUMENTS']['VALUE']) {?>
    <div class="service_detail_products">
        <div class="h2">Документы</div>
        <? foreach ($arResult['PROPERTIES']['DOCUMENTS']['VALUE'] as $k => $v) {
            $big_picture = CFile::GetPath($v);
            ?>
            <div>
                <a target="_blank" href="<?=$big_picture;?>"><?=$arResult['PROPERTIES']['DOCUMENTS']['DESCRIPTION'][$k];?></a>
            </div>
        <? } ?>
    </div>
    <? } ?>
    <? if ($arResult['PROPERTIES']['PRICE_TEXT']['VALUE']['TEXT']) { ?>
    <div class="service_detail_products">
        <div class="h2">Прайс (таблица)</div>
        <div class="price_table">
            <?=$arResult['PROPERTIES']['PRICE_TEXT']['~VALUE']['TEXT'];?>
        </div>
    </div>
    <? } ?>
</div>