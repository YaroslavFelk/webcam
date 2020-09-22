<?php
namespace Profitkit\Shopstart\Order;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class OrderTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> LID string(2) mandatory
 * <li> DATATIME_INSERT datetime mandatory
 * <li> DATATIME_UPDATE datetime mandatory
 * <li> DATATIME_CANSELED datetime optional
 * <li> ORDER_STATUS_ID int mandatory
 * <li> PAYED int mandatory
 * <li> DELIVER_ID int mandatory
 * <li> RESULT_PRICE double mandatory
 * <li> DEVILERY_PRICE double mandatory
 * <li> PAYED_PRICE double mandatory
 * <li> DISCOUNT_VALUE double mandatory
 * <li> TAX_VALUE double mandatory
 * <li> BLOCKED int mandatory
 * <li> REASON_BLOCED string optional
 * <li> DESCRIPTION string optional
 * <li> CANSELED int mandatory
 * <li> RESAN_CANSELED string optional
 * <li> CREATED_BY_ID int mandatory
 * <li> MODIFIED_BY_ID int mandatory
 * <li> OWNER_ID int mandatory
 * <li> COUPON_ID int mandatory
 * <li> SETTING string optional
 * <li> XML_ID string(255) optional
 * </ul>
 *
 * @package Bitrix\Market
 **/

class OrderTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'pk_market_order';
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
                'title' => Loc::getMessage('ORDER_ENTITY_ID_FIELD'),
            ),
            'LID' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateLid'),
                'title' => Loc::getMessage('ORDER_ENTITY_LID_FIELD'),
            ),
            'DATATIME_INSERT' => array(
                'data_type' => 'datetime',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_DATATIME_INSERT_FIELD'),
            ),
            'DATATIME_UPDATE' => array(
                'data_type' => 'datetime',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_DATATIME_UPDATE_FIELD'),
            ),
            'DATATIME_CANSELED' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('ORDER_ENTITY_DATATIME_CANSELED_FIELD'),
            ),
            'ORDER_STATUS_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_ORDER_STATUS_ID_FIELD'),
            ),
            'PAYED' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_PAYED_FIELD'),
            ),
            'DELIVER_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_DELIVER_ID_FIELD'),
            ),
            'RESULT_PRICE' => array(
                'data_type' => 'float',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_RESULT_PRICE_FIELD'),
            ),
            'DEVILERY_PRICE' => array(
                'data_type' => 'float',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_DEVILERY_PRICE_FIELD'),
            ),
            'PAYED_PRICE' => array(
                'data_type' => 'float',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_PAYED_PRICE_FIELD'),
            ),
            'DISCOUNT_VALUE' => array(
                'data_type' => 'float',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_DISCOUNT_VALUE_FIELD'),
            ),
            'TAX_VALUE' => array(
                'data_type' => 'float',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_TAX_VALUE_FIELD'),
            ),
            'BLOCKED' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_BLOCKED_FIELD'),
            ),
            'REASON_BLOCED' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('ORDER_ENTITY_REASON_BLOCED_FIELD'),
            ),
            'DESCRIPTION' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('ORDER_ENTITY_DESCRIPTION_FIELD'),
            ),
            'CANSELED' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_CANSELED_FIELD'),
            ),
            'RESAN_CANSELED' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('ORDER_ENTITY_RESAN_CANSELED_FIELD'),
            ),
            'CREATED_BY_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_CREATED_BY_ID_FIELD'),
            ),
            'MODIFIED_BY_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_MODIFIED_BY_ID_FIELD'),
            ),
            'OWNER_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_OWNER_ID_FIELD'),
            ),
            'COUPON_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_ENTITY_COUPON_ID_FIELD'),
            ),
            'SETTING' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('ORDER_ENTITY_SETTING_FIELD'),
            ),
            'XML_ID' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateXmlId'),
                'title' => Loc::getMessage('ORDER_ENTITY_XML_ID_FIELD'),
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
}