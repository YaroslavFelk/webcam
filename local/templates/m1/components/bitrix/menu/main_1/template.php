<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
    <nav>
    <div class="container">
    <div class="main_menu_row">

<?
$previousLevel = 0;
foreach($arResult as $arItem):
?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</div></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
        <? if ($open_catalog == true and $arItem["DEPTH_LEVEL"] == 1) { $open_catalog = false; ?>
    </div></div>
            <? } ?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):
        $catalog_type = $arItem['PARAMS']['catalog_type'];
        ?>
			<div class="menu_item<?=($arItem['PARAMS']['catalog_type'])?" menu_catalog":"";?> menu_has_child"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
                <? if ($arItem['PARAMS']['catalog_type']) { $open_catalog = true; ?>
                <div class="catalog_menu<?=($arItem['PARAMS']['catalog_type']?" menu_".$arItem['PARAMS']['catalog_type']:"");?>">
                    <div class="container">
                <? } ?>
				<div class="sub_menu">
		<?else:?>
			<div class="sub_menu_item  menu_has_child"><a href="<?=$arItem["LINK"]?>" class="parent">
                    <? if ($arItem['PARAMS']['PICTURE'] and $arItem["DEPTH_LEVEL"] == 2 and $catalog_type) { ?><span class="menu_img"><img src="<?=$arItem['PARAMS']['PICTURE'];?>"></span><? } ?>
                    <?=$arItem["TEXT"]?></a>
				<div class="sub_menu">
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<div class="menu_item<?=($arItem['PARAMS']['catalog_type'])?" menu_catalog":"";?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?endif?>"><?=$arItem["TEXT"]?></a></div>
			<?else:?>
				<div class="sub_menu_item"><a href="<?=$arItem["LINK"]?>">
                        <? if ($arItem['PARAMS']['PICTURE'] and $arItem["DEPTH_LEVEL"] == 2 and $catalog_type) { ?><span class="menu_img"><img src="<?=$arItem['PARAMS']['PICTURE'];?>"></span><? } ?>
                        <?=$arItem["TEXT"]?></a></div>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<div  class="menu_item"><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></div>
			<?else:?>
				<div  class="sub_menu_item"><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></div>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</div></div>", ($previousLevel-1) );?>
<?endif?>
    </div></div></nav>
<?endif?>