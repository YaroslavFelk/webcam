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

//Asset::getInstance()->addJs($templateFolder."/script.js");
?>
   <div class="banner-slider">
       <?foreach($arResult["ITEMS"] as $arItem):?>
      <div>
        <div class="banner">
          <div class=" banner__background">
            <img class="mobile" src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>"
                 alt="<?=$arItem['NAME'];?>">

            <img class="desctop " src="<?=$arItem['DETAIL_PICTURE']['SRC'];?>"
                 alt="<?=$arItem['NAME'];?>">
          </div>

          <div class="container">
            <h1 class="banner__head"><?=$arItem['NAME'];?></h1>
            <p class="banner__text"> <?=$arItem['PREVIEW_TEXT'];?>
            </p>
              <a class="js-popup calculator__btn btn banner__button " href="#">Отправить анкету</a>

          </div>
        </div>

      </div>
       <?endforeach;?>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        //Слайдер баннера
        $('.banner-slider').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            dots: true,
            dotsClass: 'slick-dots',
            arrows: false,
            nextArrow: '<button class="slick__arrows nextArrow "></button>',
            prevArrow: '<button class="slick__arrows prevArrow "></button>',
        });
    });
</script>
