<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
	"AUTOPLAY" => Array(
		"NAME" => GetMessage("T_IBLOCK_AUTOPLAY"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "Y",
	),
	"AUTOPLAY_SPEED" => Array(
		"NAME" => GetMessage("T_IBLOCK_AUTOPLAY_SPEED"),
		"TYPE" => "CHECKBOX",
		"DEFAULT" => "5000",
	),
);
?>
