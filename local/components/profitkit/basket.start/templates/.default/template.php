<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
$this->setFrameMode(false);
$this->addExternalCss(SITE_TEMPLATE_PATH."/css/nice-select.css");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/jquery.nice-select.min.js");
?>
<div class="preload-ajax">
<div class="row" id="order_product">
    <div class="order_header">
        <h1>Моя корзина</h1>
        <a href="<?=$arParams['CATALOG_URL'];?>" class="last_page">
            <i><svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.14869 0.542355C6.46065 0.240092 6.95623 0.240092 7.26818 0.542355V0.542355C7.59438 0.858417 7.59438 1.38169 7.26818 1.69775L2.31194 6.5L7.26818 11.3023C7.59438 11.6183 7.59438 12.1416 7.26818 12.4576V12.4576C6.95623 12.7599 6.46065 12.7599 6.14869 12.4576L0.741206 7.21818C0.335688 6.82526 0.335687 6.17474 0.741205 5.78182L6.14869 0.542355Z"/>
                </svg></i><span>Вернуться в каталог</span>
        </a>
    </div>
    <? if (count($arResult['ITEMS']) > 0) { ?>
    <div class="row all_price_order">
        <h3>Общая стоимость:  <span>10 015</span> ₽</h3>
        <div class="fld_row">
            <button class="btn">Оформить заказ</button>
        </div>
    </div>
    <div class="table_product">
        <div class="row table_product_header">
            <div class="col-6">Наименование товара</div>
            <div class="col-1 product_order_price">Цена</div>
            <div class="col-3 product_order_count">Количество</div>
            <div class="col-2 product_order_all_price">Стоимость</div>
            <div class="col-2 product_order_delete">Удалить</div>
        </div>
        <div class="group_table_product">
            <? foreach ($arResult['ITEMS'] as $item) { ?>
            <div class="row product" data-id="<?=$item['ID'];?>">
                <div class="col-6 info_order_product_block">
                    <div class="img_product">
                        <? $big_picture = CFile::GetPath($item["PICTURE"]); ?>
                        <img src="<?=$big_picture;?>">
                    </div>
                    <div class="info_order_product">
                        <? if ($item['PROPERTY']['ARTICLE']) { ?><p class="product_article">Артикул: <?=$item['PROPERTY']['ARTICLE']['value'];?></p><? } ?>
                        <p class="product_descript"><a href="<?=$item['DETAIL_PAGE_URL'];?>"><?=$item['NAME'];?></a></p>
                        <div class="product_params">
                            <? foreach ($item['PROPERTY'] as $code => $prop) {
                                if ($code == 'ARTICLE')
                                    continue;
                                ?>
                            <p class="product_color"><?=$prop['name'];?>: <span><?=$prop['value'];?></span></p>
                            <? } ?>
                        </div>
                        <div class="product_price">
                            <p class="current_price"><?=$item['PRICE_formated'];?></p>
                            <? if ($item['PRICEOLD'] > 0) { ?><p class="old_price"><?=$item['PRICEOLD_formated'];?></p><? } ?>
                        </div>
                    </div>
                </div>
                <div class="col-1 product_order_price">
                    <p class="current_price"><?=$item['PRICE_formated'];?></p>
                    <? if ($item['PRICEOLD'] > 0) { ?><p class="old_price"><?=$item['PRICEOLD_formated'];?></p><? } ?>
                </div>
                <div class="col-3 product_order_count">
                    <div class="input_price">
                        <button class="input_price_del"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="16" cy="16" r="15" fill="white" stroke="#DADADA" stroke-width="2"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 17.3332H8V14.6665H24V17.3332Z" fill="#DADADA"/>
                            </svg>
                        </button>
                        <p><?=$item['QUANTITY'];?></p>
                        <button class="input_price_add"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="16" cy="16" r="15" fill="white" stroke="#DADADA" stroke-width="2"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 17.3333H8V14.6667H24V17.3333Z" fill="#DADADA"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3333 8V24H14.6667L14.6667 8L17.3333 8Z" fill="#DADADA"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-2 product_order_all_price">
                    <div class="col_left">
                        <div class="fld_row">
                            <div class="input_price">
                                <button class="input_price_del"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="16" cy="16" r="15" fill="white" stroke="#DADADA" stroke-width="2"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 17.3332H8V14.6665H24V17.3332Z" fill="#DADADA"/>
                                    </svg>
                                </button>
                                <p><?=$item['QUANTITY'];?></p>
                                <button class="input_price_add"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="16" cy="16" r="15" fill="white" stroke="#DADADA" stroke-width="2"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 17.3333H8V14.6667H24V17.3333Z" fill="#DADADA"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3333 8V24H14.6667L14.6667 8L17.3333 8Z" fill="#DADADA"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col_right">
                        <div class="product_price">
                            <p class="current_price"><?=$item['SUM_formated'];?></p>
                            <? if ($item['PRICEOLD'] > 0) { ?><p class="old_price"><?=$item['SUMOLD_formated'];?></p><? } ?>
                        </div>
                        <? if ($item['PRICEOLD'] > 0) { ?><p class="product_benefit">Выгода: <span><?=$item['DISCOUNT_SUM_formated'];?></span></p><? } ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-2 product_order_delete">
                    <button class="order_del"><svg width="34" height="33" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.3882 16.5C32.3882 25.0494 25.3728 32 16.6941 32C8.01544 32 1 25.0494 1 16.5C1 7.95058 8.01544 1 16.6941 1C25.3728 1 32.3882 7.95058 32.3882 16.5Z" fill="white" stroke="#DADADA" stroke-width="2"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.8458 22.8461C22.585 23.1039 21.8374 23.1039 21.5766 22.8461L10.1538 11.4231C9.893 11.1654 9.893 10.4119 10.1538 10.1541C10.4146 9.8963 11.1622 9.89612 11.423 10.1539L22.8458 21.5769C23.1067 21.8347 23.1067 22.5883 22.8458 22.8461Z" fill="#C9C9C9"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1536 22.8461C9.89277 22.5883 9.89284 21.8347 10.1537 21.5769L21.5769 10.1537C21.8377 9.89589 22.5853 9.89612 22.8461 10.1539C23.1069 10.4117 23.1069 11.1651 22.8461 11.4229L11.423 22.8461C11.1622 23.1039 10.4144 23.1039 10.1536 22.8461Z" fill="#C9C9C9"/>
                        </svg>
                    </button>
                </div>
            </div>
            <? } ?>
        </div>
    </div>
    <div class="row inform_pay">
        <? if ($arParams['PROMOCODE'] == 'Y') { ?>
        <div class="input_card">
            <div class="fld_row"><label>у меня есть промо код</label><input type="text" placeholder="xxx - xxx - xxx - xxx"></div>
        </div>
        <? } ?>
        <div class="info_select_product">
            <ul>
                <? if (isset($arResult['DISCOUNT_ALL_formated'])) { ?><li>Ваша Скидка <span>-<?=$arResult['DISCOUNT_ALL_formated'];?></span></li><? } ?>
                <li>Итого к оплате: <span><?=$arResult['SUM_ALL_formated'];?></span></li>
            </ul>
            <div class="fld_row">
                <a href="<?=$arParams['ORDER_URL'];?>" class="btn">Оформить заказ</a>
            </div>
            <div class="fld_row pay_one_click">
                <button class="btn" data-toggle="pkModal" data-target="#callbackModal" data-ajax="/ajax/form.php">Купить в один клик</button>
            </div>
        </div>
    </div>
    <? if ($arParams['GIFT'] == 'Y') { ?>
    <div class="row gift_select_block">
        <h2>Выберите подарок</h2>
        <div class="group_select_gift">
            <div class="col-4 gift select" data-index="1">
                <input type="checkbox" name="gift" value="1">
                <div class="gift_img">
                    <img src="img/goods/goods_3.png">
                </div>
                <div class="gift_info">
                    <p class="product_article">Артикул: 5467FG-P89</p>
                    <p class="product_descript">Насадка для спагетти и тонкой лапши MMC-SPC</p>
                    <div class="product_price">
                        <p class="current_price">0 ₽-</p>
                        <p class="old_price">3 299 ₽</p>
                    </div>
                </div>
                <div class="product_descript_mob"></div>
            </div>
            <div class="col-4 gift" data-index="2">
                <input type="checkbox" name="gift" value="1">
                <div class="gift_img">
                    <img src="img/goods/goods_3.png">
                </div>
                <div class="gift_info">
                    <p class="product_article">Артикул: 5467FG-P89</p>
                    <p class="product_descript">Насадка для спагетти и тонкой лапши MMC-SPC</p>
                    <div class="product_price">
                        <p class="current_price">0 ₽-</p>
                        <p class="old_price">3 299 ₽</p>
                    </div>
                </div>
                <div class="product_descript_mob"></div>
            </div>
        </div>
    </div>
    <? } ?>
    <? } else { ?>
    <p class="cart_empty">Ваша корзина пуста.</p>
    <? } ?>
</div>
<?php
$signer = new Bitrix\Main\Security\Sign\Signer;
$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'basket.start');
?>
<script>
    signedParamsBasketStart ='<?=urlencode($signedParams)?>';
</script>
</div>