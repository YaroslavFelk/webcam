<?
//Содержимое файла /bitrix/templates/.default/ajax/auth.php

if (!defined('PUBLIC_AJAX_MODE')) {
    define('PUBLIC_AJAX_MODE', true);
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
global $APPLICATION, $USER;

?>
<div class="auth_reg_form">
    <div class="auth_tab">
        <a  data-ajax="/ajax/auth.php">Авторизация</a>
        <span>Регистрация</span>
    </div>
    <div class="auth_tab_content">
    <?
    $APPLICATION->IncludeComponent(
    "bitrix:main.register",
    ".default",
    array(
        "AUTH" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "REQUIRED_FIELDS" => array(
            0 => "EMAIL",
            1 => "NAME",
            4 => "LAST_NAME",
            2 => "PERSONAL_PHONE",
        ),
        "SET_TITLE" => "N",
        "SHOW_FIELDS" => array(
            0 => "EMAIL",
            1 => "NAME",
            4 => "LAST_NAME",
            2 => "PERSONAL_PHONE",
        ),
        "SUCCESS_PAGE" => "",
        "USER_PROPERTY" => array(
        ),
        "USER_PROPERTY_NAME" => "",
        "USE_BACKURL" => "N"
    ),
    false
);
    ?>
    </div>
</div>
<?
//Это простая регистрация, если импользуете ее, то выше компонент bitrix:main.register закомментируйте!
//$APPLICATION->IncludeComponent("bitrix:system.auth.registration","",Array());


//Если в настройках главного модуля отключено "Запрашивать подтверждение регистрации по E-mail"
//и в настройках включена автоматическая авторизация после регистрации "AUTH" => "Y",
//то пользователю будет показано это сообщение и страница перезагрузится,
if($USER->IsAuthorized())
{
    $APPLICATION->RestartBuffer();
    $backurl = $_REQUEST["backurl"] ? $_REQUEST["backurl"] : '/';

    //тут выводим любую информацию посетителю
    ?>


    <p style="text-align:  center;margin-top:  30px;">
        <span style="color: #406199;">Вы зарегистрированы и успешно вошли на сайт!</span>
    </p>
    <p style="padding:  0 40px;text-align:  center;">Сейчас страница автоматически перезагрузится и Вы сможете продолжить работу под своим именем.</p>


    <script>
        function TSRedirectUser(){
            window.location.href = '/account/';
        }

        // - через 2 секунды перезагружаем страницу, чтобы вся страница знала, что посетитель авторизовался.
        // 1000 - это 1 секунда
        window.setTimeout('TSRedirectUser()',2000);
    </script>
    <?
}


