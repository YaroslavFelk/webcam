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
<?php

?>

<li class="header__nav_address">
    <a class="link js-city" id="<?=$arParams['ACTIVE_CITY']['ID']?>" href="#"><?=$arParams['ACTIVE_CITY']["NAME"]?></a>
    <?echo'<pre>',print_r($city, true),'</pre>'?>
    <div class="header__nav_address-list">
<? for( $i = 0; $i < count($arResult["ITEMS"]); $i++):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <?if ($arResult["ITEMS"][$i]["ID"] != $arParams['ACTIVE_CITY']['ID']):?>
        <a class="js-city" id="<?=$arResult["ITEMS"][$i]["ID"]?>"   href="#"><?=$arResult["ITEMS"][$i]["NAME"]?></a>
    <?endif;?>

<?endfor;?>
    </div>
</li>

<script>
    $('.js-city').on('click', function (e) {
        e.preventDefault();
         document.cookie = "city=" + this.id;
            window.location.replace(window.location.href)
    })

</script>

