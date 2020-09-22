<?php
/**
 * Created by PhpStorm.
 * User: alexe
 * Date: 14.01.2020
 * Time: 15:48
 */
namespace Local\Profitkit;
use Bex\Tools\Iblock\IblockTools;
use Bex\Tools\HlBlock\HlBlockTools;

class Finder
{
    static public function iblockId($name, $type = 'content_m1')
    {
        return IblockTools::find($type, $name)->id();
    }

    static public function hblockId($name)
    {
        return HlBlockTools::find($name)->id();
    }
}