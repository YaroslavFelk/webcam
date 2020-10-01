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
<div class="container">
<div class="contact_triggers">
        <div class="contact_row">
<?for($i = 0; $i < count($arResult["ITEMS"]); $i++):?>
	<?
	$this->AddEditAction($arResult["ITEMS"][$i]['ID'], $arResult["ITEMS"][$i]['EDIT_LINK'], CIBlock::GetArrayByID($arResult["ITEMS"][$i]["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arResult["ITEMS"][$i]['ID'], $arResult["ITEMS"][$i]['DELETE_LINK'], CIBlock::GetArrayByID($arResult["ITEMS"][$i]["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
        <?if ($i === 0) :?>
        <div class="col-4 contact-item" id="<?=$this->GetEditAreaId($arResult["ITEMS"][$i]['ID']);?>">
            <div class="contact_trig_icon"><?=$arResult["ITEMS"][$i]['~DETAIL_TEXT'];?></div>
            <div class="contact_trig_header"><?=$arResult["ITEMS"][$i]['NAME'];?></div>
            <div class="contact_trig_text">
                <?=$arParams['ACTIVE_CITY']['PROPERTIES']['ADDRESS']['VALUE'] ?>
            </div>
        </div>
            <?endif;?>

        <?if ($i === 1) :?>
        <div class="col-4 contact-item" id="<?=$this->GetEditAreaId($arResult["ITEMS"][$i]['ID']);?>">
            <div class="contact_trig_icon"><?=$arResult["ITEMS"][$i]['~DETAIL_TEXT'];?></div>
            <div class="contact_trig_header"><?=$arResult["ITEMS"][$i]['NAME'];?></div>
            <div class="contact_trig_text">
                <?=$arParams['ACTIVE_CITY']['PROPERTIES']['PHONE_BEAUTY']['VALUE'] ?>
            </div>
        </div>
        <?endif;?>

        <?if ($i === 2) :?>
        <div class="col-4 contact-item" id="<?=$this->GetEditAreaId($arResult["ITEMS"][$i]['ID']);?>">
            <div class="contact_trig_icon"><?=$arResult["ITEMS"][$i]['~DETAIL_TEXT'];?></div>
            <div class="contact_trig_header"><?=$arResult["ITEMS"][$i]['NAME'];?></div>
            <div class="contact_trig_text">
                <?=$arParams['ACTIVE_CITY']['PROPERTIES']['EMAIL']['VALUE'] ?>
            </div>
        </div>
        <?endif;?>
<?endfor;?>
        </div>
</div>
</div>
