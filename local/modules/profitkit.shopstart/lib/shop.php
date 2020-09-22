<?php
namespace Profitkit\Shopstart;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/**
 * Class OwnerTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> DATATIME_INSERT datetime mandatory
 * <li> DATATIME_UPDATE datetime mandatory
 * <li> USER_ID int optional
 * <li> CODE string(255) mandatory
 * </ul>
 *
 * @package Bitrix\Market
 **/

class Shop
{
    const STATUS_NEW = 1;
    public static $price_field = 'FILTER_PRICE';
    public static $priceold_field = 'PRICEOLD';
    public static $status_code = 'STATUS';
    public static $status_available = array('56');

    public static function getPriceFormated($price)
    {
        return number_format($price, 0, ',', '&nbsp;').'&nbsp;₽';
    }

    public static function getPersonTypes()
    {
        return array(1=>'Физическое лицо', 2=>'Юридическое лицо');
    }

    public static function getActualFields($items, $delivery_id=false)
    {
        $result = array();
        $delivery_fields = false;
        foreach ($items as $item)
        {
            if (is_array($item['SETTING']['delivery']) and $delivery_id) {
                if (!in_array($delivery_id, $item['SETTING']['delivery']))
                    continue;
            }
            if ($item['GROUP_ID'] == 2 and $item['IS_CITY'] != 'Y')
                $delivery_fields = 'Y';
            $result[] = $item;
        }
        return array('items'=>$result, 'delivery_fields'=>$delivery_fields);
    }

    public static function getProductPrice($product)
    {
        $product_price =  (int)$product['PROPERTIES'][self::$price_field]['VALUE'];
        $product_priceold =  (int)$product['PROPERTIES'][self::$priceold_field]['VALUE'];
        if ($product_priceold < $product_price)
            $product_priceold = $product_price;
        $product_discount = $product_priceold - $product_price;
        if ($product_discount > 0)
            $product_percent = round($product_discount/$product_priceold*100);
        else
            $product_percent = 0;

        $price = array (
            'UNROUND_BASE_PRICE' =>  $product_priceold,
            'UNROUND_PRICE' =>  $product_price,
            'BASE_PRICE' =>  $product_priceold,
            'PRICE' =>  $product_price,
            /*'ID' =>  '285',
            'PRICE_TYPE_ID' =>  '1',*/
            'CURRENCY' =>  'RUB',
            'DISCOUNT' =>  $product_discount,
            'PERCENT' =>  $product_percent,
            'QUANTITY_FROM' => '',
            'QUANTITY_TO' => '',
            'QUANTITY_HASH' =>  'ZERO-INF',
            'MEASURE_RATIO_ID' => null,
            'PRINT_BASE_PRICE' =>  self::getPriceFormated($product_priceold), //'11 200 руб.',
            'RATIO_BASE_PRICE' =>  $product_priceold,
            'PRINT_RATIO_BASE_PRICE' =>  self::getPriceFormated($product_priceold),
            'PRINT_PRICE' =>  self::getPriceFormated($product_price),
            'RATIO_PRICE' =>  $product_price,
            'PRINT_RATIO_PRICE' =>  self::getPriceFormated($product_price),
            'PRINT_DISCOUNT' =>  self::getPriceFormated($product_discount),
            'RATIO_DISCOUNT' =>  $product_discount,
            'PRINT_RATIO_DISCOUNT' =>  self::getPriceFormated($product_discount),
            'MIN_QUANTITY' => 1);
        return $price;
    }

    public static function getProductAvailable($product)
    {
        if (in_array($product['PROPERTIES'][self::$status_code]['VALUE_ENUM_ID'], self::$status_available)) {
            $status = 'Y';
            $icon = '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.994 1.53938L13.7225 0.262794C13.5481 0.08762 13.3361 0 13.0869 0C12.8374 0 12.6253 0.08762 12.451 0.262794L6.31744 6.42996L3.56859 3.66081C3.39404 3.48557 3.18213 3.39805 2.93288 3.39805C2.68347 3.39805 2.47156 3.48557 2.29701 3.66081L1.02546 4.93743C0.850913 5.11264 0.763672 5.32546 0.763672 5.57582C0.763672 5.82599 0.850913 6.03901 1.02546 6.21418L4.41002 9.6121L5.68167 10.8887C5.85612 11.064 6.0681 11.1515 6.31744 11.1515C6.56669 11.1515 6.77867 11.0638 6.95321 10.8887L8.22483 9.6121L14.994 2.81607C15.1684 2.64083 15.2558 2.42805 15.2558 2.17768C15.256 1.92744 15.1684 1.71462 14.994 1.53938Z" />
</svg>';
        }
        else
            $status = 'N';
        $result = '<span class="product-item-quantity">'.$icon.' '.$product['PROPERTIES'][self::$status_code]['VALUE'].'</span>';
        return array('html'=>$result, 'status'=>$status);
    }

}