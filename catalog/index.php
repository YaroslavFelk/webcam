<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>
<? /* ?>
<div class="catalog">
    <div class="row">
        <div class="col-3">меню и фильтр</div>
        <div class="col-9">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget.  Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus   Подробнее</p>
            <div class="catalog_tags">
                <a href="">Белые</a><a href="">Большого размера</a><a href="">Adidas</a><a href="">С рисунком</a><a href="">Лучший выбор</a><a href="">Подкатегория</a><a class="catalog_tags_more">Ещё</a>
            </div>
            <div class="catalog_sort_vid">
                <div class="catalog-sort">
                    <div class="dropdown">
                        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Цена во возрастани
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="">Цена во возрастанию</a></li>
                            <li><a href="">Цена во убыванию</a></li>
                            <li><a href="">По популярности</a></li>
                            <li><a href="">По алфавиту</a></li>
                        </ul>
                    </div>
                </div>
                <div class="catalog_stock_filtr">
                    <a href="">в наличии</a> |
                    <a href="">новинки</a> |
                    <a href="">со скидкой</a>
                </div>
                <div class="catalo_page_num">Показывать:
                    <div class="dropdown">
                        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            40
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a href="">20</a></li>
                            <li><a href="">40</a></li>
                            <li><a href="">100</a></li>
                            <li><a href="">200</a></li>
                        </ul>
                    </div>
                </div>
                <div class="catalog_vid">
                    <a class="active"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0H5V5H0V0Z"/>
                            <path d="M7 0H12V5H7V0Z"/>
                            <path d="M14 0H19V5H14V0Z"/>
                            <path d="M0 7H5V12H0V7Z"/>
                            <path d="M7 7H12V12H7V7Z"/>
                            <path d="M14 7H19V12H14V7Z"/>
                            <path d="M0 14H5V19H0V14Z"/>
                            <path d="M7 14H12V19H7V14Z"/>
                            <path d="M14 14H19V19H14V14Z"/>
                        </svg>
                    </a>
                    <a><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0H5V5H0V0Z"/>
                            <path d="M7 0H19V5H7V0Z"/>
                            <path d="M0 7H5V12H0V7Z"/>
                            <path d="M7 7H19V12H7V7Z"/>
                            <path d="M0 14H5V19H0V14Z"/>
                            <path d="M7 14H19V19H7V14Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="catalog_items row">
                <div class="catalog_item">
                    <div class="catalog_item_block">
                        <div class="catalog_marker">
                            <div class="marker_hit">Хит</div>
                            <div class="marker_discount">-20%</div>
                            <div class="marker_new">New</div>
                        </div>
                        <div class="catalog_action">
                            <div class="add_to_favorite"><svg width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.1924 0C16.017 0 13.8642 0.990406 12.4994 2.50184C11.1352 0.990406 8.98246 0 6.80704 0C3.05353 0 0 3.05522 0 6.81081C0 8.29841 0.47082 9.71165 1.36141 10.8979C1.43458 10.9955 1.52364 11.0715 1.61837 11.1385L9.42208 19.5039L9.42265 19.5045C10.1521 20.4148 11.2566 20.9642 12.4223 20.9938C12.4416 20.9955 12.4597 21 12.4796 21C12.4864 21 12.4932 20.9989 12.5 20.9989C12.5068 20.9989 12.5136 21 12.5204 21C12.5403 21 12.5584 20.9955 12.5783 20.9943C13.7434 20.9648 14.8473 20.4154 15.5768 19.5056C15.5774 19.505 15.5779 19.5045 15.5785 19.5039L23.3822 11.1379C23.4769 11.071 23.566 10.9949 23.6392 10.8973C24.5292 9.71108 25 8.29784 25 6.81081C24.9994 3.05522 21.9459 0 18.1924 0ZM6.80704 2.27027C8.74875 2.27027 10.7926 3.4667 11.4602 4.99459C11.4704 5.01843 11.4858 5.0383 11.4977 5.061C11.5169 5.09846 11.5362 5.13592 11.5595 5.17111C11.5793 5.20062 11.602 5.2273 11.6247 5.25511C11.6491 5.28462 11.6724 5.3147 11.6996 5.34195C11.7263 5.36862 11.7552 5.39132 11.7841 5.41516C11.8119 5.43787 11.8391 5.4617 11.8698 5.48214C11.9044 5.50541 11.9407 5.52357 11.9776 5.54286C12.0008 5.55478 12.0212 5.57068 12.0451 5.58089C12.0519 5.58373 12.0592 5.58487 12.0661 5.5877C12.1046 5.6036 12.1449 5.61438 12.1852 5.6263C12.2169 5.63538 12.2487 5.6473 12.2805 5.65354C12.3173 5.66092 12.3548 5.66262 12.3928 5.66603C12.4285 5.66943 12.4643 5.67511 12.4994 5.67511C12.5352 5.67511 12.5703 5.66943 12.6061 5.66603C12.6441 5.66262 12.6815 5.66092 12.719 5.65354C12.7502 5.6473 12.7808 5.63595 12.8114 5.62687C12.8528 5.61495 12.8942 5.6036 12.9339 5.58714C12.9402 5.5843 12.947 5.58373 12.9532 5.58089C12.9759 5.57068 12.9952 5.55649 13.0173 5.54514C13.0559 5.52527 13.0939 5.50597 13.1302 5.48157C13.1597 5.4617 13.1852 5.43957 13.2125 5.41743C13.2425 5.39303 13.2726 5.36919 13.2998 5.34195C13.3265 5.31527 13.3492 5.28632 13.373 5.25738C13.3957 5.22957 13.419 5.20232 13.4394 5.17224C13.4626 5.13705 13.4813 5.10016 13.5006 5.0627C13.5125 5.04 13.5279 5.01957 13.5381 4.99573C14.2057 3.46784 16.2495 2.2714 18.1913 2.2714C20.6934 2.2714 22.7293 4.3084 22.7293 6.81195C22.7293 7.74957 22.44 8.63781 21.9079 9.40062C21.8926 9.41538 21.8744 9.42673 21.8597 9.44262L13.9181 17.9561C13.9034 17.972 13.8932 17.9908 13.879 18.0072C13.8665 18.022 13.8523 18.0333 13.8404 18.0492C13.5194 18.4766 13.0309 18.7218 12.4983 18.728C11.9662 18.7218 11.4778 18.4766 11.1567 18.0492C11.1448 18.0333 11.1295 18.0214 11.117 18.0061C11.1034 17.9896 11.0938 17.972 11.079 17.9561L3.13748 9.44262C3.12216 9.42616 3.10458 9.41481 3.0887 9.40005C2.55831 8.63668 2.26901 7.74843 2.26901 6.81081C2.26901 4.30727 4.30489 2.27027 6.80704 2.27027Z"/>
                                </svg>
                            </div>
                            <div class="add_to_compare"><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.95 18.9H2.1V1.05C2.1 0.4725 1.6275 0 1.05 0C0.472499 0 0 0.4725 0 1.05V19.95C0 20.5275 0.472499 21 1.05 21H19.95C20.5275 21 21 20.5275 21 19.95C21 19.3725 20.5275 18.9 19.95 18.9Z"/>
                                    <path d="M5.25 16.8C5.8275 16.8 6.3 16.3275 6.3 15.75V9.45C6.3 8.8725 5.8275 8.4 5.25 8.4C4.6725 8.4 4.2 8.8725 4.2 9.45V15.75C4.2 16.3275 4.6725 16.8 5.25 16.8Z"/>
                                    <path d="M9.45 16.8C10.0275 16.8 10.5 16.3275 10.5 15.75V3.15C10.5 2.5725 10.0275 2.1 9.45 2.1C8.8725 2.1 8.4 2.5725 8.4 3.15V15.75C8.4 16.3275 8.8725 16.8 9.45 16.8Z"/>
                                    <path d="M13.65 16.8C14.2275 16.8 14.7 16.3275 14.7 15.75V6.825C14.7 6.2475 14.2275 5.775 13.65 5.775C13.0725 5.775 12.6 6.2475 12.6 6.825V15.75C12.6 16.3275 13.0725 16.8 13.65 16.8Z"/>
                                    <path d="M17.85 16.8C18.4275 16.8 18.9 16.3275 18.9 15.75V2.1C18.9 1.5225 18.4275 1.05 17.85 1.05C17.2725 1.05 16.8 1.5225 16.8 2.1V15.75C16.8 16.3275 17.2725 16.8 17.85 16.8Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="catalog_quick_view"><a class="btn_white">Быстрый просмотр</a></div>
                        <a href="" class="catalog_item_img">
                            <img src="/local/templates/m1/img/catalog1.png">
                        </a>
                        <a href="" class="catalog_item_title">Насадка для спагетти и тонкой лапши MMC-SPC</a>
                        <div class="catalog_price">
                            <span class="main_price">228 990 ₽</span>
                            <span class="old_price">240 000 ₽</span>
                        </div>
                        <a class="btn btn_notice">Подписаться</a>
                        <div class="catalog_item_hover">
                            <a class="btn_white">Купить в 1 клик</a>
                            <ul>
                                <li>для спагетти и тонкой</li>
                                <li>тонкой лапш</li>
                                <li>насадка для спагетти</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="catalog_item">
                    <div class="catalog_item_block">
                        <a href="" class="catalog_item_img">
                            <img src="/local/templates/m1/img/catalog1.png">
                        </a>
                        <a href="" class="catalog_item_title">Насадка для спагетти и тонкой лапши MMC-SPC Насадка для спагетти и тонкой лапши MMC-SPC</a>
                        <div class="catalog_price">
                            <span class="main_price">228 990 ₽</span>
                            <span class="old_price">240 000 ₽</span>
                        </div>
                        <a class="btn">В корзину</a>
                        <div class="catalog_item_hover">
                            <a class="btn_white">Купить в 1 клик</a>
                        </div>
                    </div>
                </div>
                <div class="catalog_item">
                    <div class="catalog_item_block">
                        <a href="" class="catalog_item_img">
                            <img src="/local/templates/m1/img/catalog1.png">
                        </a>
                        <a href="" class="catalog_item_title">Насадка для спагетти и тонкой лапши MMC-SPC Насадка для спагетти и тонкой лапши MMC-SPC</a>
                        <div class="catalog_price">
                            <span class="main_price">228 990 ₽</span>
                            <span class="old_price">240 000 ₽</span>
                        </div>
                        <a class="btn">В корзину</a>
                        <div class="catalog_item_hover">
                            <a class="btn_white">Купить в 1 клик</a>
                        </div>
                    </div>
                </div>
                <div class="catalog_item">
                    <div class="catalog_item_block">
                        <a href="" class="catalog_item_img">
                            <img src="/local/templates/m1/img/catalog1.png">
                        </a>
                        <a href="" class="catalog_item_title">Насадка для спагетти и тонкой лапши MMC-SPC Насадка для спагетти и тонкой лапши MMC-SPC</a>
                        <div class="catalog_price">
                            <span class="main_price">228 990 ₽</span>
                            <span class="old_price">240 000 ₽</span>
                        </div>
                        <a class="btn">В корзину</a>
                        <div class="catalog_item_hover">
                            <a class="btn_white">Купить в 1 клик</a>
                        </div>
                    </div>
                </div>
                <div class="catalog_item">
                    <div class="catalog_item_block">
                        <a href="" class="catalog_item_img">
                            <img src="/local/templates/m1/img/catalog1.png">
                        </a>
                        <a href="" class="catalog_item_title">Насадка для спагетти и тонкой лапши MMC-SPC Насадка для спагетти и тонкой лапши MMC-SPC</a>
                        <div class="catalog_price">
                            <span class="main_price">228 990 ₽</span>
                            <span class="old_price">240 000 ₽</span>
                        </div>
                        <a class="btn">В корзину</a>
                        <div class="catalog_item_hover">
                            <a class="btn_white">Купить в 1 клик</a>
                        </div>
                    </div>
                </div>
                <div class="catalog_item">
                    <div class="catalog_item_block">
                        <a href="" class="catalog_item_img">
                            <img src="/local/templates/m1/img/catalog1.png">
                        </a>
                        <a href="" class="catalog_item_title">Насадка для спагетти и тонкой лапши MMC-SPC Насадка для спагетти и тонкой лапши MMC-SPC</a>
                        <div class="catalog_price">
                            <span class="main_price">228 990 ₽</span>
                            <span class="old_price">240 000 ₽</span>
                        </div>
                        <a class="btn">В корзину</a>
                        <div class="catalog_item_hover">
                            <a class="btn_white">Купить в 1 клик</a>
                        </div>
                    </div>
                </div>
                <div class="catalog_item">
                    <div class="catalog_item_block">
                        <a href="" class="catalog_item_img">
                            <img src="/local/templates/m1/img/catalog1.png">
                        </a>
                        <a href="" class="catalog_item_title">Насадка для спагетти и тонкой лапши MMC-SPC Насадка для спагетти и тонкой лапши MMC-SPC</a>
                        <div class="catalog_price">
                            <span class="main_price">228 990 ₽</span>
                            <span class="old_price">240 000 ₽</span>
                        </div>
                        <a class="btn">В корзину</a>
                        <div class="catalog_item_hover">
                            <a class="btn_white">Купить в 1 клик</a>
                        </div>
                    </div>
                </div>
                <div class="catalog_item">
                    <div class="catalog_item_block">
                        <a href="" class="catalog_item_img">
                            <img src="/local/templates/m1/img/catalog1.png">
                        </a>
                        <a href="" class="catalog_item_title">Насадка для спагетти и тонкой лапши MMC-SPC Насадка для спагетти и тонкой лапши MMC-SPC</a>
                        <div class="catalog_price">
                            <span class="main_price">228 990 ₽</span>
                            <span class="old_price">240 000 ₽</span>
                        </div>
                        <a class="btn">В корзину</a>
                        <div class="catalog_item_hover">
                            <a class="btn_white">Купить в 1 клик</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? */ ?>
<? $APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"m1", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BASKET_URL" => "/personal/cart/",
		"BIG_DATA_RCM_TYPE" => "personal",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TOP_VIEW_MODE" => "A",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "ADD",
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BRAND_USE" => "Y",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
			1 => "MAGNIFIER",
		),
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "BRAND_REF",
			2 => "NEWPRODUCT",
			3 => "SALELEADER",
			4 => "SPECIALOFFER",
			5 => "ARTNUMBER",
			6 => "MANUFACTURER",
			7 => "MATERIAL",
			8 => "COLOR",
			9 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"DETAIL_SHOW_POPULAR" => "Y",
		"DETAIL_SHOW_SLIDER" => "Y",
		"DETAIL_SHOW_VIEWED" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_USE_VOTE_RATING" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_VIEW_MODE" => "HORIZONTAL",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => \Local\Profitkit\Finder::iblockId("clothes","catalog"),
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"INSTANT_RELOAD" => "N",
		"LAZY_LOAD" => "Y",
		"LINE_ELEMENT_COUNT" => "3",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "ARTNUMBER",
			2 => "",
		),
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "round",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "30",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_PAGE_RESULT_COUNT" => "4",
		"SEARCH_RESTART" => "N",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "2",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_MAX_QUANTITY" => "M",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_TOP_ELEMENTS" => "Y",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"TEMPLATE_THEME" => "blue",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_BIG_DATA" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"USE_COMPARE" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "Y",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_REVIEW" => "Y",
		"USE_SALE_BESTSELLERS" => "Y",
		"USE_STORE" => "N",
		"COMPONENT_TEMPLATE" => "m1",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"LABEL_PROP" => array(
			0 => "NEWPRODUCT",
			1 => "SALELEADER",
			2 => "SPECIALOFFER",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
			0 => "ADD",
		),
		"TOP_PROPERTY_CODE_MOBILE" => array(
		),
		"TOP_VIEW_MODE" => "SECTION",
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"LIST_PROPERTY_CODE_MOBILE" => "",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_SHOW_SLIDER" => "N",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => "",
		"FILTER_NAME" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PRICE_CODE" => array(
		),
		"PRODUCT_DISPLAY_MODE" => "Y",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => array(
			0 => "COLORS",
			1 => "RAZMER",
		),
		"DISCOUNT_PERCENT_POSITION" => "top-right",
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "RAZMER",
			1 => "COLORS",
			2 => "",
		),
		"OFFERS_CART_PROPERTIES" => array(
			0 => "RAZMER",
			1 => "COLORS",
		),
		"TOP_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_OFFERS_PROPERTY_CODE" => array(
			0 => "RAZMER",
			1 => "COLORS",
			2 => "",
		),
		"TOP_OFFERS_LIMIT" => "5",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "ARTNUMBER",
			1 => "RAZMER",
			2 => "COLORS",
			3 => "",
		),
		"LIST_OFFERS_LIMIT" => "100",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "ARTNUMBER",
			1 => "RAZMER",
			2 => "COLORS",
			3 => "",
		),
		"DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => "",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => "top-left",
		"MESS_SHOW_MAX_QUANTITY" => "Наличие",
		"RELATIVE_QUANTITY_FACTOR" => "5",
		"MESS_RELATIVE_QUANTITY_MANY" => "много",
		"MESS_RELATIVE_QUANTITY_FEW" => "мало",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_ELEMENT_SORT_FIELD" => "sort",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"COMPARE_POSITION_FIXED" => "Y",
		"COMPARE_POSITION" => "top left",
		"DETAIL_SLIDER_INTERVAL" => "5000",
		"DETAIL_SLIDER_PROGRESS" => "N",
		"STORES" => array(
			0 => "1",
			1 => "",
		),
		"USE_MIN_AMOUNT" => "Y",
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FIELDS" => array(
			0 => "",
			1 => "",
		),
		"MIN_AMOUNT" => "10",
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"STORE_PATH" => "/store/#store_id#",
		"MAIN_TITLE" => "Наличие на складах",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "N",
		"MESSAGES_PER_PAGE" => "10",
		"USE_CAPTCHA" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "Y",
		"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_VK_API_ID" => "API_ID",
		"DETAIL_FB_APP_ID" => "",
		"DETAIL_BRAND_PROP_CODE" => array(
			0 => "",
			1 => "BRAND_REF",
			2 => "",
		),
		"SEF_FOLDER" => "/catalog/",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>