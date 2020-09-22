<?php

namespace Profitkit\Shopstart\Payment\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminInterface;
use DigitalWand\AdminHelper\Widget\DateTimeWidget;
use DigitalWand\AdminHelper\Widget\FileWidget;
use DigitalWand\AdminHelper\Widget\NumberWidget;
use DigitalWand\AdminHelper\Widget\OrmElementWidget;
use DigitalWand\AdminHelper\Widget\StringWidget;
use DigitalWand\AdminHelper\Widget\UrlWidget;
use DigitalWand\AdminHelper\Widget\UserWidget;
use DigitalWand\AdminHelper\Widget\VisualEditorWidget;
use DigitalWand\AdminHelper\Widget\CheckboxWidget;

Loc::loadMessages(__FILE__);

/**
 * Описание интерфейса (табок и полей) админки новостей.
 *
 * {@inheritdoc}
 */
class PaymentAdminInterface extends AdminInterface
{
    /**
     * @inheritdoc
     */
    public function dependencies()
    {
       // return array('\Demo\AdminHelper\News\AdminInterface\CategoriesAdminInterface');
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return array(
            'MAIN' => array(
                'NAME' => 'Элемент',
                'FIELDS' => array(
                    'ID' => array(
                        'WIDGET' => new NumberWidget(),
                        'READONLY' => true,
                        'FILTER' => true,
                        'HIDE_WHEN_CREATE' => true,
                        'TITLE' => 'ID' //Определить заголовки полей можно тут, а не тольйо к getMap()
                    ),
                    'DATATIME_UPDATE' => array(
                        'WIDGET' => new DateTimeWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true,
                        'HEADER'=>false
                    ),
                    'LID' => array(
                        'WIDGET' => new StringWidget(),
                        'SIZE' => 80,
                        'FILTER' => '%',
                        'REQUIRED' => true,
                        'TITLE' => 'LID'
                    ),
                    'NAME' => array(
                        'WIDGET' => new StringWidget(),
                        'SIZE' => 80,
                        'FILTER' => '%',
                        'REQUIRED' => true,
                        'TITLE' => 'Название'
                    ),
                    'DESCRIPTION' => array(
                        'WIDGET' => new VisualEditorWidget(),
                        'HEADER' => false
                    ),
                    'IMAGE_ID' => array(
                        'WIDGET' => new FileWidget(),
                        'IMAGE' => false,
                        'HEADER' => false
                    ),
                    // Связь "один ко многим"
                    /*'CATEGORY_ID' => array(
                        'WIDGET' => new OrmElementWidget(),
                        'FILTER' => true,
                        'HEADER' => false,
                        'HELPER' => '\Demo\AdminHelper\News\AdminInterface\CategoriesListHelper',
                        'REQUIRED' => true
                    ),
                    // Связь "один ко многим"
                    'ANY_REF_DATA' => array(
                        'WIDGET' => new OrmElementWidget(),
                        'HELPER' => '\Demo\AdminHelper\News\AdminInterface\CategoriesListHelper',
                        'TITLE_FIELD_NAME' => 'TITLE',
                        'MULTIPLE' => true,
                        'MULTIPLE_FIELDS' => array(
                            'ID',
                            'ENTITY_ID' => 'NEWS_ID',
                            'VALUE' => 'TITLE'
                        ),
                    ),
                    'TEXT' => array(
                        'WIDGET' => new VisualEditorWidget(),
                        'HEADER' => false
                    ),
                    'SOURCE' => array(
                        'WIDGET' => new UrlWidget(),
                        'HEADER' => false,
                        'SIZE' => 80
                    ),
                    'IMAGE' => array(
                        'WIDGET' => new FileWidget(),
                        'IMAGE' => true,
                        'HEADER' => false
                    ),
                    'DATE_CREATE' => array(
                        'WIDGET' => new DateTimeWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true
                    ),
                    'CREATED_BY' => array(
                        'WIDGET' => new UserWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true
                    ),
                    'MODIFIED_BY' => array(
                        'WIDGET' => new UserWidget(),
                        'READONLY' => true,
                        'HIDE_WHEN_CREATE' => true
                    )*/
                )
            )
        );
    }

    /**
     * @inheritdoc
     */
    public function helpers()
    {
        return array(
            '\Profitkit\Shopstart\Payment\AdminInterface\PaymentListHelper' => array(
                'BUTTONS' => array(
                    'LIST_CREATE_NEW' => array(
                        'TEXT' => 'Добавить',
                    ),
                    'LIST_CREATE_NEW_SECTION' => array(
                        'TEXT' => 'Добавить раздел',
                    )
                )
            ),
            '\Profitkit\Shopstart\Payment\AdminInterface\PaymentEditHelper' => array(
                'BUTTONS' => array(
                    'ADD_ELEMENT' => array(
                        'TEXT' => 'Добавить'
                    ),
                    'DELETE_ELEMENT' => array(
                        'TEXT' => 'Удалить'
                    )
                )
            )
        );
    }
}