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
<?php

?>

<li class="header__nav_address">
    <a class="link js-city" id="<?=$arParams['ACTIVE_CITY']['ID']?>" href="#"><?=$arParams['ACTIVE_CITY']["NAME"]?></a>
    <div class="header__nav_address-list">
<? for( $i = 0; $i < count($arResult["ITEMS"]); $i++):?>
    <?if ($arResult["ITEMS"][$i]["ID"] != $arParams['ACTIVE_CITY']['ID']):?>
        <a class="js-city" id="<?=$arResult["ITEMS"][$i]["ID"]?>"   href="#"><?=$arResult["ITEMS"][$i]["NAME"]?></a>
    <?endif;?>

<?endfor;?>
    </div>
</li>

<script>
  if (screen.width >= 992){
    $('.js-city').on('click', function (e) {
      e.preventDefault();
      document.cookie = "city=" + this.id;
      console.log('fff')
      window.location.replace(window.location.href)
    })
  } else {
    $('.js-city').on('click', function (e) {
      e.preventDefault();
      if ($('.header__nav_address').hasClass('active')) {
        document.cookie = "city=" + this.id;
        console.log('fff')
        window.location.replace(window.location.href)
      } else {
        $('.header__nav_address').addClass('active')
      }

    })
  }



</script>

