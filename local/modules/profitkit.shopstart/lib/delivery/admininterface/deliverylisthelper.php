<?php

namespace Profitkit\Shopstart\Delivery\AdminInterface;

use DigitalWand\AdminHelper\Helper\AdminListHelper;

/**
 * Хелпер описывает интерфейс, выводящий список новостей.
 *
 * {@inheritdoc}
 */
class DeliveryListHelper extends AdminListHelper
{
	protected static $model = '\Profitkit\Shopstart\Delivery\DeliveryTable';
	
}