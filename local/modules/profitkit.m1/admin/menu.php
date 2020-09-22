<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
AddEventHandler('main', 'OnBuildGlobalMenu', 'OnBuildGlobalMenuHandlerMax');
function OnBuildGlobalMenuHandlerMax(&$arGlobalMenu, &$arModuleMenu)
{
    $arMenu =
        array(
            'sort' => 10,
            'icon' => 'fileman_sticker_icon',
            'page_icon' => 'fileman_sticker_icon',
            'text' => 'Профиткит M1',
            'menu_id' => 'global_menu_profitkit_m1',
            'items_id' => 'global_menu_profitkit_m1_items',
            /* 'url' => ResultListHelper::getUrl(),
             'more_url' => array(
                 ResultEditHelper::getUrl()
             ),*/
            "items" => array(
                array(
                    'sort' => 100,
                    'text' => 'Настройки',
                    'url' => '/bitrix/admin/profitkit.m1_options.php'
                ),
            ),
    );
    if(!isset($arGlobalMenu['global_menu_profitkit'])){
        $arGlobalMenu['global_menu_profitkit'] = array(
            'menu_id' => 'global_menu_profitkit',
            'text' => 'Профиткит',
            'title' => 'Профиткит',
            'sort' => 1000,
            'items_id' => 'global_menu_profitkit_m1_items',
        );
    }
    $arGlobalMenu['global_menu_profitkit']['items']['profitkit.m1'] = $arMenu;
}