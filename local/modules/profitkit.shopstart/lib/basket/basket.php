<?
namespace Profitkit\Shopstart\Basket;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main;
use Profitkit\Shopstart\OwnerTable;
use Profitkit\Shopstart\Shop;

Loc::loadMessages(__FILE__);

class BasketTable extends Main\Entity\DataManager
{

    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'pk_market_basket';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('BASKET_ENTITY_ID_FIELD'),
            ),
            'LID' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateLid'),
                'title' => Loc::getMessage('BASKET_ENTITY_LID_FIELD'),
            ),
            'DATATIME_INSERT' => array(
                'data_type' => 'datetime',
                'required' => true,
                'title' => Loc::getMessage('BASKET_ENTITY_DATATIME_INSERT_FIELD'),
            ),
            'DATATIME_UPDATE' => array(
                'data_type' => 'datetime',
                'required' => true,
                'title' => Loc::getMessage('BASKET_ENTITY_DATATIME_UPDATE_FIELD'),
            ),
            'ORDER_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('BASKET_ENTITY_ORDER_ID_FIELD'),
            ),
            'PRODUCT_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('BASKET_ENTITY_PRODUCT_ID_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'string',

                'title' => Loc::getMessage('BASKET_ENTITY_NAME_FIELD'),
            ),
            'PRICE' => array(
                'data_type' => 'float',

                'title' => Loc::getMessage('BASKET_ENTITY_PRICE_FIELD'),
            ),
            'PRICEOLD' => array(
                'data_type' => 'float',

                'title' => Loc::getMessage('BASKET_ENTITY_PRICEOLD_FIELD'),
            ),
            'OWNER_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('BASKET_ENTITY_OWNER_ID_FIELD'),
            ),
            'QUANTITY' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('BASKET_ENTITY_QUANTITY_FIELD'),
            ),
            'XML_ID' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateXmlId'),
                'title' => Loc::getMessage('BASKET_ENTITY_XML_ID_FIELD'),
            ),
            'PROPERTY' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('BASKET_ENTITY_PROPERTY_FIELD'),
                'serialized' => true
            ),
            'DELAY' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('BASKET_ENTITY_DELAY_FIELD'),
            ),
            'DETAIL_PAGE_URL' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('BASKET_ENTITY_DETAIL_PAGE_URL_FIELD'),
            ),
            'PICTURE' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('BASKET_ENTITY_PICTURE_FIELD'),
            ),
        );
    }
    /**
     * Returns validators for LID field.
     *
     * @return array
     */
    public static function validateLid()
    {
        return array(
            new Main\Entity\Validator\Length(null, 2),
        );
    }
    /**
     * Returns validators for XML_ID field.
     *
     * @return array
     */
    public static function validateXmlId()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }

    public static function getByProduct($id, $owner_id)
    {
        $dbBasket = self::getList(array(
            'filter'=> array('PRODUCT_ID'=>$id, 'OWNER_ID'=>$owner_id)
        ));
        $basket = $dbBasket->fetch();
        return $basket;
    }

    public static function getProductInfo($id, $prop)
    {
        $prop_select = $prop;
        $prop_select[] = Shop::$price_field;
        $prop_select[] = Shop::$priceold_field;
        $prop_select[] = Shop::$status_code;
        \Bitrix\Main\Loader::IncludeModule("iblock");
        $arFilter = array('ID' => $id);
        /*добавить проверку на наличие*/
        $arSelect = array("NAME", "IBLOCK_ID", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "DETAIL_PICTURE");
        foreach ($prop_select as $item) {
            $arSelect[] = "PROPERTY_".$item;
        }
        $res = \CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, Array("nPageSize"=>1), $arSelect);
        $product = $res->GetNext();
        $product['PRICE'] = (int)$product['PROPERTY_'.Shop::$price_field.'_VALUE'];
        $product['PRICEOLD'] = (int)$product['PROPERTY_'.Shop::$priceold_field.'_VALUE'];
        if ($product['PREVIEW_PICTURE'])
            $product['PICTURE'] = $product['PREVIEW_PICTURE'];
        elseif ($product['DETAIL_PICTURE'])
            $product['PICTURE'] = $product['DETAIL_PICTURE'];
        if (is_array($prop)) {
            $properties = \CIBlockProperty::GetList(Array("sort"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$product['IBLOCK_ID']));
            $props = array();
            while ($prop_fields = $properties->GetNext())
            {
                $props[$prop_fields["CODE"]] = $prop_fields;
            }
            $property = array();
            foreach ($prop as $item) {
                if ($props[$item])
                $property[$item] = array('name'=>$props[$item]['NAME'], 'value'=>$product['PROPERTY_'.$item.'_VALUE']);
            }
            $product['PROPERTY'] = $property;
        }

        return $product;
    }

    public static function addToBasket($id, $num, $prop=array(), $delay=0)
    {
        $product = self::getProductInfo($id, $prop);
        if (!$product)
            return array('error'=>true, 'text'=>'Елемент для добавления на найден.');
        $owner_id = OwnerTable::getOwnerId();
        $basket = BasketTable::getByProduct($id, $owner_id);
        if ($basket) {
            $update['QUANTITY'] = $basket['QUANTITY'] + $num;
            $update['DATATIME_UPDATE'] = new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s');
            $result = self::update($basket['ID'], $update);
            if ($result->isSuccess()) {
                $basket_item_id = $basket['ID'];
            }
        }
        else {
            $insert = array(
                'DATATIME_INSERT' => new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s'),
                'DATATIME_UPDATE' => new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s'),
                'OWNER_ID' => $owner_id,
                'PRODUCT_ID' => $id,
                'QUANTITY' => $num,
                'NAME' => $product['NAME'],
                'DETAIL_PAGE_URL'=>$product['DETAIL_PAGE_URL'],
                'PROPERTY'=>$product['PROPERTY'],
                'PRICE' => $product['PRICE'],
                'PRICEOLD' => $product['PRICEOLD'],
                'PICTURE' => $product['PICTURE'],
                'LID' => SITE_ID,
                'DELAY' => $delay
            );
            $result = self::add($insert);
            if ($result->isSuccess()) {
                $basket_item_id = $result->getId();
            }
        }
        if (!$result->isSuccess()) {
            var_dump($result->getErrors());
        }
        else
            return $basket_item_id;
    }

    public static function getBasket($filter)
    {
        $arResult = array();
        $filter['LID'] = SITE_ID;
        $filter['ORDER_ID'] = false;
        $basketDb = self::getList(array('filter'=>$filter));
        while ($row = $basketDb->fetch()) {
            $row['PRICE_formated'] = Shop::getPriceFormated($row['PRICE']);
            if ((int)$row['PRICEOLD'] > 0) {
                $row['PRICEOLD_formated'] = Shop::getPriceFormated($row['PRICEOLD']);
                $row['DISCOUNT'] = $row['PRICEOLD'] - $row['PRICE'];
                $row['DISCOUNT_formated'] = Shop::getPriceFormated($row['DISCOUNT']);
                $row['DISCOUNT_SUM'] = $row['DISCOUNT'] * $row['QUANTITY'];
                $row['DISCOUNT_SUM_formated'] = Shop::getPriceFormated($row['DISCOUNT_SUM']);
                $arResult['DISCOUNT_ALL'] += $row['DISCOUNT_SUM'];
                $row['SUMOLD'] = $row['PRICEOLD']*$row['QUANTITY'];
                $row['SUMOLD_formated'] = Shop::getPriceFormated($row['SUMOLD']);
            }
            $row['SUM'] = $row['PRICE']*$row['QUANTITY'];
            $row['SUM_formated'] = Shop::getPriceFormated($row['SUM']);

            $row['PRICE_formated'] = Shop::getPriceFormated($row['PRICE']);

            $arResult['SUM_ITEMS'] += $row['SUM'];
            $arResult['QUANTITY']++;
            $arResult['ITEMS'][] = $row;
        }
        return $arResult;
    }
}