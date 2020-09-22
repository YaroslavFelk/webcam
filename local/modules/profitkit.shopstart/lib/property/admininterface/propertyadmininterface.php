<?php

namespace Profitkit\Shopstart\Property\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminInterface;
use DigitalWand\AdminHelper\Widget\DateTimeWidget;
use DigitalWand\AdminHelper\Widget\FileWidget;
use DigitalWand\AdminHelper\Widget\NumberWidget;
use DigitalWand\AdminHelper\Widget\OrmElementWidget;
use DigitalWand\AdminHelper\Widget\StringWidget;
use DigitalWand\AdminHelper\Widget\ComboBoxWidget;
use DigitalWand\AdminHelper\Widget\UserWidget;
use DigitalWand\AdminHelper\Widget\VisualEditorWidget;
use DigitalWand\AdminHelper\Widget\CheckboxWidget;

Loc::loadMessages(__FILE__);

/**
 * Описание интерфейса (табок и полей) админки новостей.
 *
 * {@inheritdoc}
 */
class PropertyAdminInterface extends AdminInterface
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
                    'CODE' => array(
                        'WIDGET' => new StringWidget(),
                        'SIZE' => 80,
                        'FILTER' => '%',
                        'REQUIRED' => true,
                        'TITLE' => 'Символьный код'
                    ),
                    'SORT' => array(
                        'WIDGET' => new StringWidget(),
                        'SIZE' => 20,
                        'TITLE' => 'Сортировка'
                    ),
                    'ACTIVE' => array(
                        'WIDGET' => new ComboBoxWidget(),
                        'SIZE' => 80,
                        'FILTER' => '%',
                        'REQUIRED' => true,
                        'VARIANTS' => array(0=>'Нет', 1=>'Да'),
                        'TITLE' => 'Активность'
                    ),
                    'REQUIRED' => array(
                        'WIDGET' => new CheckboxWidget(),
                        'SIZE' => 20,
                        'TITLE' => 'Обязательно'
                    ),
                    'PERSON_TYPE_ID' => array(
                        'WIDGET' => new ComboBoxWidget(),
                        'SIZE' => 80,
                        'FILTER' => '%',
                        'REQUIRED' => true,
                        'VARIANTS' => array(1=>'Физическое лицо', 2=>'Юридическое лицо'),
                        'TITLE' => 'Тип плательщика'
                    ),
                    'GROUP_ID' => array(
                        'WIDGET' => new ComboBoxWidget(),
                        'SIZE' => 80,
                        'FILTER' => '%',
                        'REQUIRED' => true,
                        'VARIANTS' => array(1=>'Личные данные', 2=>'Данные о доставке'),
                        'TITLE' => 'Тип данных'
                    ),
                    'TYPE' => array(
                        'WIDGET' => new ComboBoxWidget(),
                        'SIZE' => 80,
                        'FILTER' => '%',
                        'REQUIRED' => true,
                        'VARIANTS' => array('string'=>'Строка'),
                        'TITLE' => 'Тип поля'
                    ),
                    'DEFAULT_VALUE' => array(
                        'WIDGET' => new StringWidget(),
                        'SIZE' => 80,
                        'TITLE' => 'Значение по умолчанию'
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
            '\Profitkit\Shopstart\Property\AdminInterface\PropertyListHelper' => array(
                'BUTTONS' => array(
                    'LIST_CREATE_NEW' => array(
                        'TEXT' => 'Добавить',
                    ),
                    'LIST_CREATE_NEW_SECTION' => array(
                        'TEXT' => 'Добавить раздел',
                    )
                )
            ),
            '\Profitkit\Shopstart\Property\AdminInterface\PropertyEditHelper' => array(
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