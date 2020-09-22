<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult)): ?>
<nav class="header__nav">
    <ul>
        <li class="header__nav_address">
            <a class="link" href="#">Москва</a>
            <div class="header__nav_address-list">
                <a href="#">Санкт-Петербург</a>
                <a href="#">Белгород</a>
            </div>
        </li>
    <?
    foreach ($arResult as $arItem): $i++; ?>
        <? if ($i == 4) { ?>
            <li class="header__nav_logo"><a href="/" class="link"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo-footer-mobile.svg" alt="logo"></a></li>
        <? } else { ?>
            <li><a href="<?= $arItem["LINK"] ?>" class="link"><?= $arItem["TEXT"] ?></a></li>
        <? } ?>

    <? endforeach ?>
        <li class="header__nav_phone">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => '/include/phone-header.php',
                )
            ); ?>
        </li>
    </ul>
</nav>
<? endif ?>
<!-- End Navigation -->


