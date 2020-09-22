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
        <span>Авторизация</span>
        <a data-ajax="/ajax/registration.php">Регистрация</a>
    </div>
    <div class="auth_tab_content">
    <?
    //Компонент с шаблоном errors выводит только ошибки
    $APPLICATION->IncludeComponent(
        "bitrix:system.auth.form",
        ".default",
        array(
            "FORGOT_PASSWORD_URL" => "/personal/forgot_password/",
            "PROFILE_URL" => "/personal/",
            "REGISTER_URL" => "",
            "SHOW_ERRORS" => "Y",
            "COMPONENT_TEMPLATE" => ".default"
        ),
        false
    );
    ?>
    </div>
</div>
<?

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
        <span style="color: #406199;">Вы успешно вошли на сайт!</span>
    </p>
    <p style="padding:  0 40px;text-align:  center;">Сейчас страница автоматически перезагрузится и Вы сможете продолжить работу под своим именем.</p>
    <script>
        function TSRedirectUser(){
            window.location.href = '/personal/';
        }

        // - через 2 секунды перезагружаем страницу, чтобы вся страница знала, что посетитель авторизовался.
        // 1000 - это 1 секунда
        window.setTimeout('TSRedirectUser()',2000);
    </script>
    <?
}


