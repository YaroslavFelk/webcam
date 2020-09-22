<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<!-- <div class="location">
                              <span class="location__span">ваш регион:</span>
                              <a href="#" class="location__link">
                              <? if ($arResult['city']) { ?><?=$arResult['city'];?>
                              <? if ($arResult['auto']) { ?><span class="location__link_span">
                              (авт)
                              </span><? } ?>
                              <? } else { ?>
                              Санкт-Петербург
                              <? } ?>
                              </a>
</div> --> 
<h1 class="<? if($arResult['city'] == 'Санкт-Петербург'): ?>hidden<? endif; ?>" >Адреса доставки в <span class="contact_city_title"><?=$arResult['city'];?></span></h1>
	<div class="text-page__line">

	<div class="text-page__content">
        
         <div class="contact_city_descr <? if($arResult['city'] == 'Санкт-Петербург'): ?>hidden<? endif; ?>" >
             <p align="center">
                 <b>На карте отмечены пункты выдачи товара в городе <u><span class="contact_city_title"><?=$arResult['city']?></span></u>!</b>
             </p>
             <?$APPLICATION->IncludeComponent(
                 "bitrix:main.include",
                 "",
                 Array(
                     "AREA_FILE_SHOW" => "file",
                     "PATH" =>"/include/contact_text_1.php",
                     "EDIT_TEMPLATE" => ""
                 ),
                 false
             );?>
           </div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" =>"/include/contact_text_2.php",
                "EDIT_TEMPLATE" => ""
            ),
            false
        );?>

		</div>
		 <div class="text-page__content">
             <?$APPLICATION->IncludeComponent(
                 "bitrix:main.include",
                 "",
                 Array(
                     "AREA_FILE_SHOW" => "file",
                     "PATH" =>"/include/contact_text_3.php",
                     "EDIT_TEMPLATE" => ""
                 ),
                 false
             );?>

        <div class="social-networks">
            <div class="social-networks__wrapper">
                <a class="social-networks__item social-networks__item--vk" href="https://vk.com/mightysport"></a> <a class="social-networks__item social-networks__item--fb" href="https://www.facebook.com/%D0%92%D0%B5%D0%BB%D0%BE%D0%BC%D0%B0%D0%B3%D0%B0%D0%B7%D0%B8%D0%BD-Mighty-Sport-1702507053399691/?hc_ref=NEWSFEED&fref=nf"></a> <a class="social-networks__item social-networks__item--ok" href="https://ok.ru/group/53235970277598"></a> <a class="social-networks__item social-networks__item--inst" href="https://www.instagram.com/mightysportspb/"></a> <a class="social-networks__item social-networks__item--twtr" href="https://twitter.com/MightySport"></a> <a class="social-networks__item social-networks__item--youtube" href="https://www.youtube.com/channel/UCnWL_ZGLjlNsHhO37hAX2ug"></a> <a class="social-networks__item social-networks__item--g" href="#"></a>
            </div>
        </div>
    </div>
</div>
	<div class="pattern-fluid">
		<div class="pattern-line">
 <img src="/local/templates/shop/images/decoration/pattern-line.png" alt="">
		</div>
	</div>
	<div class="contact_city_select_title">
    	<h3>Выберите город</h3>
	    <? $APPLICATION->IncludeComponent(

                                'bitrix:sale.location.selector.search',

                                '.default',

                                array(/*"CODE"=>$arResult['citycode'],*/

                                    "INPUT_NAME" => "mycitycont",

                                    "PROVIDE_LINK_BY" => "code",

                                    "JS_CALLBACK" => "changecityContact"),

                                false
                            ); ?>
	</div>

	
	<div id="forpvz" style="width:100%; height:600px;">
</div>
<? if($arResult['city'] != 'Санкт-Петербург'): ?>
<script type="text/javascript">
    var ourWidjet = new ISDEKWidjet ({
        defaultCity: '<?=$arResult['city']?>', //какой город отображается по умолчанию
        cityFrom: 'Санкт-Петербург', // из какого города будет идти доставка
        country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
        link: 'forpvz', // id элемента страницы, в который будет вписан виджет
        path: 'https://widget.cdek.ru/widget/scripts/', //директория с бибилиотеками
        servicepath: 'https://www.mighty-sport.ru/widget/scripts/service.php', //ссылка на файл service.php на вашем сайте
        apikey: '71ab62fe-2e19-471a-b30b-233f046b35fd'
    });
</script>
<? else: ?>
<div class="spb_map_wrap">
    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aaec1ca8659e6946088b91937c951de835bab7df8875025c209de0b1fad6077d0&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe> 
    
</div>
<script>

jQuery("#forpvz").hide();

</script>
<? endif; ?>

<? if ($arResult['city'] != 'Санкт-Петербург' and $arResult['city']) { ?>
<!-- <script>
    jQuery(".product__hidden-info .product__delivery").hide();
    jQuery(".product__delivery_hr").hide();
</script> -->

<? } ?>
<? if ($arParams['FIRST'] == 1) { ?>

    <style>
        .citychangepopupIn .dropdown-block {padding-top: 8px;}
        .citychangepopupIn .dropdown-icon {top: 19px;}
    </style>
    <script>
        function changecityContact()
        {
                     
            var query = {
                c: 'profitkit:geo',
                action: 'SetCity',
                mode: 'class'
            };
            var data = {
                id: jQuery("input[name=mycitycont]").val()
            };
            console.log(data);
            BX.ajax({
                method: 'POST',
                data: data,
                dataType: 'json',
                url: '/bitrix/services/main/ajax.php?' + $.param(query, true),
                onsuccess: function(result) {
                  
                    jQuery(".contact_city_title").text(result.data.city);
                  //  jQuery(".location__link").html(result.data.city);
                    
                    if(result.data.city != 'Санкт-Петербург') {
                        
                        jQuery("#forpvz").show();
                        jQuery(".spb_map_wrap").hide();
                        jQuery(".contact_city_descr").show();
                        
                        var ourWidjet = new ISDEKWidjet ({
                        defaultCity: result.data.city, //какой город отображается по умолчанию
                        cityFrom: 'Санкт-Петербург', // из какого города будет идти доставка
                        country: 'Россия', // можно выбрать страну, для которой отображать список ПВЗ
                        link: 'forpvz', // id элемента страницы, в который будет вписан виджет
                        path: 'https://widget.cdek.ru/widget/scripts/', //директория с бибилиотеками
                        servicepath: 'https://www.mighty-sport.ru/widget/scripts/service.php', //ссылка на файл service.php на вашем сайте
                            apikey: '71ab62fe-2e19-471a-b30b-233f046b35fd'
                    });
                        
                    } else {
                        jQuery("#forpvz").hide();
                        jQuery(".spb_map_wrap").show();
                        jQuery(".contact_city_descr").hide();
                    }
                    
                    
                    
                    //console.log(result);
                    //obPopupWin.close();
                }
            });
        }
    </script>
    <? /* if ($_GET['dd']==1 or true) {?>
        <div id="changecity" class="popup-window popup-window-content-white popup-window-with-titlebar"
             style="z-index: 1100; position: absolute; display: none; top: 225px; left: 780px;">
            <div class="popup-window-titlebar" id="popup-window-titlebar-citychangepopup"><span
                        class="popup-window-titlebar-text">Выбор города</span></div>
            <div id="popup-window-content-changecity" class="popup-window-content">
                <div style="width: 100%; margin: 0; text-align: center;" class="citychangepopupIn">
                    <div class="inputChangeCity" style="">
                        <div id="sls-43345" class="bx-sls ">
                            <? $APPLICATION->IncludeComponent(

                                'bitrix:sale.location.selector.search',

                                '.default',

                                array(/*"CODE"=>$arResult['citycode'],

                                    "INPUT_NAME" => "mycity",

                                    "PROVIDE_LINK_BY" => "code",

                                    "JS_CALLBACK" => "changecity"),

                                false
                            ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <span class="popup-window-close-icon popup-window-titlebar-close-icon"></span></div>
        <div class="popup-window-overlay" id="popup-window-overlay-changecity"
             style="z-index: 1099; width: 1903px; height: 5289px; display: none;"></div>
        <? } */  ?>
<? } ?>
