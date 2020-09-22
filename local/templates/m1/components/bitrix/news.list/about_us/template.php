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

<section class="about-us section">
    <div class="container container--small">
        <div class="about-us__content">
            <h3 class="section__subheading"><?=$arResult['DESCRIPTION']?></h3>
            <h2 class="section__heading"><?=$arResult['NAME']?></h2>

            <div class="about-us__text">
                <?=$arResult['ITEMS'][0]['PREVIEW_TEXT'];?>
            </div>
            <a class="about-us__btn btn js-popup" href="#">Отправить анкету</a>
        </div>
    </div>
</section>

<script>
    if ($(window).width() >= '768') {
        $('.about-us').css('background-image', "url(<?=$arResult['ITEMS'][0]['PREVIEW_PICTURE']['SRC']?>")
    }
</script>