<?php

namespace Profitkit\Shopstart\Basket\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminEditHelper;

Loc::loadMessages(__FILE__);

/**
 * Хелпер описывает интерфейс, выводящий форму редактирования новости.
 *
 * {@inheritdoc}
 */
class BasketEditHelper extends AdminEditHelper
{
    protected static $model = '\Profitkit\Shopstart\Basket\BasketTable';

    /**
     * @inheritdoc
     */
    public function setTitle($title)
    {
        if (!empty($this->data)) {
            $title = Loc::getMessage('DEMO_AH_NEWS_EDIT_TITLE', array('#ID#' => $this->data[$this->pk()]));
        }
        else {
            $title = Loc::getMessage('DEMO_AH_NEWS_NEW_TITLE');
        }
        
        parent::setTitle($title);
    }

}