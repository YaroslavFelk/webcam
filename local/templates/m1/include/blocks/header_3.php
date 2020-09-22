<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?php
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/blocks/header_3.css");
?>
<div class="header_main">
    <div class="container">
        <div class="mobile_menu"><svg width="20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="var(--font_color)" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg></div>
        <div class="header_logo">
            <a href="/"><? $APPLICATION->IncludeFile(SITE_DIR."include/logo.php",Array(),Array("MODE"=>"text"));?></a>
            <span class="header_slogan"><? $APPLICATION->IncludeFile(SITE_DIR."include/slogan.php",Array(),Array("MODE"=>"text"));?></span>
            <span class="btn_fixed_menu"><button>Меню</button></span>
        </div>
        <div class="header_phone">
            <i><svg width="20" height="29" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.0997 1.50181C17.7309 1.11528 17.2882 0.806804 16.7979 0.594679C16.3075 0.382555 15.7796 0.27111 15.2454 0.266963H5.12372C4.05191 0.252653 3.01816 0.663967 2.24917 1.41071C1.86334 1.78849 1.55847 2.24088 1.35314 2.7403C1.1478 3.23971 1.0463 3.77571 1.05481 4.31563L0.93335 24.5589C0.93335 25.6327 1.3599 26.6625 2.11918 27.4218C2.87845 28.1811 3.90824 28.6076 4.98201 28.6076L15.1037 28.6683C16.1693 28.6665 17.1913 28.2447 17.9479 27.4942C18.3275 27.1224 18.6288 26.6782 18.8339 26.188C19.0391 25.6977 19.1439 25.1713 19.1422 24.6399L19.2637 4.3966C19.2708 3.86108 19.1715 3.32947 18.9717 2.83257C18.7719 2.33567 18.4755 1.88335 18.0997 1.50181ZM3.01841 8.30356H17.1887V20.571H3.01841V8.30356ZM3.64595 2.84799C3.83878 2.66462 4.06587 2.52107 4.31423 2.42555C4.56259 2.33002 4.82735 2.2844 5.09335 2.29129L15.215 2.35202C15.751 2.35428 16.2643 2.56905 16.6422 2.9492C17.0116 3.31048 17.2288 3.79934 17.2495 4.31563V6.33996H3.01841V4.21441C3.05237 3.69089 3.28824 3.201 3.67632 2.84799H3.64595ZM16.5005 26.0266C16.3141 26.218 16.0903 26.3689 15.843 26.4699C15.5957 26.5709 15.3302 26.6198 15.0632 26.6136L4.94153 26.5529C4.40551 26.5507 3.89226 26.3359 3.51437 25.9557C3.15636 25.5789 2.95703 25.0787 2.95768 24.5589V22.5346H17.1887V24.6602C17.1548 25.1837 16.9189 25.6736 16.5308 26.0266H16.5005Z" />
                    <path d="M10.1036 23.6074C9.9154 23.6074 9.73145 23.6632 9.57499 23.7678C9.41852 23.8723 9.29658 24.0209 9.22456 24.1948C9.15255 24.3686 9.13371 24.5599 9.17042 24.7445C9.20713 24.929 9.29775 25.0986 9.43081 25.2316C9.56387 25.3647 9.7334 25.4553 9.91796 25.492C10.1025 25.5287 10.2938 25.5099 10.4677 25.4379C10.6415 25.3659 10.7901 25.2439 10.8947 25.0874C10.9992 24.931 11.055 24.747 11.055 24.5589C11.055 24.3065 10.9548 24.0645 10.7763 23.8861C10.5979 23.7077 10.3559 23.6074 10.1036 23.6074Z" />
                </svg>
            </i>
            <div>
                <div>
                    <a class="header_phone_text">
                        <? $APPLICATION->IncludeFile(SITE_DIR."include/phone.php",Array(),Array("MODE"=>"text"));?>
                        </a>
                    <div><? $APPLICATION->IncludeFile(SITE_DIR."include/phonetime.php",Array(),Array("MODE"=>"text"));?></div>
                </div>
                <a class="btn_white" data-toggle="pkModal" data-target="#callbackModal" data-ajax="/ajax/form.php"><span><?=GetMessage('PK_CALLBACK');?></span></a>
            </div>
        </div>
        <div class="header_search">
            <?$APPLICATION->IncludeComponent(
                "bitrix:search.form",
                "header",
                Array(
                    "PAGE" => "#SITE_DIR#search/index.php",
                    "USE_SUGGEST" => "N"
                )
            );?>
        </div>
    </div>
</div>
<script>
    let min_width_search = 1023;
    let min_width_phone = 767;
</script>
