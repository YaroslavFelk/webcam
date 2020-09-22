<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/jquery.mask.min.js");
?>
<div class="preload-ajax">
    <? if (count($arResult['error']) > 0) { /*?>
        <p class="error_add_form">
            <?=implode("<br>", $arResult['error']);?>
        </p>
    <?*/ } ?>
    <h2>Купить в 1 клик</h2>
    <p><?=$arResult['PRODUCT_NAME'];?></p>
    <? if($arResult['result']) { ?>
        <meta http-equiv="refresh" content="0;URL=/personal/order/new/?ORDER_ID=<?=$arResult['result'];?>">
    <? } ?>
    <form action="" method="post" enctype="multipart/form-data" class="simpleform simpleform-reload">


        <div class="fld_row<?=($arResult['error']['NAME']?" error":"");?>"><input placeholder="Имя" type="text" name="NAME" value="<?=$arResult['data']['NAME'];?>" class="<?=($arResult['error']['NAME']?" input_error":"");?>"></div>
        <div class="fld_row<?=($arResult['error']['EMAIL']?" error":"");?>"><input placeholder="Email" type="text" name="EMAIL" value="<?=$arResult['data']['EMAIL'];?>" class="<?=($arResult['error']['EMAIL']?" input_error":"");?>"></div>
        <div class="fld_row<?=($arResult['error']['PHONE']?" error":"");?>"> <input placeholder="+7 (___) ___-__-__" type="text" name="PHONE" value="<?=$arResult['data']['PHONE'];?>" class="<?=($arResult['error']['PHONE']?" input_error":"");?>"></div>
        <input type="submit" class="btn" value="Отправить" >
        <input type="hidden" name="component" value="oneclickbuy">
        <div class="errorForm"></div>
    </form>
    <?php
    $signer = new Bitrix\Main\Security\Sign\Signer;
    $signedParams = $signer->sign(base64_encode(serialize($arParams)), 'form.simple');
    ?>
<script>
    if (typeof(signedParamsStringOCB) == "undefined")
        var signedParamsStringOCB = {};
    signedParamsStringOCB ='<?=urlencode($signedParams)?>';
    jQuery("[name=PHONE]").mask("+7 (999) 999-99-99");
</script>

</div>