<?php

namespace Profitkit\Shopstart\Basket\AdminInterface;

use DigitalWand\AdminHelper\Helper\AdminListHelper;

/**
 * Хелпер описывает интерфейс, выводящий список новостей.
 *
 * {@inheritdoc}
 */
class BasketListHelper extends AdminListHelper
{
	protected static $model = '\Profitkit\Shopstart\Basket\BasketTable';
	
}