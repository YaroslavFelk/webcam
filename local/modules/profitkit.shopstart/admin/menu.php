<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Profitkit\Shopstart\Basket\AdminInterface\BasketEditHelper;
use Profitkit\Shopstart\Basket\AdminInterface\BasketListHelper;
use Profitkit\Shopstart\Delivery\AdminInterface\DeliveryEditHelper;
use Profitkit\Shopstart\Delivery\AdminInterface\DeliveryListHelper;
use Profitkit\Shopstart\Payment\AdminInterface\PaymentEditHelper;
use Profitkit\Shopstart\Payment\AdminInterface\PaymentListHelper;
use Profitkit\Shopstart\Property\AdminInterface\PropertyEditHelper;
use Profitkit\Shopstart\Property\AdminInterface\PropertyListHelper;
//use Demo\AdminHelper\News\AdminInterface\CategoriesEditHelper;

if (!Loader::includeModule('digitalwand.admin_helper') || !Loader::includeModule('profitkit.shopstart')) return;

Loc::loadMessages(__FILE__);

return array(
    array(
        'parent_menu' => 'global_menu_profitkit',
        'sort' => 10,
        'icon' => 'fileman_sticker_icon',
        'page_icon' => 'fileman_sticker_icon',
        'text' => 'Интернет-магазин',
       /* 'url' => ResultListHelper::getUrl(),
        'more_url' => array(
            ResultEditHelper::getUrl()
        ),*/
		"items" => array(
			array(
				'sort' => 100,
				'text' => 'Корзина',
				'url' => BasketListHelper::getUrl(),
			),
            array(
                'sort' => 100,
                'text' => 'Службы доставки',
                'url' => DeliveryListHelper::getUrl(),
                'more_url' => array(
                    DeliveryEditHelper::getUrl()
                )
            ),
            array(
                'sort' => 100,
                'text' => 'Платежные системы',
                'url' => PaymentListHelper::getUrl(),
                'more_url' => array(
                    PaymentEditHelper::getUrl()
                )
            ),
            array(
                'sort' => 100,
                'text' => 'Свойства заказа',
                'url' => PropertyListHelper::getUrl(),
                'more_url' => array(
                    PropertyEditHelper::getUrl()
                )
            ),
		),
    )
);