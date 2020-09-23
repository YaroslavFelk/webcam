<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if (!empty($arResult)): ?>
<nav class="header__nav">
    <ul>
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "cities",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "N",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "N",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("",""),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "30",
                "IBLOCK_TYPE" => "content_m1",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "20",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("",""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "ACTIVE_CITY" => $arParams['ACTIVE_CITY'],
            )
        );?>
    <?
    foreach ($arResult as $arItem): $i++; ?>
        <? if ($i == 3) { ?>
            <li class="header__nav_logo"><a href="/" class="link"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo-footer-mobile.svg" alt="logo"></a></li>
        <? } else { ?>
            <li><a href="<?= $arItem["LINK"] ?>" class="link js-link"><?= $arItem["TEXT"] ?></a></li>
        <? } ?>

    <? endforeach ?>
        <li class="header__nav_phone">
            <a href="tel: <?=$arParams['ACTIVE_CITY']['PROPERTIES']['PHONE']['VALUE'] ?>"
               class="link">
                <?=$arParams['ACTIVE_CITY']['PROPERTIES']['PHONE_BEAUTY']['VALUE'] ?>
            </a>
        </li>
    </ul>
</nav>
<? endif ?>
<!-- End Navigation -->


