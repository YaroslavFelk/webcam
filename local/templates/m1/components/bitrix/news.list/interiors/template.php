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

$this->addExternalJS(SITE_TEMPLATE_PATH."/js/slick.min.js");
?>
<div class="interiors" id="interiors">
    <div class="interiors__head">
        <h3 class="section__subheading">Условия вне конкуренции</h3>
        <h2 class="section__heading">Интерьеры</h2>
    </div>


    <div class="interiors-slider-mobile">
        <div class="interiors-slider mobile">
            <?foreach($arResult["ITEMS"] as $arItem):?>
            <div>
                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>"
                     alt="<?=$arItem['NAME'];?>">
            </div>
            <?endforeach;?>
        </div>
    </div>
    <div class="interiors-slider-desctop">
        <div class="interiors-slider">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <div>
                    <img src="<?=$arItem['DETAIL_PICTURE']['SRC'];?>"
                         alt="<?=$arItem['NAME'];?>">
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        //Слайдер интерьеров
        $('.interiors-slider').slick({
            infinite: true,
            slidesToShow: 1,
            dots: true,
            dotsClass: 'slick-dots',
            nextArrow: '<button class="slick__arrows nextArrow "></button>',
            prevArrow: '<button class="slick__arrows prevArrow "></button>',
        });
    });
</script>