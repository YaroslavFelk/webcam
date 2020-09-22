<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)): ?>


            <div class="left_menu">

                <?
                $previousLevel = 0;
                foreach($arResult as $arItem):?>

                <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <?=str_repeat("</div></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
        <?endif?>

        <?if ($arItem["IS_PARENT"]):?>

        <?if ($arItem["DEPTH_LEVEL"] == 1):?>
        <div class="left_menu_item menu_has_child<?if ($arItem["SELECTED"]):?> left_menu_item_open<?endif?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?endif?>"><?=$arItem["TEXT"]?></a><span></span>

                    <div class="left_sub_menu">
                        <?else:?>
                        <div class="left_sub_menu_item  menu_has_child<?if ($arItem["SELECTED"]):?> left_menu_item_open item_current<?endif;?>"><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a><span></span>
                            <div class="left_sub_menu">
                                <?endif?>

                                <?else:?>

                                    <?if ($arItem["PERMISSION"] > "D"):?>

                                        <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                            <div class="left_menu_item<?if ($arItem["SELECTED"]):?> item_current<?endif;?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?endif?>"><?=$arItem["TEXT"]?></a></div>
                                        <?else:?>
                                            <div class="left_sub_menu_item<?if ($arItem["SELECTED"]):?> item_current<?endif;?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></div>
                                        <?endif?>

                                    <?else:?>

                                        <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                                            <div  class="left_menu_item"><a href="" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></div>
                                        <?else:?>
                                            <div  class="left_sub_menu_item<?if ($arItem["SELECTED"]):?> item_current<?endif;?>"><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></div>
                                        <?endif?>

                                    <?endif?>

                                <?endif?>

                                <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

                                <?endforeach?>

                                <?if ($previousLevel > 1)://close last item tags?>
                                    <?=str_repeat("</div></div>", ($previousLevel-1) );?>
                                <?endif?>
                            </div>
<?endif?>