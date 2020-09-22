<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult)): ?>
    <?
    foreach ($arResult as $arItem): $i++; ?>
        <? if ($i == 1) { ?>
            <div class="footer_menu_header"><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></div>
            <ul class="footer_menu">
        <? } else { ?>
            <li class="footer_menu_item"><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
        <? } ?>

    <? endforeach ?>
    </ul>
<? endif ?>