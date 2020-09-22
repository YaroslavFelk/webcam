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

<form action="<?=$arResult["FORM_ACTION"]?>">
        <input type="text" name="q" value="" class="header_search_input" placeholder="<?=GetMessage('BSF_T_SEARCH_PLACEHOLDER');?>" />
        <button name="s" value="<?=GetMessage('BSF_T_SEARCH_BUTTON');?>" type="submit" class="header_search_btn"><i><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.6554 17.9918L14.8219 13.1582C15.8525 11.7829 16.4707 10.0824 16.4707 8.23529C16.4707 3.69412 12.7766 0 8.23535 0C3.69414 0 0 3.69412 0 8.23529C0 12.7765 3.69414 16.4706 8.23535 16.4706C10.0824 16.4706 11.783 15.8524 13.1583 14.8218L17.9919 19.6553C18.2219 19.8853 18.5225 20 18.8237 20C19.1248 20 19.4254 19.8853 19.6554 19.6553C20.1149 19.1959 20.1149 18.4512 19.6554 17.9918ZM2.35296 8.23529C2.35296 4.99177 4.9918 2.35294 8.23535 2.35294C11.4789 2.35294 14.1178 4.99177 14.1178 8.23529C14.1178 11.4788 11.4789 14.1176 8.23535 14.1176C4.9918 14.1176 2.35296 11.4788 2.35296 8.23529Z" fill="#4B4B4B"/>
                </svg>
            </i></button>
    </form>
