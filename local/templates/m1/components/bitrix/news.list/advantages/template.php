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
<div class="container  advantages" id="advantages">
    <h3 class="section__subheading"><?=$arResult['DESCRIPTION']?></h3>
    <h2 class="section__heading"><?=$arResult['NAME']?></h2>

    <div class="advantages-slider-mobile">
        <div class="advantages-slider">
            <?foreach($arResult["ITEMS"] as $arItem):?>
            <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>"
                     alt="<?=$arItem['NAME'];?>">

                <h4><?=$arItem['NAME'];?></h4>
                <p>
                    <?=$arItem['PREVIEW_TEXT'];?>
                </p>
            </div>
            <? endforeach; ?>
        </div>
    </div>

    <div>
        <div class="advantages__top">
            <div class="advantages-slider">
                <div>
                    <img src="<?=$arResult["ITEMS"][0]['PREVIEW_PICTURE']['SRC'];?>"
                         alt="<?=$arResult["ITEMS"][0]['NAME'];?>">
                </div>
                <div>
                    <img src="<?=$arResult["ITEMS"][1]['PREVIEW_PICTURE']['SRC'];?>"
                         alt="<?=$arResult["ITEMS"][1]['NAME'];?>">
                </div>
            </div>

            <div class="advantages__text-block">
                <article class="advantages__text">
                    <div class="advantages__text_icon icon-woman"></div>
                    <h6><?=$arResult["ITEMS"][0]['NAME'];?></h6>
                    <p><?=$arResult["ITEMS"][0]['PREVIEW_TEXT'];?></p>
                </article>

                <article class="advantages__text">
                    <div class="advantages__text_icon icon-arrow"></div>


                    <h6><?=$arResult["ITEMS"][1]['NAME'];?></h6>
                    <p><?=$arResult["ITEMS"][1]['PREVIEW_TEXT'];?></p>
                </article>
            </div>
        </div>

        <div class="advantages__bottom">
            <div class="advantages__text-block">
                <article class="advantages__text">
                    <div class="advantages__text_icon icon-star"></div>
                    <h6><?=$arResult["ITEMS"][2]['NAME'];?></h6>
                    <p><?=$arResult["ITEMS"][2]['PREVIEW_TEXT'];?></p>
                </article>


                <article class="advantages__text">
                    <div class="advantages__text_icon icon-top"></div>
                    <h6><?=$arResult["ITEMS"][3]['NAME'];?></h6>
                    <p><?=$arResult["ITEMS"][3]['PREVIEW_TEXT'];?></p>
                </article>
            </div>
            <div class="advantages-slider">
                <div>
                    <img src="<?=$arResult["ITEMS"][2]['PREVIEW_PICTURE']['SRC'];?>"
                         alt="<?=$arResult["ITEMS"][2]['NAME'];?>">
                </div>
                <div>
                    <img src="<?=$arResult["ITEMS"][3]['PREVIEW_PICTURE']['SRC'];?>"
                         alt="<?=$arResult["ITEMS"][3]['NAME'];?>">
                </div>


            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){//Слайдер преимуществ
        $('.advantages-slider').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            nextArrow: '<button class="slick__arrows nextArrow advantages-arrows"></button>',
            prevArrow: '<button class="slick__arrows prevArrow advantages-arrows"></button>',
        });
    });
</script>

</div>
