<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main\Page\Asset;
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Config\Option;

Loc::loadLanguageFile(__FILE__);

\Bitrix\Main\Loader::includeModule('profitkit.m1');

$full_width = $APPLICATION->GetProperty("full");
$left_menu = $APPLICATION->GetProperty("left_menu");
$sidebar = $APPLICATION->GetProperty("sidebar");
$no_h1 = $APPLICATION->GetProperty("no_h1");

if (CModule::IncludeModule("iblock")):
    if (isset($_COOKIE['city'])) {
        $initialCityId = $_COOKIE['city'];
    } else {
        $initialCityId = 224;
    }
    $res = CIBlockElement::GetByID($initialCityId);
    if($obEl = $res->GetNextElement())
    {
        $city = $obEl->GetFields();
        $city['PROPERTIES'] = $obEl->GetProperties();
    }
endif;




$moduleID = 'profitkit.m1';
$main_color = Option::get($moduleID, 'BASE_COLOR_CUSTOM', "337FD2", SITE_ID);
$dop_color = Option::get($moduleID, 'BASE_COLOR_CUSTOM2', "313D50", SITE_ID);
$menu_color = Option::get($moduleID, 'MENU_COLOR', "313D50", SITE_ID);
$font_color = Option::get($moduleID, 'FONT_COLOR', "141414", SITE_ID);
$header_type = Option::get($moduleID, 'HEADER_TYPE', "1", SITE_ID);
if (!$header_type)
    $header_type = 1;
$site_width = Option::get($moduleID, 'SITE_WIDTH', "2", SITE_ID);
if (!$site_width)
    $site_width = 2;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap&subset=cyrillic" rel="stylesheet">
    <?php
    CJSCore::Init(array('jquery2'));
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/vendor/css/slick.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/addStyles.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/custom.css");

//    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/vendor/js/jquery-3.4.1.min.js");

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/vendor/js/slick.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/vendor/js/jquery.malihu.PageScroll2id.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/script.js");
    ?>
<?$APPLICATION->ShowHead();?>
    <style>
        :root {
            --main_color: #<?=($main_color?$main_color:"ee93fd");?>;
            --dop_color: #<?=($dop_color?$dop_color:"313D50");?>;
            --menu_color: #<?=($menu_color?$menu_color:"313D50");?>;
            --font_color: #<?=($font_color?$font_color:"141414");?>;
        }
    </style>
<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<? $APPLICATION->ShowPanel()?>
<div class="page_wrap">
<header class="header <?= !$isIndex ? 'bg-black' : '' ?>">
    <div class="container">
        <div class="header__logo">
            <a href="/">
<!--                TODO make norm logo-->
                <img src="<?=SITE_TEMPLATE_PATH?>/img/logo-footer-mobile.svg" alt="logo">
            </a>
        </div>
        <div class="header-right">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => '/include/phone-mobile.php',
                )
            ); ?>
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => '/include/telegram.php',
                )
            ); ?>

            <!--  панель навигации  -->
            <div id="hamburger" class="hamburger-icon-container">
                <span class="hamburger-icon"></span>
            </div>

        </div>
        <!-- Navigation -->
        <? $APPLICATION->IncludeComponent("bitrix:menu", "webcam", array(
            "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
            "CHILD_MENU_TYPE" => "top",    // Тип меню для остальных уровней
            "DELAY" => "N",    // Откладывать выполнение шаблона меню
            "MAX_LEVEL" => "1",    // Уровень вложенности меню
            "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
            "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
            "MENU_CACHE_TYPE" => "Y",    // Тип кеширования
            "MENU_CACHE_USE_GROUPS" => "N",    // Учитывать права доступа
            "MENU_THEME" => "site",
            "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
            "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
            "COMPONENT_TEMPLATE" => "webcam",
            "ACTIVE_CITY" => $city,
        ),
                                          false
        ); ?>

    </div>
</header>
<?// \Profitkit\M1\Core::checkRestartBuffer(); ?>