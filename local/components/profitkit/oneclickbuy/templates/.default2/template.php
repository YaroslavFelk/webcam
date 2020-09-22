<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/jquery.mask.min.js");
$this->addExternalJS('/bitrix/js/twim.recaptchafree/script.js');
$this->addExternalJS('https://www.google.com/recaptcha/api.js?onload=onloadRecaptchafree&render=explicit&hl='. LANGUAGE_ID);
?>
<div class="preload-ajax">
    
    <div class="callback-header">
    <h3 class="callback-head">Купить в 1 клик</h3>
    <p><?=$arResult['PRODUCT_NAME'];?></p>
    <? if($arResult['result']) { ?>
        Ваш заказ №<?=$arResult['result'];?> оформлен.
        <!--<meta http-equiv="refresh" content="0;URL=/personal/order/new/?ORDER_ID=<?/*=$arResult['result'];*/?>">-->
    <? } ?>
    <? if (count($arResult['error']) > 0) { ?>
        <div class="error-block">
						
<p><font class="errortext">
            <?=implode("<br>", $arResult['error']);?>
        </font></p></div>
    <? } ?>
    </div>
    <? if(!$arResult['result']) { ?>
    <div class="callback-content">
    <form action="" method="post" enctype="multipart/form-data" class="simpleform simpleform-reload">


        <div class="input-box <?=($arResult['error']['NAME']?" error-input":"");?>">
        <div class="input-box__head">Имя</div>
        <input placeholder="Имя" type="text" name="NAME" value="<?=$arResult['data']['NAME'];?>" class="inputtext<?=($arResult['error']['NAME']?" error-input":"");?>"></div>
        <div class="input-box<?=($arResult['error']['EMAIL']?" error-input":"");?>">
        <div class="input-box__head">Email</div>
        <input placeholder="Email" type="email" name="EMAIL" value="<?=$arResult['data']['EMAIL'];?>" class="inputtext<?=($arResult['error']['EMAIL']?" error-input":"");?>"></div>
        <div class="input-box <?=($arResult['error']['PHONE']?" error-input":"");?>">
        <div class="input-box__head">Телефон</div>
        <input placeholder="+7 (___) ___-__-__" type="text" name="PHONE" value="<?=$arResult['data']['PHONE'];?>" class="inputtext<?=($arResult['error']['PHONE']?" error-input":"");?>"></div>
        <div class="checkbox-container">
		 													          <input type="checkbox" id="SOGLASIE9" name="SOGLASIE" value="Y">	 													          <label class="checkbox-container__label" for="SOGLASIE9">Я ознакомлен и согласен с <a href="/polzovatelskoe-soglashenie/">пользовательским соглашением</a> </label>
		 													          </div>
        <? if (false) { ?>
        <? $code=$APPLICATION->CaptchaGetCode(); ?>
        <input type="hidden" name="captcha_sid" value="<?=$code;?>">
        <img style="display: none;" src="/bitrix/tools/captcha.php?captcha_sid=<?=$code;?>" width="140" height="30" alt="CAPTCHA">
        <input type="hidden" name="captcha_word" size="30" maxlength="50" value="12345" >
        <div class="g-recaptcha" data-sitekey="6LfHn8AUAAAAAD00ltG9UxGhKE4ubQ5NwMMmFvap"></div>
        <? } ?>
        <input type="submit" class="submit callback__submit" value="Отправить" >
        <input type="hidden" name="component" value="oneclickbuy">
        <div class="errorForm"></div>
    </form>
    </div>
    <? } ?>
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
    <script type="text/javascript">
       // Recaptchafree.reset();
    </script>
</div>