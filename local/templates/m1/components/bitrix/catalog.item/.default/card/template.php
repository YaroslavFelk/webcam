<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
//echo '<pre>',var_dump($item['PREVIEW_PICTURE_SECOND']),'</pre>';
$showSubscribe = false;
?>

<div class="catalog_item_block">
    <div class="catalog_marker">
        <?
        if (!empty($item['LABEL_ARRAY_VALUE']))
        {
            foreach ($item['LABEL_ARRAY_VALUE'] as $code => $value)
            {
                ?>
                <div class="marker_hit"<?=(!isset($item['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>><div>
                    <?=$value?>
                    </div></div>
                <?
            }
        }
        if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
        {
            ?>
            <div class="marker_discount" id="<?=$itemIds['DSC_PERC']?>"
                <?=($price['PERCENT'] > 0 ? '' : 'style="display: none;"')?>><div>
                <?=-$price['PERCENT']?>%
                </div></div>
            <?
        }
        ?>
<!--        <div class="marker_hit">Хит</div>-->
<!--        <div class="marker_discount">-20%</div>-->
<!--        <div class="marker_new">New</div>-->
    </div>
    <div class="catalog_action">
        <div class="add_to_favorite"><svg width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.1924 0C16.017 0 13.8642 0.990406 12.4994 2.50184C11.1352 0.990406 8.98246 0 6.80704 0C3.05353 0 0 3.05522 0 6.81081C0 8.29841 0.47082 9.71165 1.36141 10.8979C1.43458 10.9955 1.52364 11.0715 1.61837 11.1385L9.42208 19.5039L9.42265 19.5045C10.1521 20.4148 11.2566 20.9642 12.4223 20.9938C12.4416 20.9955 12.4597 21 12.4796 21C12.4864 21 12.4932 20.9989 12.5 20.9989C12.5068 20.9989 12.5136 21 12.5204 21C12.5403 21 12.5584 20.9955 12.5783 20.9943C13.7434 20.9648 14.8473 20.4154 15.5768 19.5056C15.5774 19.505 15.5779 19.5045 15.5785 19.5039L23.3822 11.1379C23.4769 11.071 23.566 10.9949 23.6392 10.8973C24.5292 9.71108 25 8.29784 25 6.81081C24.9994 3.05522 21.9459 0 18.1924 0ZM6.80704 2.27027C8.74875 2.27027 10.7926 3.4667 11.4602 4.99459C11.4704 5.01843 11.4858 5.0383 11.4977 5.061C11.5169 5.09846 11.5362 5.13592 11.5595 5.17111C11.5793 5.20062 11.602 5.2273 11.6247 5.25511C11.6491 5.28462 11.6724 5.3147 11.6996 5.34195C11.7263 5.36862 11.7552 5.39132 11.7841 5.41516C11.8119 5.43787 11.8391 5.4617 11.8698 5.48214C11.9044 5.50541 11.9407 5.52357 11.9776 5.54286C12.0008 5.55478 12.0212 5.57068 12.0451 5.58089C12.0519 5.58373 12.0592 5.58487 12.0661 5.5877C12.1046 5.6036 12.1449 5.61438 12.1852 5.6263C12.2169 5.63538 12.2487 5.6473 12.2805 5.65354C12.3173 5.66092 12.3548 5.66262 12.3928 5.66603C12.4285 5.66943 12.4643 5.67511 12.4994 5.67511C12.5352 5.67511 12.5703 5.66943 12.6061 5.66603C12.6441 5.66262 12.6815 5.66092 12.719 5.65354C12.7502 5.6473 12.7808 5.63595 12.8114 5.62687C12.8528 5.61495 12.8942 5.6036 12.9339 5.58714C12.9402 5.5843 12.947 5.58373 12.9532 5.58089C12.9759 5.57068 12.9952 5.55649 13.0173 5.54514C13.0559 5.52527 13.0939 5.50597 13.1302 5.48157C13.1597 5.4617 13.1852 5.43957 13.2125 5.41743C13.2425 5.39303 13.2726 5.36919 13.2998 5.34195C13.3265 5.31527 13.3492 5.28632 13.373 5.25738C13.3957 5.22957 13.419 5.20232 13.4394 5.17224C13.4626 5.13705 13.4813 5.10016 13.5006 5.0627C13.5125 5.04 13.5279 5.01957 13.5381 4.99573C14.2057 3.46784 16.2495 2.2714 18.1913 2.2714C20.6934 2.2714 22.7293 4.3084 22.7293 6.81195C22.7293 7.74957 22.44 8.63781 21.9079 9.40062C21.8926 9.41538 21.8744 9.42673 21.8597 9.44262L13.9181 17.9561C13.9034 17.972 13.8932 17.9908 13.879 18.0072C13.8665 18.022 13.8523 18.0333 13.8404 18.0492C13.5194 18.4766 13.0309 18.7218 12.4983 18.728C11.9662 18.7218 11.4778 18.4766 11.1567 18.0492C11.1448 18.0333 11.1295 18.0214 11.117 18.0061C11.1034 17.9896 11.0938 17.972 11.079 17.9561L3.13748 9.44262C3.12216 9.42616 3.10458 9.41481 3.0887 9.40005C2.55831 8.63668 2.26901 7.74843 2.26901 6.81081C2.26901 4.30727 4.30489 2.27027 6.80704 2.27027Z"/>
            </svg>
        </div>
        <?php
        if (
            $arParams['DISPLAY_COMPARE']
            && (!$haveOffers || $arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
        )
        {
            ?>
        <div class="add_to_compare" id="<?=$itemIds['COMPARE_LINK']?>"><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.95 18.9H2.1V1.05C2.1 0.4725 1.6275 0 1.05 0C0.472499 0 0 0.4725 0 1.05V19.95C0 20.5275 0.472499 21 1.05 21H19.95C20.5275 21 21 20.5275 21 19.95C21 19.3725 20.5275 18.9 19.95 18.9Z"/>
                <path d="M5.25 16.8C5.8275 16.8 6.3 16.3275 6.3 15.75V9.45C6.3 8.8725 5.8275 8.4 5.25 8.4C4.6725 8.4 4.2 8.8725 4.2 9.45V15.75C4.2 16.3275 4.6725 16.8 5.25 16.8Z"/>
                <path d="M9.45 16.8C10.0275 16.8 10.5 16.3275 10.5 15.75V3.15C10.5 2.5725 10.0275 2.1 9.45 2.1C8.8725 2.1 8.4 2.5725 8.4 3.15V15.75C8.4 16.3275 8.8725 16.8 9.45 16.8Z"/>
                <path d="M13.65 16.8C14.2275 16.8 14.7 16.3275 14.7 15.75V6.825C14.7 6.2475 14.2275 5.775 13.65 5.775C13.0725 5.775 12.6 6.2475 12.6 6.825V15.75C12.6 16.3275 13.0725 16.8 13.65 16.8Z"/>
                <path d="M17.85 16.8C18.4275 16.8 18.9 16.3275 18.9 15.75V2.1C18.9 1.5225 18.4275 1.05 17.85 1.05C17.2725 1.05 16.8 1.5225 16.8 2.1V15.75C16.8 16.3275 17.2725 16.8 17.85 16.8Z"/>
            </svg></div>
            <?
        }
        ?>
    </div>
    <div class="catalog_quick_view"><a class="btn_white" id="<?=$itemIds['QUICK_SHOW']?>"><?= Loc::getMessage("PK_CATALOG_FAST_VIEW") ?></a></div>
    <a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>" class="catalog_item_img"  id="<?=$itemIds['PICT']?>" style="background-image: url('<?=$item['PREVIEW_PICTURE_SECOND']['SRC'];?>')">
<!--        <img src="--><?//=$item['PREVIEW_PICTURE_SECOND']['SRC'];?><!--">-->
    </a>
    <a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>" class="catalog_item_title"><?=$productTitle?></a>
    <div class="catalog_instock_art">
    <?php
    if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
    {
        if ($haveOffers)
        {
            if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
            {
                ?>
                <div class="product-item-info-container product-item-hidden" id="<?=$itemIds['QUANTITY_LIMIT']?>"
                     style="display: none;" data-entity="quantity-limit-block">
                    <div class="product-item-info-container-title">
                        <span class="product-item-quantity" data-entity="quantity-limit-value"></span>
                    </div>
                </div>
                <?
            }
        }
        else
        {
            if (
                $measureRatio
                && (float)$actualItem['CATALOG_QUANTITY'] > 0
                && $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
                && $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
            )
            {
                ?>
                <div class="product-item-info-container product-item-hidden" id="<?=$itemIds['QUANTITY_LIMIT']?>">
                    <div class="product-item-info-container-title">
                        <?//$arParams['MESS_SHOW_MAX_QUANTITY']?>
                        <span class="product-item-quantity">
                            <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.994 1.53938L13.7225 0.262794C13.5481 0.08762 13.3361 0 13.0869 0C12.8374 0 12.6253 0.08762 12.451 0.262794L6.31744 6.42996L3.56859 3.66081C3.39404 3.48557 3.18213 3.39805 2.93288 3.39805C2.68347 3.39805 2.47156 3.48557 2.29701 3.66081L1.02546 4.93743C0.850913 5.11264 0.763672 5.32546 0.763672 5.57582C0.763672 5.82599 0.850913 6.03901 1.02546 6.21418L4.41002 9.6121L5.68167 10.8887C5.85612 11.064 6.0681 11.1515 6.31744 11.1515C6.56669 11.1515 6.77867 11.0638 6.95321 10.8887L8.22483 9.6121L14.994 2.81607C15.1684 2.64083 15.2558 2.42805 15.2558 2.17768C15.256 1.92744 15.1684 1.71462 14.994 1.53938Z" />
</svg><?
                                            if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
                                            {
                                                if ((float)$actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
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
                                                echo $actualItem['CATALOG_QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
                                            }
                                            ?>
										</span>
                    </div>
                </div>
                <?
            }
            elseif ($item['CAN_BUY']) {
                ?><span><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.994 1.53938L13.7225 0.262794C13.5481 0.08762 13.3361 0 13.0869 0C12.8374 0 12.6253 0.08762 12.451 0.262794L6.31744 6.42996L3.56859 3.66081C3.39404 3.48557 3.18213 3.39805 2.93288 3.39805C2.68347 3.39805 2.47156 3.48557 2.29701 3.66081L1.02546 4.93743C0.850913 5.11264 0.763672 5.32546 0.763672 5.57582C0.763672 5.82599 0.850913 6.03901 1.02546 6.21418L4.41002 9.6121L5.68167 10.8887C5.85612 11.064 6.0681 11.1515 6.31744 11.1515C6.56669 11.1515 6.77867 11.0638 6.95321 10.8887L8.22483 9.6121L14.994 2.81607C15.1684 2.64083 15.2558 2.42805 15.2558 2.17768C15.256 1.92744 15.1684 1.71462 14.994 1.53938Z" />
</svg>Есть</span><?
            }
            else {
                ?>
<span>Нет в наличи</span><?
            }
        }
    }
    ?>
    <?
    if (!$haveOffers)
    {
        if (!empty($item['DISPLAY_PROPERTIES']))
        {
            ?>
            <div class="product-item-info-container product-item-hidden" data-entity="props-block">
                    <?
                    foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
                    {
                        ?>
                        <span<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
                            <?=$displayProperty['NAME']?>:
                            <?=(is_array($displayProperty['DISPLAY_VALUE'])
                                ? implode(' / ', $displayProperty['DISPLAY_VALUE'])
                                : $displayProperty['DISPLAY_VALUE'])?>
                        </span>
                        <?
                    }
                    ?>
            </div>
            <?
        }

        if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']))
        {
            ?>
            <div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
                <?
                if (!empty($item['PRODUCT_PROPERTIES_FILL']))
                {
                    foreach ($item['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
                    {
                        ?>
                        <input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
                               value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
                        <?
                        unset($item['PRODUCT_PROPERTIES'][$propID]);
                    }
                }

                if (!empty($item['PRODUCT_PROPERTIES']))
                {
                    ?>
                    <table>
                        <?
                        foreach ($item['PRODUCT_PROPERTIES'] as $propID => $propInfo)
                        {
                            ?>
                            <tr>
                                <td><?=$item['PROPERTIES'][$propID]['NAME']?></td>
                                <td>
                                    <?
                                    if (
                                        $item['PROPERTIES'][$propID]['PROPERTY_TYPE'] === 'L'
                                        && $item['PROPERTIES'][$propID]['LIST_TYPE'] === 'C'
                                    )
                                    {
                                        foreach ($propInfo['VALUES'] as $valueID => $value)
                                        {
                                            ?>
                                            <label>
                                                <? $checked = $valueID === $propInfo['SELECTED'] ? 'checked' : ''; ?>
                                                <input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
                                                       value="<?=$valueID?>" <?=$checked?>>
                                                <?=$value?>
                                            </label>
                                            <br />
                                            <?
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]">
                                            <?
                                            foreach ($propInfo['VALUES'] as $valueID => $value)
                                            {
                                                $selected = $valueID === $propInfo['SELECTED'] ? 'selected' : '';
                                                ?>
                                                <option value="<?=$valueID?>" <?=$selected?>>
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
    }
    else
    {
        $showProductProps = !empty($item['DISPLAY_PROPERTIES']);
        $showOfferProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];

        if ($showProductProps || $showOfferProps)
        {
            ?>
            <div class="product-item-info-container product-item-hidden" data-entity="props-block">
                    <?
                    if ($showProductProps and false)
                    {
                        foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
                        {
                            ?>
                            <dt<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
                                <?=$displayProperty['NAME']?>
                            </dt>
                            <dd<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
                                <?=(is_array($displayProperty['DISPLAY_VALUE'])
                                    ? implode(' / ', $displayProperty['DISPLAY_VALUE'])
                                    : $displayProperty['DISPLAY_VALUE'])?>
                            </dd>
                            <?
                        }
                    }

                    if ($showOfferProps)
                    {
                        ?>
                        <span id="<?=$itemIds['DISPLAY_PROP_DIV']?>" style="display: none;"></span>
                        <?
                    }
                    ?>
            </div>
            <?
        }
    }

    ?>
</div>
    <? if (false) { ?>
    <div class="catalog_instock_art">
        <span><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.994 1.53938L13.7225 0.262794C13.5481 0.08762 13.3361 0 13.0869 0C12.8374 0 12.6253 0.08762 12.451 0.262794L6.31744 6.42996L3.56859 3.66081C3.39404 3.48557 3.18213 3.39805 2.93288 3.39805C2.68347 3.39805 2.47156 3.48557 2.29701 3.66081L1.02546 4.93743C0.850913 5.11264 0.763672 5.32546 0.763672 5.57582C0.763672 5.82599 0.850913 6.03901 1.02546 6.21418L4.41002 9.6121L5.68167 10.8887C5.85612 11.064 6.0681 11.1515 6.31744 11.1515C6.56669 11.1515 6.77867 11.0638 6.95321 10.8887L8.22483 9.6121L14.994 2.81607C15.1684 2.64083 15.2558 2.42805 15.2558 2.17768C15.256 1.92744 15.1684 1.71462 14.994 1.53938Z" />
</svg>
В наличии</span>
        <span>Артикул: <?=$item['PROPERTIES']['ARTNUMBER']['VALUE'];?></span>
    </div>
<? } ?>
    <div class="catalog_price" data-entity="price-block">
        <span class="main_price" id="<?= $itemIds['PRICE'] ?>">
							<?
                            if (!empty($price)) {
                                if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers) {
                                    echo Loc::getMessage(
                                        'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
                                        array(
                                            '#PRICE#' => $price['PRINT_RATIO_PRICE'],
                                            '#VALUE#' => $measureRatio,
                                            '#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
                                        )
                                    );
                                } else {
                                    echo $price['PRINT_RATIO_PRICE'];
                                }
                            }
                            ?>
		</span>
        <?
        if ($arParams['SHOW_OLD_PRICE'] === 'Y') {
            ?>
            <span class="old_price" id="<?= $itemIds['PRICE_OLD'] ?>"
								<?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '') ?>>
								<?= $price['PRINT_RATIO_BASE_PRICE'] ?>
							</span>
            <?
        }
        ?>
    </div>
    <div class="catalog_item_hover">
    <?
    if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP']))
    {
    ?>
    <div id="<?=$itemIds['PROP_DIV']?>">
        <?
        foreach ($arParams['SKU_PROPS'] as $skuProperty)
        {
            $propertyId = $skuProperty['ID'];
            $skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
            if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
                continue;
            ?>
            <div class="product-item-info-container product-item-hidden" data-entity="sku-block">
                <div class="product-item-scu-container" data-entity="sku-line-block">
                    <?=$skuProperty['NAME']?>
                    <div class="product-item-scu-block">
                        <div class="product-item-scu-list">
                            <ul class="product-item-scu-item-list">
                                <?
                                foreach ($skuProperty['VALUES'] as $value)
                                {
                                    if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
                                        continue;

                                    $value['NAME'] = htmlspecialcharsbx($value['NAME']);

                                    if ($skuProperty['SHOW_MODE'] === 'PICT')
                                    {
                                        ?>
                                        <li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>"
                                            data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
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
                                            data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
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
						foreach ($arParams['SKU_PROPS'] as $skuProperty)
						{
							if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
								continue;

							$skuProps[] = array(
								'ID' => $skuProperty['ID'],
								'SHOW_MODE' => $skuProperty['SHOW_MODE'],
								'VALUES' => $skuProperty['VALUES'],
								'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
							);
						}

						unset($skuProperty, $value);

						if ($item['OFFERS_PROPS_DISPLAY'])
						{
							foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
							{
								$strProps = '';

								if (!empty($jsOffer['DISPLAY_PROPERTIES']))
								{
									foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
									{
                                        $strProps .= '<span>'.$displayProperty['NAME'].': '
                                            .(is_array($displayProperty['VALUE'])
                                                ? implode(' / ', $displayProperty['VALUE'])
                                                : $displayProperty['VALUE'])
                                            .'</span>';
									}
								}

								$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
							}
							unset($jsOffer, $strProps);
						}
					}


        if (!$haveOffers)
        {
            if ($actualItem['CAN_BUY'])
            {
                ?>
        <div class="product-item-button-container" id="<?=$itemIds['BASKET_ACTIONS']?>">
                    <a class="btn" id="<?=$itemIds['BUY_LINK']?>"
                       href="javascript:void(0)" rel="nofollow">
                        <?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
                    </a>
        </div>
                <?
            }
            else
            {
                ?>

                    <?
                    if ($showSubscribe)
                    {
                        $APPLICATION->IncludeComponent(
                            'bitrix:catalog.product.subscribe',
                            '',
                            array(
                                'PRODUCT_ID' => $actualItem['ID'],
                                'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
                                'BUTTON_CLASS' => 'btn btn_notice '.$buttonSizeClass,
                                'DEFAULT_DISPLAY' => true,
                                'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                            ),
                            $component,
                            array('HIDE_ICONS' => 'Y')
                        );
                    }
                    ?>
                    <a class="btn"
                       id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow" style="display: none;">
                        <?=$arParams['MESS_NOT_AVAILABLE']?>
                    </a>

                <?
            }
        }
        else
        {
            if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
            {
                ?>

                    <?
                    if ($showSubscribe)
                    {
                        $APPLICATION->IncludeComponent(
                            'bitrix:catalog.product.subscribe',
                            '',
                            array(
                                'PRODUCT_ID' => $item['ID'],
                                'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
                                'BUTTON_CLASS' => 'btn btn_notice '.$buttonSizeClass,
                                'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
                                'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                            ),
                            $component,
                            array('HIDE_ICONS' => 'Y')
                        );
                    }
                    ?>
                    <a class="btn"
                       id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow"
                        <?=($actualItem['CAN_BUY'] ? 'style="display: none;"' : 'style="display: none;"')?>>
                        <?=$arParams['MESS_NOT_AVAILABLE']?>
                    </a>
                    <div id="<?=$itemIds['BASKET_ACTIONS']?>" <?=($actualItem['CAN_BUY'] ? '' : 'style="display: none;"')?>>
                        <a class="btn" id="<?=$itemIds['BUY_LINK']?>"
                           href="javascript:void(0)" rel="nofollow">
                            <?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
                        </a>
                    </div>

                <?
            }
            else
            {
                ?>

                    <a class="btn" href="<?=$item['DETAIL_PAGE_URL']?>">
                        <?=$arParams['MESS_BTN_DETAIL']?>
                    </a>

                <?
            }
        }
        ?>


        <a class="btn_white" id="<?=$itemIds['BUY_ONE_CLICK']?>">Купить в 1 клик</a>
<!--        <ul>-->
<!--            <li>для спагетти и тонкой</li>-->
<!--            <li>тонкой лапш</li>-->
<!--            <li>насадка для спагетти</li>-->
<!--        </ul>-->
    </div>
    <? if (false) { ?>
	<? if ($itemHasDetailUrl): ?>
	<a class="product-item-image-wrapper" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>"
			data-entity="image-wrapper">
	<? else: ?>
	<span class="product-item-image-wrapper" data-entity="image-wrapper">
	<? endif; ?>
		<span class="product-item-image-slider-slide-container slide" id="<?=$itemIds['PICT_SLIDER']?>"
			<?=($showSlider ? '' : 'style="display: none;"')?>
			data-slider-interval="<?=$arParams['SLIDER_INTERVAL']?>" data-slider-wrap="true">
			<?
			if ($showSlider)
			{
				foreach ($morePhoto as $key => $photo)
				{
					?>
					<span class="product-item-image-slide item <?=($key == 0 ? 'active' : '')?>"
						style="background-image: url('<?=$photo['SRC']?>');">
					</span>
					<?
				}
			}
			?>
		</span>
		<span class="product-item-image-original" id="<?=$itemIds['PICT']?>"
			style="background-image: url('<?=$item['PREVIEW_PICTURE']['SRC']?>'); <?=($showSlider ? 'display: none;' : '')?>">
		</span>
		<?
		if ($item['SECOND_PICT'])
		{
			$bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC'];
			?>
			<span class="product-item-image-alternative" id="<?=$itemIds['SECOND_PICT']?>"
				style="background-image: url('<?=$bgImage?>'); <?=($showSlider ? 'display: none;' : '')?>">
			</span>
			<?
		}

		if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
		{
			?>
			<div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DSC_PERC']?>"
				<?=($price['PERCENT'] > 0 ? '' : 'style="display: none;"')?>>
				<span><?=-$price['PERCENT']?>%</span>
			</div>
			<?
		}

		if ($item['LABEL'])
		{
			?>
			<div class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>">
				<?
				if (!empty($item['LABEL_ARRAY_VALUE']))
				{
					foreach ($item['LABEL_ARRAY_VALUE'] as $code => $value)
					{
						?>
						<div<?=(!isset($item['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
							<span title="<?=$value?>"><?=$value?></span>
						</div>
						<?
					}
				}
				?>
			</div>
			<?
		}
		?>
		<div class="product-item-image-slider-control-container" id="<?=$itemIds['PICT_SLIDER']?>_indicator"
			<?=($showSlider ? '' : 'style="display: none;"')?>>
			<?
			if ($showSlider)
			{
				foreach ($morePhoto as $key => $photo)
				{
					?>
					<div class="product-item-image-slider-control<?=($key == 0 ? ' active' : '')?>" data-go-to="<?=$key?>"></div>
					<?
				}
			}
			?>
		</div>
		<?
		if ($arParams['SLIDER_PROGRESS'] === 'Y')
		{
			?>
			<div class="product-item-image-slider-progress-bar-container">
				<div class="product-item-image-slider-progress-bar" id="<?=$itemIds['PICT_SLIDER']?>_progress_bar" style="width: 0;"></div>
			</div>
			<?
		}
		?>
	<? if ($itemHasDetailUrl): ?>
	</a>
	<? else: ?>
	</span>
	<? endif; ?>
	<div class="product-item-title">
		<? if ($itemHasDetailUrl): ?>
		<a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>">
		<? endif; ?>
		<?=$productTitle?>
		<? if ($itemHasDetailUrl): ?>
		</a>
		<? endif; ?>
	</div>
	<?
	if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
	{
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
		{
			switch ($blockName)
			{
				case 'price': ?>
					<div class="product-item-info-container product-item-price-container" data-entity="price-block">
						<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
						{
							?>
							<span class="product-item-price-old" id="<?=$itemIds['PRICE_OLD']?>"
								<?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
								<?=$price['PRINT_RATIO_BASE_PRICE']?>
							</span>&nbsp;
							<?
						}
						?>
						<span class="product-item-price-current" id="<?=$itemIds['PRICE']?>">
							<?
							if (!empty($price))
							{
								if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
								{
									echo Loc::getMessage(
										'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
										array(
											'#PRICE#' => $price['PRINT_RATIO_PRICE'],
											'#VALUE#' => $measureRatio,
											'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
										)
									);
								}
								else
								{
									echo $price['PRINT_RATIO_PRICE'];
								}
							}
							?>
						</span>
					</div>
					<?
					break;

				case 'quantityLimit':
					if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
					{
						if ($haveOffers)
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
								<div class="product-item-info-container product-item-hidden" id="<?=$itemIds['QUANTITY_LIMIT']?>"
									style="display: none;" data-entity="quantity-limit-block">
									<div class="product-item-info-container-title">
										<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
										<span class="product-item-quantity" data-entity="quantity-limit-value"></span>
									</div>
								</div>
								<?
							}
						}
						else
						{
							if (
								$measureRatio
								&& (float)$actualItem['CATALOG_QUANTITY'] > 0
								&& $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
								&& $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
							)
							{
								?>
								<div class="product-item-info-container product-item-hidden" id="<?=$itemIds['QUANTITY_LIMIT']?>">
									<div class="product-item-info-container-title">
										<?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
										<span class="product-item-quantity">
											<?
											if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
											{
												if ((float)$actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
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
												echo $actualItem['CATALOG_QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
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
					if (!$haveOffers)
					{
						if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
								<div class="product-item-amount">
									<div class="product-item-amount-field-container">
										<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN']?>"></span>
										<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number"
											name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
											value="<?=$measureRatio?>">
										<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP']?>"></span>
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
					}
					elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
					{
						if ($arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
								<div class="product-item-amount">
									<div class="product-item-amount-field-container">
										<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN']?>"></span>
										<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number"
											name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
											value="<?=$measureRatio?>">
										<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP']?>"></span>
										<span class="product-item-amount-description-container">
											<span id="<?=$itemIds['QUANTITY_MEASURE']?>"><?=$actualItem['ITEM_MEASURE']['TITLE']?></span>
											<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
										</span>
									</div>
								</div>
							</div>
							<?
						}
					}

					break;

				case 'buttons':
					?>
					<div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
						<?
						if (!$haveOffers)
						{
							if ($actualItem['CAN_BUY'])
							{
								?>
								<div class="product-item-button-container" id="<?=$itemIds['BASKET_ACTIONS']?>">
									<a class="btn btn-default <?=$buttonSizeClass?>" id="<?=$itemIds['BUY_LINK']?>"
										href="javascript:void(0)" rel="nofollow">
										<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
									</a>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $actualItem['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-default '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => true,
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
									<a class="btn btn-link <?=$buttonSizeClass?>"
										id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow">
										<?=$arParams['MESS_NOT_AVAILABLE']?>
									</a>
								</div>
								<?
							}
						}
						else
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
								<div class="product-item-button-container">
									<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $item['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-default '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
									<a class="btn btn-link <?=$buttonSizeClass?>"
										id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow"
										<?=($actualItem['CAN_BUY'] ? 'style="display: none;"' : '')?>>
										<?=$arParams['MESS_NOT_AVAILABLE']?>
									</a>
									<div id="<?=$itemIds['BASKET_ACTIONS']?>" <?=($actualItem['CAN_BUY'] ? '' : 'style="display: none;"')?>>
										<a class="btn btn-default <?=$buttonSizeClass?>" id="<?=$itemIds['BUY_LINK']?>"
											href="javascript:void(0)" rel="nofollow">
											<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
										</a>
									</div>
								</div>
								<?
							}
							else
							{
								?>
								<div class="product-item-button-container">
									<a class="btn btn-default <?=$buttonSizeClass?>" href="<?=$item['DETAIL_PAGE_URL']?>">
										<?=$arParams['MESS_BTN_DETAIL']?>
									</a>
								</div>
								<?
							}
						}
						?>
					</div>
					<?
					break;

				case 'props':
					if (!$haveOffers)
					{
						if (!empty($item['DISPLAY_PROPERTIES']))
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="props-block">
								<dl class="product-item-properties">
									<?
									foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
									{
										?>
										<dt<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
											<?=$displayProperty['NAME']?>
										</dt>
										<dd<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
											<?=(is_array($displayProperty['DISPLAY_VALUE'])
												? implode(' / ', $displayProperty['DISPLAY_VALUE'])
												: $displayProperty['DISPLAY_VALUE'])?>
										</dd>
										<?
									}
									?>
								</dl>
							</div>
							<?
						}

						if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']))
						{
							?>
							<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
								<?
								if (!empty($item['PRODUCT_PROPERTIES_FILL']))
								{
									foreach ($item['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
									{
										?>
										<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
											value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
										<?
										unset($item['PRODUCT_PROPERTIES'][$propID]);
									}
								}

								if (!empty($item['PRODUCT_PROPERTIES']))
								{
									?>
									<table>
										<?
										foreach ($item['PRODUCT_PROPERTIES'] as $propID => $propInfo)
										{
											?>
											<tr>
												<td><?=$item['PROPERTIES'][$propID]['NAME']?></td>
												<td>
													<?
													if (
														$item['PROPERTIES'][$propID]['PROPERTY_TYPE'] === 'L'
														&& $item['PROPERTIES'][$propID]['LIST_TYPE'] === 'C'
													)
													{
														foreach ($propInfo['VALUES'] as $valueID => $value)
														{
															?>
															<label>
																<? $checked = $valueID === $propInfo['SELECTED'] ? 'checked' : ''; ?>
																<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]"
																	value="<?=$valueID?>" <?=$checked?>>
																<?=$value?>
															</label>
															<br />
															<?
														}
													}
													else
													{
														?>
														<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propID?>]">
															<?
															foreach ($propInfo['VALUES'] as $valueID => $value)
															{
																$selected = $valueID === $propInfo['SELECTED'] ? 'selected' : '';
																?>
																<option value="<?=$valueID?>" <?=$selected?>>
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
					}
					else
					{
						$showProductProps = !empty($item['DISPLAY_PROPERTIES']);
						$showOfferProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];

						if ($showProductProps || $showOfferProps)
						{
							?>
							<div class="product-item-info-container product-item-hidden" data-entity="props-block">
								<dl class="product-item-properties">
									<?
									if ($showProductProps)
									{
										foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
										{
											?>
											<dt<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
												<?=$displayProperty['NAME']?>
											</dt>
											<dd<?=(!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
												<?=(is_array($displayProperty['DISPLAY_VALUE'])
													? implode(' / ', $displayProperty['DISPLAY_VALUE'])
													: $displayProperty['DISPLAY_VALUE'])?>
											</dd>
											<?
										}
									}

									if ($showOfferProps)
									{
										?>
										<span id="<?=$itemIds['DISPLAY_PROP_DIV']?>" style="display: none;"></span>
										<?
									}
									?>
								</dl>
							</div>
							<?
						}
					}

					break;

				case 'sku':
					if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP']))
					{
						?>
						<div id="<?=$itemIds['PROP_DIV']?>">
							<?
							foreach ($arParams['SKU_PROPS'] as $skuProperty)
							{
								$propertyId = $skuProperty['ID'];
								$skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
								if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
									continue;
								?>
								<div class="product-item-info-container product-item-hidden" data-entity="sku-block">
									<div class="product-item-scu-container" data-entity="sku-line-block">
										<?=$skuProperty['NAME']?>
										<div class="product-item-scu-block">
											<div class="product-item-scu-list">
												<ul class="product-item-scu-item-list">
													<?
													foreach ($skuProperty['VALUES'] as $value)
													{
														if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
															continue;

														$value['NAME'] = htmlspecialcharsbx($value['NAME']);

														if ($skuProperty['SHOW_MODE'] === 'PICT')
														{
															?>
															<li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>"
																data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
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
																data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
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
						foreach ($arParams['SKU_PROPS'] as $skuProperty)
						{
							if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
								continue;

							$skuProps[] = array(
								'ID' => $skuProperty['ID'],
								'SHOW_MODE' => $skuProperty['SHOW_MODE'],
								'VALUES' => $skuProperty['VALUES'],
								'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
							);
						}

						unset($skuProperty, $value);

						if ($item['OFFERS_PROPS_DISPLAY'])
						{
							foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
							{
								$strProps = '';

								if (!empty($jsOffer['DISPLAY_PROPERTIES']))
								{
									foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
									{
										/*$strProps .= '<dt>'.$displayProperty['NAME'].'</dt><dd>'
											.(is_array($displayProperty['VALUE'])
												? implode(' / ', $displayProperty['VALUE'])
												: $displayProperty['VALUE'])
											.'</dd>';*/
                                        $strProps .= '<span>'.$displayProperty['NAME'].': '
                                            .(is_array($displayProperty['VALUE'])
                                                ? implode(' / ', $displayProperty['VALUE'])
                                                : $displayProperty['VALUE'])
                                            .'</span>';
									}
								}

								$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
							}
							unset($jsOffer, $strProps);
						}
					}

					break;
			}
		}
	}

	if (
		$arParams['DISPLAY_COMPARE']
		&& (!$haveOffers || $arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
	)
	{
		?>
		<div class="product-item-compare-container">
			<div class="product-item-compare">
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
    <? } ?>
</div>
