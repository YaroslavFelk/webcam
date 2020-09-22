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
?>

<section class="qna section" id="faq">
    <div class="container container--small">
        <h3 class="section__subheading"><?=$arResult['DESCRIPTION']?></h3>
        <h2 class="section__heading"><?=$arResult['NAME']?></h2>
        <ul class="qna__question-list">
            <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <li class="qna__question-block">
                <button class="qna__question-toggle"><?=$arItem['NAME'];?></button>
                <p class="qna__question-answer">
                    <?=$arItem['PREVIEW_TEXT'];?>
                </p>
            </li>
            <?endforeach;?>
        </ul>
    </div>
</section>


