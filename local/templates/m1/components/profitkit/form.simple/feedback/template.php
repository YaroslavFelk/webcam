<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
//$this->addExternalJS($componentPath."/script.js");
?>
<div class="col-6 preload-ajax contact_feedback">
    <? /*if (count($arResult['error']) > 0) { ?>
        <p class="error_add_form">
            <?=implode("<br>", $arResult['error']);?>
        </p>
    <? } */?>
    <div class="h2">Обратная связь</div>
    <p>Остались воопросы? Напишите и мы ответим</p>
    <? if($arResult['result'] >0) { ?>
        <p class="success_add_form">Ваша заявка отправлена</p>
    <? } ?>
    <form action="" method="post" enctype="multipart/form-data" class="simpleform simpleform-reload">
        <input type="hidden" name="component" value="form.simple">
        <input type="hidden" name="template" value="feedback">
        <input type="hidden" name="IBLOCK_ID" value="<?=$arParams['IBLOCK_ID'];?>">
        <? foreach ($arResult['formFields'] as $key => $field) { ?>
        <div class="fld_row">
            <label><?=$field['NAME'];?><? if ($field['IS_REQUIRED'] == 'Y') { ?><span class="fld_req">*</span><? } ?></label>
            <?php
            switch ($field['PROPERTY_TYPE']) {
                case "S":
                default:
                    if ($field['USER_TYPE'] == 'HTML') { ?>
                        <textarea name="<?=$key;?>" class="<?=($arResult['error'][$key]?" input_error":"");?>"><?=$arResult['data']['property'][$key];?></textarea>
                        <? } else { ?>
            <input placeholder="<?=$field['HINT'];?>" type="text" name="<?=$key;?>" value="<?=$arResult['data']['property'][$key];?>" class="<?=($arResult['error'][$key]?" input_error":"");?>">
                        <? } ?>
                <? break; ?>
            <? } ?>
        </div>
        <? } ?>
        <? if ($arParams['SOGLASIE']) { ?>
        <div class="fld_row">
            <input type="checkbox" name="SOGLASIE" value="Y"<? if($arResult['data']['SOGLASIE'] == 'Y') { ?> checked<? }?> id="ff<?=$arParams['IBLOCK_ID'];?>"><label class="fld_checkbox" for="ff<?=$arParams['IBLOCK_ID'];?>">
                Я ознакомился с соглашением сервиса и согласен с условиями пре­до­ста­вле­ния услуг
            </label>
            <? if ($arResult['error']['req_SOGLASIE']) { ?><span class="input_error_text"><?=$arResult['error']['req_SOGLASIE'];?></span><? } ?>
        </div>
        <? } ?>
        <div class="fld_row">
            <input type="submit" class="btn" value="Заказать">
        </div>
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
<script>
   /* jQuery(document).ready(function () {
        jQuery("input[name='PHONE']").mask("+7 (999) 999-99-99");
    })*/
</script>
