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
$this->addExternalCss(SITE_TEMPLATE_PATH."/css/magnific-popup.css");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/jquery.magnific-popup.min.js");
?>

<div class="gallery_tabs">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <? $i=0; foreach ($arResult['SECTION_ITEMS'] as $arSection) { $i++; ?>
        <li role="presentation"<? if ($i == 1) { ?> class="active"<? } ?>><a href="#gal<?=$arSection['ID'];?>" aria-controls="gal<?=$arSection['ID'];?>" role="tab"
                                                  data-toggle="tab"><?=$arSection['NAME'];?></a></li>
        <? } ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <? $i=0; foreach ($arResult['SECTION_ITEMS'] as $arSection) { $i++; ?>
        <div role="tabpanel" class="tab-pane<? if ($i == 1) { ?> active<? } ?>" id="gal<?=$arSection['ID'];?>">

            <div class="row popup-gallery">
                <? foreach ($arSection["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="col-3" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <a href="<?= ($arItem["DETAIL_PICTURE"]["SRC"] ? $arItem["DETAIL_PICTURE"]["SRC"] : $arItem["PREVIEW_PICTURE"]["SRC"]) ?>"
                           title="<?= $arItem['NAME']; ?>">
                            <img
                                    class="preview_picture"
                                    border="0"
                                    src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                    alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                    title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                            />
                        </a>
                    </div>
                <? endforeach; ?>

            </div>

        </div>
        <? } ?>
    </div>
</div>
