<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<a data-toggle="pkModal" data-target="#changecityModal" data-ajax="/ajax/changeCity.php">
    <? if ($arResult['city']) { ?><?=$arResult['city'];?>
    <? if ($arResult['auto']) { ?><span class="location__link_span">
                              </span><? } ?>
    <? } else { ?>
    Санкт-Петербург
    <? } ?>
    <i><svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.99984 3.22909L0.84591 0.142067C0.652382 -0.0473555 0.338674 -0.0473555 0.145146 0.142067C-0.048382 0.331489 -0.048382 0.638541 0.145146 0.827963L3.64946 4.25793C3.84299 4.44736 4.1567 4.44736 4.35023 4.25793L7.85479 0.827963C7.95168 0.733131 8 0.609195 8 0.485015C8 0.360836 7.95168 0.236899 7.85479 0.142067C7.66126 -0.0473555 7.34755 -0.0473555 7.15403 0.142067L3.99984 3.22909Z" fill="#B3B3B3"/>
        </svg>
    </i></a>