<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php
//use Bitrix\Main\Page\Asset;
//use \Bitrix\Main\Localization\Loc;
//Loc::loadLanguageFile(__FILE__);
//$full_width = $APPLICATION->GetProperty("full");
//$left_menu = $APPLICATION->GetProperty("left_menu");
//$sidebar = $APPLICATION->GetProperty("sidebar");
//global $noLeftSidebar;
//?>

<footer class="footer">

    <div class="footer__top-row">
        <div class="container container--small">
            <div class="footer__logo-block footer__block">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => '/include/footer_logo.php',
                    )
                ); ?>
                <p class="footer__slogan">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => '/include/footer_text.php',
                        )
                    ); ?>
                </p>
            </div>
            <div class="footer__menu-block footer__menu-block--left footer__block">
                <? $APPLICATION->IncludeComponent("bitrix:menu", "footer", array(
                    "NAME" => "Информация",
                    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                    "CHILD_MENU_TYPE" => "bottom",    // Тип меню для остальных уровней
                    "DELAY" => "N",    // Откладывать выполнение шаблона меню
                    "MAX_LEVEL" => "1",    // Уровень вложенности меню
                    "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                    "MENU_CACHE_TYPE" => "Y",    // Тип кеширования
                    "MENU_CACHE_USE_GROUPS" => "N",    // Учитывать права доступа
                    "MENU_THEME" => "site",
                    "ROOT_MENU_TYPE" => "bottom-add",    // Тип меню для первого уровня
                    "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "COMPONENT_TEMPLATE" => "footer"
                ),
                                                  false
                ); ?>
            </div>
            <div class="footer__menu-block footer__menu-block--right footer__block">
                <? $APPLICATION->IncludeComponent("bitrix:menu", "footer", array(
                    "NAME" => "Другие страницы",
                    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                    "CHILD_MENU_TYPE" => "bottom",    // Тип меню для остальных уровней
                    "DELAY" => "N",    // Откладывать выполнение шаблона меню
                    "MAX_LEVEL" => "1",    // Уровень вложенности меню
                    "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                    "MENU_CACHE_TYPE" => "Y",    // Тип кеширования
                    "MENU_CACHE_USE_GROUPS" => "N",    // Учитывать права доступа
                    "MENU_THEME" => "site",
                    "ROOT_MENU_TYPE" => "bottom-pages",    // Тип меню для первого уровня
                    "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "COMPONENT_TEMPLATE" => "footer"
                ),
                                                  false
                ); ?>
            </div>
            <div class="footer__contacts-block footer__block">
                <h2 class="footer__block-heading">
                    Контакты
                </h2>
                <ul class="footer__menu-list footer__menu-list--contacts">
                    <li class="footer__menu-item">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => '/include/footer_phone.php',
                            )
                        ); ?>
                    </li>
                    <li class="footer__menu-item">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => '/include/footer_mail.php',
                            )
                        ); ?>

                    </li>
                </ul>
                <ul class="footer__social">
                    <li class="footer__social-item">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => '/include/footer_facebook.php',
                            )
                        ); ?>
                    </li>
                    <li class="footer__social-item">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => '/include/footer_twitter.php',
                            )
                        ); ?>
                    </li>
                    <li class="footer__social-item">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => '/include/footer_instagram.php',
                            )
                        ); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer__copyright-row">
        <div class="container container--small">
            <p class="footer__copyright">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => '/include/footer_copyright.php',
                    )
                ); ?>
            </p>
        </div>
    </div>
</footer>

<?$APPLICATION->IncludeComponent(
    "slam:easyform",
    "popup",
    array(
        "ACTIVE_ELEMENT" => "N",
        "CATEGORY_BUDGET_ADD_VAL" => "Другое (напишите свой вариант)",
        "CATEGORY_BUDGET_IBLOCK_FIELD" => "FORM_BUDGET",
        "CATEGORY_BUDGET_MULTISELECT" => "N",
        "CATEGORY_BUDGET_TITLE" => "Уровень английского",
        "CATEGORY_BUDGET_TYPE" => "select",
        "CATEGORY_BUDGET_VALIDATION_ADDITIONALLY_MESSAGE" => "",
        "CATEGORY_BUDGET_VALUE" => array(
            0 => "Не знаю",
            1 => "Базовый ",
            2 => "Разговорный",
            3 => "",
        ),
        "CATEGORY_DOCS_DROPZONE_INCLUDE" => "N",
        "CATEGORY_DOCS_FILE_EXTENSION" => "doc, docx, xls, xlsx, txt, rtf, pdf, png, jpeg, jpg, gif",
        "CATEGORY_DOCS_FILE_MAX_SIZE" => "20971520",
        "CATEGORY_DOCS_IBLOCK_FIELD" => "FORM_DOCS",
        "CATEGORY_DOCS_TITLE" => "Загрузить фото",
        "CATEGORY_DOCS_TYPE" => "file",
        "CATEGORY_EMAIL_IBLOCK_FIELD" => "FORM_EMAIL",
        "CATEGORY_EMAIL_PLACEHOLDER" => "Почта",
        "CATEGORY_EMAIL_TITLE" => "Почта",
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
        "CATEGORY_TITLE_PLACEHOLDER" => "Как вас зовут?",
        "CATEGORY_TITLE_TITLE" => "Как вас зовут?",
        "CATEGORY_TITLE_TYPE" => "text",
        "CATEGORY_TITLE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
        "CATEGORY_TITLE_VALUE" => "",
        "CREATE_IBLOCK" => "",
        "CREATE_SEND_MAIL" => "",
        "DISPLAY_FIELDS" => array(
            0 => "TITLE",
            1 => "EMAIL",
            2 => "PHONE",
            3 => "BUDGET",
            4 => "DOCS",
            5 => "AGE",
            6 => "",
        ),
        "EMAIL_BCC" => "",
        "EMAIL_FILE" => "N",
        "EMAIL_SEND_FROM" => "N",
        "EMAIL_TO" => "",
        "ENABLE_SEND_MAIL" => "Y",
        "ERROR_TEXT" => "Произошла ошибка. Сообщение не отправлено.",
        "EVENT_MESSAGE_ID" => array(
            0 => "16",
        ),
        "FIELDS_ORDER" => "TITLE,AGE,EMAIL,PHONE,BUDGET,DOCS",
        "FORM_AUTOCOMPLETE" => "Y",
        "FORM_ID" => "FORM8",
        "FORM_NAME" => "Отправь анкету",
        "FORM_SUBMIT_VALUE" => "Отправить анкету",
        "FORM_SUBMIT_VARNING" => "Нажимая на кнопку \"#BUTTON#\", вы даете согласие на обработку <a target=\"_blank\" href=\"#\">персональных данных</a>",
        "HIDE_ASTERISK" => "Y",
        "HIDE_FIELD_NAME" => "Y",
        "HIDE_FORMVALIDATION_TEXT" => "N",
        "IBLOCK_ID" => "27",
        "IBLOCK_TYPE" => "formresult",
        "INCLUDE_BOOTSRAP_JS" => "Y",
        "MAIL_SUBJECT_ADMIN" => "#SITE_NAME#: Сообщение из формы обратной связи",
        "OK_TEXT" => "Ваше сообщение отправлено. Мы свяжемся с вами в течение 2х часов",
        "REQUIRED_FIELDS" => array(
        ),
        "SEND_AJAX" => "Y",
        "SHOW_MODAL" => "N",
        "TITLE_SHOW_MODAL" => "Спасибо!",
        "USE_BOOTSRAP_CSS" => "N",
        "USE_BOOTSRAP_JS" => "N",
        "USE_CAPTCHA" => "N",
        "USE_FORMVALIDATION_JS" => "Y",
        "USE_IBLOCK_WRITE" => "Y",
        "USE_INPUTMASK_JS" => "Y",
        "USE_JQUERY" => "N",
        "USE_MODULE_VARNING" => "Y",
        "WIDTH_FORM" => "",
        "_CALLBACKS" => "",
        "COMPONENT_TEMPLATE" => "popup",
        "NAME_MODAL_BUTTON" => "Обратная связь",
        "CATEGORY_AGE_TITLE" => "Возраст",
        "CATEGORY_AGE_TYPE" => "text",
        "CATEGORY_AGE_PLACEHOLDER" => "Возраст",
        "CATEGORY_AGE_VALUE" => "",
        "CATEGORY_AGE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
        "CATEGORY_AGE_IBLOCK_FIELD" => "FORM_AGE"
    ),
    false
);?>

</body>
</html>