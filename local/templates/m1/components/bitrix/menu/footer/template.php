<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h2 class="footer__block-heading">
    <?=$arParams['NAME']?>
</h2>
<ul class="footer__menu-list">
    <? foreach ($arResult as $arItem):?>
    <li class="footer__menu-item footer__menu-item--hidden-on-mobile">
        <a class="footer__menu-link link" href="<?= $arItem["LINK"] ?>">
        <?=$arItem["TEXT"] ?>
        </a>
    </li>
    <?endforeach;?>
</ul>