<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
//$this->addExternalCss('/bitrix/css/main/bootstrap.css');
$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
    'BUY_ONE_CLICK' => $mainId.'_buy_one_click',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
		? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}
?>
<div class="catalog_element" itemscope itemtype="http://schema.org/Product"  id="<?=$itemIds['ID']?>">
    <meta itemprop="name" content="<?=$name?>" />
    <meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
    <section class="item">
        <div class="item__photo">
            <div class="product-item-detail-slider-container" id="<?=$itemIds['BIG_SLIDER_ID']?>">
                <span class="product-item-detail-slider-close" data-entity="close-popup"></span>
                <div class="product-item-detail-slider-block
						<?=($arParams['IMAGE_RESOLUTION'] === '1by1' ? 'product-item-detail-slider-block-square' : '')?>"
                     data-entity="images-slider-block">
                    <span class="product-item-detail-slider-left" data-entity="slider-control-left" style="display: none;"></span>
                    <span class="product-item-detail-slider-right" data-entity="slider-control-right" style="display: none;"></span>
                    <div class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>"
                        <?=(!$arResult['LABEL'] ? 'style="display: none;"' : '' )?>>
                        <?
                        if ($arResult['LABEL'] && !empty($arResult['LABEL_ARRAY_VALUE']))
                        {
                            foreach ($arResult['LABEL_ARRAY_VALUE'] as $code => $value)
                            {
                                ?>
                                <div<?=(!isset($arParams['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
                                    <span title="<?=$value?>"><?=$value?></span>
                                </div>
                                <?
                            }
                        }
                        ?>
                    </div>
                    <?
                    if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' and false)
                    {
                        if ($haveOffers)
                        {
                            ?>
                            <div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
                                 style="display: none;">
                            </div>
                            <?
                        }
                        else
                        {
                            if ($price['DISCOUNT'] > 0)
                            {
                                ?>
                                <div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
                                     title="<?=-$price['PERCENT']?>%">
                                    <span><?=-$price['PERCENT']?>%</span>
                                </div>
                                <?
                            }
                        }
                    }
                    ?>
                    <div class="product-item-detail-slider-images-container" data-entity="images-container">
                        <?
                        if (!empty($actualItem['MORE_PHOTO']))
                        {
                            foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
                            {
                                ?>
                                <div class="product-item-detail-slider-image<?=($key == 0 ? ' active' : '')?>" data-entity="image" data-id="<?=$photo['ID']?>">
                                    <img src="<?=$photo['SRC']?>" alt="<?=$alt?>" title="<?=$title?>"<?=($key == 0 ? ' itemprop="image"' : '')?>>
                                </div>
                                <?
                            }
                        }

                        if ($arParams['SLIDER_PROGRESS'] === 'Y')
                        {
                            ?>
                            <div class="product-item-detail-slider-progress-bar" data-entity="slider-progress-bar" style="width: 0;"></div>
                            <?
                        }
                        ?>
                    </div>
                </div>
                <?
                if ($showSliderControls)
                {
                    if ($haveOffers)
                    {
                        foreach ($arResult['OFFERS'] as $keyOffer => $offer)
                        {
                            if (!isset($offer['MORE_PHOTO_COUNT']) || $offer['MORE_PHOTO_COUNT'] <= 0)
                                continue;

                            $strVisible = $arResult['OFFERS_SELECTED'] == $keyOffer ? '' : 'none';
                            ?>
                            <div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_OF_ID'].$offer['ID']?>" style="display: <?=$strVisible?>;">
                                <?
                                foreach ($offer['MORE_PHOTO'] as $keyPhoto => $photo)
                                {
                                    ?>
                                    <div class="product-item-detail-slider-controls-image<?=($keyPhoto == 0 ? ' active' : '')?>"
                                         data-entity="slider-control" data-value="<?=$offer['ID'].'_'.$photo['ID']?>">
                                        <img src="<?=$photo['SRC']?>">
                                    </div>
                                    <?
                                }
                                ?>
                            </div>
                            <?
                        }
                    }
                    else
                    {
                        ?>
                        <div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_ID']?>">
                            <?
                            if (!empty($actualItem['MORE_PHOTO']))
                            {
                                foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
                                {
                                    ?>
                                    <div class="product-item-detail-slider-controls-image<?=($key == 0 ? ' active' : '')?>"
                                         data-entity="slider-control" data-value="<?=$photo['ID']?>">
                                        <img src="<?=$photo['SRC']?>">
                                    </div>
                                    <?
                                }
                            }
                            ?>
                        </div>
                        <?
                    }
                }
                ?>
            </div>
        </div>
        <div class="description">
            <div class="row">
                <div class="product_artnumber">
                    <?
                    if ($arResult['SHOW_OFFERS_PROPS'])
                    {
                        ?>
                        <p class="catalog_element_artnumber" id="<?=$itemIds['DISPLAY_PROP_DIV']?>"></p>
                        <?
                    }
                    elseif ($arResult['PROPERTIES']['ARTNUMBER']) {
                        ?>
                        <p class="catalog_element_artnumber"><?=$arResult['PROPERTIES']['ARTNUMBER']['NAME'];?>: <span><?=$arResult['PROPERTIES']['ARTNUMBER']['VALUE'];?></span></p>
                        <?
                    }
                    ?>
                </div>
                <div class="right__section__availability">
                    <?php
                    // case 'quantityLimit':
                    if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
                    {
                        if ($haveOffers)
                        {
                            ?>
                            <div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>" style="display: none;">
                                <div class="product-item-detail-info-container-title">
                                    <?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
                                    <span class="product-item-quantity" data-entity="quantity-limit-value"></span>
                                </div>
                            </div>
                            <?
                        }
                        else
                        {
                            if (
                                $measureRatio
                                && (float)$actualItem['PRODUCT']['QUANTITY'] > 0
                                && $actualItem['CHECK_QUANTITY']
                            )
                            {
                                ?>
                                <div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>">
                                    <div class="product-item-detail-info-container-title">
                                    <span class="element_quant_limit"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.994 1.53938L13.7225 0.262794C13.5481 0.08762 13.3361 0 13.0869 0C12.8374 0 12.6253 0.08762 12.451 0.262794L6.31744 6.42996L3.56859 3.66081C3.39404 3.48557 3.18213 3.39805 2.93288 3.39805C2.68347 3.39805 2.47156 3.48557 2.29701 3.66081L1.02546 4.93743C0.850913 5.11264 0.763672 5.32546 0.763672 5.57582C0.763672 5.82599 0.850913 6.03901 1.02546 6.21418L4.41002 9.6121L5.68167 10.8887C5.85612 11.064 6.0681 11.1515 6.31744 11.1515C6.56669 11.1515 6.77867 11.0638 6.95321 10.8887L8.22483 9.6121L14.994 2.81607C15.1684 2.64083 15.2558 2.42805 15.2558 2.17768C15.256 1.92744 15.1684 1.71462 14.994 1.53938Z"></path>
</svg></span>
                                        <?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
                                        <span class="product-item-quantity" data-entity="quantity-limit-value">
																<?
                                                                if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
                                                                {
                                                                    if ((float)$actualItem['PRODUCT']['QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
                                                                    {
                                                                        echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    echo $actualItem['PRODUCT']['QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
                                                                }
                                                                ?>
															</span>
                                    </div>
                                </div>
                                <?
                            } elseif ($actualItem['CAN_BUY'] == 'Y') {
                                ?>
                                <div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>">
                                    <div class="product-item-detail-info-container-title">
                        <span class="element_quant_limit"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.994 1.53938L13.7225 0.262794C13.5481 0.08762 13.3361 0 13.0869 0C12.8374 0 12.6253 0.08762 12.451 0.262794L6.31744 6.42996L3.56859 3.66081C3.39404 3.48557 3.18213 3.39805 2.93288 3.39805C2.68347 3.39805 2.47156 3.48557 2.29701 3.66081L1.02546 4.93743C0.850913 5.11264 0.763672 5.32546 0.763672 5.57582C0.763672 5.82599 0.850913 6.03901 1.02546 6.21418L4.41002 9.6121L5.68167 10.8887C5.85612 11.064 6.0681 11.1515 6.31744 11.1515C6.56669 11.1515 6.77867 11.0638 6.95321 10.8887L8.22483 9.6121L14.994 2.81607C15.1684 2.64083 15.2558 2.42805 15.2558 2.17768C15.256 1.92744 15.1684 1.71462 14.994 1.53938Z"></path>
</svg></span>
                                        <?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
                                        <span class="product-item-quantity" data-entity="quantity-limit-value">
                            есть
                        </span>
                                    </div></div>
                                <?
                            } else {
                                ?>
                                <div>Нет в наличии</div>
                                <?
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="product-item-detail-pay-block">
                <?
                       // case 'price':
                            ?>
                            <div class="product-item-detail-info-container">

                                <div class="product-item-detail-price-current" id="<?=$itemIds['PRICE_ID']?>">
                                    <?=$price['PRINT_RATIO_PRICE']?>
                                </div>
                                <?
                                if ($arParams['SHOW_OLD_PRICE'] === 'Y')
                                {
                                    ?>
                                    <div class="product-item-detail-price-old" id="<?=$itemIds['OLD_PRICE_ID']?>"
                                         style="display: <?=($showDiscount ? '' : 'none')?>;">
                                        <?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
                                    </div>
                                    <?
                                }
                                ?>
                                <?
                                if ($arParams['SHOW_OLD_PRICE'] === 'Y')
                                {
                                    ?><div style="display: none;">
                                    <div class="item_economy_price" id="<?=$itemIds['DISCOUNT_PRICE_ID']?>"
                                         style="display: <?=($showDiscount ? '' : 'none')?>;">
                                        <?
                                        if ($showDiscount)
                                        {
                                            echo Loc::getMessage('CT_BCE_CATALOG_ECONOMY_INFO2', array('#ECONOMY#' => $price['PRINT_RATIO_DISCOUNT']));
                                        }
                                        ?>
                                    </div></div>
                                    <?
                                }
                                ?>
                                <?
                                if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
                                {
                                    if ($haveOffers)
                                    {
                                        ?>
                                        <div class="item_economy_price" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
                                             style="display: none;">
                                        </div>
                                        <?
                                    }
                                    else
                                    {
                                        if ($price['DISCOUNT'] > 0)
                                        {
                                            ?>
                                            <div class="item_economy_price" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
                                                 title="<?=-$price['PERCENT']?>%">
                                                <span><?=-$price['PERCENT']?>%</span>
                                            </div>
                                            <?
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <?

                       // case 'priceRanges':
                            if ($arParams['USE_PRICE_COUNT'])
                            {
                                $showRanges = !$haveOffers && count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
                                $useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';
                                ?>
                                <div class="product-item-detail-info-container"
                                    <?=$showRanges ? '' : 'style="display: none;"'?>
                                     data-entity="price-ranges-block">
                                    <div class="product-item-detail-info-container-title">
                                        <?=$arParams['MESS_PRICE_RANGES_TITLE']?>
                                        <span data-entity="price-ranges-ratio-header">
														(<?=(Loc::getMessage(
                                                'CT_BCE_CATALOG_RATIO_PRICE',
                                                array('#RATIO#' => ($useRatio ? $measureRatio : '1').' '.$actualItem['ITEM_MEASURE']['TITLE'])
                                            ))?>)
													</span>
                                    </div>
                                    <dl class="product-item-detail-properties" data-entity="price-ranges-body">
                                        <?
                                        if ($showRanges)
                                        {
                                            foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range)
                                            {
                                                if ($range['HASH'] !== 'ZERO-INF')
                                                {
                                                    $itemPrice = false;

                                                    foreach ($arResult['ITEM_PRICES'] as $itemPrice)
                                                    {
                                                        if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
                                                        {
                                                            break;
                                                        }
                                                    }

                                                    if ($itemPrice)
                                                    {
                                                        ?>
                                                        <dt>
                                                            <?
                                                            echo Loc::getMessage(
                                                                    'CT_BCE_CATALOG_RANGE_FROM',
                                                                    array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
                                                                ).' ';

                                                            if (is_infinite($range['SORT_TO']))
                                                            {
                                                                echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
                                                            }
                                                            else
                                                            {
                                                                echo Loc::getMessage(
                                                                    'CT_BCE_CATALOG_RANGE_TO',
                                                                    array('#TO#' => $range['SORT_TO'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
                                                                );
                                                            }
                                                            ?>
                                                        </dt>
                                                        <dd><?=($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE'])?></dd>
                                                        <?
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </dl>
                                </div>
                                <?
                                unset($showRanges, $useRatio, $itemPrice, $range);
                            }

                     //   case 'quantity':
                            if ($arParams['USE_PRODUCT_QUANTITY'])
                            {
                                ?>
                                <div class="product-item-detail-info-container" style="<?=(!$actualItem['CAN_BUY'] ? 'display: none;' : '')?>"
                                     data-entity="quantity-block">
                                    <div class="product-item-detail-info-container-title"><?=Loc::getMessage('CATALOG_QUANTITY')?></div>
                                    <div class="product-item-amount">
                                        <div class="product-item-amount-field-container">
                                            <span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN_ID']?>"></span>
                                            <input class="product-item-amount-field" id="<?=$itemIds['QUANTITY_ID']?>" type="number"
                                                   value="<?=$price['MIN_QUANTITY']?>">
                                            <span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP_ID']?>"></span>
                                            <span class="product-item-amount-description-container">
															<span id="<?=$itemIds['QUANTITY_MEASURE']?>">
																<?=$actualItem['ITEM_MEASURE']['TITLE']?>
															</span>
															<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
														</span>
                                        </div>
                                    </div>
                                </div>
                                <?
                            }



                            ?>


            </div>
            <!--<select name="items-variant" id="items-variant">
                <option value="first">Варианты товара</option>
                <option value="second">Вариант 2</option>
                <option value="third">Вариант 3</option>
            </select>-->
            <div class="description__wrapper">
                <div class="product-item-detail-info-section">
                    <?
                    foreach ($arParams['PRODUCT_INFO_BLOCK_ORDER'] as $blockName)
                    {
                        switch ($blockName)
                        {
                            case 'sku':
                                if ($haveOffers && !empty($arResult['OFFERS_PROP']))
                                {
                                    ?>
                                    <div id="<?=$itemIds['TREE_ID']?>" class="sku_row">
                                        <?
                                        foreach ($arResult['SKU_PROPS'] as $skuProperty)
                                        {
                                            if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
                                                continue;

                                            $propertyId = $skuProperty['ID'];
                                            $skuProps[] = array(
                                                'ID' => $propertyId,
                                                'SHOW_MODE' => $skuProperty['SHOW_MODE'],
                                                'VALUES' => $skuProperty['VALUES'],
                                                'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
                                            );
                                            ?>
                                            <div class="product-item-detail-info-container" data-entity="sku-line-block">
                                                <div class="product-item-detail-info-container-title"><?=htmlspecialcharsEx($skuProperty['NAME'])?></div>
                                                <div class="product-item-scu-container">
                                                    <div class="product-item-scu-block">
                                                        <div class="product-item-scu-list">
                                                            <ul class="product-item-scu-item-list">
                                                                <?
                                                                foreach ($skuProperty['VALUES'] as &$value)
                                                                {
                                                                    $value['NAME'] = htmlspecialcharsbx($value['NAME']);

                                                                    if ($skuProperty['SHOW_MODE'] === 'PICT')
                                                                    {
                                                                        ?>
                                                                        <li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>"
                                                                            data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
                                                                            data-onevalue="<?=$value['ID']?>">
                                                                            <div class="product-item-scu-item-color-block">
                                                                                <div class="product-item-scu-item-color" title="<?=$value['NAME']?>"
                                                                                     style="background-image: url('<?=$value['PICT']['SRC']?>');">
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <?
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <li class="product-item-scu-item-text-container" title="<?=$value['NAME']?>"
                                                                            data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
                                                                            data-onevalue="<?=$value['ID']?>">
                                                                            <div class="product-item-scu-item-text-block">
                                                                                <div class="product-item-scu-item-text"><?=$value['NAME']?></div>
                                                                            </div>
                                                                        </li>
                                                                        <?
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                            <div style="clear: both;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                                        }
                                        ?>
                                    </div>
                                    <?
                                }

                                break;

                            case 'props':
                                if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
                                {
                                    ?>
                                    <div class="product-item-detail-info-container">
                                        <?
                                        if (!empty($arResult['DISPLAY_PROPERTIES']))
                                        {
                                            ?>
                                            <dl class="product-item-detail-properties">
                                                <?
                                                foreach ($arResult['DISPLAY_PROPERTIES'] as $property)
                                                {
                                                    if (isset($arParams['MAIN_BLOCK_PROPERTY_CODE'][$property['CODE']]))
                                                    {
                                                        ?>
                                                        <dt><?=$property['NAME']?></dt>
                                                        <dd><?=(is_array($property['DISPLAY_VALUE'])
                                                                ? implode(' / ', $property['DISPLAY_VALUE'])
                                                                : $property['DISPLAY_VALUE'])?>
                                                        </dd>
                                                        <?
                                                    }
                                                }
                                                unset($property);
                                                ?>
                                            </dl>
                                            <?
                                        }

                                        if ($arResult['SHOW_OFFERS_PROPS'])
                                        {
                                            ?>
                                            <dl class="product-item-detail-properties" id="<?=$itemIds['DISPLAY_MAIN_PROP_DIV']?>"></dl>
                                            <?
                                        }
                                        ?>
                                    </div>
                                    <?
                                }

                                break;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="description__buttons">
                <div data-entity="main-button-container">
                    <div id="<?=$itemIds['BASKET_ACTIONS_ID']?>" style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;">
                        <?
                        if ($showAddBtn)
                        {
                            ?>
                            <div class="product-item-detail-info-container">
                                <a class="btn <?=$showButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['ADD_BASKET_LINK']?>"
                                   href="javascript:void(0);">
                                    <span><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></span>
                                </a>
                            </div>
                            <?
                        }

                        if ($showBuyBtn)
                        {
                            ?>
                            <div class="product-item-detail-info-container">
                                <a class="btn <?=$buyButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['BUY_LINK']?>"
                                   href="javascript:void(0);">
                                    <span><?=$arParams['MESS_BTN_BUY']?></span>
                                </a>
                            </div>
                            <?
                        }
                        ?>
                    </div>
                    <?
                    if ($showSubscribe)
                    {
                        ?>
                        <div class="product-item-detail-info-container">
                            <?
                            $APPLICATION->IncludeComponent(
                                'bitrix:catalog.product.subscribe',
                                '',
                                array(
                                    'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                                    'PRODUCT_ID' => $arResult['ID'],
                                    'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
                                    'BUTTON_CLASS' => 'btn btn-default product-item-detail-buy-button',
                                    'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
                                    'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                                ),
                                $component,
                                array('HIDE_ICONS' => 'Y')
                            );
                            ?>
                        </div>
                        <?
                    }
                    ?>
                    <div class="product-item-detail-info-container" style="display: none;">
                        <a class="btn btn-link product-item-detail-buy-button" id="<?=$itemIds['NOT_AVAILABLE_MESS']?>"
                           href="javascript:void(0)"
                           rel="nofollow" style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;">
                            <?=$arParams['MESS_NOT_AVAILABLE']?>
                        </a>
                    </div>
                </div>
                <button id="<?=$itemIds['BUY_ONE_CLICK']?>" class="btn_white">Купить в один клик</button>
            </div>
            <div class="description__text"><?=$arResult['PREVIEW_TEXT'];?></div>
            <div class="rate">
                <?php
                //  case 'rating':
                if ($arParams['USE_VOTE_RATING'] === 'Y')
                {
                    ?>
                    <div class="product-item-detail-info-container">
                        <?
                        $APPLICATION->IncludeComponent(
                            'bitrix:iblock.vote',
                            'stars',
                            array(
                                'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
                                'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                                'ELEMENT_ID' => $arResult['ID'],
                                'ELEMENT_CODE' => '',
                                'MAX_VOTE' => '5',
                                'VOTE_NAMES' => array('1', '2', '3', '4', '5'),
                                'SET_STATUS_404' => 'N',
                                'DISPLAY_AS_RATING' => $arParams['VOTE_DISPLAY_AS_RATING'],
                                'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                                'CACHE_TIME' => $arParams['CACHE_TIME']
                            ),
                            $component,
                            array('HIDE_ICONS' => 'Y')
                        );
                        ?>
                    </div>
                    <?
                }
                ?>
                <?php
                if ($arParams['DISPLAY_COMPARE'])
                {
                    ?>
                    <div class="product-item-detail-compare-container">
                        <div class="product-item-detail-compare">
                            <div class="checkbox">
                                <label id="<?=$itemIds['COMPARE_LINK']?>">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.95 18.9H2.1V1.05C2.1 0.4725 1.6275 0 1.05 0C0.472499 0 0 0.4725 0 1.05V19.95C0 20.5275 0.472499 21 1.05 21H19.95C20.5275 21 21 20.5275 21 19.95C21 19.3725 20.5275 18.9 19.95 18.9Z"></path>
                                        <path d="M5.25 16.8C5.8275 16.8 6.3 16.3275 6.3 15.75V9.45C6.3 8.8725 5.8275 8.4 5.25 8.4C4.6725 8.4 4.2 8.8725 4.2 9.45V15.75C4.2 16.3275 4.6725 16.8 5.25 16.8Z"></path>
                                        <path d="M9.45 16.8C10.0275 16.8 10.5 16.3275 10.5 15.75V3.15C10.5 2.5725 10.0275 2.1 9.45 2.1C8.8725 2.1 8.4 2.5725 8.4 3.15V15.75C8.4 16.3275 8.8725 16.8 9.45 16.8Z"></path>
                                        <path d="M13.65 16.8C14.2275 16.8 14.7 16.3275 14.7 15.75V6.825C14.7 6.2475 14.2275 5.775 13.65 5.775C13.0725 5.775 12.6 6.2475 12.6 6.825V15.75C12.6 16.3275 13.0725 16.8 13.65 16.8Z"></path>
                                        <path d="M17.85 16.8C18.4275 16.8 18.9 16.3275 18.9 15.75V2.1C18.9 1.5225 18.4275 1.05 17.85 1.05C17.2725 1.05 16.8 1.5225 16.8 2.1V15.75C16.8 16.3275 17.2725 16.8 17.85 16.8Z"></path>
                                    </svg>
                                    <input type="checkbox" data-entity="compare-checkbox" style="display: none;">
                                    <span data-entity="compare-title"><?=$arParams['MESS_BTN_COMPARE']?></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <?
                }
                ?>
                <a class="add_to_favorite"><svg width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.1924 0C16.017 0 13.8642 0.990406 12.4994 2.50184C11.1352 0.990406 8.98246 0 6.80704 0C3.05353 0 0 3.05522 0 6.81081C0 8.29841 0.47082 9.71165 1.36141 10.8979C1.43458 10.9955 1.52364 11.0715 1.61837 11.1385L9.42208 19.5039L9.42265 19.5045C10.1521 20.4148 11.2566 20.9642 12.4223 20.9938C12.4416 20.9955 12.4597 21 12.4796 21C12.4864 21 12.4932 20.9989 12.5 20.9989C12.5068 20.9989 12.5136 21 12.5204 21C12.5403 21 12.5584 20.9955 12.5783 20.9943C13.7434 20.9648 14.8473 20.4154 15.5768 19.5056C15.5774 19.505 15.5779 19.5045 15.5785 19.5039L23.3822 11.1379C23.4769 11.071 23.566 10.9949 23.6392 10.8973C24.5292 9.71108 25 8.29784 25 6.81081C24.9994 3.05522 21.9459 0 18.1924 0ZM6.80704 2.27027C8.74875 2.27027 10.7926 3.4667 11.4602 4.99459C11.4704 5.01843 11.4858 5.0383 11.4977 5.061C11.5169 5.09846 11.5362 5.13592 11.5595 5.17111C11.5793 5.20062 11.602 5.2273 11.6247 5.25511C11.6491 5.28462 11.6724 5.3147 11.6996 5.34195C11.7263 5.36862 11.7552 5.39132 11.7841 5.41516C11.8119 5.43787 11.8391 5.4617 11.8698 5.48214C11.9044 5.50541 11.9407 5.52357 11.9776 5.54286C12.0008 5.55478 12.0212 5.57068 12.0451 5.58089C12.0519 5.58373 12.0592 5.58487 12.0661 5.5877C12.1046 5.6036 12.1449 5.61438 12.1852 5.6263C12.2169 5.63538 12.2487 5.6473 12.2805 5.65354C12.3173 5.66092 12.3548 5.66262 12.3928 5.66603C12.4285 5.66943 12.4643 5.67511 12.4994 5.67511C12.5352 5.67511 12.5703 5.66943 12.6061 5.66603C12.6441 5.66262 12.6815 5.66092 12.719 5.65354C12.7502 5.6473 12.7808 5.63595 12.8114 5.62687C12.8528 5.61495 12.8942 5.6036 12.9339 5.58714C12.9402 5.5843 12.947 5.58373 12.9532 5.58089C12.9759 5.57068 12.9952 5.55649 13.0173 5.54514C13.0559 5.52527 13.0939 5.50597 13.1302 5.48157C13.1597 5.4617 13.1852 5.43957 13.2125 5.41743C13.2425 5.39303 13.2726 5.36919 13.2998 5.34195C13.3265 5.31527 13.3492 5.28632 13.373 5.25738C13.3957 5.22957 13.419 5.20232 13.4394 5.17224C13.4626 5.13705 13.4813 5.10016 13.5006 5.0627C13.5125 5.04 13.5279 5.01957 13.5381 4.99573C14.2057 3.46784 16.2495 2.2714 18.1913 2.2714C20.6934 2.2714 22.7293 4.3084 22.7293 6.81195C22.7293 7.74957 22.44 8.63781 21.9079 9.40062C21.8926 9.41538 21.8744 9.42673 21.8597 9.44262L13.9181 17.9561C13.9034 17.972 13.8932 17.9908 13.879 18.0072C13.8665 18.022 13.8523 18.0333 13.8404 18.0492C13.5194 18.4766 13.0309 18.7218 12.4983 18.728C11.9662 18.7218 11.4778 18.4766 11.1567 18.0492C11.1448 18.0333 11.1295 18.0214 11.117 18.0061C11.1034 17.9896 11.0938 17.972 11.079 17.9561L3.13748 9.44262C3.12216 9.42616 3.10458 9.41481 3.0887 9.40005C2.55831 8.63668 2.26901 7.74843 2.26901 6.81081C2.26901 4.30727 4.30489 2.27027 6.80704 2.27027Z"></path>
                    </svg> <span>В избранное</span></a>
            </div>
        </div>
        <? if (false) { ?>
        <div class="right__section">
            <div class="right__section__brand">
                <?php
                if ($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROP_CODE'][0]]) {
                    ?>
                    <p><?=$arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROP_CODE'][0]]['NAME'];?>: <span><?=$arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROP_CODE'][0]]['DISPLAY_VALUE'];?></span></p>

                <a href="#">Все товары <?=$arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROP_CODE'][0]]['DISPLAY_VALUE'];?></a>
                    <?
                }
                ?>
                <?
                if ($arResult['SHOW_OFFERS_PROPS'])
                {
                    ?>
                    <p class="catalog_element_artnumber" id="<?=$itemIds['DISPLAY_PROP_DIV']?>"></p>
                    <?
                }
                elseif ($arResult['PROPERTIES']['ARTNUMBER']) {
                    ?>
                    <p class="catalog_element_artnumber"><?=$arResult['PROPERTIES']['ARTNUMBER']['NAME'];?>: <span><?=$arResult['PROPERTIES']['ARTNUMBER']['VALUE'];?></span></p>
                <?
                }
                ?>
            </div>
            <div class="right__section__availability">
                <?php
                // case 'quantityLimit':
                if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
                {
                    if ($haveOffers)
                    {
                        ?>
                        <div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>" style="display: none;">
                            <div class="product-item-detail-info-container-title">
                                <?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
                                <span class="product-item-quantity" data-entity="quantity-limit-value"></span>
                            </div>
                        </div>
                        <?
                    }
                    else
                    {
                        if (
                            $measureRatio
                            && (float)$actualItem['PRODUCT']['QUANTITY'] > 0
                            && $actualItem['CHECK_QUANTITY']
                        )
                        {
                            ?>
                            <div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>">
                                <div class="product-item-detail-info-container-title">
                                    <span class="element_quant_limit"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.994 1.53938L13.7225 0.262794C13.5481 0.08762 13.3361 0 13.0869 0C12.8374 0 12.6253 0.08762 12.451 0.262794L6.31744 6.42996L3.56859 3.66081C3.39404 3.48557 3.18213 3.39805 2.93288 3.39805C2.68347 3.39805 2.47156 3.48557 2.29701 3.66081L1.02546 4.93743C0.850913 5.11264 0.763672 5.32546 0.763672 5.57582C0.763672 5.82599 0.850913 6.03901 1.02546 6.21418L4.41002 9.6121L5.68167 10.8887C5.85612 11.064 6.0681 11.1515 6.31744 11.1515C6.56669 11.1515 6.77867 11.0638 6.95321 10.8887L8.22483 9.6121L14.994 2.81607C15.1684 2.64083 15.2558 2.42805 15.2558 2.17768C15.256 1.92744 15.1684 1.71462 14.994 1.53938Z"></path>
</svg></span>
                                    <?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
                                    <span class="product-item-quantity" data-entity="quantity-limit-value">
																<?
                                                                if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
                                                                {
                                                                    if ((float)$actualItem['PRODUCT']['QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
                                                                    {
                                                                        echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    echo $actualItem['PRODUCT']['QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
                                                                }
                                                                ?>
															</span>
                                </div>
                            </div>
                            <?
                        } elseif ($actualItem['CAN_BUY'] == 'Y') {
                            ?>
                <div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>">
                    <div class="product-item-detail-info-container-title">
                        <span class="element_quant_limit"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.994 1.53938L13.7225 0.262794C13.5481 0.08762 13.3361 0 13.0869 0C12.8374 0 12.6253 0.08762 12.451 0.262794L6.31744 6.42996L3.56859 3.66081C3.39404 3.48557 3.18213 3.39805 2.93288 3.39805C2.68347 3.39805 2.47156 3.48557 2.29701 3.66081L1.02546 4.93743C0.850913 5.11264 0.763672 5.32546 0.763672 5.57582C0.763672 5.82599 0.850913 6.03901 1.02546 6.21418L4.41002 9.6121L5.68167 10.8887C5.85612 11.064 6.0681 11.1515 6.31744 11.1515C6.56669 11.1515 6.77867 11.0638 6.95321 10.8887L8.22483 9.6121L14.994 2.81607C15.1684 2.64083 15.2558 2.42805 15.2558 2.17768C15.256 1.92744 15.1684 1.71462 14.994 1.53938Z"></path>
</svg></span>
                        <?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
                        <span class="product-item-quantity" data-entity="quantity-limit-value">
                            есть
                        </span>
                    </div></div>
                <?
                        } else {
                            ?>
<div>Нет в наличии</div>
                            <?
                        }
                    }
                }
                ?>
            </div>
            <div class="right__section__shipping">
                <div><svg width="33" height="31" viewBox="0 0 33 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M31.2842 12.9223L29.8913 12.0269L28.2332 7.51003C28.0419 6.99349 27.6974 6.54771 27.2458 6.2324C26.7941 5.91709 26.2569 5.74729 25.7061 5.74574H20.9406V2.6085C20.9406 2.00513 20.7009 1.42647 20.2742 0.999828C19.8476 0.573183 19.2689 0.333496 18.6656 0.333496H2.525C1.92163 0.333496 1.34298 0.573183 0.916332 0.999828C0.489687 1.42647 0.25 2.00513 0.25 2.6085V25.3883C0.250877 25.8745 0.444375 26.3404 0.788114 26.6842C1.13185 27.0279 1.59781 27.2214 2.08393 27.2223H4.45842C4.57944 28.1295 5.02577 28.962 5.71443 29.5649C6.4031 30.1678 7.28726 30.5001 8.20255 30.5001C9.11784 30.5001 10.002 30.1678 10.6907 29.5649C11.3793 28.962 11.8257 28.1295 11.9467 27.2223H21.0135C21.1345 28.1295 21.5809 28.962 22.2695 29.5649C22.9582 30.1678 23.8424 30.5001 24.7577 30.5001C25.6729 30.5001 26.5571 30.1678 27.2458 29.5649C27.9344 28.962 28.3808 28.1295 28.5018 27.2223H30.9161C31.4022 27.2214 31.8681 27.0279 32.2119 26.6842C32.5556 26.3404 32.7491 25.8745 32.75 25.3883V15.6052C32.751 15.0708 32.6172 14.5448 32.361 14.0758C32.1048 13.6069 31.7344 13.2101 31.2842 12.9223ZM25.6995 7.4039C25.9095 7.40316 26.1149 7.46616 26.2884 7.58458C26.4619 7.70301 26.5953 7.87128 26.6712 8.06717L28.4388 12.8593C28.5015 13.0288 28.618 13.1732 28.7704 13.2705L30.3987 14.3151C30.6132 14.4548 30.7891 14.6461 30.9102 14.8715C31.0313 15.097 31.0938 15.3493 31.0918 15.6052V19.5848H20.9406V7.4039H25.6995ZM2.525 1.99166H18.6689C18.8325 1.99166 18.9894 2.05665 19.105 2.17233C19.2207 2.28801 19.2857 2.4449 19.2857 2.6085V19.5881H1.90816V2.6085C1.90816 2.4449 1.97315 2.28801 2.08883 2.17233C2.20451 2.05665 2.3614 1.99166 2.525 1.99166ZM8.20918 28.8473C7.7894 28.8473 7.37905 28.7228 7.03001 28.4896C6.68098 28.2564 6.40894 27.9249 6.2483 27.537C6.08765 27.1492 6.04562 26.7225 6.12752 26.3107C6.20941 25.899 6.41155 25.5208 6.70838 25.224C7.00521 24.9272 7.3834 24.725 7.79511 24.6432C8.20683 24.5613 8.63358 24.6033 9.02141 24.7639C9.40924 24.9246 9.74072 25.1966 9.97393 25.5456C10.2072 25.8947 10.3316 26.305 10.3316 26.7248C10.3308 27.2875 10.1069 27.8268 9.70901 28.2246C9.31117 28.6225 8.77182 28.8464 8.20918 28.8473ZM24.7643 28.8473C24.3445 28.8473 23.9341 28.7228 23.5851 28.4896C23.2361 28.2564 22.964 27.9249 22.8034 27.537C22.6428 27.1492 22.6007 26.7225 22.6826 26.3107C22.7645 25.899 22.9667 25.5208 23.2635 25.224C23.5603 24.9272 23.9385 24.725 24.3502 24.6432C24.7619 24.5613 25.1887 24.6033 25.5765 24.7639C25.9643 24.9246 26.2958 25.1966 26.529 25.5456C26.7623 25.8947 26.8867 26.305 26.8867 26.7248C26.8863 27.0043 26.8308 27.2809 26.7233 27.5388C26.6159 27.7968 26.4586 28.031 26.2606 28.2282C26.0625 28.4253 25.8276 28.5814 25.5691 28.6877C25.3106 28.7939 25.0338 28.8481 24.7543 28.8473H24.7643ZM30.9227 25.5674H28.3525C28.1071 24.8062 27.6265 24.1424 26.98 23.6715C26.3334 23.2006 25.5542 22.9469 24.7543 22.9469C23.9545 22.9469 23.1752 23.2006 22.5287 23.6715C21.8821 24.1424 21.4016 24.8062 21.1561 25.5674H11.8008C11.5571 24.8045 11.0772 24.1387 10.4304 23.6664C9.78365 23.194 9.00346 22.9394 8.20255 22.9394C7.40164 22.9394 6.62145 23.194 5.97468 23.6664C5.3279 24.1387 4.84802 24.8045 4.60434 25.5674H2.08393C2.06056 25.5674 2.03743 25.5628 2.01589 25.5537C1.99435 25.5447 1.97482 25.5314 1.95846 25.5148C1.94209 25.4981 1.92921 25.4783 1.92058 25.4566C1.91194 25.4349 1.90772 25.4117 1.90816 25.3883V21.2462H31.0918V25.3883C31.0918 25.435 31.0733 25.4797 31.0404 25.5126C31.0074 25.5456 30.9627 25.5641 30.9161 25.5641L30.9227 25.5674Z" fill="#515151"/>
                        <path d="M5.17802 5.17533H5.80812C5.88816 5.17533 5.96492 5.20713 6.02152 5.26372C6.07811 5.32032 6.10991 5.39708 6.10991 5.47712V12.1031C6.11079 12.7256 6.35844 13.3223 6.79858 13.7624C7.23872 14.2026 7.83542 14.4502 8.45787 14.4511H14.6926C14.9124 14.4511 15.1233 14.3637 15.2788 14.2083C15.4343 14.0528 15.5216 13.8419 15.5216 13.622C15.5216 13.4021 15.4343 13.1912 15.2788 13.0358C15.1233 12.8803 14.9124 12.7929 14.6926 12.7929H8.45787C8.27492 12.7929 8.09947 12.7203 7.97011 12.5909C7.84075 12.4615 7.76807 12.2861 7.76807 12.1031V11.2906H14.0094C14.4835 11.2906 14.9381 11.1023 15.2734 10.7671C15.6086 10.4319 15.7969 9.97721 15.7969 9.50314V6.51844C15.7969 6.29856 15.7095 6.08768 15.5541 5.93219C15.3986 5.77671 15.1877 5.68936 14.9678 5.68936H7.76807V5.47048C7.7672 4.95094 7.56042 4.45293 7.19305 4.08556C6.82568 3.71819 6.32766 3.51141 5.80812 3.51053H5.17802C4.95813 3.51053 4.74725 3.59788 4.59177 3.75337C4.43629 3.90885 4.34894 4.11973 4.34894 4.33962C4.34894 4.5595 4.43629 4.77038 4.59177 4.92587C4.74725 5.08135 4.95813 5.1687 5.17802 5.1687V5.17533ZM14.1321 7.33757V9.50314C14.1321 9.52012 14.1288 9.53694 14.1223 9.55263C14.1158 9.56832 14.1062 9.58258 14.0942 9.59459C14.0822 9.6066 14.068 9.61613 14.0523 9.62263C14.0366 9.62913 14.0198 9.63247 14.0028 9.63247H7.76807V7.33757H14.1321Z" fill="#515151"/>
                        <path d="M8.82936 17.8403C9.4356 17.8403 9.92706 17.3488 9.92706 16.7426C9.92706 16.1364 9.4356 15.6449 8.82936 15.6449C8.22311 15.6449 7.73166 16.1364 7.73166 16.7426C7.73166 17.3488 8.22311 17.8403 8.82936 17.8403Z" fill="#515151"/>
                        <path d="M13.303 17.8403C13.9093 17.8403 14.4007 17.3488 14.4007 16.7426C14.4007 16.1364 13.9093 15.6449 13.303 15.6449C12.6968 15.6449 12.2053 16.1364 12.2053 16.7426C12.2053 17.3488 12.6968 17.8403 13.303 17.8403Z" fill="#515151"/>
                    </svg>
                </div>
                <p><span>Расчет доставки</span>
                    (от 1 дня от 250 р.)</p>
            </div>
            <div class="right__section__payment">
                <div><svg width="35" height="29" viewBox="0 0 35 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.83425 22.6507H18.7507C18.9748 22.6507 19.1897 22.5617 19.3482 22.4032C19.5067 22.2448 19.5957 22.0298 19.5957 21.8057C19.5957 21.5816 19.5067 21.3667 19.3482 21.2082C19.1897 21.0497 18.9748 20.9607 18.7507 20.9607H3.83425C3.51421 20.9607 3.20729 20.8336 2.98099 20.6073C2.75469 20.381 2.62755 20.074 2.62755 19.754V6.57158H27.9378V10.7223C27.9378 10.9465 28.0268 11.1614 28.1853 11.3199C28.3438 11.4783 28.5587 11.5674 28.7828 11.5674C29.0069 11.5674 29.2219 11.4783 29.3803 11.3199C29.5388 11.1614 29.6278 10.9465 29.6278 10.7223V3.04275C29.6269 2.27476 29.3215 1.53848 28.7784 0.995423C28.2354 0.45237 27.4991 0.146891 26.7311 0.145996H3.83425C3.06626 0.146891 2.32998 0.45237 1.78693 0.995423C1.24387 1.53848 0.938395 2.27476 0.9375 3.04275V19.754C0.938395 20.522 1.24387 21.2583 1.78693 21.8013C2.32998 22.3444 3.06626 22.6498 3.83425 22.6507ZM3.83425 1.83605H26.7311C27.0511 1.83605 27.358 1.96318 27.5843 2.18948C27.8106 2.41578 27.9378 2.72271 27.9378 3.04275V4.87814H2.62755V3.04275C2.62755 2.72271 2.75469 2.41578 2.98099 2.18948C3.20729 1.96318 3.51421 1.83605 3.83425 1.83605Z" fill="#4B4B4B"/>
                        <path d="M5.66962 16.891C5.4455 16.891 5.23057 16.98 5.07209 17.1385C4.91362 17.297 4.82459 17.5119 4.82459 17.736C4.82459 17.9601 4.91362 18.1751 5.07209 18.3335C5.23057 18.492 5.4455 18.581 5.66962 18.581H8.23512C8.45923 18.581 8.67417 18.492 8.83264 18.3335C8.99112 18.1751 9.08014 17.9601 9.08014 17.736C9.08014 17.5119 8.99112 17.297 8.83264 17.1385C8.67417 16.98 8.45923 16.891 8.23512 16.891H5.66962Z" fill="#4B4B4B"/>
                        <path d="M11.9059 18.581H14.4579C14.682 18.581 14.8969 18.492 15.0554 18.3335C15.2139 18.1751 15.3029 17.9601 15.3029 17.736C15.3029 17.5119 15.2139 17.297 15.0554 17.1385C14.8969 16.98 14.682 16.891 14.4579 16.891H11.9059C11.6818 16.891 11.4668 16.98 11.3084 17.1385C11.1499 17.297 11.0609 17.5119 11.0609 17.736C11.0609 17.9601 11.1499 18.1751 11.3084 18.3335C11.4668 18.492 11.6818 18.581 11.9059 18.581Z" fill="#4B4B4B"/>
                        <path d="M20.5421 16.891H17.9868C17.7626 16.891 17.5477 16.98 17.3892 17.1385C17.2308 17.297 17.1417 17.5119 17.1417 17.736C17.1417 17.9601 17.2308 18.1751 17.3892 18.3335C17.5477 18.492 17.7626 18.581 17.9868 18.581H20.5421C20.7662 18.581 20.9812 18.492 21.1396 18.3335C21.2981 18.1751 21.3872 17.9601 21.3872 17.736C21.3872 17.5119 21.2981 17.297 21.1396 17.1385C20.9812 16.98 20.7662 16.891 20.5421 16.891Z" fill="#4B4B4B"/>
                        <path d="M11.3347 11.7635V11.057C11.3347 10.4295 11.0854 9.82769 10.6417 9.38396C10.198 8.94024 9.59615 8.69096 8.96863 8.69096H7.18056C6.55303 8.69096 5.95121 8.94024 5.50749 9.38396C5.06377 9.82769 4.81448 10.4295 4.81448 11.057V11.7635C4.81448 12.391 5.06377 12.9928 5.50749 13.4365C5.95121 13.8803 6.55303 14.1295 7.18056 14.1295H8.97539C9.60174 14.1278 10.2018 13.8777 10.6441 13.4342C11.0864 12.9906 11.3347 12.3898 11.3347 11.7635ZM9.64465 11.7635C9.64465 11.9428 9.57343 12.1147 9.44665 12.2415C9.31987 12.3683 9.14792 12.4395 8.96863 12.4395H7.18056C7.00126 12.4395 6.82932 12.3683 6.70254 12.2415C6.57576 12.1147 6.50454 11.9428 6.50454 11.7635V11.057C6.50454 10.8777 6.57576 10.7058 6.70254 10.579C6.82932 10.4522 7.00126 10.381 7.18056 10.381H8.97539C9.15468 10.381 9.32663 10.4522 9.45341 10.579C9.58019 10.7058 9.65141 10.8777 9.65141 11.057L9.64465 11.7635Z" fill="#4B4B4B"/>
                        <path d="M32.7104 19.7303H32.6394C32.4975 19.7033 32.3589 19.6864 32.2169 19.6593V17.9389C32.2169 16.765 31.7515 15.6391 30.9228 14.8078C30.0941 13.9765 28.9695 13.5077 27.7957 13.5042H27.6639C26.4907 13.5086 25.367 13.9778 24.539 14.809C23.711 15.6402 23.2461 16.7656 23.2461 17.9389V19.6526C23.1041 19.6762 22.9656 19.6965 22.8236 19.7236H22.7526C22.3736 19.793 22.0309 19.993 21.784 20.2887C21.537 20.5845 21.4014 20.9573 21.4006 21.3426V26.8387C21.4014 27.224 21.537 27.5968 21.784 27.8926C22.0309 28.1883 22.3736 28.3883 22.7526 28.4577L23.2393 28.549C26.2145 29.1115 29.2688 29.1115 32.2439 28.549L32.7104 28.4577C33.0894 28.3883 33.4321 28.1883 33.679 27.8926C33.926 27.5968 34.0617 27.224 34.0624 26.8387V21.3494C34.0617 20.9641 33.926 20.5912 33.679 20.2955C33.4321 19.9997 33.0894 19.7998 32.7104 19.7303ZM24.9362 17.9389C24.9371 17.2121 25.2262 16.5154 25.74 16.0015C26.2539 15.4876 26.9507 15.1985 27.6774 15.1976H27.8092C28.5337 15.2021 29.2269 15.4927 29.7379 16.0062C30.2489 16.5197 30.5361 17.2144 30.537 17.9389V19.4193C28.6708 19.2217 26.7889 19.2217 24.9226 19.4193L24.9362 17.9389ZM32.3724 26.8015L31.9195 26.886C29.1507 27.4072 26.309 27.4072 23.5402 26.886L23.0872 26.8015V21.3933H23.1244C26.1679 20.82 29.2917 20.82 32.3352 21.3933H32.3724V26.8015Z" fill="#4B4B4B"/>
                        <path d="M28.3163 24.04C28.4692 23.9108 28.5763 23.7356 28.6217 23.5407C28.6671 23.3457 28.6483 23.1413 28.5682 22.9579C28.488 22.7744 28.3508 22.6218 28.1769 22.5226C28.0031 22.4234 27.8018 22.383 27.6031 22.4074C27.4012 22.4326 27.213 22.5227 27.0667 22.6642C26.9204 22.8056 26.824 22.9906 26.7919 23.1916C26.7672 23.3489 26.7834 23.5099 26.8391 23.6591C26.8947 23.8083 26.9879 23.9407 27.1096 24.0433L26.7716 24.9898L26.6432 25.3481C26.6222 25.4077 26.6254 25.4732 26.6519 25.5306C26.6784 25.588 26.7262 25.6329 26.7851 25.6556C27.3795 25.8881 28.0397 25.8881 28.6341 25.6556C28.693 25.6329 28.7408 25.588 28.7673 25.5306C28.7938 25.4732 28.797 25.4077 28.776 25.3481L28.3163 24.04Z" fill="#4B4B4B"/>
                    </svg>
                </div>
                <p><span>Способы оплаты </span>
                    узнай о удобном способе оплаты</p>
            </div>
        </div>
        <? } ?>
    </section>

    <?
    if ($haveOffers)
    {
        foreach ($arResult['JS_OFFERS'] as $offer)
        {
            $currentOffersList = array();

            if (!empty($offer['TREE']) && is_array($offer['TREE']))
            {
                foreach ($offer['TREE'] as $propName => $skuId)
                {
                    $propId = (int)substr($propName, 5);

                    foreach ($skuProps as $prop)
                    {
                        if ($prop['ID'] == $propId)
                        {
                            foreach ($prop['VALUES'] as $propId => $propValue)
                            {
                                if ($propId == $skuId)
                                {
                                    $currentOffersList[] = $propValue['NAME'];
                                    break;
                                }
                            }
                        }
                    }
                }
            }

            $offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
            ?>
            <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				<meta itemprop="sku" content="<?=htmlspecialcharsbx(implode('/', $currentOffersList))?>" />
				<meta itemprop="price" content="<?=$offerPrice['RATIO_PRICE']?>" />
				<meta itemprop="priceCurrency" content="<?=$offerPrice['CURRENCY']?>" />
				<link itemprop="availability" href="http://schema.org/<?=($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
			</span>
            <?
        }

        unset($offerPrice, $currentOffersList);
    }
    else
    {
        ?>
        <span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?=$price['RATIO_PRICE']?>" />
			<meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
			<link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
		</span>
        <?
    }
    ?>
</div>

<? if (false) { ?>
<div class="bx-catalog-element bx-<?=$arParams['TEMPLATE_THEME']?>" id="<?=$itemIds['ID']?>"
	itemscope itemtype="http://schema.org/Product">
	<div class="container-fluid">
		<?
		if ($arParams['DISPLAY_NAME'] === 'Y' and false)
		{
			?>
			<div class="row">
				<div class="col-xs-12">
					<h1 class="bx-title"><?=$name?></h1>
				</div>
			</div>
			<?
		}
		?>
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="product-item-detail-slider-container" id="<?=$itemIds['BIG_SLIDER_ID']?>">
					<span class="product-item-detail-slider-close" data-entity="close-popup"></span>
					<div class="product-item-detail-slider-block
						<?=($arParams['IMAGE_RESOLUTION'] === '1by1' ? 'product-item-detail-slider-block-square' : '')?>"
						data-entity="images-slider-block">
						<span class="product-item-detail-slider-left" data-entity="slider-control-left" style="display: none;"></span>
						<span class="product-item-detail-slider-right" data-entity="slider-control-right" style="display: none;"></span>
						<div class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>"
							<?=(!$arResult['LABEL'] ? 'style="display: none;"' : '' )?>>
							<?
							if ($arResult['LABEL'] && !empty($arResult['LABEL_ARRAY_VALUE']))
							{
								foreach ($arResult['LABEL_ARRAY_VALUE'] as $code => $value)
								{
									?>
									<div<?=(!isset($arParams['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
										<span title="<?=$value?>"><?=$value?></span>
									</div>
									<?
								}
							}
							?>
						</div>
						<?
						if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
						{
							if ($haveOffers)
							{
								?>
								<div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
									style="display: none;">
								</div>
								<?
							}
							else
							{
								if ($price['DISCOUNT'] > 0)
								{
									?>
									<div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
										title="<?=-$price['PERCENT']?>%">
										<span><?=-$price['PERCENT']?>%</span>
									</div>
									<?
								}
							}
						}
						?>
						<div class="product-item-detail-slider-images-container" data-entity="images-container">
							<?
							if (!empty($actualItem['MORE_PHOTO']))
							{
								foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
								{
									?>
									<div class="product-item-detail-slider-image<?=($key == 0 ? ' active' : '')?>" data-entity="image" data-id="<?=$photo['ID']?>">
										<img src="<?=$photo['SRC']?>" alt="<?=$alt?>" title="<?=$title?>"<?=($key == 0 ? ' itemprop="image"' : '')?>>
									</div>
									<?
								}
							}

							if ($arParams['SLIDER_PROGRESS'] === 'Y')
							{
								?>
								<div class="product-item-detail-slider-progress-bar" data-entity="slider-progress-bar" style="width: 0;"></div>
								<?
							}
							?>
						</div>
					</div>
					<?
					if ($showSliderControls)
					{
						if ($haveOffers)
						{
							foreach ($arResult['OFFERS'] as $keyOffer => $offer)
							{
								if (!isset($offer['MORE_PHOTO_COUNT']) || $offer['MORE_PHOTO_COUNT'] <= 0)
									continue;

								$strVisible = $arResult['OFFERS_SELECTED'] == $keyOffer ? '' : 'none';
								?>
								<div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_OF_ID'].$offer['ID']?>" style="display: <?=$strVisible?>;">
									<?
									foreach ($offer['MORE_PHOTO'] as $keyPhoto => $photo)
									{
										?>
										<div class="product-item-detail-slider-controls-image<?=($keyPhoto == 0 ? ' active' : '')?>"
											data-entity="slider-control" data-value="<?=$offer['ID'].'_'.$photo['ID']?>">
											<img src="<?=$photo['SRC']?>">
										</div>
										<?
									}
									?>
								</div>
								<?
							}
						}
						else
						{
							?>
							<div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_ID']?>">
								<?
								if (!empty($actualItem['MORE_PHOTO']))
								{
									foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
									{
										?>
										<div class="product-item-detail-slider-controls-image<?=($key == 0 ? ' active' : '')?>"
											data-entity="slider-control" data-value="<?=$photo['ID']?>">
											<img src="<?=$photo['SRC']?>">
										</div>
										<?
									}
								}
								?>
							</div>
							<?
						}
					}
					?>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="row">
					<div class="col-sm-6">
						<div class="product-item-detail-info-section">
							<?
							foreach ($arParams['PRODUCT_INFO_BLOCK_ORDER'] as $blockName)
							{
								switch ($blockName)
								{
									case 'sku':
										if ($haveOffers && !empty($arResult['OFFERS_PROP']))
										{
											?>
											<div id="<?=$itemIds['TREE_ID']?>">
												<?
												foreach ($arResult['SKU_PROPS'] as $skuProperty)
												{
													if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
														continue;

													$propertyId = $skuProperty['ID'];
													$skuProps[] = array(
														'ID' => $propertyId,
														'SHOW_MODE' => $skuProperty['SHOW_MODE'],
														'VALUES' => $skuProperty['VALUES'],
														'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
													);
													?>
													<div class="product-item-detail-info-container" data-entity="sku-line-block">
														<div class="product-item-detail-info-container-title"><?=htmlspecialcharsEx($skuProperty['NAME'])?></div>
														<div class="product-item-scu-container">
															<div class="product-item-scu-block">
																<div class="product-item-scu-list">
																	<ul class="product-item-scu-item-list">
																		<?
																		foreach ($skuProperty['VALUES'] as &$value)
																		{
																			$value['NAME'] = htmlspecialcharsbx($value['NAME']);

																			if ($skuProperty['SHOW_MODE'] === 'PICT')
																			{
																				?>
																				<li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>"
																					data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
																					data-onevalue="<?=$value['ID']?>">
																					<div class="product-item-scu-item-color-block">
																						<div class="product-item-scu-item-color" title="<?=$value['NAME']?>"
																							style="background-image: url('<?=$value['PICT']['SRC']?>');">
																						</div>
																					</div>
																				</li>
																				<?
																			}
																			else
																			{
																				?>
																				<li class="product-item-scu-item-text-container" title="<?=$value['NAME']?>"
																					data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
																					data-onevalue="<?=$value['ID']?>">
																					<div class="product-item-scu-item-text-block">
																						<div class="product-item-scu-item-text"><?=$value['NAME']?></div>
																					</div>
																				</li>
																				<?
																			}
																		}
																		?>
																	</ul>
																	<div style="clear: both;"></div>
																</div>
															</div>
														</div>
													</div>
													<?
												}
												?>
											</div>
											<?
										}

										break;

									case 'props':
										if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
										{
											?>
											<div class="product-item-detail-info-container">
												<?
												if (!empty($arResult['DISPLAY_PROPERTIES']))
												{
													?>
													<dl class="product-item-detail-properties">
														<?
														foreach ($arResult['DISPLAY_PROPERTIES'] as $property)
														{
															if (isset($arParams['MAIN_BLOCK_PROPERTY_CODE'][$property['CODE']]))
															{
																?>
																<dt><?=$property['NAME']?></dt>
																<dd><?=(is_array($property['DISPLAY_VALUE'])
																		? implode(' / ', $property['DISPLAY_VALUE'])
																		: $property['DISPLAY_VALUE'])?>
																</dd>
																<?
															}
														}
														unset($property);
														?>
													</dl>
													<?
												}

												if ($arResult['SHOW_OFFERS_PROPS'])
												{
													?>
													<dl class="product-item-detail-properties" id="<?=$itemIds['DISPLAY_MAIN_PROP_DIV']?>"></dl>
													<?
												}
												?>
											</div>
											<?
										}

										break;
								}
							}
							?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="product-item-detail-pay-block">
							<?
							foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName)
							{
								switch ($blockName)
								{
									case 'rating':
										if ($arParams['USE_VOTE_RATING'] === 'Y')
										{
											?>
											<div class="product-item-detail-info-container">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:iblock.vote',
													'stars',
													array(
														'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
														'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
														'IBLOCK_ID' => $arParams['IBLOCK_ID'],
														'ELEMENT_ID' => $arResult['ID'],
														'ELEMENT_CODE' => '',
														'MAX_VOTE' => '5',
														'VOTE_NAMES' => array('1', '2', '3', '4', '5'),
														'SET_STATUS_404' => 'N',
														'DISPLAY_AS_RATING' => $arParams['VOTE_DISPLAY_AS_RATING'],
														'CACHE_TYPE' => $arParams['CACHE_TYPE'],
														'CACHE_TIME' => $arParams['CACHE_TIME']
													),
													$component,
													array('HIDE_ICONS' => 'Y')
												);
												?>
											</div>
											<?
										}

										break;

									case 'price':
										?>
										<div class="product-item-detail-info-container">
											<?
											if ($arParams['SHOW_OLD_PRICE'] === 'Y')
											{
												?>
												<div class="product-item-detail-price-old" id="<?=$itemIds['OLD_PRICE_ID']?>"
													style="display: <?=($showDiscount ? '' : 'none')?>;">
													<?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
												</div>
												<?
											}
											?>
											<div class="product-item-detail-price-current" id="<?=$itemIds['PRICE_ID']?>">
												<?=$price['PRINT_RATIO_PRICE']?>
											</div>
											<?
											if ($arParams['SHOW_OLD_PRICE'] === 'Y')
											{
												?>
												<div class="item_economy_price" id="<?=$itemIds['DISCOUNT_PRICE_ID']?>"
													style="display: <?=($showDiscount ? '' : 'none')?>;">
													<?
													if ($showDiscount)
													{
														echo Loc::getMessage('CT_BCE_CATALOG_ECONOMY_INFO2', array('#ECONOMY#' => $price['PRINT_RATIO_DISCOUNT']));
													}
													?>
												</div>
												<?
											}
											?>
										</div>
										<?
										break;

									case 'priceRanges':
										if ($arParams['USE_PRICE_COUNT'])
										{
											$showRanges = !$haveOffers && count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
											$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';
											?>
											<div class="product-item-detail-info-container"
												<?=$showRanges ? '' : 'style="display: none;"'?>
												data-entity="price-ranges-block">
												<div class="product-item-detail-info-container-title">
													<?=$arParams['MESS_PRICE_RANGES_TITLE']?>
													<span data-entity="price-ranges-ratio-header">
														(<?=(Loc::getMessage(
															'CT_BCE_CATALOG_RATIO_PRICE',
															array('#RATIO#' => ($useRatio ? $measureRatio : '1').' '.$actualItem['ITEM_MEASURE']['TITLE'])
														))?>)
													</span>
												</div>
												<dl class="product-item-detail-properties" data-entity="price-ranges-body">
													<?
													if ($showRanges)
													{
														foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range)
														{
															if ($range['HASH'] !== 'ZERO-INF')
															{
																$itemPrice = false;

																foreach ($arResult['ITEM_PRICES'] as $itemPrice)
																{
																	if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
																	{
																		break;
																	}
																}

																if ($itemPrice)
																{
																	?>
																	<dt>
																		<?
																		echo Loc::getMessage(
																				'CT_BCE_CATALOG_RANGE_FROM',
																				array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																			).' ';

																		if (is_infinite($range['SORT_TO']))
																		{
																			echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
																		}
																		else
																		{
																			echo Loc::getMessage(
																				'CT_BCE_CATALOG_RANGE_TO',
																				array('#TO#' => $range['SORT_TO'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																			);
																		}
																		?>
																	</dt>
																	<dd><?=($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE'])?></dd>
																	<?
																}
															}
														}
													}
													?>
												</dl>
											</div>
											<?
											unset($showRanges, $useRatio, $itemPrice, $range);
										}

										break;

									case 'quantityLimit':
										if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
										{
											if ($haveOffers)
											{
												?>
												<div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>" style="display: none;">
													<div class="product-item-detail-info-container-title">
														<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
														<span class="product-item-quantity" data-entity="quantity-limit-value"></span>
													</div>
												</div>
												<?
											}
											else
											{
												if (
													$measureRatio
													&& (float)$actualItem['PRODUCT']['QUANTITY'] > 0
													&& $actualItem['CHECK_QUANTITY']
												)
												{
													?>
													<div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>">
														<div class="product-item-detail-info-container-title">
															<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
															<span class="product-item-quantity" data-entity="quantity-limit-value">
																<?
																if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
																{
																	if ((float)$actualItem['PRODUCT']['QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
																	{
																		echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
																	}
																	else
																	{
																		echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
																	}
																}
																else
																{
																	echo $actualItem['PRODUCT']['QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
																}
																?>
															</span>
														</div>
													</div>
													<?
												}
											}
										}

										break;

									case 'quantity':
										if ($arParams['USE_PRODUCT_QUANTITY'])
										{
											?>
											<div class="product-item-detail-info-container" style="<?=(!$actualItem['CAN_BUY'] ? 'display: none;' : '')?>"
												data-entity="quantity-block">
												<div class="product-item-detail-info-container-title"><?=Loc::getMessage('CATALOG_QUANTITY')?></div>
												<div class="product-item-amount">
													<div class="product-item-amount-field-container">
														<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN_ID']?>"></span>
														<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY_ID']?>" type="number"
															value="<?=$price['MIN_QUANTITY']?>">
														<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP_ID']?>"></span>
														<span class="product-item-amount-description-container">
															<span id="<?=$itemIds['QUANTITY_MEASURE']?>">
																<?=$actualItem['ITEM_MEASURE']['TITLE']?>
															</span>
															<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
														</span>
													</div>
												</div>
											</div>
											<?
										}

										break;

									case 'buttons':
										?>
										<div data-entity="main-button-container">
											<div id="<?=$itemIds['BASKET_ACTIONS_ID']?>" style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;">
												<?
												if ($showAddBtn)
												{
													?>
													<div class="product-item-detail-info-container">
														<a class="btn <?=$showButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['ADD_BASKET_LINK']?>"
															href="javascript:void(0);">
															<span><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></span>
														</a>
													</div>
													<?
												}

												if ($showBuyBtn)
												{
													?>
													<div class="product-item-detail-info-container">
														<a class="btn <?=$buyButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['BUY_LINK']?>"
															href="javascript:void(0);">
															<span><?=$arParams['MESS_BTN_BUY']?></span>
														</a>
													</div>
													<?
												}
												?>
											</div>
											<?
											if ($showSubscribe)
											{
												?>
												<div class="product-item-detail-info-container">
													<?
													$APPLICATION->IncludeComponent(
														'bitrix:catalog.product.subscribe',
														'',
														array(
															'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
															'PRODUCT_ID' => $arResult['ID'],
															'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
															'BUTTON_CLASS' => 'btn btn-default product-item-detail-buy-button',
															'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
															'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
														),
														$component,
														array('HIDE_ICONS' => 'Y')
													);
													?>
												</div>
												<?
											}
											?>
											<div class="product-item-detail-info-container">
												<a class="btn btn-link product-item-detail-buy-button" id="<?=$itemIds['NOT_AVAILABLE_MESS']?>"
													href="javascript:void(0)"
													rel="nofollow" style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;">
													<?=$arParams['MESS_NOT_AVAILABLE']?>
												</a>
											</div>
										</div>
										<?
										break;
								}
							}

							if ($arParams['DISPLAY_COMPARE'])
							{
								?>
								<div class="product-item-detail-compare-container">
									<div class="product-item-detail-compare">
										<div class="checkbox">
											<label id="<?=$itemIds['COMPARE_LINK']?>">
												<input type="checkbox" data-entity="compare-checkbox">
												<span data-entity="compare-title"><?=$arParams['MESS_BTN_COMPARE']?></span>
											</label>
										</div>
									</div>
								</div>
								<?
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<?
				if ($haveOffers)
				{
					if ($arResult['OFFER_GROUP'])
					{
						foreach ($arResult['OFFER_GROUP_VALUES'] as $offerId)
						{
							?>
							<span id="<?=$itemIds['OFFER_GROUP'].$offerId?>" style="display: none;">
								<?
								$APPLICATION->IncludeComponent(
									'bitrix:catalog.set.constructor',
									'.default',
									array(
										'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
										'IBLOCK_ID' => $arResult['OFFERS_IBLOCK'],
										'ELEMENT_ID' => $offerId,
										'PRICE_CODE' => $arParams['PRICE_CODE'],
										'BASKET_URL' => $arParams['BASKET_URL'],
										'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
										'CACHE_TYPE' => $arParams['CACHE_TYPE'],
										'CACHE_TIME' => $arParams['CACHE_TIME'],
										'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
										'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
										'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
										'CURRENCY_ID' => $arParams['CURRENCY_ID']
									),
									$component,
									array('HIDE_ICONS' => 'Y')
								);
								?>
							</span>
							<?
						}
					}
				}
				else
				{
					if ($arResult['MODULES']['catalog'] && $arResult['OFFER_GROUP'])
					{
						$APPLICATION->IncludeComponent(
							'bitrix:catalog.set.constructor',
							'.default',
							array(
								'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],
								'ELEMENT_ID' => $arResult['ID'],
								'PRICE_CODE' => $arParams['PRICE_CODE'],
								'BASKET_URL' => $arParams['BASKET_URL'],
								'CACHE_TYPE' => $arParams['CACHE_TYPE'],
								'CACHE_TIME' => $arParams['CACHE_TIME'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
								'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
								'CURRENCY_ID' => $arParams['CURRENCY_ID']
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
					}
				}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<div class="row" id="<?=$itemIds['TABS_ID']?>">
					<div class="col-xs-12">
						<div class="product-item-detail-tabs-container">
							<ul class="product-item-detail-tabs-list">
								<?
								if ($showDescription)
								{
									?>
									<li class="product-item-detail-tab active" data-entity="tab" data-value="description">
										<a href="javascript:void(0);" class="product-item-detail-tab-link">
											<span><?=$arParams['MESS_DESCRIPTION_TAB']?></span>
										</a>
									</li>
									<?
								}

								if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
								{
									?>
									<li class="product-item-detail-tab" data-entity="tab" data-value="properties">
										<a href="javascript:void(0);" class="product-item-detail-tab-link">
											<span><?=$arParams['MESS_PROPERTIES_TAB']?></span>
										</a>
									</li>
									<?
								}

								if ($arParams['USE_COMMENTS'] === 'Y')
								{
									?>
									<li class="product-item-detail-tab" data-entity="tab" data-value="comments">
										<a href="javascript:void(0);" class="product-item-detail-tab-link">
											<span><?=$arParams['MESS_COMMENTS_TAB']?></span>
										</a>
									</li>
									<?
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="row" id="<?=$itemIds['TAB_CONTAINERS_ID']?>">
					<div class="col-xs-12">
						<?
						if ($showDescription)
						{
							?>
							<div class="product-item-detail-tab-content active" data-entity="tab-container" data-value="description"
								itemprop="description">
								<?
								if (
									$arResult['PREVIEW_TEXT'] != ''
									&& (
										$arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'S'
										|| ($arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'E' && $arResult['DETAIL_TEXT'] == '')
									)
								)
								{
									echo $arResult['PREVIEW_TEXT_TYPE'] === 'html' ? $arResult['PREVIEW_TEXT'] : '<p>'.$arResult['PREVIEW_TEXT'].'</p>';
								}

								if ($arResult['DETAIL_TEXT'] != '')
								{
									echo $arResult['DETAIL_TEXT_TYPE'] === 'html' ? $arResult['DETAIL_TEXT'] : '<p>'.$arResult['DETAIL_TEXT'].'</p>';
								}
								?>
							</div>
							<?
						}

						if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
						{
							?>
							<div class="product-item-detail-tab-content" data-entity="tab-container" data-value="properties">
								<?
								if (!empty($arResult['DISPLAY_PROPERTIES']))
								{
									?>
									<dl class="product-item-detail-properties">
										<?
										foreach ($arResult['DISPLAY_PROPERTIES'] as $property)
										{
											?>
											<dt><?=$property['NAME']?></dt>
											<dd><?=(
												is_array($property['DISPLAY_VALUE'])
													? implode(' / ', $property['DISPLAY_VALUE'])
													: $property['DISPLAY_VALUE']
												)?>
											</dd>
											<?
										}
										unset($property);
										?>
									</dl>
									<?
								}

								if ($arResult['SHOW_OFFERS_PROPS'])
								{
									?>
									<dl class="product-item-detail-properties" id="<?=$itemIds['DISPLAY_PROP_DIV']?>"></dl>
									<?
								}
								?>
							</div>
							<?
						}

						if ($arParams['USE_COMMENTS'] === 'Y')
						{
							?>
							<div class="product-item-detail-tab-content" data-entity="tab-container" data-value="comments" style="display: none;">
								<?
								$componentCommentsParams = array(
									'ELEMENT_ID' => $arResult['ID'],
									'ELEMENT_CODE' => '',
									'IBLOCK_ID' => $arParams['IBLOCK_ID'],
									'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
									'URL_TO_COMMENT' => '',
									'WIDTH' => '',
									'COMMENTS_COUNT' => '5',
									'BLOG_USE' => $arParams['BLOG_USE'],
									'FB_USE' => $arParams['FB_USE'],
									'FB_APP_ID' => $arParams['FB_APP_ID'],
									'VK_USE' => $arParams['VK_USE'],
									'VK_API_ID' => $arParams['VK_API_ID'],
									'CACHE_TYPE' => $arParams['CACHE_TYPE'],
									'CACHE_TIME' => $arParams['CACHE_TIME'],
									'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
									'BLOG_TITLE' => '',
									'BLOG_URL' => $arParams['BLOG_URL'],
									'PATH_TO_SMILE' => '',
									'EMAIL_NOTIFY' => $arParams['BLOG_EMAIL_NOTIFY'],
									'AJAX_POST' => 'Y',
									'SHOW_SPAM' => 'Y',
									'SHOW_RATING' => 'N',
									'FB_TITLE' => '',
									'FB_USER_ADMIN_ID' => '',
									'FB_COLORSCHEME' => 'light',
									'FB_ORDER_BY' => 'reverse_time',
									'VK_TITLE' => '',
									'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME']
								);
								if(isset($arParams["USER_CONSENT"]))
									$componentCommentsParams["USER_CONSENT"] = $arParams["USER_CONSENT"];
								if(isset($arParams["USER_CONSENT_ID"]))
									$componentCommentsParams["USER_CONSENT_ID"] = $arParams["USER_CONSENT_ID"];
								if(isset($arParams["USER_CONSENT_IS_CHECKED"]))
									$componentCommentsParams["USER_CONSENT_IS_CHECKED"] = $arParams["USER_CONSENT_IS_CHECKED"];
								if(isset($arParams["USER_CONSENT_IS_LOADED"]))
									$componentCommentsParams["USER_CONSENT_IS_LOADED"] = $arParams["USER_CONSENT_IS_LOADED"];
								$APPLICATION->IncludeComponent(
									'bitrix:catalog.comments',
									'',
									$componentCommentsParams,
									$component,
									array('HIDE_ICONS' => 'Y')
								);
								?>
							</div>
							<?
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-md-3">
				<div>
					<?
					if ($arParams['BRAND_USE'] === 'Y')
					{
						$APPLICATION->IncludeComponent(
							'bitrix:catalog.brandblock',
							'.default',
							array(
								'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],
								'ELEMENT_ID' => $arResult['ID'],
								'ELEMENT_CODE' => '',
								'PROP_CODE' => $arParams['BRAND_PROP_CODE'],
								'CACHE_TYPE' => $arParams['CACHE_TYPE'],
								'CACHE_TIME' => $arParams['CACHE_TIME'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'WIDTH' => '',
								'HEIGHT' => ''
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
					}
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<?
				if ($arResult['CATALOG'] && $actualItem['CAN_BUY'] && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
				{
					$APPLICATION->IncludeComponent(
						'bitrix:sale.prediction.product.detail',
						'.default',
						array(
							'BUTTON_ID' => $showBuyBtn ? $itemIds['BUY_LINK'] : $itemIds['ADD_BASKET_LINK'],
							'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
							'POTENTIAL_PRODUCT_TO_BUY' => array(
								'ID' => isset($arResult['ID']) ? $arResult['ID'] : null,
								'MODULE' => isset($arResult['MODULE']) ? $arResult['MODULE'] : 'catalog',
								'PRODUCT_PROVIDER_CLASS' => isset($arResult['~PRODUCT_PROVIDER_CLASS']) ? $arResult['~PRODUCT_PROVIDER_CLASS'] : '\Bitrix\Catalog\Product\CatalogProvider',
								'QUANTITY' => isset($arResult['QUANTITY']) ? $arResult['QUANTITY'] : null,
								'IBLOCK_ID' => isset($arResult['IBLOCK_ID']) ? $arResult['IBLOCK_ID'] : null,

								'PRIMARY_OFFER_ID' => isset($arResult['OFFERS'][0]['ID']) ? $arResult['OFFERS'][0]['ID'] : null,
								'SECTION' => array(
									'ID' => isset($arResult['SECTION']['ID']) ? $arResult['SECTION']['ID'] : null,
									'IBLOCK_ID' => isset($arResult['SECTION']['IBLOCK_ID']) ? $arResult['SECTION']['IBLOCK_ID'] : null,
									'LEFT_MARGIN' => isset($arResult['SECTION']['LEFT_MARGIN']) ? $arResult['SECTION']['LEFT_MARGIN'] : null,
									'RIGHT_MARGIN' => isset($arResult['SECTION']['RIGHT_MARGIN']) ? $arResult['SECTION']['RIGHT_MARGIN'] : null,
								),
							)
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
				}

				if ($arResult['CATALOG'] && $arParams['USE_GIFTS_DETAIL'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
				{
					?>
					<div data-entity="parent-container">
						<?
						if (!isset($arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y')
						{
							?>
							<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
								<?=($arParams['GIFTS_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFT_BLOCK_TITLE_DEFAULT'))?>
							</div>
							<?
						}

						CBitrixComponent::includeComponentClass('bitrix:sale.products.gift');
						$APPLICATION->IncludeComponent(
							'bitrix:sale.products.gift',
							'.default',
							array(
								'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
								'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
								'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],

								'PRODUCT_ROW_VARIANTS' => "",
								'PAGE_ELEMENT_COUNT' => 0,
								'DEFERRED_PRODUCT_ROW_VARIANTS' => \Bitrix\Main\Web\Json::encode(
									SaleProductsGiftComponent::predictRowVariants(
										$arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
										$arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT']
									)
								),
								'DEFERRED_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],

								'SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
								'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
								'SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
								'PRODUCT_DISPLAY_MODE' => 'Y',
								'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],
								'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
								'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
								'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',

								'TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],

								'LABEL_PROP_'.$arParams['IBLOCK_ID'] => array(),
								'LABEL_PROP_MOBILE_'.$arParams['IBLOCK_ID'] => array(),
								'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],

								'ADD_TO_BASKET_ACTION' => (isset($arParams['ADD_TO_BASKET_ACTION']) ? $arParams['ADD_TO_BASKET_ACTION'] : ''),
								'MESS_BTN_BUY' => $arParams['~GIFTS_MESS_BTN_BUY'],
								'MESS_BTN_ADD_TO_BASKET' => $arParams['~GIFTS_MESS_BTN_BUY'],
								'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
								'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],

								'SHOW_PRODUCTS_'.$arParams['IBLOCK_ID'] => 'Y',
								'PROPERTY_CODE_'.$arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE'],
								'PROPERTY_CODE_MOBILE'.$arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE_MOBILE'],
								'PROPERTY_CODE_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
								'OFFER_TREE_PROPS_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
								'CART_PROPERTIES_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFERS_CART_PROPERTIES'],
								'ADDITIONAL_PICT_PROP_'.$arParams['IBLOCK_ID'] => (isset($arParams['ADD_PICT_PROP']) ? $arParams['ADD_PICT_PROP'] : ''),
								'ADDITIONAL_PICT_PROP_'.$arResult['OFFERS_IBLOCK'] => (isset($arParams['OFFER_ADD_PICT_PROP']) ? $arParams['OFFER_ADD_PICT_PROP'] : ''),

								'HIDE_NOT_AVAILABLE' => 'Y',
								'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
								'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
								'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
								'PRICE_CODE' => $arParams['PRICE_CODE'],
								'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
								'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
								'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
								'BASKET_URL' => $arParams['BASKET_URL'],
								'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
								'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
								'PARTIAL_PRODUCT_PROPERTIES' => $arParams['PARTIAL_PRODUCT_PROPERTIES'],
								'USE_PRODUCT_QUANTITY' => 'N',
								'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'POTENTIAL_PRODUCT_TO_BUY' => array(
									'ID' => isset($arResult['ID']) ? $arResult['ID'] : null,
									'MODULE' => isset($arResult['MODULE']) ? $arResult['MODULE'] : 'catalog',
									'PRODUCT_PROVIDER_CLASS' => isset($arResult['~PRODUCT_PROVIDER_CLASS']) ? $arResult['~PRODUCT_PROVIDER_CLASS'] : '\Bitrix\Catalog\Product\CatalogProvider',
									'QUANTITY' => isset($arResult['QUANTITY']) ? $arResult['QUANTITY'] : null,
									'IBLOCK_ID' => isset($arResult['IBLOCK_ID']) ? $arResult['IBLOCK_ID'] : null,

									'PRIMARY_OFFER_ID' => isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'])
										? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID']
										: null,
									'SECTION' => array(
										'ID' => isset($arResult['SECTION']['ID']) ? $arResult['SECTION']['ID'] : null,
										'IBLOCK_ID' => isset($arResult['SECTION']['IBLOCK_ID']) ? $arResult['SECTION']['IBLOCK_ID'] : null,
										'LEFT_MARGIN' => isset($arResult['SECTION']['LEFT_MARGIN']) ? $arResult['SECTION']['LEFT_MARGIN'] : null,
										'RIGHT_MARGIN' => isset($arResult['SECTION']['RIGHT_MARGIN']) ? $arResult['SECTION']['RIGHT_MARGIN'] : null,
									),
								),

								'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
								'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
								'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
						?>
					</div>
					<?
				}

				if ($arResult['CATALOG'] && $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
				{
					?>
					<div data-entity="parent-container">
						<?
						if (!isset($arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y')
						{
							?>
							<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
								<?=($arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFTS_MAIN_BLOCK_TITLE_DEFAULT'))?>
							</div>
							<?
						}

						$APPLICATION->IncludeComponent(
							'bitrix:sale.gift.main.products',
							'.default',
							array(
								'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
								'PAGE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
								'LINE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
								'HIDE_BLOCK_TITLE' => 'Y',
								'BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],

								'OFFERS_FIELD_CODE' => $arParams['OFFERS_FIELD_CODE'],
								'OFFERS_PROPERTY_CODE' => $arParams['OFFERS_PROPERTY_CODE'],

								'AJAX_MODE' => $arParams['AJAX_MODE'],
								'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],

								'ELEMENT_SORT_FIELD' => 'ID',
								'ELEMENT_SORT_ORDER' => 'DESC',
								//'ELEMENT_SORT_FIELD2' => $arParams['ELEMENT_SORT_FIELD2'],
								//'ELEMENT_SORT_ORDER2' => $arParams['ELEMENT_SORT_ORDER2'],
								'FILTER_NAME' => 'searchFilter',
								'SECTION_URL' => $arParams['SECTION_URL'],
								'DETAIL_URL' => $arParams['DETAIL_URL'],
								'BASKET_URL' => $arParams['BASKET_URL'],
								'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
								'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
								'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],

								'CACHE_TYPE' => $arParams['CACHE_TYPE'],
								'CACHE_TIME' => $arParams['CACHE_TIME'],

								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'SET_TITLE' => $arParams['SET_TITLE'],
								'PROPERTY_CODE' => $arParams['PROPERTY_CODE'],
								'PRICE_CODE' => $arParams['PRICE_CODE'],
								'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
								'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],

								'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
								'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
								'CURRENCY_ID' => $arParams['CURRENCY_ID'],
								'HIDE_NOT_AVAILABLE' => 'Y',
								'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
								'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
								'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],

								'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
								'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
								'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',

								'ADD_PICT_PROP' => (isset($arParams['ADD_PICT_PROP']) ? $arParams['ADD_PICT_PROP'] : ''),
								'LABEL_PROP' => (isset($arParams['LABEL_PROP']) ? $arParams['LABEL_PROP'] : ''),
								'LABEL_PROP_MOBILE' => (isset($arParams['LABEL_PROP_MOBILE']) ? $arParams['LABEL_PROP_MOBILE'] : ''),
								'LABEL_PROP_POSITION' => (isset($arParams['LABEL_PROP_POSITION']) ? $arParams['LABEL_PROP_POSITION'] : ''),
								'OFFER_ADD_PICT_PROP' => (isset($arParams['OFFER_ADD_PICT_PROP']) ? $arParams['OFFER_ADD_PICT_PROP'] : ''),
								'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : ''),
								'SHOW_DISCOUNT_PERCENT' => (isset($arParams['SHOW_DISCOUNT_PERCENT']) ? $arParams['SHOW_DISCOUNT_PERCENT'] : ''),
								'DISCOUNT_PERCENT_POSITION' => (isset($arParams['DISCOUNT_PERCENT_POSITION']) ? $arParams['DISCOUNT_PERCENT_POSITION'] : ''),
								'SHOW_OLD_PRICE' => (isset($arParams['SHOW_OLD_PRICE']) ? $arParams['SHOW_OLD_PRICE'] : ''),
								'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
								'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
								'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
								'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
								'ADD_TO_BASKET_ACTION' => (isset($arParams['ADD_TO_BASKET_ACTION']) ? $arParams['ADD_TO_BASKET_ACTION'] : ''),
								'SHOW_CLOSE_POPUP' => (isset($arParams['SHOW_CLOSE_POPUP']) ? $arParams['SHOW_CLOSE_POPUP'] : ''),
								'DISPLAY_COMPARE' => (isset($arParams['DISPLAY_COMPARE']) ? $arParams['DISPLAY_COMPARE'] : ''),
								'COMPARE_PATH' => (isset($arParams['COMPARE_PATH']) ? $arParams['COMPARE_PATH'] : ''),
							)
							+ array(
								'OFFER_ID' => empty($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'])
									? $arResult['ID']
									: $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'],
								'SECTION_ID' => $arResult['SECTION']['ID'],
								'ELEMENT_ID' => $arResult['ID'],

								'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
								'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
								'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
						?>
					</div>
					<?
				}
				?>
			</div>
		</div>
	</div>
	<!--Small Card-->
	<div class="product-item-detail-short-card-fixed hidden-xs" id="<?=$itemIds['SMALL_CARD_PANEL_ID']?>">
		<div class="product-item-detail-short-card-content-container">
			<table>
				<tr>
					<td rowspan="2" class="product-item-detail-short-card-image">
						<img src="" style="height: 65px;" data-entity="panel-picture">
					</td>
					<td class="product-item-detail-short-title-container" data-entity="panel-title">
						<span class="product-item-detail-short-title-text"><?=$name?></span>
					</td>
					<td rowspan="2" class="product-item-detail-short-card-price">
						<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
						{
							?>
							<div class="product-item-detail-price-old" style="display: <?=($showDiscount ? '' : 'none')?>;"
								data-entity="panel-old-price">
								<?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
							</div>
							<?
						}
						?>
						<div class="product-item-detail-price-current" data-entity="panel-price">
							<?=$price['PRINT_RATIO_PRICE']?>
						</div>
					</td>
					<?
					if ($showAddBtn)
					{
						?>
						<td rowspan="2" class="product-item-detail-short-card-btn"
							style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;"
							data-entity="panel-add-button">
							<a class="btn <?=$showButtonClassName?> product-item-detail-buy-button"
								id="<?=$itemIds['ADD_BASKET_LINK']?>"
								href="javascript:void(0);">
								<span><?=$arParams['MESS_BTN_ADD_TO_BASKET']?></span>
							</a>
						</td>
						<?
					}

					if ($showBuyBtn)
					{
						?>
						<td rowspan="2" class="product-item-detail-short-card-btn"
							style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;"
							data-entity="panel-buy-button">
							<a class="btn <?=$buyButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['BUY_LINK']?>"
								href="javascript:void(0);">
								<span><?=$arParams['MESS_BTN_BUY']?></span>
							</a>
						</td>
						<?
					}
					?>
					<td rowspan="2" class="product-item-detail-short-card-btn"
						style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;"
						data-entity="panel-not-available-button">
						<a class="btn btn-link product-item-detail-buy-button" href="javascript:void(0)"
							rel="nofollow">
							<?=$arParams['MESS_NOT_AVAILABLE']?>
						</a>
					</td>
				</tr>
				<?
				if ($haveOffers)
				{
					?>
					<tr>
						<td>
							<div class="product-item-selected-scu-container" data-entity="panel-sku-container">
								<?
								$i = 0;

								foreach ($arResult['SKU_PROPS'] as $skuProperty)
								{
									if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
									{
										continue;
									}

									$propertyId = $skuProperty['ID'];

									foreach ($skuProperty['VALUES'] as $value)
									{
										$value['NAME'] = htmlspecialcharsbx($value['NAME']);
										if ($skuProperty['SHOW_MODE'] === 'PICT')
										{
											?>
											<div class="product-item-selected-scu product-item-selected-scu-color selected"
												title="<?=$value['NAME']?>"
												style="background-image: url('<?=$value['PICT']['SRC']?>'); display: none;"
												data-sku-line="<?=$i?>"
												data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
												data-onevalue="<?=$value['ID']?>">
											</div>
											<?
										}
										else
										{
											?>
											<div class="product-item-selected-scu product-item-selected-scu-text selected"
												title="<?=$value['NAME']?>"
												style="display: none;"
												data-sku-line="<?=$i?>"
												data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
												data-onevalue="<?=$value['ID']?>">
												<?=$value['NAME']?>
											</div>
											<?
										}
									}

									$i++;
								}
								?>
							</div>
						</td>
					</tr>
					<?
				}
				?>
			</table>
		</div>
	</div>
	<!--Top tabs-->
	<div class="product-item-detail-tabs-container-fixed hidden-xs" id="<?=$itemIds['TABS_PANEL_ID']?>">
		<ul class="product-item-detail-tabs-list">
			<?
			if ($showDescription)
			{
				?>
				<li class="product-item-detail-tab active" data-entity="tab" data-value="description">
					<a href="javascript:void(0);" class="product-item-detail-tab-link">
						<span><?=$arParams['MESS_DESCRIPTION_TAB']?></span>
					</a>
				</li>
				<?
			}

			if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
			{
				?>
				<li class="product-item-detail-tab" data-entity="tab" data-value="properties">
					<a href="javascript:void(0);" class="product-item-detail-tab-link">
						<span><?=$arParams['MESS_PROPERTIES_TAB']?></span>
					</a>
				</li>
				<?
			}

			if ($arParams['USE_COMMENTS'] === 'Y')
			{
				?>
				<li class="product-item-detail-tab" data-entity="tab" data-value="comments">
					<a href="javascript:void(0);" class="product-item-detail-tab-link">
						<span><?=$arParams['MESS_COMMENTS_TAB']?></span>
					</a>
				</li>
				<?
			}
			?>
		</ul>
	</div>

	<meta itemprop="name" content="<?=$name?>" />
	<meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
	<?
	if ($haveOffers)
	{
		foreach ($arResult['JS_OFFERS'] as $offer)
		{
			$currentOffersList = array();

			if (!empty($offer['TREE']) && is_array($offer['TREE']))
			{
				foreach ($offer['TREE'] as $propName => $skuId)
				{
					$propId = (int)substr($propName, 5);

					foreach ($skuProps as $prop)
					{
						if ($prop['ID'] == $propId)
						{
							foreach ($prop['VALUES'] as $propId => $propValue)
							{
								if ($propId == $skuId)
								{
									$currentOffersList[] = $propValue['NAME'];
									break;
								}
							}
						}
					}
				}
			}

			$offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
			?>
			<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				<meta itemprop="sku" content="<?=htmlspecialcharsbx(implode('/', $currentOffersList))?>" />
				<meta itemprop="price" content="<?=$offerPrice['RATIO_PRICE']?>" />
				<meta itemprop="priceCurrency" content="<?=$offerPrice['CURRENCY']?>" />
				<link itemprop="availability" href="http://schema.org/<?=($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
			</span>
			<?
		}

		unset($offerPrice, $currentOffersList);
	}
	else
	{
		?>
		<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?=$price['RATIO_PRICE']?>" />
			<meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
			<link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
		</span>
		<?
	}
	?>
</div>
<? } ?>
<?
if ($haveOffers)
{
	$offerIds = array();
	$offerCodes = array();

	$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

	foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer)
	{
		$offerIds[] = (int)$jsOffer['ID'];
		$offerCodes[] = $jsOffer['CODE'];

		$fullOffer = $arResult['OFFERS'][$ind];
		$measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

		$strAllProps = '';
		$strMainProps = '';
		$strPriceRangesRatio = '';
		$strPriceRanges = '';

		if ($arResult['SHOW_OFFERS_PROPS'])
		{
			if (!empty($jsOffer['DISPLAY_PROPERTIES']))
			{
				foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property)
				{
					$current = $property['NAME'].': <span>'.(
						is_array($property['VALUE'])
							? implode(' / ', $property['VALUE'])
							: $property['VALUE']
						).'</span>';
					$strAllProps .= $current;

					if (isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][$property['CODE']]))
					{
						$strMainProps .= $current;
					}
				}

				unset($current);
			}
		}

		if ($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1)
		{
			$strPriceRangesRatio = '('.Loc::getMessage(
					'CT_BCE_CATALOG_RATIO_PRICE',
					array('#RATIO#' => ($useRatio
							? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
							: '1'
						).' '.$measureName)
				).')';

			foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range)
			{
				if ($range['HASH'] !== 'ZERO-INF')
				{
					$itemPrice = false;

					foreach ($jsOffer['ITEM_PRICES'] as $itemPrice)
					{
						if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
						{
							break;
						}
					}

					if ($itemPrice)
					{
						$strPriceRanges .= '<dt>'.Loc::getMessage(
								'CT_BCE_CATALOG_RANGE_FROM',
								array('#FROM#' => $range['SORT_FROM'].' '.$measureName)
							).' ';

						if (is_infinite($range['SORT_TO']))
						{
							$strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
						}
						else
						{
							$strPriceRanges .= Loc::getMessage(
								'CT_BCE_CATALOG_RANGE_TO',
								array('#TO#' => $range['SORT_TO'].' '.$measureName)
							);
						}

						$strPriceRanges .= '</dt><dd>'.($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']).'</dd>';
					}
				}
			}

			unset($range, $itemPrice);
		}

		$jsOffer['DISPLAY_PROPERTIES'] = $strAllProps;
		$jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
		$jsOffer['PRICE_RANGES_RATIO_HTML'] = $strPriceRangesRatio;
		$jsOffer['PRICE_RANGES_HTML'] = $strPriceRanges;
	}

	$templateData['OFFER_IDS'] = $offerIds;
	$templateData['OFFER_CODES'] = $offerCodes;
	unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

	$jsParams = array(
		'CONFIG' => array(
			'USE_CATALOG' => $arResult['CATALOG'],
			'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE' => true,
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
			'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
			'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
			'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
			'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
			'OFFER_GROUP' => $arResult['OFFER_GROUP'],
			'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
			'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
			'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
			'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
			'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
			'USE_STICKERS' => true,
			'USE_SUBSCRIBE' => $showSubscribe,
			'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
			'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
			'ALT' => $alt,
			'TITLE' => $title,
			'MAGNIFIER_ZOOM_PERCENT' => 200,
			'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
			'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
			'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
				? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
				: null
		),
		'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
		'VISUAL' => $itemIds,
		'DEFAULT_PICTURE' => array(
			'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
			'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
		),
		'PRODUCT' => array(
			'ID' => $arResult['ID'],
			'ACTIVE' => $arResult['ACTIVE'],
			'NAME' => $arResult['~NAME'],
			'CATEGORY' => $arResult['CATEGORY_PATH']
		),
		'BASKET' => array(
			'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'BASKET_URL' => $arParams['BASKET_URL'],
			'SKU_PROPS' => $arResult['OFFERS_PROP_CODES'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
		),
		'OFFERS' => $arResult['JS_OFFERS'],
		'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
		'TREE_PROPS' => $skuProps
	);
}
else
{
	$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
	if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties)
	{
		?>
		<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
			<?
			if (!empty($arResult['PRODUCT_PROPERTIES_FILL']))
			{
				foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo)
				{
					?>
					<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]" value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
					<?
					unset($arResult['PRODUCT_PROPERTIES'][$propId]);
				}
			}

			$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
			if (!$emptyProductProperties)
			{
				?>
				<table>
					<?
					foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo)
					{
						?>
						<tr>
							<td><?=$arResult['PROPERTIES'][$propId]['NAME']?></td>
							<td>
								<?
								if (
									$arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
									&& $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
								)
								{
									foreach ($propInfo['VALUES'] as $valueId => $value)
									{
										?>
										<label>
											<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
												value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"checked"' : '')?>>
											<?=$value?>
										</label>
										<br>
										<?
									}
								}
								else
								{
									?>
									<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]">
										<?
										foreach ($propInfo['VALUES'] as $valueId => $value)
										{
											?>
											<option value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"selected"' : '')?>>
												<?=$value?>
											</option>
											<?
										}
										?>
									</select>
									<?
								}
								?>
							</td>
						</tr>
						<?
					}
					?>
				</table>
				<?
			}
			?>
		</div>
		<?
	}

	$jsParams = array(
		'CONFIG' => array(
			'USE_CATALOG' => $arResult['CATALOG'],
			'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
			'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
			'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
			'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
			'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
			'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
			'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
			'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
			'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
			'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
			'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
			'USE_STICKERS' => true,
			'USE_SUBSCRIBE' => $showSubscribe,
			'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
			'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
			'ALT' => $alt,
			'TITLE' => $title,
			'MAGNIFIER_ZOOM_PERCENT' => 200,
			'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
			'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
			'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
				? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
				: null
		),
		'VISUAL' => $itemIds,
		'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
		'PRODUCT' => array(
			'ID' => $arResult['ID'],
			'ACTIVE' => $arResult['ACTIVE'],
			'PICT' => reset($arResult['MORE_PHOTO']),
			'NAME' => $arResult['~NAME'],
			'SUBSCRIPTION' => true,
			'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
			'ITEM_PRICES' => $arResult['ITEM_PRICES'],
			'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
			'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
			'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
			'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
			'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
			'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
			'SLIDER' => $arResult['MORE_PHOTO'],
			'CAN_BUY' => $arResult['CAN_BUY'],
			'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
			'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
			'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
			'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
			'CATEGORY' => $arResult['CATEGORY_PATH']
		),
		'BASKET' => array(
			'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
			'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
			'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
			'EMPTY_PROPS' => $emptyProductProperties,
			'BASKET_URL' => $arParams['BASKET_URL'],
			'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
			'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
		)
	);
	unset($emptyProductProperties);
}

if ($arParams['DISPLAY_COMPARE'])
{
	$jsParams['COMPARE'] = array(
		'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
		'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
		'COMPARE_PATH' => $arParams['COMPARE_PATH']
	);
}
?>
<script>
	BX.message({
		ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
		BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});

	var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
</script>
<?
unset($actualItem, $itemIds, $jsParams);