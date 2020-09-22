<?php
namespace Profitkit\Shopstart;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class PropertyValueTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> ORDER_ID int mandatory
 * <li> PROPERTY_ID int mandatory
 * <li> NAME string(255) mandatory
 * <li> XML_ID string(255) optional
 * <li> CODE string(255) optional
 * <li> VALUE string optional
 * </ul>
 *
 * @package Bitrix\Market
 **/

class OrderPropertyTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'pk_market_property_value';
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
                'title' => Loc::getMessage('PROPERTY_VALUE_ENTITY_ID_FIELD'),
            ),
            'ORDER_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('PROPERTY_VALUE_ENTITY_ORDER_ID_FIELD'),
            ),
            'PROPERTY_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('PROPERTY_VALUE_ENTITY_PROPERTY_ID_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateName'),
                'title' => Loc::getMessage('PROPERTY_VALUE_ENTITY_NAME_FIELD'),
            ),
            'XML_ID' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateXmlId'),
                'title' => Loc::getMessage('PROPERTY_VALUE_ENTITY_XML_ID_FIELD'),
            ),
            'CODE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateCode'),
                'title' => Loc::getMessage('PROPERTY_VALUE_ENTITY_CODE_FIELD'),
            ),
            'VALUE' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('PROPERTY_VALUE_ENTITY_VALUE_FIELD'),
            ),
        );
    }
    /**
     * Returns validators for NAME field.
     *
     * @return array
     */
    public static function validateName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
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
    /**
     * Returns validators for CODE field.
     *
     * @return array
     */
    public static function validateCode()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
}