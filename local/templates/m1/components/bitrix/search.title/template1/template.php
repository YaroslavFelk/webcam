<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>
	<div id="<?echo $CONTAINER_ID?>">
	<form action="<?echo $arResult["FORM_ACTION"]?>">
        <input id="<?echo $INPUT_ID?>" type="text" name="q" value="" size="40" maxlength="50" autocomplete="off" class="header_search_input" /><button name="s" type="submit" class="header_search_btn"><i><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.6554 17.9918L14.8219 13.1582C15.8525 11.7829 16.4707 10.0824 16.4707 8.23529C16.4707 3.69412 12.7766 0 8.23535 0C3.69414 0 0 3.69412 0 8.23529C0 12.7765 3.69414 16.4706 8.23535 16.4706C10.0824 16.4706 11.783 15.8524 13.1583 14.8218L17.9919 19.6553C18.2219 19.8853 18.5225 20 18.8237 20C19.1248 20 19.4254 19.8853 19.6554 19.6553C20.1149 19.1959 20.1149 18.4512 19.6554 17.9918ZM2.35296 8.23529C2.35296 4.99177 4.9918 2.35294 8.23535 2.35294C11.4789 2.35294 14.1178 4.99177 14.1178 8.23529C14.1178 11.4788 11.4789 14.1176 8.23535 14.1176C4.9918 14.1176 2.35296 11.4788 2.35296 8.23529Z" fill="#4B4B4B"/>
                </svg>
            </i></button>
	</form>
	</div>
<?endif?>
<script>
	BX.ready(function(){
		new JCTitleSearch({
			'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
			'INPUT_ID': '<?echo $INPUT_ID?>',
			'MIN_QUERY_LEN': 2
		});
	});
</script>
