<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="preload-ajax">
    <? if (count($arResult['error']) > 0) { /*?>
        <p class="error_add_form">
            <?=implode("<br>", $arResult['error']);?>
        </p>
    <?*/ } ?>
    <? if($arResult['result'] == 1) { ?>
        <p class="success_add_form">Пользователь добавлен</p>
    <? } ?>
    <form action="" method="post" enctype="multipart/form-data" class="simpleform simpleform-reload">


        <div class="input_wrap<?=($arResult['error']['NAME']?" error":"");?>"><input placeholder="Имя" type="text" name="NAME" value="<?=$arResult['data']['NAME'];?>"></div>
        <div class="input_wrap<?=($arResult['error']['PHONE']?" error":"");?>"> <input placeholder="+7 (___) ___-__-__" type="text" name="PHONE" value="<?=$arResult['data']['property']['PHONE'];?>"></div>
        <input type="submit" class="btn" value="Присоединиться к успешным!" >
        <input type="hidden" name="component" value="form.simple">
        <input type="hidden" name="IBLOCK_ID" value="<?=$arParams['IBLOCK_ID'];?>">
        <div class="errorForm"></div>
    </form>
    <?php
    $signer = new Bitrix\Main\Security\Sign\Signer;
    $signedParams = $signer->sign(base64_encode(serialize($arParams)), 'form.simple');
    ?>
<script>
    if (typeof(signedParamsStringFS) == "undefined")
        var signedParamsStringFS = {};
    signedParamsStringFS[<?=$arParams['IBLOCK_ID'];?>] ='<?=urlencode($signedParams)?>';
</script>

</div>