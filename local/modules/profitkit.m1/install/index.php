<?php

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bex\D7dull\ExampleTable;

Loc::loadMessages(__FILE__);

class profitkit_m1 extends CModule
{

    const moduleClassEvents = 'coreM1';

    public function __construct()
    {
        $arModuleVersion = array();
        
        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion))
        {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }
        
        $this->MODULE_ID = 'profitkit.m1';
        $this->MODULE_NAME = Loc::getMessage('PROFITKIT_CORE_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('PROFITKIT_CORE_MODULE_DESCRIPTION');
        $this->MODULE_GROUP_RIGHTS = 'N';
        $this->PARTNER_NAME = Loc::getMessage('PROFITKIT_CORE_MODULE_PARTNER_NAME');
        $this->PARTNER_URI = 'http://profitkit.ru';
    }

    public function doInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->InstallFiles();
        $this->InstallEvents();
    }

    public function doUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
        $this->unInstallFiles();
        $this->unInstallEvents();
    }

    function InstallEvents(){
        RegisterModuleDependences("main", "OnPageStart", $this->MODULE_ID, self::moduleClassEvents, "OnPageStartHandler");
        RegisterModuleDependences('main', 'OnEndBufferContent', $this->MODULE_ID, self::moduleClassEvents, 'OnEndBufferContentHandler');

        return true;
    }

    function UnInstallEvents(){
        UnRegisterModuleDependences("main", "OnPageStart", $this->MODULE_ID, self::moduleClassEvents, "OnPageStartHandler");
        UnRegisterModuleDependences("main", "OnEndBufferContent", $this->MODULE_ID, self::moduleClassEvents, "OnEndBufferContentHandler");

        return true;
    }



    function InstallFiles(){
        CopyDirFiles(__DIR__.'/admin/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin', true);
        /*CopyDirFiles(__DIR__.'/css/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/css/'.self::partnerName.'.'.self::solutionName, true, true);
        CopyDirFiles(__DIR__.'/js/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/js/'.self::partnerName.'.'.self::solutionName, true, true);
        CopyDirFiles(__DIR__.'/images/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/images/'.self::partnerName.'.'.self::solutionName, true, true);
        CopyDirFiles(__DIR__.'/components/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/components', true, true);
        CopyDirFiles(__DIR__.'/wizards/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/wizards', true, true);*/

        return true;
    }

    function InstallPublic(){
    }

    function UnInstallFiles(){
        DeleteDirFiles(__DIR__.'/admin/', $_SERVER['DOCUMENT_ROOT'].'/bitrix/admin');
        /*DeleteDirFilesEx('/bitrix/css/'.self::partnerName.'.'.self::solutionName.'/');
        DeleteDirFilesEx('/bitrix/js/'.self::partnerName.'.'.self::solutionName.'/');
        DeleteDirFilesEx('/bitrix/images/'.self::partnerName.'.'.self::solutionName.'/');
        DeleteDirFilesEx('/bitrix/wizards/'.self::partnerName.'/'.self::solutionName.'/');*/


        return true;
    }
}
