<?php
namespace Profitkit\Shopstart\Payment;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
Loc::loadMessages(__FILE__);

/**
 * Class DeliverySystemTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> LID int mandatory
 * <li> DATATIME_INSERT datetime mandatory
 * <li> DATATIME_UPDATE datetime mandatory
 * <li> CODE string(255) mandatory
 * <li> NAME string(255) mandatory
 * <li> PROPERTY string optional
 * <li> DESCRIPTION string optional
 * <li> XML_ID string(255) optional
 * <li> IMAGE_ID int optional
 * </ul>
 *
 * @package Bitrix\Market
 **/

class PaymentTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'pk_market_payment_system';
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
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_ID_FIELD'),
            ),
            'LID' => array(
                'data_type' => 'string',
                'required' => true,
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_LID_FIELD'),
            ),
            'DATATIME_INSERT' => array(
                'data_type' => 'datetime',
                /*'required' => true,*/
                'defaul_value' => new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s'),
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_DATATIME_INSERT_FIELD'),
            ),
            'DATATIME_UPDATE' => array(
                'data_type' => 'datetime',
                /*'required' => true,*/
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_DATATIME_UPDATE_FIELD'),
            ),
            'CODE' => array(
                'data_type' => 'string',
                /*'required' => true,*/
                'validation' => array(__CLASS__, 'validateCode'),
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_CODE_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateName'),
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_NAME_FIELD'),
            ),
            'DESCRIPTION' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_DESCRIPTION_FIELD'),
            ),
            'XML_ID' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateXmlId'),
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_XML_ID_FIELD'),
            ),
            'SETTING' => array(
                'data_type' => 'string',
                'serialized' => true,
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_SETTING_FIELD'),
            ),
            'IMAGE_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('PAYMENT_SYSTEM_ENTITY_IMAGE_ID_FIELD'),
            ),
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

    public static function getPayment()
    {
        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();

        $result = array();
        $selected = false;
        $paymentDb = self::getList();
        while($row = $paymentDb->fetch()) {

            if (isset($request['order_payment_id']) and $request['order_payment_id'] == $row['ID'])
                $selected = $row['ID'];
            if ($row['IMAGE_ID']) {
                $row['IMAGE_SRC'] = \CFile::GetPath($row['IMAGE_ID']);
            }
            $result[$row['ID']] = $row;
        }
        if (!$selected)
            $selected = current($result)['ID'];
        return array('items'=>$result, 'selected' => $selected);
    }
}