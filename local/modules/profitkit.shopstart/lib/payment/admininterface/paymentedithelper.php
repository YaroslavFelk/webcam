<?php

namespace Profitkit\Shopstart\Payment\AdminInterface;

use Bitrix\Main\Localization\Loc;
use DigitalWand\AdminHelper\Helper\AdminEditHelper;

Loc::loadMessages(__FILE__);

/**
 * Хелпер описывает интерфейс, выводящий форму редактирования новости.
 *
 * {@inheritdoc}
 */
class PaymentEditHelper extends AdminEditHelper
{
    protected static $model = '\Profitkit\Shopstart\Payment\PaymentTable';

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