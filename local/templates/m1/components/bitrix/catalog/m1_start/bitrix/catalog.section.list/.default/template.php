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
$this->setFrameMode(true);


if (0 < $arResult["SECTIONS_COUNT"])
{
?>
<div class="catalog_tags">
<?
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);


				?>
				<a  id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
					href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
					class="bx_catalog_line_img"
					<? /*style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>');"*/?>
					title="<? echo $arSection['PICTURE']['TITLE']; ?>"
				>
				<? echo $arSection['NAME']; ?></a><?
			}

?>
</div>
<?

}
?>