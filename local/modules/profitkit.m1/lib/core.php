<?
namespace Profitkit\M1;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Mail\Event; 
use Bitrix\Main\Application;
use Bitrix\Main;

Loc::loadMessages(__FILE__);

class Core
{
    public static function checkRestartBuffer(){
        global $APPLICATION;
        static $bRestarted;

        if($bRestarted)
            die();


        if((strtolower($_REQUEST['fast_view']) == 'y'))
        {
            $APPLICATION->RestartBuffer();
            $bRestarted = true;
        }
    }

    public static function OnPageStartHandler(){
        if(defined("ADMIN_SECTION")){
            return;
        }
    }

    static function OnEndBufferContentHandler(&$content)
    {
        if(!defined('ADMIN_SECTION') && !defined('WIZARD_SITE_ID'))
        {
            global $SECTION_BNR_CONTENT, $noLeftSidebar, $arRegion, $APPLICATION;
            //replace text/javascript for html5 validation w3c
            /*$content = str_replace(' type="text/javascript"', '', $content);
            $content = str_replace(' type=\'text/javascript\'', '', $content);
            $content = str_replace(' type="text/css"', '', $content);
            $content = str_replace(' type=\'text/css\'', '', $content);
            $content = str_replace(' charset="utf-8"', '', $content);*/

            if($SECTION_BNR_CONTENT)
            {
                $start = strpos($content, '<!--title_content-->');
                if($start>0)
                {
                    $end = strpos($content, '<!--end-title_content-->');

                    if(($end>0) && ($end>$start))
                    {
                        if(defined("BX_UTF") && BX_UTF === true)
                            $content = self::utf8_substr_replace($content, "", $start, $end-$start);
                        else
                            $content = substr_replace($content, "", $start, $end-$start);
                    }
                }
                //$content = str_replace("body class=\"", "body class=\"with_banners ", $content);
            }

            if ($noLeftSidebar) {
                $start = strpos($content, '<!--width_sidebar-->');
                if($start>0)
                {
                    $end = strpos($content, '<!--end-width_sidebar-->');

                    if(($end>0) && ($end>$start))
                    {
                        if(defined("BX_UTF") && BX_UTF === true)
                            $content = self::utf8_substr_replace($content, '<div class="row"><div class="col-12">', $start, $end-$start);
                        else
                            $content = substr_replace($content, '<div class="row"><div class="col-12">', $start, $end-$start);
                    }
                }
            }
        }
    }

    static function utf8_substr_replace($original, $replacement, $position, $length){
        $startString = mb_substr($original, 0, $position, 'UTF-8');
        $endString = mb_substr($original, $position + $length, mb_strlen($original), 'UTF-8');

        $out = $startString.$replacement.$endString;

        return $out;
    }
}