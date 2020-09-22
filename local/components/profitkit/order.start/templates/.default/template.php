<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
use \Bitrix\Main\Localization\Loc;
$this->setFrameMode(false);
$this->addExternalCss(SITE_TEMPLATE_PATH."/css/nice-select.css");
$this->addExternalCss(SITE_TEMPLATE_PATH."/css/jquery.flexdatalist.css");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/jquery.nice-select.min.js");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/jquery.mask.min.js");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/jquery.flexdatalist.min.js");
?>
<div class="preload-ajax">
    <? if($arResult['result'] == 1) { ?>
        <p class="success_add_form">Заказ №<?=$arResult['ORDER_ID'];?> оформлен</p>
    <? } else {?>
    <form action="" method="post" enctype="multipart/form-data" class="orderform orderform-reload">

        <div class="row user_data">
            <div class="order_header">
                <h1>Оформление заказа</h1>
                <a href="<?=$arParams['CART_URL'];?>" class="last_page">
                    <i><svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.14869 0.542355C6.46065 0.240092 6.95623 0.240092 7.26818 0.542355V0.542355C7.59438 0.858417 7.59438 1.38169 7.26818 1.69775L2.31194 6.5L7.26818 11.3023C7.59438 11.6183 7.59438 12.1416 7.26818 12.4576V12.4576C6.95623 12.7599 6.46065 12.7599 6.14869 12.4576L0.741206 7.21818C0.335688 6.82526 0.335687 6.17474 0.741205 5.78182L6.14869 0.542355Z" fill="#337FD2"/>
                        </svg></i><span>Вернуться в корзину</span>
                </a>
            </div>

<!--            <div class="row all_price_order">-->
<!--                <h3>Общая стоимость:  <span>10 015</span> ₽</h3>-->
<!--            </div>-->
            <div class="area_date">
                <? if (count($arResult['error']) > 0) { ?>
                    <p class="error_add_form" style="margin-top: 20px;">
                        <?=implode("<br>", $arResult['error']);?>
                    </p>
                <? } ?>
                <div class="row" id="ud__personal_data">
                    <h2><?= Loc::getMessage("PK_ORDER_STEP_PERSONAL") ?></h2>
                    <div class="row">
                        <div class="select_face">
                            <? if (is_array($arResult['PERSONS']) and count($arResult['PERSONS']) > 1) {  ?>
                            <? foreach ($arResult['PERSONS'] as $k => $person) { ?>
                            <div class="col-4">
                                <div class="fld_row">
                                    <input type="radio" id="ff<?=$k;?>" name="person_type_id" value="<?=$k;?>"<? if ($arResult['person_type_id'] == $k) { ?> checked<? } ?>><label class="fld_radio" for="ff<?=$k;?>"><?=$person;?></label>
                                </div>
                            </div>
                            <? } ?>
                            <? } ?>
                        </div>
                        <? if (!$USER->IsAuthorized()) { ?>
                        <div class="autoriz">
                            <p><?= Loc::getMessage("PK_ORDER_AUTH_TEXT") ?></p>
                            <a data-toggle="pkModal" data-target="#authModal" data-ajax="/ajax/auth.php"><?= Loc::getMessage("PK_ORDER_AUTH") ?></a>
                        </div>
                        <? } ?>
                    </div>
                    <div class="row group_input">
                        <? foreach ($arResult['FIELDS'] as $field) {
                            if ($field['GROUP_ID'] != 1) continue;
                            ?>
                        <div class="col-4">
                            <div class="fld_row">
                                <label><?=$field['NAME'];?>:<? if ($field['REQUIRED'] == 1) { ?> <span class="fld_req">*</span><? } ?></label>
                                <input type="text"<? if ($field['REQUIRED'] == 1) { ?> required<? } ?> name="orderprop_<?=$field['ID'];?>" value="<?=$field['DEFAULT_VALUE'];?>" placeholder=""<? if ($field['ERROR']) { ?> class="input_error"<? } ?>>
                                <? if ($field['ERROR']) { ?><span class="input_error_text">Заполните поле</span><? } ?>
                            </div>
                        </div>
                        <? } ?>
                    </div>
                </div>
                <div class="row" id="ud__inform_delivery">
                    <h2><?= Loc::getMessage("PK_ORDER_STEP_DELIVERY") ?></h2>
                    <div class="row" id="select_city">
                        <? foreach ($arResult['FIELDS'] as $field) {
                        if ($field['GROUP_ID'] != 2 or $field['IS_CITY'] != 'Y') continue;
                        ?>
                        <div class="col-6">
                            <label>Ваш город:</label>
                            <div class="fld_row datalist">
                                <input type='text'
                                       placeholder='Введите название своего города'
                                       class='flexdatalist'
                                       data-data='/include/cities.json'
                                       data-search-in='city'
                                       data-visible-properties='["city"]'
                                       data-selection-required='true'
                                       data-value-property='*'
                                       data-min-length='0'
                                    <? if ($field['REQUIRED'] == 1) { ?> required<? } ?> name="orderprop_<?=$field['ID'];?>" value="<?=$field['DEFAULT_VALUE'];?>" placeholder=""<? if ($field['ERROR']) { ?> class="input_error"<? } ?>>
                                <? if ($field['ERROR']) { ?><span class="input_error_text">Заполните поле</span><? } ?>
                            </div>
                        </div>
                        <? } ?>
                        <div class="col-12">
                            <p>Если вы из другого региона, то начните вводить название своего города.</p>
                        </div>
                    </div>
                    <? if (is_array($arResult['DELIVERY'])) { ?>
                    <div class="row" id="way_adress">
                        <h3 data-brackets-id="1032">Как доставить:</h3>
                        <div class="row group_input">
                            <? foreach ($arResult['DELIVERY'] as $delivery) {?>
                            <div class="col-4 dynamic_input_radio<? if ($arResult['DELIVERY_ID'] == $delivery['ID']) { ?> checked_group_radio<? } ?>" tabindex="<?=$delivery['ID'];?>">
                                <div class="input_radio_block">
                                    <div class="input_radio_info_block">
                                        <input type="radio" name="order_delivery_id"<? if ($arResult['DELIVERY_ID'] == $delivery['ID']) { ?> checked<? } ?> id="select_way_delivery_<?=$delivery['ID'];?>" value="<?=$delivery['ID'];?>">
                                        <label for="select_way_delivery_<?=$delivery['ID'];?>"></label>
                                        <div class="input_radio_img">
                                            <img src="<?=$delivery['IMAGE_SRC'];?>">
                                        </div>
                                        <div class="input_radio_info">
                                            <strong><?=$delivery['NAME'];?></strong>
                                            <p><?=$delivery['PRICE'];?></p>
                                        </div>
                                    </div>
                                    <div class="input_radio_descript">
                                        <?=$delivery['DESCRIPTION'];?>
                                    </div>
                                </div>
                                <div class="dynamic_layout_tabindex"></div>
                            </div>
                            <? } ?>
                        </div>
                    </div>
                    <? } ?>
                    <? if ($arResult['IS_DELIVERY_FIELDS'] == 'Y') { ?>
                    <div class="row way_delivery_tabs">
                        <div class="way_tab" tabindex="<?=$arResult['DELIVERY_ID'];?>">
                            <h3 data-brackets-id="1032">Куда доставить:</h3>
                            <div class="row group_input">
                                <? foreach ($arResult['FIELDS'] as $field) {
                                if ($field['GROUP_ID'] != 2 or $field['IS_CITY'] == 'Y') continue;
                                ?>
                                    <div class="col-3">
                                        <div class="fld_row">
                                            <label><?=$field['NAME'];?>:<? if ($field['REQUIRED'] == 1) { ?> <span class="fld_req">*</span><? } ?></label>
                                            <input type="text"<? if ($field['REQUIRED'] == 1) { ?> required<? } ?> name="orderprop_<?=$field['ID'];?>" value="<?=$field['DEFAULT_VALUE'];?>" placeholder=""<? if ($field['ERROR']) { ?> class="input_error"<? } ?>>
                                            <? if ($field['ERROR']) { ?><span class="input_error_text">Заполните поле</span><? } ?>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                    <? } ?>
                </div>
                <? if (is_array($arResult['PAYMENT'])) { ?>
                <div class="row" id="ud__inform_way">
                    <h2><?= Loc::getMessage("PK_ORDER_STEP_PAY") ?></h2>
                    <div class="row" id="way_pay">
                        <div class="row group_input">
                            <? foreach ($arResult['PAYMENT'] as $payment) { ?>
                            <div class="col-4 input_radio_block<? if ($arResult['PAYMENT_ID'] == $payment['ID']) { ?> checked_group_radio<? } ?>">
                                <div class="input_radio_info_block">
                                    <input type="radio" name="order_payment_id"<? if ($arResult['PAYMENT_ID'] == $payment['ID']) { ?> checked<? } ?> id="select_pay_delivery_<?=$payment['ID'];?>" value="<?=$payment['ID'];?>">
                                    <label for="select_pay_delivery_<?=$payment['ID'];?>"></label>
                                    <div class="input_radio_img">
                                        <img src="<?=$payment['IMAGE_SRC'];?>">
                                    </div>
                                    <div class="input_radio_info">
                                        <strong><?=$payment['NAME'];?></strong>
                                    </div>
                                </div>
                            </div>
                            <? } ?>
                        </div>

                    </div>

                </div>
                <? } ?>
                <div class="row" id="ud__inform_way2">
                    <div class="row descript_order">
                        <div class="fld_row"><textarea placeholder="Комментарий к заказу" name="order_comment"><?=$arResult['order_comment'];?></textarea></div>
                    </div>
                </div>
                <div class="row" id="ud_btn">
                    <div class="col-5">
                        <? if ($arParams['SOGLASIE'] == 'Y') { ?>
                        <div class="fld_row">
                            <input type="checkbox" id="agreement" name="SOGLASIE" value="Y">
                            <label class="fld_checkbox" for="agreement">Я ознакомился с <a href="#">соглашением сервиса</a> и согласен с условиями предоставления услуг.</label>
                        </div>
                        <? } ?>
                        <div class="fld_row">
                            <input class="btn" type="submit" value="<?= Loc::getMessage("PK_ORDER_SUBMIT") ?>"></div>
                    </div>
                </div>
            </div>
            <div id="final_count">
                <p class="h2"><?= Loc::getMessage("PK_ORDER_SUM_ALL") ?><span><?=$arResult['SUM_ALL_formated'];?></span></p>
                <ul>
                    <li class="row"><?= Loc::getMessage("PK_ORDER_SUM_ITEMS") ?><span><?=$arResult['SUM_ITEMS_formated'];?></span></li>
                    <li class="row">Доставка <span><?=$arResult['SUM_DELIVERY_formated'];?></span></li>
                    <? if (isset($arResult['DISCOUNT_ALL_formated'])) { ?><li class="row"><?= Loc::getMessage("PK_ORDER_DISCOUNT") ?><span><?=$arResult['DISCOUNT_ALL_formated'];?></span></li><? } ?>
                </ul>
            </div>
        </div>

    </form>
    <? } ?>
    <?php
    $signer = new Bitrix\Main\Security\Sign\Signer;
    $signedParams = $signer->sign(base64_encode(serialize($arParams)), 'order.start');
    ?>
<script>
    var signedParamsStringOrder ='<?=urlencode($signedParams)?>';
</script>

</div>