<?php
namespace Profitkit\Shopstart;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;
use Bitrix\Main\Web\Cookie;
use Bitrix\Main\Application;

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

class OwnerTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'pk_market_owner';
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
                'title' => Loc::getMessage('OWNER_ENTITY_ID_FIELD'),
            ),
            'DATATIME_INSERT' => array(
                'data_type' => 'datetime',
                'required' => true,
                'title' => Loc::getMessage('OWNER_ENTITY_DATATIME_INSERT_FIELD'),
            ),
            'DATATIME_UPDATE' => array(
                'data_type' => 'datetime',
                'required' => true,
                'title' => Loc::getMessage('OWNER_ENTITY_DATATIME_UPDATE_FIELD'),
            ),
            'USER_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('OWNER_ENTITY_USER_ID_FIELD'),
            ),
            'CODE' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateCode'),
                'title' => Loc::getMessage('OWNER_ENTITY_CODE_FIELD'),
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

    public static function getOwnerId()
    {
        global $USER;
        $filter = false;
        if ($USER->GetID() > 0) {
            $filter['USER_ID'] = $USER->GetID();
        } elseif ((int)$_SESSION['pk_sale_user_id'] > 0) {
            $filter['ID'] = (int)$_SESSION['pk_sale_user_id'];
        }
        elseif (Application::getInstance()->getContext()->getRequest()->getCookie("pk_sale_user_code")) {
            $filter['CODE'] = Application::getInstance()->getContext()->getRequest()->getCookie("pk_sale_user_code");
        }
        if ($filter) {
            $dbWords = self::getList(array(
                'filter' => $filter
            ));
            $owner = $dbWords->fetch();
            if ($owner['ID'] > 0) {
                $_SESSION['pk_sale_user_id'] = $owner['ID'];
                $_SESSION['pk_sale_user_code'] = $owner['CODE'];
                return $owner['ID'];
            }
        }
        $id = self::createOwner();
        return $id;
    }
    public static function createOwner()
    {
        global $USER;

        $code = md5(time().rand(1,1000));
        $insert = array(
        'DATATIME_INSERT' => new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s'),
        'DATATIME_UPDATE' => new \Bitrix\Main\Type\Datetime(date("d.m.Y H:i:s"), 'd.m.Y H:i:s'),
        'CODE' => $code
        );

        if ($USER->GetID() > 0)
            $insert['USER_ID'] = $USER->GetID();

        $result = self::add($insert);
        $id = $result->getId();
        $_SESSION['pk_sale_user_id'] = $id;
        $_SESSION['pk_sale_user_code'] = $code;

        $cookie = new Cookie("pk_sale_user_code", $code);
        $cookie->setDomain($_SERVER['HTTP_HOST']);
        Application::getInstance()->getContext()->getResponse()->addCookie($cookie);
// Cookie будет доступна только на следующем хите!
        //echo Application::getInstance()->getContext()->getRequest()->getCookie("TEST");


        return $id;
    }

}