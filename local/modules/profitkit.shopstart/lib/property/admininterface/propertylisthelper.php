<?php

namespace Profitkit\Shopstart\Property\AdminInterface;

use DigitalWand\AdminHelper\Helper\AdminListHelper;

/**
 * Хелпер описывает интерфейс, выводящий список новостей.
 *
 * {@inheritdoc}
 */
class PropertyListHelper extends AdminListHelper
{
	protected static $model = '\Profitkit\Shopstart\Property\PropertyTable';
	
}