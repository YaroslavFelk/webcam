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

$i = 0;
$k = 0;

$mainImg = CFile::GetPath($arResult['PICTURE']);
?>
<script>
    if ($(window).width() >= '768') {
        $('.calculator').css('background-image', "url(<?=$mainImg ?>")
    }
</script>

<section class="calculator section" id="calculator"
         style="@media (background-image: url(<?=$mainImg?>); )">
    <h2 class="calculator__heading section__heading"><?=$arResult['NAME']?></h2>
    <div class="calculator__form">
        <?foreach($arResult["ITEMS"] as $arSectItem): //Цикл для вывода категорий?>
        <?php $i++ ?>
        <h3 class="calculator__form-heading"><?= $arSectItem['NAME']?></h3>
        <div class="calculator__form-line">
            <? foreach($arSectItem['ELEMENTS'] as $arItem): //цикли для элементов?>
                <?php $k++ ?>
            <input class="calculator__form-input visually-hidden-input"
                   id="CALC_<?=$i?>_<?=$k?>"
                   type="radio"
                   name="CALC_<?=$i?>"
                   value="<?=$arItem['DISPLAY_PROPERTIES']['VALUE']['VALUE']?>"
            >
            <label class="calculator__form-label" for="CALC_<?=$i?>_<?=$k?>"><?= $arItem["NAME"]?></label>
            <? endforeach;?>
        </div>
        <? endforeach; ?>
        <div class="calculator__form-line calculator__form-line--results">
            <h3 class="calculator__form-heading">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => '/include/calculator/head.php',
                    )
                ); ?>
            </h3>
            <p class="calculator__form-result">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => '/include/calculator/price.php',
                    )
                ); ?>
            </p>
            <p class="calculator__form-disclaimer">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => '/include/calculator/text.php',
                    )
                ); ?>

            </p>
        </div>
        <a class="calculator__btn btn js-popup" href="#">Отправить анкету</a>
    </div>
</section>
