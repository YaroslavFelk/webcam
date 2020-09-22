<?php

namespace Profitkit\Shopstart\Payment\AdminInterface;

use DigitalWand\AdminHelper\Helper\AdminListHelper;

/**
 * Хелпер описывает интерфейс, выводящий список новостей.
 *
 * {@inheritdoc}
 */
class PaymentListHelper extends AdminListHelper
{
	protected static $model = '\Profitkit\Shopstart\Payment\PaymentTable';
	
}