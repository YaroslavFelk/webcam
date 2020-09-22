<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$newitems = [];
foreach ($arResult['ITEMS'] as $item) {
    $newitems[$item['IBLOCK_SECTION_ID']][] = $item;
}

$arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID']);
$by = 'SORT';
$order = 'ASC';
$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
while($ar_result = $db_list->GetNext())
{
    $ar_result['ITEMS'] = $newitems[$ar_result['ID']];
    $result[] = $ar_result;
}

$arResult['SECTION_ITEMS'] = $result;