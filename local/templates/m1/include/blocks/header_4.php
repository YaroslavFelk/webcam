<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<div class="header_info">
    <div class="container">
        <? /* ?>

        <div class="header_adres_time">
            <div class="header_adres"><? $APPLICATION->IncludeFile(SITE_DIR."include/adres.php",Array(),Array("MODE"=>"text"));?></div>
            <div class="header_time"><? $APPLICATION->IncludeFile(SITE_DIR."include/timework.php",Array(),Array("MODE"=>"text"));?></div>
        </div>
 <? */ ?>
        <div class="header_top_menu">
            <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "top_info",
            Array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(""),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "top_info",
                "USE_EXT" => "Y"
            )
        );?>
        </div>
        <div class="header_city">
            <i>
                <svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 0.399902C3.589 0.399902 0 3.9889 0 8.3999C0 12.5494 5.2335 20.3999 8 20.3999C10.766 20.3999 16 12.5494 16 8.3999C16 3.9889 12.411 0.399902 8 0.399902ZM8 18.3989C6.617 18.1999 2 11.9149 2 8.3999C2 5.0914 4.6915 2.3999 8 2.3999C11.3085 2.3999 14 5.0914 14 8.3999C14 11.9149 9.383 18.1999 8 18.3989Z"/>
                    <path d="M8 10.3999C9.10457 10.3999 10 9.50447 10 8.3999C10 7.29533 9.10457 6.3999 8 6.3999C6.89543 6.3999 6 7.29533 6 8.3999C6 9.50447 6.89543 10.3999 8 10.3999Z" />
                </svg>
            </i>
            <span><?=GetMessage('PK_YOU_CITY');?></span>
            <?$APPLICATION->IncludeComponent(
                "profitkit:geo",
                "",
                Array("FIRST"=>1)
            );?></div>
        <div class="header_login"><a<? if ($USER->IsAuthorized()) { ?> href="/personal/" <? } else { ?>  data-toggle="pkModal" data-target="#authModal"  data-ajax="/ajax/auth.php"<? } ?>>
                <i>
                    <svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.8241 13.2687C13.3864 13.7038 13.386 14.4121 13.8241 14.849C14.0363 15.0597 14.3184 15.1758 14.619 15.1758C14.9195 15.1758 15.2014 15.0601 15.4146 14.849L19.5048 10.7881C19.6064 10.685 19.6869 10.5648 19.7473 10.4222C19.8028 10.2856 19.8312 10.1442 19.8312 10.0001C19.8312 9.8561 19.8031 9.71466 19.7435 9.56802C19.6854 9.43219 19.6041 9.31196 19.5014 9.21035L15.4145 5.15168C15.2024 4.94064 14.9198 4.82452 14.6189 4.82452C14.3179 4.82452 14.0354 4.94099 13.824 5.15168C13.3855 5.58715 13.3855 6.29579 13.824 6.7312L15.991 8.88319H1.12429C0.50444 8.88326 0 9.38463 0 9.99987C0 10.6151 0.50444 11.1164 1.12429 11.1164H15.991L13.8241 13.2687Z"/>
                        <path d="M22.2523 0H9.60869C7.54145 0 5.86022 1.66964 5.86022 3.72187L5.86249 7.67003H6.08732C6.29307 7.94285 6.62063 8.12076 6.98527 8.12076C7.36079 8.12076 7.69022 7.94251 7.89369 7.66448L8.10991 7.66147V3.7218C8.10991 2.9019 8.78226 2.23417 9.60862 2.23417H22.2523C23.0783 2.23417 23.751 2.9019 23.751 3.7218V16.2785C23.751 17.0992 23.0783 17.7662 22.2523 17.7662H9.60869C8.78233 17.7662 8.10997 17.0992 8.10997 16.2785L8.10811 12.3285H7.88253C7.67678 12.0561 7.34921 11.879 6.98492 11.879C6.61801 11.879 6.28859 12.0587 6.08326 12.3349L5.85987 12.3383V16.2785C5.85987 18.3304 7.54111 20 9.60834 20H22.2523C24.3191 20 26 18.3304 26 16.2785V3.7218C26 1.66958 24.3191 0 22.2523 0Z"/>
                    </svg>
                </i><span><?=GetMessage('PK_MYCABINET');?></span></a></div>
    </div>
</div>
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
                <a class="header_phone_text">
                    <? $APPLICATION->IncludeFile(SITE_DIR."include/phone.php",Array(),Array("MODE"=>"text"));?>
                    </a>
                <a class="header_callback" data-target="#callbackModal" data-ajax="/ajax/form.php"><span><?=GetMessage('PK_CALLBACK');?></span></a>
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
        <div class="header_cart">
            <?$APPLICATION->IncludeComponent(
                "bitrix:sale.basket.basket.line",
                "m1",
                Array("SHOW_PRODUCTS"=>"Y")
            );?>
        </div>
    </div>
</div>