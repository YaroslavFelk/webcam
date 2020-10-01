<?php
include_once ($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/wsrubi.smtp/classes/general/wsrubismtp.php");
$autoloadPathDbconn= realpath(__DIR__).'/../composer/vendor/autoload.php';
if ($_REQUEST['mode'] != 'import')
    require_once($autoloadPathDbconn) ;
/*CModule::AddAutoloadClasses(
    '', //не указываем имя модуля, так как автозагрузка устанавливается глобально
    array(
        '\Profitkit\Finder' => '/local/classes/profitkit/Finder.php', // имя класса => путь к файлу содержащему класс
    )
);*/

