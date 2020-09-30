<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тенты Полога Шторы");

use Bitrix;
?><? if (CModule::IncludeModule("iblock")) {

    $res = CIBlockElement::GetByID(106);
    if($ar_res = $res->fetch())
    $mainImg = CFile::GetPath($ar_res['PREVIEW_PICTURE']);
    $mobileImg = CFile::GetPath($ar_res['DETAIL_PICTURE']);
} ?>

<script>
    $('.js-main-background').css('background-image', "url(<?= $mainImg ?>")

    if ($(window).width() <= '768'){
        $('.js-main-background').css('background-image', "url(<?= $mobileImg ?>")
    }
</script>
    <!-- Main Block -->
    <section id="main" class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall" data-options="{direction: &quot;reverse&quot;, settings_mode_oneelement_max_offset: &quot;150&quot;}">
        <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-black-opacity-0_3--after js-main-background" style="height: 120%;"></div>

        <div class="container g-pt-100--sm g-pt-50">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-7 g-mb-100--sm g-mb-30">
                    <!-- Content Info -->
                    <div class="mb-5">
                        <h1 class="g-color-white g-font-weight-600 g-font-size-26 g-font-size-40--lg mb-3">
                            <p>
                                <b>
                            <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/main_head.php"
	)
);?>
                                </b>
                            </p>
                        </h1>

                    </div>

                    <!-- End Content Info -->
                </div>

                <?$APPLICATION->IncludeComponent(
	"slam:easyform",
	"main",
	Array(
		"ACTIVE_ELEMENT" => "N",
		"CATEGORY_EMAIL_IBLOCK_FIELD" => "FORM_EMAIL",
		"CATEGORY_EMAIL_PLACEHOLDER" => "E-mail",
		"CATEGORY_EMAIL_TITLE" => "E-mail",
		"CATEGORY_EMAIL_TYPE" => "email",
		"CATEGORY_EMAIL_VALIDATION_ADDITIONALLY_MESSAGE" => "data-bv-emailaddress-message=\"E-mail введен некорректно\"",
		"CATEGORY_EMAIL_VALIDATION_MESSAGE" => "Обязательное поле",
		"CATEGORY_EMAIL_VALUE" => "",
		"CATEGORY_MESSAGE_PLACEHOLDER" => "",
		"CATEGORY_MESSAGE_TITLE" => "Сообщение",
		"CATEGORY_MESSAGE_TYPE" => "textarea",
		"CATEGORY_MESSAGE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_MESSAGE_VALUE" => "",
		"CATEGORY_PHONE_IBLOCK_FIELD" => "FORM_PHONE",
		"CATEGORY_PHONE_INPUTMASK" => "Y",
		"CATEGORY_PHONE_INPUTMASK_TEMP" => "+7 (999) 999-9999",
		"CATEGORY_PHONE_PLACEHOLDER" => "Телефон",
		"CATEGORY_PHONE_TITLE" => "Телефон",
		"CATEGORY_PHONE_TYPE" => "tel",
		"CATEGORY_PHONE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_PHONE_VALUE" => "",
		"CATEGORY_TITLE_IBLOCK_FIELD" => "NAME",
		"CATEGORY_TITLE_PLACEHOLDER" => "Имя",
		"CATEGORY_TITLE_TITLE" => "Имя",
		"CATEGORY_TITLE_TYPE" => "text",
		"CATEGORY_TITLE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_TITLE_VALUE" => "",
		"COMPONENT_TEMPLATE" => "main",
		"CREATE_IBLOCK" => "",
		"CREATE_SEND_MAIL" => "",
		"DISPLAY_FIELDS" => array(0=>"TITLE",1=>"EMAIL",2=>"PHONE",3=>"",),
		"EMAIL_BCC" => "",
		"EMAIL_FILE" => "N",
		"EMAIL_SEND_FROM" => "N",
		"EMAIL_TO" => "info@tenttrade.ru",
		"ENABLE_SEND_MAIL" => "Y",
		"ERROR_TEXT" => "Произошла ошибка. Сообщение не отправлено.",
		"EVENT_MESSAGE_ID" => array(),
		"FIELDS_ORDER" => "TITLE,EMAIL,PHONE",
		"FORM_AUTOCOMPLETE" => "Y",
		"FORM_ID" => "FORM2",
		"FORM_NAME" => "Заполните форму и получите скидку 15%",
		"FORM_SUBMIT_VALUE" => "получить скидку",
		"FORM_SUBMIT_VARNING" => "Нажимая на кнопку \"#BUTTON#\", вы даете согласие на обработку <a target=\"_blank\" href=\"#\">персональных данных</a>",
		"HIDE_ASTERISK" => "N",
		"HIDE_FIELD_NAME" => "N",
		"HIDE_FORMVALIDATION_TEXT" => "N",
		"IBLOCK_ID" => "17",
		"IBLOCK_TYPE" => "formresult",
		"INCLUDE_BOOTSRAP_JS" => "Y",
		"MAIL_SUBJECT_ADMIN" => "#SITE_NAME#: Сообщение из формы обратной связи",
		"OK_TEXT" => "Ваше сообщение отправлено.",
		"REQUIRED_FIELDS" => array(),
		"SEND_AJAX" => "Y",
		"SHOW_MODAL" => "N",
		"TITLE_SHOW_MODAL" => "Спасибо!",
		"USE_BOOTSRAP_CSS" => "Y",
		"USE_BOOTSRAP_JS" => "N",
		"USE_CAPTCHA" => "N",
		"USE_FORMVALIDATION_JS" => "Y",
		"USE_IBLOCK_WRITE" => "Y",
		"USE_INPUTMASK_JS" => "Y",
		"USE_JQUERY" => "N",
		"USE_MODULE_VARNING" => "Y",
		"WIDTH_FORM" => "",
		"_CALLBACKS" => "_callbacks"
	)
);?>
            </div>
        </div>
    </section>

    <!--    quiz block-->
    <section id="quiz">
        <div class="g-pt-100 container">
            <div class="text-center g-mb-50 d-md-none">
                <h2 class="quiz__head ">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/quiz_head.php"
	)
);?>
                </h2>
                <p class="quiz__text">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/quiz_text.php"
	)
);?>
                </p>
            </div>

			<div class="text-center g-mb-30">
				<h2 class="h2">Узнайте стоимость и сроки изготовления тента</h2>
			</div>

            <div class="marquiz__container marquiz__container_inline">
                <a class="marquiz__button marquiz__button_blicked g-rounded-5 marquiz__button_shadow" href="#popup:marquiz_5f36815e90f4360044246ea4" data-fixed-side="" data-alpha-color="rgba(33, 113, 150, 0.5)" data-color="#217196" data-text-color="#ffffff">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/quiz_button.php"
	)
);?>
                </a>
            </div>
        </div>
    </section>

    <!-- End Main Block -->
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"products",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "index",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("PRICE",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>


<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"additional",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "additional",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "index",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"DESC",1=>"",),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"faq",
	Array(

		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"NAME",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "index",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"asnwer",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>

    <section class="g-bg-gray-dark-v1 g-color-white g-py-50 g-pa-30 g-mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-9 align-self-center">
                    <h3 class="h4">
                        <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/cta_head.php"
	)
);?>

                        <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/cta_phone.php"
	)
);?>
                    </h3>
                    <p class="lead g-mb-20 g-mb-0--md">
                        <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/cta_text.php"
	)
);?>
                    </p>
                </div>

                <div class="col-md-3 align-self-center text-md-right">
                    <a class="btn btn-md u-btn-primary g-brd-2 rounded-0 g-bg-hover-opacity" href="#form_main">
                        <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/include/cta_button.php"
	)
);?>
                    </a>
                </div>
            </div>
        </div>
    </section>


<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"galery",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "galery",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "index",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
