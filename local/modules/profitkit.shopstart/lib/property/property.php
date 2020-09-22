<?
namespace Profitkit\Shopstart\Property;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main;
use Bitrix\Main\Entity;
use Profitkit\Shopstart\OwnerTable;
use Bitrix\Main\Application;

Loc::loadMessages(__FILE__);

class PropertyTable extends Main\Entity\DataManager
{

    const FIZ=1;
    const UR=2;

    /*вынести возможность установки в настройки*/
    private static $price_code = 'FILTER_PRICE';
    private static $priceold_code = 'PRICEOLD';
    private static $status_code = 'STATUS';
    private static $status_available = '56';
    public static $user_profile;
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'pk_market_order_property';
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
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_ID_FIELD'),
            ),
            'LID' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateLid'),
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_LID_FIELD'),
            ),
            'DATATIME_INSERT' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_DATATIME_INSERT_FIELD'),
            ),
            'DATATIME_UPDATE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_DATATIME_UPDATE_FIELD'),
            ),
            'CODE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateCode'),
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_CODE_FIELD'),
            ),
            'ACTIVE' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_ACTIVE_FIELD'),
            ),
            'REQUIRED' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_REQUIRED_FIELD'),
            ),
            'MULTIPLE' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_MULTIPLE_FIELD'),
            ),
            'PERSON_TYPE_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_PERSON_TYPE_ID_FIELD'),
            ),
            'SORT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_SORT_FIELD'),
            ),
            'GROUP_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_GROUP_ID_FIELD'),
            ),
            'TYPE' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateType'),
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_TYPE_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateName'),
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_NAME_FIELD'),
            ),
            'DEFAULT_VALUE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateDefaultValue'),
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_DEFAULT_VALUE_FIELD'),
            ),
            'DESCRIPTION' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_DESCRIPTION_FIELD'),
            ),
            'SETTING' => array(
                'data_type' => 'string',
                'serialized' => true,
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_SETTING_FIELD'),
            ),
            'XML_ID' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateXmlId'),
                'title' => Loc::getMessage('ORDER_PROPERTY_ENTITY_XML_ID_FIELD'),
            )
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
     * Returns validators for TYPE field.
     *
     * @return array
     */
    public static function validateType()
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
     * Returns validators for DEFAULT_VALUE field.
     *
     * @return array
     */
    public static function validateDefaultValue()
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

    public static function getOrderFields($person_type_id=1)
    {
        global $USER;
        if ($USER->GetID() > 0)
        {
            $filter = Array("ID" => $USER->GetID());
            $rsUsers = \CUser::GetList(($by = "ID"), ($order = "desc"), $filter);
            $arUser = $rsUsers->Fetch();
            self::$user_profile = $arUser;
        }
        $result = array();
        $city = false;
        $propertyDb = self::getList(array('filter'=>array(
            'ACTIVE' => 1,
            'LID' => SITE_ID,
            'PERSON_TYPE_ID'=> $person_type_id
        )));

        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();

        while($row = $propertyDb->fetch())
        {
            if ($arUser[$row['CODE']])
                $row['DEFAULT_VALUE'] = $arUser[$row['CODE']];
            if (isset($request['orderprop_'.$row['ID']]))
                $row['DEFAULT_VALUE'] = $request['orderprop_'.$row['ID']];
            if ($row['CODE'] == 'PERSONAL_CITY') {
                $row['IS_CITY'] = 'Y';
                $city = $row['DEFAULT_VALUE'];
            }

            $result[] = $row;
        }
        return array('items' => $result, 'city' => $city);
    }

    public static function getFieldName()
    {
        $result = array();
        foreach (self::getMap() as $key => $value)
        {
            $result[$value->getName()] = $value->getTitle();
        }
        return $result;
    }
}