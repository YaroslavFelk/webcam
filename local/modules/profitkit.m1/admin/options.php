<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');

global $APPLICATION;
IncludeModuleLangFile(__FILE__);

$arParametrsList = array(
    'MAIN' => array(
        'TITLE' => GetMessage('MAIN_OPTIONS_PARAMETERS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            /*'THEME_SWITCHER' =>	array(
                'TITLE' => GetMessage('THEME_SWITCHER'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),*/
            'BASE_COLOR' => array(
                'TITLE' => GetMessage('BASE_COLOR'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'CUSTOM' => array('COLOR' => '', 'TITLE' => GetMessage('BASE_COLOR_CUSTOM')),
                    '1' => array('COLOR' => '#337FD2', 'TITLE' => GetMessage('BASE_COLOR_1')),
                ),
                'DEFAULT' => '9',
                'TYPE_EXT' => 'colorpicker',
                'THEME' => 'Y',
            ),
            'BASE_COLOR_CUSTOM' => array(
                'TITLE' => GetMessage('BASE_COLOR_CUSTOM'),
                'TYPE' => 'text',
                'DEFAULT' => 'de002b',
                'PARENT_PROP' => 'BASE_COLOR',
                'THEME' => 'Y',
            ),
            'BASE_COLOR_CUSTOM2' => array(
                'TITLE' => GetMessage('BASE_COLOR_CUSTOM').' 2',
                'TYPE' => 'text',
                'DEFAULT' => '313D50',
                'PARENT_PROP' => 'BASE_COLOR',
                'THEME' => 'Y',
            ),
           /* 'BGCOLOR_THEME' => array(
                'TITLE' => GetMessage('BGCOLOR_THEME_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'CUSTOM' => array('COLOR' => '', 'TITLE' => GetMessage('COLOR_THEME_CUSTOM')),
                    'LIGHT' => array('COLOR' => '#f6f6f7', 'TITLE' => GetMessage('BGCOLOR_THEME_LIGHT')),
                    'DARK' => array('COLOR' => '#272a39', 'TITLE' => GetMessage('BGCOLOR_THEME_DARK')),

                ),
                'DEFAULT' => 'LIGHT',
                'TYPE_EXT' => 'colorpicker',
                'THEME' => 'Y',
            ),
            'CUSTOM_BGCOLOR_THEME' => array(
                'TITLE' => GetMessage('CUSTOM_BGCOLOR_THEME_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => 'f6f6f7',
                'PARENT_PROP' => 'BGCOLOR_THEME',
                'THEME' => 'Y',
            ),
            'SHOW_BG_BLOCK' => array(
                'TITLE' => GetMessage('SHOW_BG_BLOCK_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'Y',
            ),
            'COLORED_LOGO' => array(
                'TITLE' => GetMessage('COLORED_LOGO'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'LOGO_IMAGE' => array(
                'TITLE' => GetMessage('LOGO_IMAGE'),
                'TYPE' => 'file',
                'DEFAULT' => serialize(array()),
                'THEME' => 'N',
            ),
            'FAVICON_IMAGE' => array(
                'TITLE' => GetMessage('FAVICON_IMAGE'),
                'TYPE' => 'file',
                'DEFAULT' => serialize(array()),
                'THEME' => 'N',
            ),
            'APPLE_TOUCH_ICON_IMAGE' => array(
                'TITLE' => GetMessage('APPLE_TOUCH_ICON_IMAGE'),
                'TYPE' => 'file',
                'DEFAULT' => serialize(array()),
                'THEME' => 'N',
            ),
            'CUSTOM_FONT' => array(
                'TITLE' => GetMessage('CUSTOM_FONT_TITLE'),
                'TYPE' => 'text',
                'SIZE' => '',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'PAGE_WIDTH' => array(
                'TITLE' => GetMessage('PAGE_WIDTH'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => '1 700 px',
                    '2' => '1 500 px',
                    '3' => '1 344 px',
                    '4' => '1 200 px'
                ),
                'DEFAULT' => '3',
                'THEME' => 'Y',
            ),
            'FONT_STYLE' => array(
                'TITLE' => GetMessage('FONT_STYLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => array(
                        'TITLE' => '15px Open Sans',
                        'GROUP' => 'Open Sans',
                        'LINK' => 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,500,600,700,800&subset=latin,cyrillic-ext',
                        'VALUE' => '15 px',
                    ),
                    '2' => array(
                        'TITLE' => '14px Open Sans',
                        'GROUP' => 'Open Sans',
                        'LINK' => 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,500,600,700,800&subset=latin,cyrillic-ext',
                        'VALUE' => '14 px',
                    ),
                    '3' => array(
                        'TITLE' => '13px Open Sans',
                        'GROUP' => 'Open Sans',
                        'LINK' => 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,500,600,700,800&subset=latin,cyrillic-ext',
                        'VALUE' => '13 px',
                    ),
                    '4' => array(
                        'TITLE' => '15px PT Sans Caption',
                        'GROUP' => 'PT Sans',
                        'LINK' => 'PT+Sans+Caption:400italic,700italic,400,700&subset=latin,cyrillic-ext',
                        'VALUE' => '15 px',
                    ),
                    '5' => array(
                        'TITLE' => '14px PT Sans Caption',
                        'GROUP' => 'PT Sans',
                        'LINK' => 'PT+Sans+Caption:400italic,700italic,400,700&subset=latin,cyrillic-ext',
                        'VALUE' => '14 px',
                    ),
                    '6' => array(
                        'TITLE' => '13px PT Sans Caption',
                        'GROUP' => 'PT Sans',
                        'LINK' => 'PT+Sans+Caption:400italic,700italic,400,700&subset=latin,cyrillic-ext',
                        'VALUE' => '13 px',
                    ),
                    '7' => array(
                        'TITLE' => '15px Ubuntu',
                        'GROUP' => 'Ubuntu',
                        'LINK' => 'Ubuntu:300italic,400italic,500italic,700italic,400,300,500,700subset=latin,cyrillic-ext',
                        'VALUE' => '15 px',
                    ),
                    '8' => array(
                        'TITLE' => '14px Ubuntu',
                        'GROUP' => 'Ubuntu',
                        'LINK' => 'Ubuntu:300italic,400italic,500italic,700italic,400,300,500,700subset=latin,cyrillic-ext',
                        'VALUE' => '14 px',
                    ),
                    '9' => array(
                        'TITLE' => '13px Ubuntu',
                        'GROUP' => 'Ubuntu',
                        'LINK' => 'Ubuntu:300italic,400italic,500italic,700italic,400,300,500,700subset=latin,cyrillic-ext',
                        'VALUE' => '13 px',
                    ),
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
                'GROUPS' => 'Y',
            ),*/
            'MENU_COLOR' => array(
                'TITLE' => GetMessage('MENU_COLOR_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '313D50',
                'THEME' => 'Y',
            ),
            'FONT_COLOR' => array(
                'TITLE' => 'Цвет текста', //GetMessage('MENU_COLOR_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '141414',
                'THEME' => 'Y',
            ),
            'HEADER_TYPE' => array(
                'TITLE' => GetMessage('HEAD'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => GetMessage('TYPE_1'),
                    '1s' => GetMessage('TYPE_1').' start',
                    '2' => GetMessage('TYPE_2'),
                    '3' => GetMessage('TYPE_3'),
                    '4' => GetMessage('TYPE_4'),
                    'custom' => GetMessage('TYPE_CUSTOM'),
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
            ),
            'SLIDER_TYPE' => array(
                'TITLE' => 'Тип слайдера',
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => 'С меня каталога',
                    '2' => 'На всю ширину',
                    '3' => 'На ширину шаблона',
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
            ),
            'SITE_WIDTH' => array(
                'TITLE' => 'Ширина сайта',
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => 'Ограниченная',
                    '2' => 'На всю ширину',
                ),
                'DEFAULT' => '2',
                'THEME' => 'Y',
            ),
           /* 'LEFT_BLOCK' => array(
                'TITLE' => GetMessage('LEFT_BLOCK_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => GetMessage('LEFT_BLOCK_FULL'),
                    '2' => GetMessage('LEFT_BLOCK_MIDDLE'),
                    '3' => GetMessage('LEFT_BLOCK_SMALL'),
                    'custom' => array(
                        'TITLE' => 'Custom',
                        'HIDE' => 'Y'
                    ),
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
            ),
            'SIDE_MENU' => array(
                'TITLE' => GetMessage('SIDE_MENU'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'LEFT' => GetMessage('SIDE_MENU_LEFT'),
                    'RIGHT' => GetMessage('SIDE_MENU_RIGHT'),
                ),
                'DEFAULT' => 'LEFT',
                'THEME' => 'Y',
            ),
            'H1_STYLE' => array(
                'TITLE' => GetMessage('H1FONT'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => array(
                        'TITLE' => 'Bold',
                        'GROUP' => GetMessage('H1FONT_STYLE'),
                        'VALUE' => 'Bold',
                    ),
                    '2' => array(
                        'TITLE' => 'Normal',
                        'GROUP' => GetMessage('H1FONT_STYLE'),
                        'VALUE' => 'Normal',
                    )
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
                'GROUPS' => 'Y',
            ),
            'TYPE_SEARCH' => array(
                'TITLE' => GetMessage('TYPE_SEARCH'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'corp' => '1',
                    'fixed' => '2',
                    'custom' => array(
                        'TITLE' => 'Custom',
                        'HIDE' => 'Y'
                    )
                ),
                'DEFAULT' => 'fixed',
                'THEME' => 'Y',
            ),
            'PAGE_TITLE' => array(
                'TITLE' => GetMessage('PAGE_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    'custom' => array(
                        'TITLE' => 'Custom',
                        'HIDE' => 'Y'
                    ),
                ),
                'DEFAULT' => '3',
                'THEME' => 'Y',
            ),
            'HOVER_TYPE_IMG' => array(
                'TITLE' => GetMessage('HOVER_TYPE_IMG_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'shine' => GetMessage('HOVER_TYPE_IMG_SHINE'),
                    'blink' => GetMessage('HOVER_TYPE_IMG_BLINK'),
                    'none' => GetMessage('HOVER_TYPE_IMG_NONE'),
                ),
                'DEFAULT' => 'shine',
                'THEME' => 'Y',
            ),
            'SHOW_LICENCE' => array(
                'TITLE' => GetMessage('SHOW_LICENCE_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'ONE_ROW' => 'Y',
                'HINT' => GetMessage('LICENCE_TEXT_VALUE_HINT'),
                'DEPENDENT_PARAMS' => array(
                    'LICENCE_CHECKED' => array(
                        'TITLE' => GetMessage('LICENCE_CHECKED_TITLE'),
                        'TYPE' => 'checkbox',
                        'CONDITIONAL_VALUE' => 'Y',
                        'DEFAULT' => 'N',
                        'THEME' => 'N',
                    ),
                    'LICENCE_TEXT' => array(
                        'TITLE' => GetMessage('LICENCE_TEXT_TITLE'),
                        'HIDE_TITLE' => 'Y',
                        'TYPE' => 'includefile',
                        'INCLUDEFILE' => '#SITE_DIR#include/licenses_text.php',
                        'CONDITIONAL_VALUE' => 'Y',
                        'PARAMS' => array(
                            'WIDTH' => '100%'
                        ),
                        'DEFAULT' => GetMessage('LICENCE_TEXT_VALUE'),
                        'THEME' => 'N',
                    ),
                ),
                'THEME' => 'Y',
            ),
            'MAX_DEPTH_MENU' => array(
                'TITLE' => GetMessage('MAX_DEPTH_MENU_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                ),
                'DEFAULT' => '4',
                'THEME' => 'Y',
            ),
            'MAX_VISIBLE_ITEMS_MENU' => array(
                'TITLE' => GetMessage('MAX_VISIBLE_ITEMS_MENU_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '10',
                'THEME' => 'N',
            ),
            'HIDE_SITE_NAME_TITLE' => array(
                'TITLE' => GetMessage('HIDE_SITE_NAME_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'STORES_SOURCE' => array(
                'TITLE' => GetMessage('STORES_SOURCE_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'STORES' => GetMessage('STORES_SOURCE_STORES'),
                    'IBLOCK' => GetMessage('STORES_SOURCE_STORES_IBLOCK'),
                ),
                'TYPE_SELECT' => 'STORES',
                'DEFAULT' => 'IBLOCK',
                'THEME' => 'N',
            ),
            'SHOW_CALLBACK' => array(
                'TITLE' => GetMessage('SHOW_CALLBACK_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'ONE_ROW' => 'Y',
                'THEME' => 'Y',
            ),
            'PRINT_BUTTON' => array(
                'TITLE' => GetMessage('PRINT_BUTTON'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'ONE_ROW' => 'Y',
                'THEME' => 'Y',
            ),*/
            /*'SCROLLTOTOP_TYPE' => array(
                'TITLE' => GetMessage('SCROLLTOTOP_TYPE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'NONE' => GetMessage('SCROLLTOTOP_TYPE_NONE'),
                    'ROUND_COLOR' => GetMessage('SCROLLTOTOP_TYPE_ROUND_COLOR'),
                    'ROUND_GREY' => GetMessage('SCROLLTOTOP_TYPE_ROUND_GREY'),
                    'ROUND_WHITE' => GetMessage('SCROLLTOTOP_TYPE_ROUND_WHITE'),
                    'RECT_COLOR' => GetMessage('SCROLLTOTOP_TYPE_RECT_COLOR'),
                    'RECT_GREY' => GetMessage('SCROLLTOTOP_TYPE_RECT_GREY'),
                    'RECT_WHITE' => GetMessage('SCROLLTOTOP_TYPE_RECT_WHITE'),
                ),
                'DEFAULT' => 'ROUND_COLOR',
                'THEME' => 'N',
            ),
            'SCROLLTOTOP_POSITION' => array(
                'TITLE' => GetMessage('SCROLLTOTOP_POSITION'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'TOUCH' => GetMessage('SCROLLTOTOP_POSITION_TOUCH'),
                    'PADDING' => GetMessage('SCROLLTOTOP_POSITION_PADDING'),
                    'CONTENT' => GetMessage('SCROLLTOTOP_POSITION_CONTENT'),
                ),
                'DEFAULT' => 'PADDING',
                'THEME' => 'N',
            ),*/
        ),
    ),
    /*'GOOGLE_RECAPTCHA' => array(
        'TITLE' => GetMessage('GOOGLE_RECAPTCHA'),
        'OPTIONS' => array(
            'USE_GOOGLE_RECAPTCHA' => array(
                'TITLE' => GetMessage('USE_GOOGLE_RECAPTCHA_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'N',
            ),
            'GOOGLE_RECAPTCHA_PUBLIC_KEY' => array(
                'TITLE' => GetMessage('GOOGLE_RECAPTCHA_PUBLIC_KEY_TITLE'),
                'TYPE' => 'text',
                'SIZE' => '75',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'GOOGLE_RECAPTCHA_PRIVATE_KEY' => array(
                'TITLE' => GetMessage('GOOGLE_RECAPTCHA_PRIVATE_KEY_TITLE'),
                'TYPE' => 'text',
                'SIZE' => '75',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'GOOGLE_RECAPTCHA_MASK_PAGE' => array(
                'TITLE' => GetMessage('GOOGLE_RECAPTCHA_MASK_PAGE_TITLE'),
                'TYPE' => 'textarea',
                'ROWS' => '5',
                'COLS' => '77',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'GOOGLE_RECAPTCHA_COLOR' => array(
                'TITLE' => GetMessage('GOOGLE_RECAPTCHA_COLOR_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'DARK' => GetMessage('GOOGLE_RECAPTCHA_COLOR_DARK_TITLE'),
                    'LIGHT' => GetMessage('GOOGLE_RECAPTCHA_COLOR_LIGHT_TITLE'),
                ),
                'DEFAULT' => 'LIGHT',
                'THEME' => 'N',
            ),
            'GOOGLE_RECAPTCHA_SIZE' => array(
                'TITLE' => GetMessage('GOOGLE_RECAPTCHA_SIZE_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'NORMAL' => GetMessage('GOOGLE_RECAPTCHA_SIZE_NORMAL_TITLE'),
                    'COMPACT' => GetMessage('GOOGLE_RECAPTCHA_SIZE_COMPACT_TITLE'),
                    'INVISIBLE' => GetMessage('GOOGLE_RECAPTCHA_SIZE_INVISIBLE_TITLE'),
                ),
                'DEFAULT' => 'NORMAL',
                'THEME' => 'N',
            ),
            'GOOGLE_RECAPTCHA_SHOW_LOGO' => array(
                'TITLE' => GetMessage('GOOGLE_RECAPTCHA_SHOW_LOGO_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'GOOGLE_RECAPTCHA_BADGE' => array(
                'TITLE' => GetMessage('GOOGLE_RECAPTCHA_BADGE_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'BOTTOMRIGHT' => GetMessage('GOOGLE_RECAPTCHA_BADGE_BOTTOMRIGHT_TITLE'),
                    'BOTTOMLEFT' => GetMessage('GOOGLE_RECAPTCHA_BADGE_BOTTOMLEFT_TITLE'),
                    'INLINE' => GetMessage('GOOGLE_RECAPTCHA_BADGE_INLINE_TITLE'),
                ),
                'DEFAULT' => 'BOTTOMRIGHT',
                'THEME' => 'N',
            ),
            'GOOGLE_RECAPTCHA_NOTE' => array(
                'TYPE' => 'note',
                'TITLE' => GetMessage('GOOGLE_RECAPTCHA_NOTE_TEXT'),
                'THEME' => 'N',
            ),
        ),
    ),
    'FORMS' => array(
        'TITLE' => GetMessage('FORMS_OPTIONS'),
        'OPTIONS' => array(
            'HIDDEN_CAPTCHA' => array(
                'TITLE' => GetMessage('HIDDEN_CAPTCHA_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'PHONE_MASK' => array(
                'TITLE' => GetMessage('PHONE_MASK'),
                'TYPE' => 'text',
                'DEFAULT' => '+7 (999) 999-99-99',
                'THEME' => 'N',
            ),
            'VALIDATE_PHONE_MASK' => array(
                'TITLE' => GetMessage('VALIDATE_PHONE_MASK'),
                'TYPE' => 'text',
                'DEFAULT' => '^[+][0-9] [(][0-9]{3}[)] [0-9]{3}[-][0-9]{2}[-][0-9]{2}$',
                'THEME' => 'N',
            ),
            'DATE_FORMAT' => array(
                'TITLE' => GetMessage('DATE_FORMAT'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'DOT' => GetMessage('DATE_FORMAT_DOT'),
                    'HYPHEN' => GetMessage('DATE_FORMAT_HYPHEN'),
                    'SPACE' => GetMessage('DATE_FORMAT_SPACE'),
                    'SLASH' => GetMessage('DATE_FORMAT_SLASH'),
                    'COLON' => GetMessage('DATE_FORMAT_COLON'),
                ),
                'DEFAULT' => 'DOT',
                'THEME' => 'N',
            ),
            'VALIDATE_FILE_EXT' => array(
                'TITLE' => GetMessage('VALIDATE_FILE_EXT'),
                'TYPE' => 'text',
                'DEFAULT' => 'png|jpg|jpeg|gif|doc|docx|xls|xlsx|txt|pdf|odt|rtf',
                'THEME' => 'N',
            ),
        ),
    ),
    'SOCIAL' => array(
        'TITLE' => GetMessage('SOCIAL_OPTIONS'),
        'OPTIONS' => array(
            'SOCIAL_VK' => array(
                'TITLE' => GetMessage('SOCIAL_VK'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SOCIAL_FACEBOOK' => array(
                'TITLE' => GetMessage('SOCIAL_FACEBOOK'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SOCIAL_TWITTER' =>	array(
                'TITLE' => GetMessage('SOCIAL_TWITTER'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SOCIAL_INSTAGRAM' => array(
                'TITLE' => GetMessage('SOCIAL_INSTAGRAM'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SOCIAL_TELEGRAM' => array(
                'TITLE' => GetMessage('SOCIAL_TELEGRAM'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SOCIAL_YOUTUBE' => array(
                'TITLE' => GetMessage('SOCIAL_YOUTUBE'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SOCIAL_ODNOKLASSNIKI' => array(
                'TITLE' => GetMessage('SOCIAL_ODNOKLASSNIKI'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SOCIAL_GOOGLEPLUS' => array(
                'TITLE' => GetMessage('SOCIAL_GOOGLEPLUS'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SOCIAL_MAIL' => array(
                'TITLE' => GetMessage('SOCIAL_MAILRU'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
        ),
    ),
    'INSTAGRAMM_SETTINGS' => array(
        'TITLE' => GetMessage('INSTAGRAMM_INDEX'),
        'THEME' => 'N',
        'OPTIONS' => array(
            'API_TOKEN_INSTAGRAMM' => array(
                'TITLE' => GetMessage('API_TOKEN_INSTAGRAMM'),
                'TYPE' => 'text',
                'SIZE' => '50',
                'DEFAULT' => '1056017790.9b6cbfe.4dfb9d965b5c4c599121872c23b4dfd0',
                'THEME' => 'N',
            ),
            'INSTAGRAMM_TITLE_BLOCK' => array(
                'TITLE' => GetMessage('INSTAGRAMM_TITLE_BLOCK'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('INSTAGRAMM_VALUE'),
                'THEME' => 'N',
            ),
            'INSTAGRAMM_WIDE_BLOCK' => array(
                'TITLE' => GetMessage('INSTAGRAMM_WIDE_BLOCK'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'N',
            ),
            'INSTAGRAMM_WIDE_BLOCK_NOTE' => array(
                'TITLE' => GetMessage('INSTAGRAMM_WIDE_BLOCK_NOTE_TEXT'),
                'TYPE' => 'note',
                'THEME' => 'N',
            ),
            'INSTAGRAMM_TEXT_LENGTH' => array(
                'TITLE' => GetMessage('INSTAGRAMM_TEXT_LENGTH'),
                'TYPE' => 'text',
                'DEFAULT' => '400',
                'THEME' => 'N',
            ),
            'INSTAGRAMM_ITEMS_COUNT' => array(
                'TITLE' => GetMessage('INSTAGRAMM_ITEMS_COUNT'),
                'TYPE' => 'text',
                'DEFAULT' => '8',
                'THEME' => 'N',
            ),
            'INSTAGRAMM_ITEMS_VISIBLE' => array(
                'TITLE' => GetMessage('INSTAGRAMM_ITEMS_VISIBLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                ),
                'DEFAULT' => 4,
                'THEME' => 'N',
            ),
        )
    ),
    'INDEX_PAGE' => array(
        'TITLE' => GetMessage('INDEX_PAGE_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'BIGBANNER_ANIMATIONTYPE' => array(
                'TITLE' => GetMessage('BIGBANNER_ANIMATIONTYPE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'SLIDE_HORIZONTAL' => GetMessage('ANIMATION_SLIDE_HORIZONTAL'),
                    'SLIDE_VERTICAL' => GetMessage('ANIMATION_SLIDE_VERTICAL'),
                    'FADE' => GetMessage('ANIMATION_FADE'),
                ),
                'DEFAULT' => 'SLIDE_HORIZONTAL',
                'THEME' => 'N',
            ),
            'BIGBANNER_SLIDESSHOWSPEED' => array(
                'TITLE' => GetMessage('BIGBANNER_SLIDESSHOWSPEED'),
                'TYPE' => 'text',
                'DEFAULT' => '5000',
                'THEME' => 'N',
            ),
            'BIGBANNER_ANIMATIONSPEED' => array(
                'TITLE' => GetMessage('BIGBANNER_ANIMATIONSPEED'),
                'TYPE' => 'text',
                'DEFAULT' => '600',
                'THEME' => 'N',
            ),
            'BIGBANNER_HIDEONNARROW' => array(
                'TITLE' => GetMessage('BIGBANNER_HIDEONNARROW'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'N',
            ),
            'PARTNERSBANNER_SLIDESSHOWSPEED' => array(
                'TITLE' => GetMessage('PARTNERSBANNER_SLIDESSHOWSPEED'),
                'TYPE' => 'text',
                'DEFAULT' => '5000',
                'THEME' => 'N',
            ),
            'PARTNERSBANNER_ANIMATIONSPEED' => array(
                'TITLE' => GetMessage('PARTNERSBANNER_ANIMATIONSPEED'),
                'TYPE' => 'text',
                'DEFAULT' => '600',
                'THEME' => 'N',
            ),
            'INDEX_TYPE' => array(
                'TITLE' => GetMessage('INDEX_TYPE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'index1' => '1',
                    'index2' => '2',
                    'index3' => '3',
                    'index4' => '4',
                    'custom' => array(
                        'TITLE' => 'Custom',
                        'HIDE' => 'Y'
                    ),
                ),
                'DEFAULT' => 'index1',
                'THEME' => 'Y',
                'REFRESH' => 'Y',
                'PREVIEW' => array(
                    'URL' => ''
                ),
                'SUB_PARAMS' => array(
                    'index1' => array(
                        'WITH_LEFT_BLOCK' => array(
                            'TITLE' => GetMessage('WITH_LEFT_BLOCK_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'N',
                            'VISIBLE' => 'N',
                            'THEME' => 'N',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'TIZERS' => array(
                            'TITLE' => GetMessage('TIZERS_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'CATALOG_SECTIONS' => array(
                            'TITLE' => GetMessage('CATALOG_SECTIONS_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'CATALOG_TAB' => array(
                            'TITLE' => GetMessage('CATALOG_TAB_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'MIDDLE_ADV' => array(
                            'TITLE' => GetMessage('MIDDLE_ADV_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'SALE' => array(
                            'TITLE' => GetMessage('SALE_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'BLOG' => array(
                            'TITLE' => GetMessage('BLOG_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'BOTTOM_BANNERS' => array(
                            'TITLE' => GetMessage('BOTTOM_BANNERS_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'COMPANY_TEXT' => array(
                            'TITLE' => GetMessage('COMPANY_TEXT_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'BRANDS' => array(
                            'TITLE' => GetMessage('BRANDS_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'INSTAGRAMM' => array(
                            'TITLE' => GetMessage('INSTAGRAMM_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'N',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                    ),
                    'index2' => array(
                        'WITH_LEFT_BLOCK' => array(
                            'TITLE' => GetMessage('WITH_LEFT_BLOCK_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'N',
                            'VISIBLE' => 'N',
                            'THEME' => 'N',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                    ),
                    'index3' => array(
                        'WITH_LEFT_BLOCK' => array(
                            'TITLE' => GetMessage('WITH_LEFT_BLOCK_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'VISIBLE' => 'N',
                            'THEME' => 'N',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'TOP_ADV_BOTTOM_BANNER' => array(
                            'TITLE' => GetMessage('TOP_ADV_BOTTOM_BANNER_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'FLOAT_BANNER' => array(
                            'TITLE' => GetMessage('FLOAT_BANNER_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'CATALOG_SECTIONS' => array(
                            'TITLE' => GetMessage('CATALOG_SECTIONS_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'CATALOG_TAB' => array(
                            'TITLE' => GetMessage('CATALOG_TAB_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'TIZERS' => array(
                            'TITLE' => GetMessage('TIZERS_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'SALE' => array(
                            'TITLE' => GetMessage('SALE_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'BOTTOM_BANNERS' => array(
                            'TITLE' => GetMessage('BOTTOM_BANNERS_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'COMPANY_TEXT' => array(
                            'TITLE' => GetMessage('COMPANY_TEXT_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'BRANDS' => array(
                            'TITLE' => GetMessage('BRANDS_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                        'INSTAGRAMM' => array(
                            'TITLE' => GetMessage('INSTAGRAMM_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'N',
                            'THEME' => 'Y',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                    ),
                    'index4' => array(
                        'WITH_LEFT_BLOCK' => array(
                            'TITLE' => GetMessage('WITH_LEFT_BLOCK_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'Y',
                            'VISIBLE' => 'N',
                            'THEME' => 'N',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                    ),
                    'custom' => array(
                        'WITH_LEFT_BLOCK' => array(
                            'TITLE' => GetMessage('WITH_LEFT_BLOCK_INDEX'),
                            'TYPE' => 'checkbox',
                            'DEFAULT' => 'N',
                            'ONE_ROW' => 'Y',
                            'SMALL_TOGGLE' => 'Y',
                        ),
                    ),
                )
            ),
            'FRONT_PAGE_BRANDS' => array(
                'TITLE' => GetMessage('FRONT_PAGE_BRANDS_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'brands_slider' => GetMessage('PAGE_SLIDER'),
                    'brands_list' => GetMessage('PAGE_LIST'),
                ),
                'DEFAULT' => 'brands_slider',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'SCROLL_BLOCK' => '.brand_main_wrapper',
                    'URL' => '',
                ),
            ),
            'FRONT_PAGE_SECTIONS' => array(
                'TITLE' => GetMessage('FRONT_PAGE_SECTIONS_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'front_sections_only' => GetMessage('FRONT_PAGE_SECTIONS_BLOCK'),
                    'front_sections_with_childs' => GetMessage('FRONT_PAGE_SECTIONS_CHILDS'),
                ),
                'DEFAULT' => 'front_sections_only',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'SCROLL_BLOCK' => '.sections_wrapper',
                    'URL' => '',
                ),
            ),
        ),
    ),
    'HEADER' => array(
        'TITLE' => GetMessage('HEADER_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'TOP_MENU_FIXED' => array(
                'TITLE' => GetMessage('TOP_MENU_FIXED'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
                'ONE_ROW' => 'Y',
                'DEPENDENT_PARAMS' => array(
                    'HEADER_FIXED' => array(
                        'TITLE' => GetMessage('HEADER_FIXED'),
                        'HIDE_TITLE' => 'Y',
                        'TYPE' => 'selectbox',
                        'LIST' => array(
                            '1' => array(
                                'IMG' => '/bitrix/images/'.$solution.'/themes/fixed_header1.png',
                                'TITLE' => '1',
                                'POSITION_BLOCK' => 'block',
                                'POSITION_TITLE' => 'left',
                            ),
                            '2' => array(
                                'IMG' => '/bitrix/images/'.$solution.'/themes/fixed_header2.png',
                                'TITLE' => '2',
                                'POSITION_BLOCK' => 'block',
                                'POSITION_TITLE' => 'left',
                            ),
                            'custom' => array(
                                'TITLE' => 'Custom',
                                'POSITION_BLOCK' => 'block',
                                'HIDE' => 'Y'
                            ),
                        ),
                        'CONDITIONAL_VALUE' => 'Y',
                        'DEFAULT' => '2',
                        'THEME' => 'Y',
                    ),
                )
            ),
            'HEADER_TYPE' => array(
                'TITLE' => GetMessage('HEADER_TYPE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header1.png',
                        'TITLE' => '1',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '2' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header2.png',
                        'TITLE' => '2',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '3' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header3.png',
                        'TITLE' => '3',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '4' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header4.png',
                        'TITLE' => '4',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '5' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header5.png',
                        'TITLE' => '5',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '6' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header6.png',
                        'TITLE' => '6',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '7' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header7.png',
                        'TITLE' => '7',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '8' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header8.png',
                        'TITLE' => '8',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '9' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header9.png',
                        'TITLE' => '9',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '10' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header10.png',
                        'TITLE' => '10',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '11' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header11.png',
                        'TITLE' => '11',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '12' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header12.png',
                        'TITLE' => '12',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '13' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header13.png',
                        'TITLE' => '13',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '14' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header14.png',
                        'TITLE' => '14',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '15' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header15.png',
                        'TITLE' => '15',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '16' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header16.png',
                        'TITLE' => '16',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '17' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header17.png',
                        'TITLE' => '17',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    'custom' => array(
                        'TITLE' => 'Custom',
                        'POSITION_BLOCK' => 'block',
                        'HIDE' => 'Y'
                    ),
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
            ),
            'HEADER_PHONES' => array(
                'TITLE' => GetMessage('HEADER_PHONES_OPTIONS_TITLE'),
                'TYPE' => 'array',
                'THEME' => 'N',
                'OPTIONS' => $arContactOptions = array(
                    'PHONE_VALUE' => array(
                        'TITLE' => GetMessage('HEADER_PHONE_OPTION_VALUE_TITLE'),
                        'TYPE' => 'text',
                        'DEFAULT' => '',
                        'THEME' => 'N',
                        'REQUIRED' => 'Y',
                    ),
                ),
            ),
        ),
    ),
    'REGIONALITY_PAGE' => array(
        'TITLE' => GetMessage('REGIONALITY_PAGE_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'USE_REGIONALITY' => array(
                'TITLE' => GetMessage('USE_REGIONALITY_TITLE'),
                'TYPE' => 'checkbox',
                'DEPENDENT_PARAMS' => array(
                    'REGIONALITY_TYPE' => array(
                        'TITLE' => GetMessage('REGIONALITY_TYPE_TITLE'),
                        'HIDE_TITLE' => 'Y',
                        'TYPE' => 'selectbox',
                        'LIST' => array(
                            'ONE_DOMAIN' => GetMessage('REGIONALITY_TYPE_ONE_DOMAIN'),
                            'SUBDOMAIN' => GetMessage('REGIONALITY_TYPE_SUBDOMAIN'),
                        ),
                        'DEFAULT' => 'ONE_DOMAIN',
                        'THEME' => 'Y',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'REGIONALITY_VIEW' => array(
                        'TITLE' => GetMessage('REGIONALITY_VIEW_TITLE'),
                        'TOP_BORDER' => 'Y',
                        'TYPE' => 'selectbox',
                        'LIST' => array(
                            'SELECT' => GetMessage('REGIONALITY_VIEW_SELECT'),
                            'POPUP_REGIONS' => GetMessage('REGIONALITY_VIEW_POPUP_EXT'),
                            'POPUP_REGIONS_SMALL' => GetMessage('REGIONALITY_VIEW_POPUP_SMALL'),
                        ),
                        'DEFAULT' => 'POPUP_REGIONS',
                        'THEME' => 'Y',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'SHOW_REGION_CONTACT' => array(
                        'TITLE' => GetMessage('SHOW_REGION_CONTACT_TITLE'),
                        'TYPE' => 'checkbox',
                        'DEFAULT' => 'N',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'REGIONALITY_FILTER_ITEM' => array(
                        'TITLE' => GetMessage('REGIONALITY_FILTER_ITEM_TITLE'),
                        'TYPE' => 'checkbox',
                        'DEFAULT' => 'N',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'REGIONALITY_FILTER_ITEM_NOTE' => array(
                        'NOTE' => GetMessage('REGIONALITY_FILTER_ITEM_NOTE_TEXT'),
                        'TYPE' => 'note',
                        'DEFAULT' => 'N',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'REGIONALITY_SEARCH_ROW' => array(
                        'TITLE' => GetMessage('REGIONALITY_SEARCH_ROW_TITLE'),
                        'TYPE' => 'checkbox',
                        'DEFAULT' => 'N',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'REGIONALITY_SEARCH_ROW_NOTE' => array(
                        'NOTE' => GetMessage('REGIONALITY_SEARCH_ROW_NOTE_TEXT'),
                        'TYPE' => 'note',
                        'DEFAULT' => 'N',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                ),
                'DEFAULT' => 'N',
                'THEME' => 'Y',
            ),
        )
    ),
    'CATALOG_PAGE' => array(
        'TITLE' => GetMessage('CATALOG_PAGE_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'FILTER_VIEW' => array(
                'TITLE' => GetMessage('M_FILTER_VIEW'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'VERTICAL' => array(
                        'TITLE' => GetMessage('M_FILTER_VIEW_VERTICAL'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/filter_1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'HORIZONTAL' => array(
                        'TITLE' => GetMessage('M_FILTER_VIEW_HORIZONTAL'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/filter_2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'COMPACT' => array(
                        'TITLE' => GetMessage('M_FILTER_VIEW_COMPACT'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/filter_3.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'VERTICAL',
                'THEME' => 'Y',
            ),
            'SEARCH_VIEW_TYPE' => array(
                'TITLE' => GetMessage('SEARCH_VIEW_TYPE_TITLE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'with_menu' => array(
                        'TITLE' => GetMessage('SEARCH_VIEW_TYPE_NORMAL'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/search1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'with_filter' => array(
                        'TITLE' => GetMessage('SEARCH_VIEW_TYPE_FILTER'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/search2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'with_menu',
                'THEME' => 'Y',
            ),
            'USE_FAST_VIEW_PAGE_DETAIL' => array(
                'TITLE' => GetMessage('USE_FAST_VIEW_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'NO' => GetMessage('NO'),
                    'fast_view_1' => 1,
                ),
                'DEFAULT' => 'fast_view_1',
                'THEME' => 'Y',
            ),
            'SHOW_TOTAL_SUMM' => array(
                'TITLE' => GetMessage('SHOW_TOTAL_SUMM_TITLE'),
                'TYPE' => 'checkbox',
                'DEPENDENT_PARAMS' => array(
                    'SHOW_TOTAL_SUMM_TYPE' => array(
                        'TITLE' => GetMessage('SHOW_TOTAL_SUMM_TYPE_TITLE'),
                        'TYPE' => 'selectbox',
                        'LIST' => array(
                            'ALWAYS' => GetMessage('SHOW_TOTAL_SUMM_TYPE_ALWAYS'),
                            'CHANGE' => GetMessage('SHOW_TOTAL_SUMM_TYPE_CHANGE'),
                        ),
                        'DEFAULT' => 'CHANGE',
                        'THEME' => 'Y',
                        'HIDE_TITLE' => 'Y',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                ),
                'DEFAULT' => 'N',
                'THEME' => 'Y',
            ),
            'CHANGE_TITLE_ITEM' => array(
                'TITLE' => GetMessage('CHANGE_TITLE_ITEM_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'Y',
            ),
            'VIEW_TYPE_HIGHLOAD_PROP' => array(
                'TITLE' => GetMessage('VIEW_TYPE_HIGHLOAD_PROP_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'N',
            ),
            'SHOW_HEADER_GOODS' => array(
                'TITLE' => GetMessage('SHOW_HEADER_GOODS_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
            ),
            'SEARCH_HIDE_NOT_AVAILABLE' => array(
                'TITLE' => GetMessage('SEARCH_HIDE_NOT_AVAILABLE_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'N',
            ),
            'LEFT_BLOCK_CATALOG_ICONS' => array(
                'TITLE' => GetMessage('LEFT_BLOCK_CATALOG_ICONS_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'Y',
            ),
            'SHOW_CATALOG_SECTIONS_ICONS' => array(
                'TITLE' => GetMessage('SHOW_CATALOG_SECTIONS_ICONS_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
            ),
            'LEFT_BLOCK_CATALOG_DETAIL' => array(
                'TITLE' => GetMessage('LEFT_BLOCK_CATALOG_DETAIL_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
            ),
            'CATALOG_COMPARE' => array(
                'TITLE' => GetMessage('CATALOG_COMPARE_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'CATALOG_PAGE_DETAIL' => array(
                'TITLE' => GetMessage('CATALOG_DETAIL_PAGE_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'element_1' => array(
                        'TITLE' => GetMessage('PAGE_TAB'),
                    ),
                    'element_2' => array(
                        'TITLE' => GetMessage('PAGE_NOTAB'),
                    ),
                    'element_3' => array(
                        'TITLE' => GetMessage('PAGE_CLOTHES'),
                    ),
                    'element_4' => array(
                        'TITLE' => GetMessage('PAGE_STROY'),
                    ),
                    'element_5' => array(
                        'TITLE' => GetMessage('PAGE_BIGA'),
                    ),
                ),
                'DEFAULT' => 'element_1',
                'THEME' => 'Y',
            ),
            'CATALOG_IBLOCK_ID' => array(
                'TITLE' => GetMessage('CATALOG_IBLOCK_ID_TITLE'),
                'TYPE' => 'selectbox',
                'TYPE_SELECT' => 'IBLOCK',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'DISCOUNT_PRICE' => array(
                'TITLE' => GetMessage('DISCOUNT_PRICE_TITLE'),
                'TYPE' => 'multiselectbox',
                'TYPE_SELECT' => 'PRICES',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SHOW_BREADCRUMBS_CATALOG_SUBSECTIONS' => array(
                'TITLE' => GetMessage('SHOW_BREADCRUMBS_CATALOG_SUBSECTIONS_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
            ),
            'SHOW_BREADCRUMBS_CATALOG_CHAIN' => array(
                'TITLE' => GetMessage('SHOW_BREADCRUMBS_CATALOG_CHAIN_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'H1' => GetMessage('SHOW_BREADCRUMBS_CATALOG_CHAIN_H1'),
                    'NAME' => GetMessage('SHOW_BREADCRUMBS_CATALOG_CHAIN_NAME'),
                ),
                'DEFAULT' => 'H1',
                'THEME' => 'Y',
            ),
            'SHOW_SECTION_DESCRIPTION' => array(
                'TITLE' => GetMessage('SHOW_SECTION_DESCRIPTION_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'TOP' => GetMessage('TOP_SECTION'),
                    'BOTTOM' => GetMessage('BOTTOM_SECTION'),
                    'BOTH' => GetMessage('BOTH_SECTION'),
                ),
                'DEFAULT' => 'BOTTOM',
                'THEME' => 'N',
            ),
            'TOP_SECTION_DESCRIPTION_POSITION' => array(
                'TITLE' => GetMessage('TOP_SECTION_DESCRIPTION_POSITION_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'DESCRIPTION' => GetMessage('DESCRIPTION_SECTION').'(DESCRIPTION)',
                    'UF_SECTION_DESCR' => GetMessage('SEO_DESCRIPTION_SECTION').'(UF_SECTION_DESCR)',
                ),
                'DEFAULT' => 'UF_SECTION_DESCR',
                'THEME' => 'N',
            ),
            'BOTTOM_SECTION_DESCRIPTION_POSITION' => array(
                'TITLE' => GetMessage('BOTTOM_SECTION_DESCRIPTION_POSITION_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'DESCRIPTION' => GetMessage('DESCRIPTION_SECTION').'(DESCRIPTION)',
                    'UF_SECTION_DESCR' => GetMessage('SEO_DESCRIPTION_SECTION').'(UF_SECTION_DESCR)',
                ),
                'DEFAULT' => 'DESCRIPTION',
                'THEME' => 'N',
            ),
            'ITEM_STICKER_CLASS_SOURCE' => array(
                'TITLE' => GetMessage('ITEM_STICKER_CLASS_SOURCE_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'PROPERTY_VALUE' => GetMessage('ITEM_STICKER_CLASS_SOURCE_PROPERTY_VALUE'),
                    'PROPERTY_XML_ID' => GetMessage('ITEM_STICKER_CLASS_SOURCE_PROPERTY_XML_ID'),
                ),
                'DEFAULT' => 'PROPERTY_VALUE',
                'THEME' => 'N',
            ),
            'TYPE_SKU' => array(
                'TITLE' => GetMessage('TYPE_SKU_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'TYPE_1' => 1,
                    'TYPE_2' => 2,
                ),
                'DEFAULT' => 'TYPE_1',
                'THEME' => 'Y',
            ),
            'DETAIL_PICTURE_MODE' => array(
                'TITLE' => GetMessage('DETAIL_PICTURE_MODE_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'POPUP' => GetMessage('DETAIL_PICTURE_MODE_POPUP'),
                    'MAGNIFIER' => GetMessage('DETAIL_PICTURE_MODE_MAGNIFIER'),
                ),
                'DEFAULT' => 'POPUP',
                'THEME' => 'Y',
            ),
            'MENU_POSITION' => array(
                'TITLE' => GetMessage('MENU_POSITION_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'TOP' => GetMessage('TOP_MENU_HOVER'),
                    'LINE' => GetMessage('LINE_MENU_HOVER'),
                ),
                'DEFAULT' => 'LINE',
                'THEME' => 'Y',
            ),
            'MENU_TYPE_VIEW' => array(
                'TITLE' => GetMessage('MENU_TYPE_VIEW_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'HOVER' => GetMessage('MENU_TYPE_VIEW_HOVER'),
                    'BOTTOM' => GetMessage('MENU_TYPE_VIEW_BOTTOM'),
                ),
                'DEFAULT' => 'HOVER',
                'THEME' => 'Y',
            ),
            'VIEWED_TYPE' => array(
                'TITLE' => GetMessage('VIEWED_TYPE_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'LOCAL' => GetMessage('VIEWED_TYPE_LOGIC_COOKIE'),
                    'COMPONENT' => GetMessage('VIEWED_TYPE_LOGIC_COMPONENT'),
                ),
                'DEFAULT' => 'LOCAL',
                'THEME' => 'Y',
            ),
            'VIEWED_TEMPLATE' => array(
                'TITLE' => GetMessage('VIEWED_TEMPLATE_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'VERTICAL' => GetMessage('VIEWED_TEMPLATE_VERTICAL'),
                    'HORIZONTAL' => GetMessage('VIEWED_TEMPLATE_HORIZONTAL'),
                ),
                'DEFAULT' => 'HORIZONTAL',
                'THEME' => 'Y',
            ),
            'GRUPPER_PROPS' => array(
                'TITLE' => GetMessage('GRUPPER_PROPS_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'NOT' => array(
                        "TITLE" => GetMessage('GRUPPER_PROPS_NO')
                    ),
                ),
                'DEFAULT' => 'NOT',
                'THEME' => 'N',
            ),
        ),
    ),
    'QUANTITY' => array(
        'TITLE' => GetMessage('QUANTITY_OPTIONS'),
        'THEME' => 'N',
        'OPTIONS' => array(
            'SHOW_QUANTITY_FOR_GROUPS' => array(
                'TITLE' => GetMessage('SHOW_QUANTITY_FOR_GROUPS_TITLE'),
                'TYPE' => 'multiselectbox',
                'TYPE_SELECT' => 'GROUP',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SHOW_QUANTITY_COUNT_FOR_GROUPS' => array(
                'TITLE' => GetMessage('SHOW_QUANTITY_COUNT_FOR_GROUPS_TITLE'),
                'TYPE' => 'multiselectbox',
                'TYPE_SELECT' => 'GROUP',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'SHOW_QUANTITY_NOTE' => array(
                'TITLE' => GetMessage('SHOW_QUANTITY_NOTE'),
                'TYPE' => 'note',
                'THEME' => 'N',
            ),
            'USE_WORD_EXPRESSION' => array(
                'TITLE' => GetMessage('USE_WORD_EXPRESSION_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
                'DEPENDENT_PARAMS' => array(
                    'MAX_AMOUNT' => array(
                        'TITLE' => GetMessage('MAX_AMOUNT_TITLE'),
                        'TYPE' => 'text',
                        'DEFAULT' => '10',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'MIN_AMOUNT' => array(
                        'TITLE' => GetMessage('MIN_AMOUNT_TITLE'),
                        'TYPE' => 'text',
                        'DEFAULT' => '2',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                )
            ),
        ),
    ),
    'EXPRESSIONS' => array(
        'TITLE' => GetMessage('EXPRESSIONS_OPTIONS'),
        'THEME' => 'N',
        'OPTIONS' => array(
            'EXPRESSION_ADDTOBASKET_BUTTON_DEFAULT' => array(
                'TITLE' => GetMessage('EXPRESSION_ADDTOBASKET_BUTTON_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_ADDTOBASKET_BUTTON_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_ADDEDTOBASKET_BUTTON_DEFAULT' => array(
                'TITLE' => GetMessage('EXPRESSION_ADDEDTOBASKET_BUTTON_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_ADDEDTOBASKET_BUTTON_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_READ_MORE_OFFERS_DEFAULT' => array(
                'TITLE' => GetMessage('EXPRESSION_READ_MORE_OFFERS_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_READ_MORE_OFFERS_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_SUBSCRIBE_BUTTON' => array(
                'TITLE' => GetMessage('EXPRESSION_SUBSCRIBE_BUTTON_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_SUBSCRIBE_BUTTON_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_SUBSCRIBED_BUTTON' => array(
                'TITLE' => GetMessage('EXPRESSION_SUBSCRIBED_BUTTON_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_SUBSCRIBED_BUTTON_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_ORDER_BUTTON' => array(
                'TITLE' => GetMessage('EXPRESSION_ORDER_BUTTON_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_ORDER_BUTTON_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_ORDER_TEXT' => array(
                'TITLE' => GetMessage('EXPRESSION_ORDER_TEXT_TITLE'),
                'TYPE' => 'text',
                'SIZE' => '70',
                'DEFAULT' => GetMessage('EXPRESSION_ORDER_TEXT_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_FOR_EXISTS' => array(
                'TITLE' => GetMessage('EXPRESSION_FOR_EXISTS_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_FOR_EXISTS_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_FOR_NOTEXISTS' => array(
                'TITLE' => GetMessage('EXPRESSION_FOR_NOTEXISTS_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_FOR_NOTEXISTS_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_FOR_MIN' => array(
                'TITLE' => GetMessage('EXPRESSION_FOR_MIN_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_FOR_MIN_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_FOR_MID' => array(
                'TITLE' => GetMessage('EXPRESSION_FOR_MID_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_FOR_MID_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_FOR_MAX' => array(
                'TITLE' => GetMessage('EXPRESSION_FOR_MAX_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_FOR_MAX_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_FOR_PRINT_PAGE' => array(
                'TITLE' => GetMessage('EXPRESSION_FOR_PRINT_PAGE_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_FOR_PRINT_PAGE_DEFAULT'),
                'THEME' => 'N',
            ),
            'EXPRESSION_FOR_FAST_VIEW' => array(
                'TITLE' => GetMessage('EXPRESSION_FOR_FAST_VIEW_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => GetMessage('EXPRESSION_FOR_FAST_VIEW_DEFAULT'),
                'THEME' => 'N',
            ),
        ),
    ),
    'BASKET' => array(
        'TITLE' => GetMessage('BASKET_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'ORDER_BASKET_VIEW' => array(
                'TITLE' => GetMessage('ORDER_BASKET_VIEW_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'NORMAL' => GetMessage('ORDER_BASKET_VIEW_HEADER_TITLE'),
                    'FLY2' => GetMessage('ORDER_BASKET_VIEW_FLY_TITLE'),
                    'FLY' => GetMessage('ORDER_BASKET_VIEW_FLY2_TITLE'),
                    'BOTTOM' => GetMessage('ORDER_BASKET_VIEW_BOTTOM_TITLE'),
                ),
                'DEFAULT' => 'FLY',
                'THEME' => 'Y',
            ),
            'ORDER_BASKET_COLOR' => array(
                'TITLE' => GetMessage('ORDER_BASKET_COLOR_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'DARK' => GetMessage('ORDER_BASKET_COLOR_DARK_TITLE'),
                    'COLOR' => GetMessage('ORDER_BASKET_COLOR_COLOR_TITLE'),
                    'WHITE' => GetMessage('ORDER_BASKET_COLOR_WHITE_TITLE'),
                ),
                'DEFAULT' => 'DARK',
                'THEME' => 'Y',
            ),
            'SHOW_BASKET_ONADDTOCART' => array(
                'TITLE' => GetMessage('SHOW_BASKET_ONADDTOCART_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
            ),
            'SHOW_BASKET_PRINT' => array(
                'TITLE' => GetMessage('SHOW_BASKET_PRINT_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
            ),
            'SHOW_BASKET_ON_PAGES' => array(
                'TITLE' => GetMessage('SHOW_BASKET_ON_PAGES_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'Y',
                'HINT' => GetMessage('SHOW_BASKET_ON_PAGES_HINT'),
            ),
            'USE_PRODUCT_QUANTITY_LIST' => array(
                'TITLE' => GetMessage('USE_PRODUCT_QUANTITY_LIST_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'USE_PRODUCT_QUANTITY_DETAIL' => array(
                'TITLE' => GetMessage('USE_PRODUCT_QUANTITY_DETAIL_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'BUYNOPRICEGGOODS' => array(
                'TITLE' => GetMessage('BUYNOPRICEGGOODS_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'ORDER' => GetMessage('BUYNOPRICEGGOODS_ORDER'),
                    'NOTHING' => GetMessage('BUYNOPRICEGGOODS_NOTHING'),
                ),
                'DEFAULT' => 'NOTHING',
                'THEME' => 'N',
            ),
            'BUYMISSINGGOODS' => array(
                'TITLE' => GetMessage('BUYMISSINGGOODS_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'ADD' => GetMessage('BUYMISSINGGOODS_ADD'),
                    'ORDER' => GetMessage('BUYMISSINGGOODS_ORDER'),
                    'SUBSCRIBE' => GetMessage('BUYMISSINGGOODS_SUBSCRIBE'),
                    'NOTHING' => GetMessage('BUYMISSINGGOODS_NOTHING'),
                ),
                'DEFAULT' => 'ADD',
                'THEME' => 'N',
            ),
            'MIN_ORDER_PRICE' => array(
                'TITLE' => GetMessage('MIN_ORDER_PRICE_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '1000',
                'THEME' => 'N',
            ),
            'MIN_ORDER_PRICE_TEXT' => array(
                'TITLE' => GetMessage('MIN_ORDER_PRICE_TEXT_TITLE'),
                'TYPE' => 'textarea',
                'ROWS' => '3',
                'COLS' => '70',
                'DEFAULT' => GetMessage('MIN_ORDER_PRICE_TEXT_EXAMPLE'),
                'THEME' => 'N',
            ),
        ),
    ),
    'URL_PAGES' => array(
        'TITLE' => GetMessage('URL_PAGES_OPTIONS'),
        'THEME' => 'N',
        'OPTIONS' => array(
            'CATALOG_PAGE_URL' => array(
                'TITLE' => GetMessage('CATALOG_PAGE_URL_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '#SITE_DIR#catalog/',
                'THEME' => 'N',
            ),
            'BASKET_PAGE_URL' => array(
                'TITLE' => GetMessage('BASKET_PAGE_URL_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '#SITE_DIR#basket/',
                'THEME' => 'N',
            ),
            'ORDER_PAGE_URL' => array(
                'TITLE' => GetMessage('ORDER_PAGE_URL_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '#SITE_DIR#order/',
                'THEME' => 'N',
            ),
            'COMPARE_PAGE_URL' => array(
                'TITLE' => GetMessage('COMPARE_PAGE_URL_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '#SITE_DIR#catalog/compare.php',
                'THEME' => 'N',
            ),
            'PERSONAL_PAGE_URL' => array(
                'TITLE' => GetMessage('PERSONAL_PAGE_URL_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '#SITE_DIR#personal/',
                'THEME' => 'N',
            ),
        ),
    ),
    'ONECLICKBUY' => array(
        'TITLE' => GetMessage('ONECLICKBUY_OPTIONS'),
        'THEME' => 'N',
        'OPTIONS' => array(
            'ONE_CLICK_BUY_CAPTCHA' => array(
                'TITLE' => GetMessage('ONE_CLICK_BUY_CAPTCHA_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'N',
            ),
            'SHOW_ONECLICKBUY_ON_BASKET_PAGE' => array(
                'TITLE' => GetMessage('SHOW_ONECLICKBUY_ON_BASKET_PAGE_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'ONECLICKBUY_SHOW_DELIVERY_NOTE' => array(
                'TITLE' => GetMessage('ONECLICKBUY_SHOW_DELIVERY_NOTE_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'N',
            ),
            'ONECLICKBUY_PERSON_TYPE' => array(
                'TITLE' => GetMessage('ONECLICKBUY_PERSON_TYPE_TITLE'),
                'TYPE' => 'selectbox',
                'DEFAULT' => '1',
                'THEME' => 'N',
            ),
            'ONECLICKBUY_DELIVERY' => array(
                'TITLE' => GetMessage('ONECLICKBUY_DELIVERY_TITLE'),
                'TYPE' => 'selectbox',
                'DEFAULT' => '2',
                'THEME' => 'N',
            ),
            'ONECLICKBUY_PAYMENT' => array(
                'TITLE' => GetMessage('ONECLICKBUY_PAYMENT_TITLE'),
                'TYPE' => 'selectbox',
                'DEFAULT' => '1',
                'THEME' => 'N',
            ),
            'ONECLICKBUY_PROPERTIES' => array(
                'TITLE' => GetMessage('ONECLICKBUY_PROPERTIES_TITLE'),
                'TYPE' => 'multiselectbox',
                'LIST' => array(
                    'FIO' => GetMessage('ONECLICKBUY_PROPERTIES_FIO'),
                    'PHONE' => GetMessage('ONECLICKBUY_PROPERTIES_PHONE'),
                    'EMAIL' => GetMessage('ONECLICKBUY_PROPERTIES_EMAIL'),
                    'COMMENT' => GetMessage('ONECLICKBUY_PROPERTIES_COMMENT'),
                ),
                'DEFAULT' => 'FIO,PHONE,EMAIL,COMMENT',
                'THEME' => 'N',
            ),
            'ONECLICKBUY_REQUIRED_PROPERTIES' => array(
                'TITLE' => GetMessage('ONECLICKBUY_REQUIRED_PROPERTIES_TITLE'),
                'TYPE' => 'multiselectbox',
                'LIST' => array(
                    'FIO' => GetMessage('ONECLICKBUY_PROPERTIES_FIO'),
                    'PHONE' => GetMessage('ONECLICKBUY_PROPERTIES_PHONE'),
                    'EMAIL' => GetMessage('ONECLICKBUY_PROPERTIES_EMAIL'),
                    'COMMENT' => GetMessage('ONECLICKBUY_PROPERTIES_COMMENT'),
                ),
                'DEFAULT' => 'FIO,PHONE',
                'THEME' => 'N',
            ),
        ),
    ),
    'YANDEX_MARKET_MAIN' => array(
        'TITLE' => GetMessage('MAIN_OPTIONS_PARAMETERS'),
        'THEME' => 'N',
        'OPTIONS' => array(
            'YANDEX_MARKET_TOKEN_REVIEWS_HINT' => array(
                'TITLE' => GetMessage('YANDEX_MARKET_TOKEN_REVIEWS_HINT'),
                'TYPE' => 'note',
                'THEME' => 'N',
            ),
            'YANDEX_MARKET_TOKEN_REVIEWS' => array(
                'TITLE' => GetMessage('YANDEX_MARKET_TOKEN_REVIEWS_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '',
                'THEME' => 'N',
            ),
            'YANDEX_MARKET_CACHE_TIME' => array(
                'TITLE' => GetMessage('YANDEX_MARKET_CACHE_TIME_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '604800',
                'THEME' => 'N',
            ),
            'YANDEX_MARKET_COUNT_REVIEWS' => array(
                'TITLE' => GetMessage('YANDEX_MARKET_COUNT_REVIEWS_TITLE'),
                'TYPE' => 'text',
                'DEFAULT' => '10',
                'THEME' => 'N',
            ),
            'YANDEX_MARKET_COUNT_REVIEWS_HINT' => array(
                'TITLE' => GetMessage('YANDEX_MARKET_COUNT_REVIEWS_HINT'),
                'TYPE' => 'note',
                'THEME' => 'N',
            ),
        )
    ),
    'YANDEX_MARKET_SORT' => array(
        'TITLE' => GetMessage('YANDEX_MARKET_SORT_TITLE'),
        'THEME' => 'N',
        'OPTIONS' => array(
            'YANDEX_MARKET_SORT_REVIEWS' => array(
                'TITLE' => GetMessage('YANDEX_MARKET_SORT_REVIEWS_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'GRADE' => GetMessage("YMSORT_TYPE_GRADE"),
                    'DATE' => GetMessage("YMSORT_TYPE_DATE"),
                    'RANK' => GetMessage("YMSORT_TYPE_RANK"),
                ),
                'DEFAULT' => 'DATE',
                'THEME' => 'N',
            ),
            'YANDEX_MARKET_SORT_DIRECTION_REVIEWS' => array(
                'TITLE' => GetMessage('YANDEX_MARKET_SORT_DIRECTION_REVIEWS_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    'ASC' => GetMessage("YMSORT_DIR_ASC"),
                    'DESC' => GetMessage("YMSORT_DIR_DESC"),
                ),
                'DEFAULT' => 'DESC',
                'THEME' => 'N',
            ),
        )
    ),
    'YANDEX_MARKET_GRADE' => array(
        'TITLE' => GetMessage('YANDEX_MARKET_GRADE_TITLE'),
        'THEME' => 'N',
        'OPTIONS' => array(
            'YANDEX_MARKET_GRADE_REVIEWS' => array(
                'TITLE' => GetMessage('YANDEX_MARKET_GRADE_REVIEWS_TITLE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '0' => GetMessage("YMGRADE_0"),
                    '1' => GetMessage("YMGRADE_1"),
                    '2' => GetMessage("YMGRADE_2"),
                    '3' => GetMessage("YMGRADE_3"),
                    '4' => GetMessage("YMGRADE_4"),
                    '5' => GetMessage("YMGRADE_5"),
                ),
                'DEFAULT' => '0',
                'THEME' => 'N',
            ),
        )
    ),
    'SECTION' => array(
        'TITLE' => GetMessage('SECTION_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'PAGE_CONTACTS' => array(
                'TITLE' => GetMessage('PAGE_CONTACTS'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    '1' => array(
                        'TITLE' => GetMessage('PAGE_CONTACT1'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/contact1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    '2' => array(
                        'TITLE' => GetMessage('PAGE_CONTACT2'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/contact2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    '3' => array(
                        'TITLE' => GetMessage('PAGE_CONTACT3'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/contact3.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    '4' => array(
                        'TITLE' => GetMessage('PAGE_CONTACT4'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/contact4.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    '5' => array(
                        'TITLE' => GetMessage('PAGE_CONTACT5'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/contact5.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'URL' => 'contacts/'
                ),
            ),
            'CONTACTS_EDIT_LINK_NOTE' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_EDIT_LINK_NOTE'),
                'TYPE' => 'note',
                'THEME' => 'N',
            ),
            'CONTACTS_ADDRESS' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_ADDRESS_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/contacts-site-address.php',
                'THEME' => 'N',
            ),
            'CONTACTS_PHONE' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_PHONE_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/contacts-site-phone.php',
                'THEME' => 'N',
            ),
            'CONTACTS_REGIONAL_PHONE' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_REGIONAL_PHONE_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/contacts-site-phone-one.php',
                'THEME' => 'N',
            ),
            'CONTACTS_EMAIL' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_EMAIL_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/contacts-site-email.php',
                'THEME' => 'N',
            ),
            'CONTACTS_SCHEDULE12' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_SCHEDULE12_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/contacts-site-schedule.php',
                'THEME' => 'N',
            ),
            'CONTACTS_DESCRIPTION12' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_DESCRIPTION12_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/contacts-about.php',
                'THEME' => 'N',
            ),
            'CONTACTS_REGIONAL_DESCRIPTION34' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_REGIONAL_DESCRIPTION34_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/contacts-regions-title.php',
                'THEME' => 'N',
            ),
            'CONTACTS_REGIONAL_DESCRIPTION5' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_REGIONAL_DESCRIPTION5_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/contacts-regions.php',
                'THEME' => 'N',
            ),
            'CONTACTS_USE_FEEDBACK' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_USE_FEEDBACK_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'CONTACTS_USE_MAP' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_USE_MAP_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'N',
            ),
            'CONTACTS_MAP' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_MAP_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/contacts-site-map.php',
                'THEME' => 'N',
            ),
            'CONTACTS_MAP_NOTE' => array(
                'TITLE' => GetMessage('CONTACTS_OPTIONS_MAP_NOTE'),
                'TYPE' => 'note',
                'ALIGN' => 'center',
                'THEME' => 'N',
            ),
            'BLOG_PAGE' => array(
                'TITLE' => GetMessage('BLOG_PAGE_TITLE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'list_elements_2' => array(
                        'TITLE' => GetMessage('PAGE_BLOCK'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/blog2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_1' => array(
                        'TITLE' => GetMessage('PAGE_LIST'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/blog1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'list_elements_2',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'URL' => 'blog/'
                ),
            ),
            'PROJECTS_PAGE' => array(
                'TITLE' => GetMessage('PROJECTS_PAGE_TITLE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'list_elements_4' => array(
                        'TITLE' => GetMessage('PAGE_LIST'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/projects1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_2' => array(
                        'TITLE' => GetMessage('PAGE_BLOCK_SECTION'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/projects2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_1' => array(
                        'TITLE' => GetMessage('PAGE_BLOCK'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/projects2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_3' => array(
                        'TITLE' => GetMessage('PAGE_BLOCK_YEAR'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/projects2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'list_elements_2',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'URL' => 'projects/'
                ),
            ),
            'NEWS_PAGE' => array(
                'TITLE' => GetMessage('NEWS_PAGE_TITLE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'list_elements_1' => array(
                        'TITLE' => GetMessage('PAGE_LIST'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/news1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_2' => array(
                        'TITLE' => GetMessage('PAGE_TILE'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/news2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_3' => array(
                        'TITLE' => GetMessage('PAGE_BLOCK'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/blog_news.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'list_elements_2',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'URL' => 'company/news/'
                ),
            ),
            'STAFF_PAGE' => array(
                'TITLE' => GetMessage('STAFF_PAGE_TITLE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'list_elements_1' => array(
                        'TITLE' => GetMessage('PAGE_BLOCK'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/company_employees1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_2' => array(
                        'TITLE' => GetMessage('PAGE_LIST'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/company_employees2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'list_elements_1',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'URL' => 'company/staff/'
                ),
            ),
            'PARTNERS_PAGE' => array(
                'TITLE' => GetMessage('PARTNERS_PAGE_TITLE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'list_elements_1' => array(
                        'TITLE' => GetMessage('PAGE_BLOCK'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/company_partners1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_2' => array(
                        'TITLE' => GetMessage('PAGE_LIST'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/company_partners2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_3' => array(
                        'TITLE' => GetMessage('PAGE_LOGO'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/company_partners3.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'list_elements_3',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'URL' => 'info/brands/'
                ),
            ),
            'PARTNERS_PAGE_DETAIL' => array(
                'TITLE' => GetMessage('PARTNER_PAGE_DETAIL_TITLE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'element_1' => array(
                        'TITLE' => GetMessage('PAGE_GOOOS'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/linked1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'element_2' => array(
                        'TITLE' => GetMessage('PAGE_SECTIONS'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/linked2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'element_3' => array(
                        'TITLE' => GetMessage('PAGE_SECTIONS_GOODS'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/linked3.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'element_4' => array(
                        'TITLE' => GetMessage('PAGE_SECTIONS_FILTER'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/linked4.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'element_1',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'URL' => 'info/brands/panasonic/'
                ),
            ),
            'VACANCY_PAGE' => array(
                'TITLE' => GetMessage('VACANCY_PAGE_TITLE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'list_elements_1' => array(
                        'TITLE' => GetMessage('PAGE_ACCORDION'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/company_vacancy1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_2' => array(
                        'TITLE' => GetMessage('PAGE_LIST'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/company_vacancy2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'list_elements_1',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'URL' => 'company/vacancy/'
                ),
            ),
            'LICENSES_PAGE' => array(
                'TITLE' => GetMessage('LICENSES_PAGE_TITLE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    'list_elements_1' => array(
                        'TITLE' => GetMessage('PAGE_BLOCK'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/company_licenses1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    'list_elements_2' => array(
                        'TITLE' => GetMessage('PAGE_LIST'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/company_licenses2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => 'list_elements_2',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'URL' => 'company/licenses/'
                ),
            ),
        )
    ),
    'FOOTER' => array(
        'TITLE' => GetMessage('FOOTER_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'FOOTER_TYPE' => array(
                'TITLE' => GetMessage('FOOTER_TYPE'),
                'TYPE' => 'selectbox',
                'LIST' => array(
                    '1' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/footer_01.png',
                        'TITLE' => '1',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '2' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/footer_02.png',
                        'TITLE' => '2',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '3' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/footer_03.png',
                        'TITLE' => '3',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '4' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/footer_05.png',
                        'TITLE' => '4',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '5' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/footer_06.png',
                        'TITLE' => '5',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '6' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/footer_07.png',
                        'TITLE' => '6',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    '7' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/footer_08.png',
                        'TITLE' => '7',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                    ),
                    'custom' => array(
                        'TITLE' => 'Custom',
                        'POSITION_BLOCK' => 'block',
                        'HIDE' => 'Y'
                    ),
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
                'PREVIEW' => array(
                    'SCROLL_BLOCK' => '#footer'
                ),
            ),
        )
    ),
    'ADV' => array(
        'TITLE' => GetMessage('ADV_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'ADV_TOP_HEADER' => array(
                'TITLE' => GetMessage('ADV_TOP_HEADER_TITLE'),
                'IMG' => '/bitrix/images/'.$solution.'/themes/banner_position1.png',
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'Y',
                'GROUP' => 'ADV_GROUP_TITLE',
                'ROW_CLASS' => 'col-md-6',
                'POSITION_BLOCK' => 'block',
                'IS_ROW' => 'Y',
                'SMALL_TOGGLE' => 'Y',
            ),
            'ADV_TOP_UNDERHEADER' => array(
                'TITLE' => GetMessage('ADV_TOP_UNDERHEADER_TITLE'),
                'IMG' => '/bitrix/images/'.$solution.'/themes/banner_position2.png',
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'Y',
                'GROUP' => 'ADV_GROUP_TITLE',
                'ROW_CLASS' => 'col-md-6',
                'POSITION_BLOCK' => 'block',
                'IS_ROW' => 'Y',
                'SMALL_TOGGLE' => 'Y',
            ),
            'ADV_SIDE' => array(
                'TITLE' => GetMessage('ADV_SIDE_TITLE'),
                'IMG' => '/bitrix/images/'.$solution.'/themes/banner_position5.png',
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
                'GROUP' => 'ADV_GROUP_TITLE',
                'ROW_CLASS' => 'col-md-6',
                'POSITION_BLOCK' => 'block',
                'IS_ROW' => 'Y',
                'SMALL_TOGGLE' => 'Y',
            ),
            'ADV_CONTENT_TOP' => array(
                'TITLE' => GetMessage('ADV_CONTENT_TOP_TITLE'),
                'IMG' => '/bitrix/images/'.$solution.'/themes/banner_position3.png',
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'Y',
                'GROUP' => 'ADV_GROUP_TITLE',
                'ROW_CLASS' => 'col-md-6',
                'POSITION_BLOCK' => 'block',
                'IS_ROW' => 'Y',
                'SMALL_TOGGLE' => 'Y',
            ),
            'ADV_CONTENT_BOTTOM' => array(
                'TITLE' => GetMessage('ADV_CONTENT_BOTTOM_TITLE'),
                'IMG' => '/bitrix/images/'.$solution.'/themes/banner_position4.png',
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'Y',
                'GROUP' => 'ADV_GROUP_TITLE',
                'ROW_CLASS' => 'col-md-6',
                'POSITION_BLOCK' => 'block',
                'IS_ROW' => 'Y',
                'SMALL_TOGGLE' => 'Y',
            ),
            'ADV_FOOTER' => array(
                'TITLE' => GetMessage('ADV_FOOTER_TITLE'),
                'IMG' => '/bitrix/images/'.$solution.'/themes/banner_position6.png',
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'Y',
                'GROUP' => 'ADV_GROUP_TITLE',
                'ROW_CLASS' => 'col-md-6',
                'POSITION_BLOCK' => 'block',
                'IS_ROW' => 'Y',
                'SMALL_TOGGLE' => 'Y',
            )
        ),
    ),
    'MOBILE' => array(
        'TITLE' => GetMessage('MOBILE_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'HEADER_MOBILE_FIXED' => array(
                'TITLE' => GetMessage('HEADER_MOBILE_FIXED_TITLE'),
                'TYPE' => 'checkbox',
                'DEPENDENT_PARAMS' => array(
                    'HEADER_MOBILE_SHOW' => array(
                        'TITLE' => GetMessage('HEADER_MOBILE_SHOW_TITLE'),
                        'HIDE_TITLE' => 'Y',
                        'TYPE' => 'selectbox',
                        'LIST' => array(
                            'ALWAYS' => GetMessage('HEADER_MOBILE_SHOW_ALWAYS'),
                            'SCROLL_TOP' => GetMessage('HEADER_MOBILE_SHOW_SCROLL_TOP'),
                        ),
                        'DEFAULT' => 'ALWAYS',
                        'THEME' => 'Y',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                ),
                'DEFAULT' => 'N',
                'THEME' => 'Y',
            ),
            'HEADER_MOBILE' => array(
                'TITLE' => GetMessage('HEADER_MOBILE'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'N',
                'LIST' => array(
                    '1' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header_mobile_white.png',
                        'TITLE' => GetMessage('HEADER_MOBILE_WHITE'),
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                        'TITLE_WIDTH' => '75px',
                    ),
                    '2' => array(
                        'IMG' => '/bitrix/images/'.$solution.'/themes/header_mobile_color.png',
                        'TITLE' => GetMessage('HEADER_MOBILE_COLOR'),
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                        'TITLE_WIDTH' => '75px',
                    ),
                    'custom' => array(
                        'TITLE' => 'Custom',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                        'POSITION_TITLE' => 'left',
                        'TITLE_WIDTH' => '75px',
                        'HIDE' => 'Y'
                    ),
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
            ),
            'HEADER_MOBILE_MENU' => array(
                'TITLE' => GetMessage('HEADER_MOBILE_MENU'),
                'TYPE' => 'selectbox',
                // 'IS_ROW' => 'Y',
                'LIST' => array(
                    '1' => array(
                        'TITLE' => GetMessage('HEADER_MOBILE_MENU_FULL'),
                    ),
                    '2' => array(
                        'TITLE' => GetMessage('HEADER_MOBILE_MENU_TOP'),
                    ),
                    'custom' => array(
                        'TITLE' => 'Custom',
                        'HIDE' => 'Y',
                    ),
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
            ),
            'HEADER_MOBILE_MENU_OPEN' => array(
                'TITLE' => GetMessage('HEADER_MOBILE_MENU_OPEN'),
                'TYPE' => 'selectbox',
                'IS_ROW' => 'Y',
                'LIST' => array(
                    '1' => array(
                        'TITLE' => GetMessage('HEADER_MOBILE_MENU_OPEN_LEFT'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/mobile_menu1.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                    '2' => array(
                        'TITLE' => GetMessage('HEADER_MOBILE_MENU_OPEN_TOP'),
                        'IMG' => '/bitrix/images/'.$solution.'/themes/mobile_menu2.png',
                        'ROW_CLASS' => 'col-md-4',
                        'POSITION_BLOCK' => 'block',
                    ),
                ),
                'DEFAULT' => '1',
                'THEME' => 'Y',
            ),
        )
    ),
    'LK' => array(
        'TITLE' => GetMessage('LK_OPTIONS'),
        'THEME' => 'Y',
        'OPTIONS' => array(
            'PERSONAL_ONEFIO' => array(
                'TITLE' => GetMessage('PERSONAL_ONEFIO_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
                'ONE_ROW' => 'Y',
            ),
            'LOGIN_EQUAL_EMAIL' => array(
                'TITLE' => GetMessage('LOGIN_EQUAL_EMAIL_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'Y',
                'THEME' => 'Y',
                'ONE_ROW' => 'Y',
            ),
        )
    ),
    'COUNTERS_GOALS' => array(
        'TITLE' => GetMessage('COUNTERS_GOALS_OPTIONS'),
        'THEME' => 'N',
        'OPTIONS' => array(
            'ALL_COUNTERS' => array(
                'TITLE' => GetMessage('ALL_COUNTERS_TITLE'),
                'TYPE' => 'includefile',
                'INCLUDEFILE' => '#SITE_DIR#include/invis-counter.php',
            ),
            'YA_GOALS' => array(
                'TITLE' => GetMessage('YA_GOLAS_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'DEPENDENT_PARAMS' => array(
                    'YA_COUNTER_ID' => array(
                        'TITLE' => GetMessage('YA_COUNTER_ID_TITLE'),
                        'TYPE' => 'text',
                        'DEFAULT' => '',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'USE_FORMS_GOALS' => array(
                        'TITLE' => GetMessage('USE_FORMS_GOALS_TITLE'),
                        'TYPE' => 'selectbox',
                        'LIST' => array(
                            'NONE' => GetMessage('USE_FORMS_GOALS_NONE'),
                            'COMMON' => GetMessage('USE_FORMS_GOALS_COMMON'),
                            'SINGLE' => GetMessage('USE_FORMS_GOALS_SINGLE'),
                        ),
                        'DEFAULT' => 'COMMON',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'USE_BASKET_GOALS' => array(
                        'TITLE' => GetMessage('USE_SALE_GOALS_TITLE'),
                        'TYPE' => 'checkbox',
                        'DEFAULT' => 'Y',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'USE_1CLICK_GOALS' => array(
                        'TITLE' => GetMessage('USE_1CLICK_GOALS_TITLE'),
                        'TYPE' => 'checkbox',
                        'DEFAULT' => 'Y',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'USE_FASTORDER_GOALS' => array(
                        'TITLE' => GetMessage('USE_FASTORDER_GOALS_TITLE'),
                        'TYPE' => 'checkbox',
                        'DEFAULT' => 'Y',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'USE_FULLORDER_GOALS' => array(
                        'TITLE' => GetMessage('USE_FULLORDER_GOALS_TITLE'),
                        'TYPE' => 'checkbox',
                        'DEFAULT' => 'Y',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'USE_DEBUG_GOALS' => array(
                        'TITLE' => GetMessage('USE_DEBUG_GOALS_TITLE'),
                        'TYPE' => 'checkbox',
                        'DEFAULT' => 'N',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'GOALS_NOTE' => array(
                        'NOTE' => GetMessage('GOALS_NOTE_TITLE'),
                        'TYPE' => 'note',
                        'THEME' => 'N',
                        // 'CONDITIONAL_VALUE' => 'Y',
                    ),
                )
            ),
            'YANDEX_ECOMERCE' => array(
                'TITLE' => GetMessage('YANDEX_ECOMERCE_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'N',
            ),
            'GOOGLE_ECOMERCE' => array(
                'TITLE' => GetMessage('GOOGLE_ECOMERCE_TITLE'),
                'TYPE' => 'checkbox',
                'DEFAULT' => 'N',
                'THEME' => 'N',
                'DEPENDENT_PARAMS' => array(
                    'BASKET_ADD_EVENT' => array(
                        'TITLE' => GetMessage('BASKET_ADD_EVENT_TITLE'),
                        'TYPE' => 'text',
                        'DEFAULT' => 'addToCart',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'BASKET_REMOVE_EVENT' => array(
                        'TITLE' => GetMessage('BASKET_REMOVE_EVENT_TITLE'),
                        'TYPE' => 'text',
                        'DEFAULT' => 'removeFromCart',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'CHECKOUT_ORDER_EVENT' => array(
                        'TITLE' => GetMessage('CHECKOUT_ORDER_EVENT_TITLE'),
                        'TYPE' => 'text',
                        'DEFAULT' => 'checkout',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                    'PURCHASE_ORDER_EVENT' => array(
                        'TITLE' => GetMessage('PURCHASE_ORDER_EVENT_TITLE'),
                        'TYPE' => 'text',
                        'DEFAULT' => 'gtm.dom',
                        'THEME' => 'N',
                        'CONDITIONAL_VALUE' => 'Y',
                    ),
                )
            ),
        )
    ),*/
);

$moduleClass = "M1Shop";
$moduleID = "profitkit.m1";
$arHideProps = array("YANDEX_MARKET_MAIN","YANDEX_MARKET_SORT","YANDEX_MARKET_GRADE");
//\Bitrix\Main\Loader::includeModule($moduleID);

use \Bitrix\Main\Config\Option;

//$RIGHT = $APPLICATION->GetGroupRight($moduleID);
if($RIGHT >= "R" or true){
	$GLOBALS['APPLICATION']->SetAdditionalCss("/bitrix/css/".$moduleID."/style.css");

	$by = "id";
	$sort = "asc";

	$arSites = array();
	$db_res = CSite::GetList($by, $sort, array("ACTIVE"=>"Y"));
	while($res = $db_res->Fetch()){
		$arSites[] = $res;
	}

	$arTabs = array();
	foreach($arSites as $key => $arSite){
		$arBackParametrs = GetBackParametrsValues($arSite["ID"], $arParametrsList, false);
		$arTabs[] = array(
			"DIV" => "edit".($key+1),
			"TAB" => GetMessage("MAIN_OPTIONS_SITE_TITLE", array("#SITE_NAME#" => $arSite["NAME"], "#SITE_ID#" => $arSite["ID"])),
			"ICON" => "settings",
			// "TITLE" => GetMessage("MAIN_OPTIONS_TITLE"),
			"PAGE_TYPE" => "site_settings",
			"SITE_ID" => $arSite["ID"],
			"SITE_DIR" => $arSite["DIR"],
			"TEMPLATE" => '',//CNext::GetSiteTemplate($arSite["ID"]),
			"OPTIONS" => $arBackParametrs,
		);
	}

	$tabControl = new CAdminTabControl("tabControl", $arTabs);

	if($REQUEST_METHOD == "POST" /*&& strlen($Update.$Apply.$RestoreDefaults) > 0 && $RIGHT >= "W"*/ && check_bitrix_sessid()){
		global $APPLICATION, $CACHE_MANAGER;

		if(strlen($RestoreDefaults) > 0){
			Option::delete($moduleID);
			Option::delete($moduleID, array("name" => "NeedGenerateCustomTheme"));
			Option::delete($moduleID, array("name" => "NeedGenerateCustomThemeBG"));
			$APPLICATION->DelGroupRight($moduleID);
		}
		else{
			Option::delete($moduleID, array("name" => "sid"));
			unset($_SESSION['THEME']);

			foreach($arTabs as $key => $arTab){
				$optionsSiteID = $arTab["SITE_ID"];
				foreach($arParametrsList as $blockCode => $arBlock){
					if(in_array($blockCode,$arHideProps)) continue;
					foreach($arBlock["OPTIONS"] as $optionCode => $arOption){
						if($arOption['TYPE'] === 'array'){
							$arOptionsRequiredKeys = array();
							$arOptionsKeys = array_keys($arOption['OPTIONS']);
							$itemsKeysCount = Option::get($moduleID, $optionCode, '0', $optionsSiteID);
							$fullKeysCount = 0;

							if($arOption['OPTIONS'] && is_array($arOption['OPTIONS']))
							{
								foreach($arOption['OPTIONS'] as $_optionCode => $_arOption){
									if(strlen($_arOption['REQUIRED']) && $_arOption['REQUIRED'] === 'Y')
										$arOptionsRequiredKeys[] = $_optionCode;

								}
								for($itemKey = 0, $cnt = $itemsKeysCount + 50; $itemKey <= $cnt; ++$itemKey){
									$bFull = true;
									if($arOptionsRequiredKeys){
										foreach($arOptionsRequiredKeys as $_optionCode){
											if(!strlen($_REQUEST[$optionCode.'_array_'.$_optionCode.'_'.$itemKey.'_'.$optionsSiteID]))
											{
												$bFull = false;
												break;
											}
										}
									}
									if($bFull){
										foreach($arOptionsKeys as $_optionCode){
											$newOptionValue = $_REQUEST[$optionCode.'_array_'.$_optionCode.'_'.$itemKey.'_'.$optionsSiteID];
											Option::set($moduleID, $optionCode.'_array_'.$_optionCode.'_'.$fullKeysCount, $newOptionValue, $optionsSiteID);
											unset($_REQUEST[$optionCode.'_array_'.$_optionCode.'_'.$itemKey.'_'.$optionsSiteID]);
											unset($_FILES[$optionCode.'_array_'.$_optionCode.'_'.$itemKey.'_'.$optionsSiteID]);
										}

										++$fullKeysCount;
									}
								}
							}

							Option::set($moduleID, $optionCode, $fullKeysCount, $optionsSiteID);
						}
						else{
							$newVal = $_REQUEST[$optionCode."_".$optionsSiteID];

							if($arOption["TYPE"] == "checkbox"){
								if(!strlen($newVal) || $newVal != "Y")
									$newVal = "N";

							}elseif($arOption["TYPE"] == "selectbox" && (isset($arOption["SUB_PARAMS"]) && $arOption["SUB_PARAMS"])){
								if(isset($arOption["LIST"]) && $arOption["LIST"]){
									$arSubValues = array();
									foreach($arOption["LIST"] as $key2 => $value) {
										if($arOption["SUB_PARAMS"][$key2] && $key2 == $newVal){
											foreach($arOption["SUB_PARAMS"][$key2] as $key3 => $arSubValue){
												if($_REQUEST[$key2."_".$key3."_".$optionsSiteID])
												{
													$arSubValues[$key3] = $_REQUEST[$key2."_".$key3."_".$optionsSiteID];
													unset($arTab["OPTIONS"][$key2."_".$key3]);
												}
												elseif($arTab["OPTIONS"][$key2."_".$key3])
												{
													if($arSubValue["TYPE"] == "checkbox" && $key2 == $newVal && !isset($arSubValue["VISIBLE"]))
														$arSubValues[$key3] = "N";

													unset($arTab["OPTIONS"][$key2."_".$key3]);
												}

											}
										}
									}
									if($arSubValues)
									{
										Option::set($moduleID, "NESTED_OPTIONS_".$optionCode."_".$newVal, serialize($arSubValues), $optionsSiteID);
									}
								}
							}elseif($arOption["TYPE"] == "multiselectbox"){
								$newVal = @implode(",", $newVal);
							}


							$arTab["OPTIONS"][$optionCode] = $newVal;

							Option::set($moduleID, $optionCode, $newVal, $optionsSiteID);
						}
					}
				}

				/*CBitrixComponent::clearComponentCache('bitrix:catalog.element', $optionsSiteID);
				CBitrixComponent::clearComponentCache('bitrix:form.result.new', $optionsSiteID);
				CBitrixComponent::clearComponentCache('bitrix:catalog.section', $optionsSiteID);
				CBitrixComponent::clearComponentCache('bitrix:catalog.bigdata.products', $optionsSiteID);
				CBitrixComponent::clearComponentCache('bitrix:catalog.store.amount', $optionsSiteID);
				CBitrixComponent::clearComponentCache('bitrix:menu', $optionsSiteID);*/
				$arTabs[$key] = $arTab;
			}
		}

		// clear composite cache
		/*if($compositeMode = $moduleClass::IsCompositeEnabled()){
			$obCache = new CPHPCache();
			$obCache->CleanDir('', 'html_pages');
			$moduleClass::EnableComposite($compositeMode === 'AUTO_COMPOSITE');
		}*/

		$APPLICATION->RestartBuffer();
	}

	CJSCore::Init(array("jquery"));
	CAjax::Init();
	?>
	<?if(!count($arTabs)):?>
		<div class="adm-info-message-wrap adm-info-message-red">
			<div class="adm-info-message">
				<div class="adm-info-message-title"><?=GetMessage("ASPRO_NEXT_NO_SITE_INSTALLED", array("#SESSION_ID#"=>bitrix_sessid_get()))?></div>
				<div class="adm-info-message-icon"></div>
			</div>
		</div>
	<?else:?>
		<?$tabControl->Begin();?>

		<form method="post" class="next_options" enctype="multipart/form-data" action="<?=$APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?=LANGUAGE_ID?>">
		<?=bitrix_sessid_post();?>
		<?
		foreach($arTabs as $key => $arTab){
			$tabControl->BeginNextTab();
			if($arTab["SITE_ID"]){
				$optionsSiteID = $arTab["SITE_ID"];
				//foreach($moduleClass::$arParametrsList as $blockCode => $arBlock)
                foreach($arParametrsList as $blockCode => $arBlock)
				{?>
					<?if(in_array($blockCode,$arHideProps)) continue;?>
					<tr class="heading"><td colspan="2"><?=$arBlock["TITLE"]?></td></tr>
					<?
					foreach($arBlock["OPTIONS"] as $optionCode => $arOption)
					{
						if(true or array_key_exists($optionCode, $arTab["OPTIONS"]))
						{
							$arControllerOption = CControllerClient::GetInstalledOptions($module_id);

							if($arOption['TYPE'] === 'array'){
								$itemsKeysCount = Option::get($moduleID, $optionCode, 0, $optionsSiteID);
								if($arOption['OPTIONS'] && is_array($arOption['OPTIONS'])){
									$arOptionsKeys = array_keys($arOption['OPTIONS']);
									?>
									<tr>
										<td style="text-align:center;" colspan="2"><?=$arOption["TITLE"]?></td>
									</tr>
									<tr>
										<td colspan="2">
											<table class="aspro-admin-item-table">
												<tr style="text-align:center;">
													<?
													for($itemKey = 0, $cnt = $itemsKeysCount; $itemKey <= $cnt; ++$itemKey){
														$_arParameters = array();
														foreach($arOptionsKeys as $_optionKey){
															$_arParameters[$optionCode.'_array_'.$_optionKey.'_'.($itemKey != $cnt ? $itemKey : 'new')] = $arOption['OPTIONS'][$_optionKey];
															if(!$itemKey){
																?><th colspan="2"><?=$arOption['OPTIONS'][$_optionKey]['TITLE']?></th><?
															}
														}
														?>
												</tr>
												<tr class="aspro-admin-item<?=(!$itemKey ? ' first' : '')?><?=($itemKey == $itemsKeysCount - 1 ? ' last' : '')?><?=($itemKey == $cnt ? ' new' : '')?>" data-itemkey="<?=$itemKey?>" style="text-align:center;"><?
														foreach($_arParameters as $_optionCode => $_arOption){
															ShowAdminRow($_optionCode, $_arOption, $arTab, $arControllerOption);
														}
														?><td class="rowcontrol"><span class="up"></span><span class="down"></span><span class="remove"></span></td></tr><?
													}
													?>
												<tr style="text-align:center;">
													<td><a href="javascript:;" class="adm-btn adm-btn-save adm-btn-add" title="<?=GetMessage('PRIME_OPTIONS_ADD_BUTTON_TITLE')?>"><?=GetMessage('OPTIONS_ADD_BUTTON_TITLE')?></a></td>
												</tr>
											</table>
										</td>
									</tr><?
								}
							}
							else{

									$optionName = $arOption["TITLE"];
									$optionType = $arOption["TYPE"];
									$optionList = $arOption["LIST"];
									$optionDefault = $arOption["DEFAULT"];
									$optionVal = $arTab["OPTIONS"][$optionCode];
									$optionSize = $arOption["SIZE"];
									$optionCols = $arOption["COLS"];
									$optionRows = $arOption["ROWS"];
									$optionChecked = $optionVal == "Y" ? "checked" : "";
									$optionDisabled = isset($arControllerOption[$optionCode]) || array_key_exists("DISABLED", $arOption) && $arOption["DISABLED"] == "Y" ? "disabled" : "";
									$optionSup_text = array_key_exists("SUP", $arOption) ? $arOption["SUP"] : "";
									$optionController = isset($arControllerOption[$optionCode]) ? "title='".GetMessage("MAIN_ADMIN_SET_CONTROLLER_ALT")."'" : "";
									$style = "";
									if(($optionCode == 'BGCOLOR_THEME' || $optionCode == 'CUSTOM_BGCOLOR_THEME') && $arTab["OPTIONS"]['SHOW_BG_BLOCK'] != 'Y')
									{
										$style = "style=display:none;";
									}
									?>
									<tr data-optioncode="<?=$optionCode;?>" <?=$style;?>>
										<?=ShowAdminRow($optionCode, $arOption, $arTab, $arControllerOption);?>
									</tr>
									<?if(isset($arOption['SUB_PARAMS']) && $arOption['SUB_PARAMS'] && (isset($arOption['LIST']) && $arOption['LIST'])): //nested params?>
										<?foreach($arOption['LIST'] as $key => $value):?>
											<?foreach((array)$arOption['SUB_PARAMS'][$key] as $key2 => $arValue)
											{
												if(isset($arValue['VISIBLE']) && $arValue['VISIBLE'] == 'N')
													unset($arOption['SUB_PARAMS'][$key][$key2]);
											}
											if($arOption['SUB_PARAMS'][$key]):?>
												<tr data-parent='<?=$optionCode."_".$arTab["SITE_ID"]?>' class="block <?=$key?>" <?=($key == $arTab["OPTIONS"][$optionCode] ? "style='display:table-row'" : "style='display:none'");?>>
													<?if($arOption['SUB_PARAMS'][$key]):?><td style="text-align:center;" colspan="2"><?=GetMessage('SUB_PARAMS');?></td><?endif;?>
												</tr>
												<?foreach((array)$arOption['SUB_PARAMS'][$key] as $key2 => $arValue):
													if($arValue['VISIBLE'] != 'N'):?>
														<tr data-parent='<?=$optionCode."_".$arTab["SITE_ID"]?>' class="block <?=$key?>" <?=($key == $arTab["OPTIONS"][$optionCode] ? "style='display:table-row'" : "style='display:none'");?>><?=ShowAdminRow($key.'_'.$key2, $arValue, $arTab, $arControllerOption);?></tr>
													<?endif;?>
												<?endforeach;?>
											<?endif;?>
										<?endforeach;?>
									<?endif;?>
									<?if(isset($arOption['DEPENDENT_PARAMS']) && $arOption['DEPENDENT_PARAMS']): //dependent params?>
										<?foreach($arOption['DEPENDENT_PARAMS'] as $key => $arValue):?>
											<?if(!isset($arValue['CONDITIONAL_VALUE']) || ($arValue['CONDITIONAL_VALUE'] && $arTab["OPTIONS"][$optionCode] == $arValue['CONDITIONAL_VALUE']))
												$style = "style='display:table-row'";
											else
												$style = "style='display:none'";
											?>
											<tr data-optioncode="<?=$key;?>" class="depend-block <?=$key?>" <?=((isset($arValue['CONDITIONAL_VALUE']) && $arValue['CONDITIONAL_VALUE']) ? "data-show='".$arValue['CONDITIONAL_VALUE']."'" : "");?> data-parent='<?=$optionCode."_".$arTab["SITE_ID"]?>' <?=$style;?>><?=ShowAdminRow($key, $arValue, $arTab, $arControllerOption);?></tr>
										<?endforeach;?>
									<?endif;?>
									<?

							}
						}
					}
				}
			}
		}
		?>
		<?
		if($REQUEST_METHOD == "POST" && strlen($Update.$Apply.$RestoreDefaults) && check_bitrix_sessid())
		{
			if(strlen($Update) && strlen($_REQUEST["back_url_settings"]))
				LocalRedirect($_REQUEST["back_url_settings"]);
			else
				LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());
		}?>
			<?$tabControl->Buttons();?>
			<input <?if($RIGHT < "W" and false) echo "disabled"?> type="submit" name="Apply" class="submit-btn" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>">
			<?if(strlen($_REQUEST["back_url_settings"]) > 0): ?>
				<input type="button" name="Cancel" value="<?=GetMessage("MAIN_OPT_CANCEL")?>" title="<?=GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?=htmlspecialcharsbx(CUtil::addslashes($_REQUEST["back_url_settings"]))?>'">
				<input type="hidden" name="back_url_settings" value="<?=htmlspecialcharsbx($_REQUEST["back_url_settings"])?>">
			<?endif;?>
			<?/*if(CNext::IsCompositeEnabled()):?>
				<div class="adm-info-message"><?=GetMessage("WILL_CLEAR_HTML_CACHE_NOTE")?></div><div style="clear:both;"></div>
			<?endif;*/?>
			<script type="text/javascript">
				var arOrderPropertiesByPerson = <?=CUtil::PhpToJSObject($arOrderPropertiesByPerson, false)?>;
				$(document).ready(function() {
					$('input[name^="THEME_SWITCHER"]').change(function() {
						var ischecked = $(this).attr('checked');
						if(typeof(ischecked) != 'undefined'){
							if(!confirm("<?=GetMessage("NO_COMPOSITE_NOTE")?>")){
								$(this).removeAttr('checked');
							}
						}
					});

					$('select[name^="SCROLLTOTOP_TYPE"]').change(function() {
						var posSelect = $(this).parents('table').first().find('select[name^="SCROLLTOTOP_POSITION"]');
						if(posSelect){
							var posSelectTr = posSelect.parents('tr').first();
							var isNone = $(this).val().indexOf('NONE') != -1;
							if(isNone){
								if(posSelectTr.is(':visible')){
									posSelectTr.hide();
								}
							}
							else{
								if(!posSelectTr.is(':visible')){
									posSelectTr.show();
								}
								var isRound = $(this).val().indexOf('ROUND') != -1;
								var isTouch = posSelect.val().indexOf('TOUCH') != -1;
								if(isRound && !!posSelect){
									posSelect.find('option[value^="TOUCH"]').attr('disabled', 'disabled');
									if(isTouch){
										posSelect.val(posSelect.find('option[value^="PADDING"]').first().attr('value'));
									}
								}
								else{
									posSelect.find('option[value^="TOUCH"]').removeAttr('disabled');
								}
							}
						}
					});

					$('select[name^="PAGE_CONTACTS"]').change(function() {
						var value = $(this).val();
						if(value == 'custom'){
							$(this).parents('table').find('[name^="CONTACTS_EDIT_LINK_NOTE"]').closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_ADDRESS"]').closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_PHONE"]').closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_REGIONAL_PHONE"]').closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_EMAIL"]').closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_SCHEDULE"]').closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_DESCRIPTION"]').closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_REGIONAL_DESCRIPTION"]').closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_USE_FEEDBACK"]').closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_USE_MAP"]').first().closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_MAP"]').first().closest('tr').hide();
							$(this).parents('table').find('[name^="CONTACTS_MAP_NOTE"]').closest('tr').hide();
						}
						else{
							$(this).parents('table').find('[name^="CONTACTS_EDIT_LINK_NOTE"]').closest('tr').show();
							$(this).parents('table').find('[name^="CONTACTS_EMAIL"]').closest('tr').show();
							$(this).parents('table').find('[name^="CONTACTS_USE_MAP"]').first().closest('tr').show();

							if($(this).val() < 3){
								$(this).parents('table').find('[name^="CONTACTS_PHONE"]').closest('tr').show();
								$(this).parents('table').find('[name^="CONTACTS_REGIONAL_PHONE"]').closest('tr').hide();
								$(this).parents('table').find('[name^="CONTACTS_SCHEDULE"]').closest('tr').show();
								$(this).parents('table').find('[name^="CONTACTS_DESCRIPTION12"]').closest('tr').show();
								$(this).parents('table').find('[name^="CONTACTS_REGIONAL_DESCRIPTION34"]').closest('tr').hide();
								$(this).parents('table').find('[name^="CONTACTS_REGIONAL_DESCRIPTION5"]').closest('tr').hide();
								$(this).parents('table').find('[name^="CONTACTS_USE_FEEDBACK"]').closest('tr').show();
								$(this).parents('table').find('[name^="CONTACTS_MAP"]').first().closest('tr').show();
								$(this).parents('table').find('[name^="CONTACTS_MAP_NOTE"]').closest('tr').show();
							}
							else{
								$(this).parents('table').find('[name^="CONTACTS_PHONE"]').closest('tr').show();
								$(this).parents('table').find('[name^="CONTACTS_REGIONAL_PHONE"]').closest('tr').hide();
								$(this).parents('table').find('[name^="CONTACTS_SCHEDULE"]').closest('tr').hide();
								if(value < 5){
									$(this).parents('table').find('[name^="CONTACTS_ADDRESS"]').closest('tr').show();
									$(this).parents('table').find('[name^="CONTACTS_DESCRIPTION12"]').closest('tr').hide();
									$(this).parents('table').find('[name^="CONTACTS_REGIONAL_DESCRIPTION34"]').closest('tr').show();
									$(this).parents('table').find('[name^="CONTACTS_REGIONAL_DESCRIPTION5"]').closest('tr').hide();
									$(this).parents('table').find('[name^="CONTACTS_USE_FEEDBACK"]').closest('tr').show();
								}
								else{
									$(this).parents('table').find('[name^="CONTACTS_ADDRESS"]').closest('tr').hide();
									$(this).parents('table').find('[name^="CONTACTS_DESCRIPTION12"]').closest('tr').hide();
									$(this).parents('table').find('[name^="CONTACTS_REGIONAL_DESCRIPTION34"]').closest('tr').hide();
									$(this).parents('table').find('[name^="CONTACTS_REGIONAL_DESCRIPTION5"]').closest('tr').show();
									$(this).parents('table').find('[name^="CONTACTS_USE_FEEDBACK"]').closest('tr').hide();
								}
								$(this).parents('table').find('[name^="CONTACTS_MAP"]').first().closest('tr').hide();
								$(this).parents('table').find('[name^="CONTACTS_MAP_NOTE"]').closest('tr').hide();
							}
						}
					});

					$('.aspro-admin-item-table .adm-btn-add').click(function() {
						var $table = $(this).closest('.aspro-admin-item-table');
						var $newItem = $table.find('.aspro-admin-item.new');
						if($newItem.length){
							var lastItemKey = $table.find('.aspro-admin-item.last').length ? $table.find('.aspro-admin-item.last').attr('data-itemkey') * 1 : -1;
							var $clone = $newItem.clone().insertBefore($newItem).removeClass('new');
							$clone.attr('data-itemkey', lastItemKey + 1);
							$clone.find('td:not(.rowcontrol)').each(function(i) {
								var name = $(this).find('*[name]:first-of-type').attr('name');
								var newName = name.replace('_new_', '_' + (lastItemKey + 1) + '_');
								$(this).find('*[name]:first-of-type').attr('name', newName);
							});
						}
						$table.find('.aspro-admin-item').removeClass('first, last');
						$table.find('.aspro-admin-item:not(.new)').first().addClass('first');
						$table.find('.aspro-admin-item:not(.new)').last().addClass('last');
					});

					$(document).on('click', '.rowcontrol>span', function() {
						var action = ($(this).hasClass('up') ? 'up' : ($(this).hasClass('down') ? 'down' : 'remove'));
						var $table = $(this).closest('.aspro-admin-item-table');
						var $item = $(this).closest('.aspro-admin-item');
						var itemKey = $item.attr('data-itemkey');

						if(action === 'up'){
							var prevItemKey = $item.prev().attr('data-itemkey');
							$item.find('td:not(.rowcontrol)').each(function(i) {
								var name = $(this).find('*[name]:first-of-type').attr('name');
								if(typeof(name) !== 'undefined'){
									var newName = name.replace('_' + itemKey + '_', '_' + prevItemKey + '_');
									$(this).find('*[name]:first-of-type').attr('name', newName);
									var name = $item.prev().find('td:not(.rowcontrol)').eq(i).find('*[name]:first-of-type').attr('name');
									var newName = name.replace('_' + prevItemKey + '_', '_' + itemKey + '_');
									$item.prev().find('td:not(.rowcontrol)').eq(i).find('*[name]:first-of-type').attr('name', newName);
								}
							});
							$item.attr('data-itemkey', prevItemKey);
							$item.prev().attr('data-itemkey', itemKey);
							$item.clone().insertBefore($item.prev());
						}
						else if(action === 'down'){
							var nextItemKey = $item.next().attr('data-itemkey');
							$item.find('td:not(.rowcontrol)').each(function(i) {
								var name = $(this).find('*[name]:first-of-type').attr('name');
								if(typeof(name) !== 'undefined'){
									var newName = name.replace('_' + itemKey + '_', '_' + nextItemKey + '_');
									$(this).find('*[name]:first-of-type').attr('name', newName);
									var name = $item.next().find('td:not(.rowcontrol)').eq(i).find('*[name]:first-of-type').attr('name');
									var newName = name.replace('_' + nextItemKey + '_', '_' + itemKey + '_');
									$item.next().find('td:not(.rowcontrol)').eq(i).find('*[name]:first-of-type').attr('name', newName);
								}
							});
							$item.attr('data-itemkey', nextItemKey);
							$item.next().attr('data-itemkey', itemKey);
							$item.clone().insertAfter($item.next());
						}
						$item.detach();
						$table.find('.aspro-admin-item').removeClass('first').removeClass('last');
						$table.find('.aspro-admin-item:not(.new)').first().addClass('first');
						$table.find('.aspro-admin-item:not(.new)').last().addClass('last');
					});

					$('select[name^="SCROLLTOTOP_TYPE"]').change();
					$('select[name^="PAGE_CONTACTS"]').change();
				});
				function CheckActive(){
					$('input[name^="USE_WORD_EXPRESSION"]').each(function() {
						var input = this;
						var isActiveUseExpressions = $(input).attr('checked') == 'checked';
						var tab = $(input).parents('.adm-detail-content-item-block');
						if(!isActiveUseExpressions){
							tab.find('input[name^="MAX_AMOUNT"]').attr('disabled', 'disabled');
							tab.find('input[name^="MIN_AMOUNT"]').attr('disabled', 'disabled');
							tab.find('input[name^="EXPRESSION_FOR_MIN"]').attr('disabled', 'disabled');
							tab.find('input[name^="EXPRESSION_FOR_MAX"]').attr('disabled', 'disabled');
							tab.find('input[name^="EXPRESSION_FOR_MID"]').attr('disabled', 'disabled');
						}
						else{
							tab.find('input[name^="MAX_AMOUNT"]').removeAttr('disabled');
							tab.find('input[name^="MIN_AMOUNT"]').removeAttr('disabled');
							tab.find('input[name^="EXPRESSION_FOR_MIN"]').removeAttr('disabled');
							tab.find('input[name^="EXPRESSION_FOR_MAX"]').removeAttr('disabled');
							tab.find('input[name^="EXPRESSION_FOR_MID"]').removeAttr('disabled');
						}
					});

					$('select[name^="BUYMISSINGGOODS"]').each(function() {
						var select = this;
						var BuyMissingGoodsVal = $(select).val();
						var tab = $(select).parents('.adm-detail-content-item-block');
						tab.find('input[name^="EXPRESSION_SUBSCRIBE_BUTTON"]').attr('disabled', 'disabled');
						tab.find('input[name^="EXPRESSION_SUBSCRIBED_BUTTON"]').attr('disabled', 'disabled');
						tab.find('input[name^="EXPRESSION_ORDER_BUTTON"]').attr('disabled', 'disabled');
						if(BuyMissingGoodsVal == 'SUBSCRIBE'){
							tab.find('input[name^="EXPRESSION_SUBSCRIBE_BUTTON"]').removeAttr('disabled');
							tab.find('input[name^="EXPRESSION_SUBSCRIBED_BUTTON"]').removeAttr('disabled');
						}
						else if(BuyMissingGoodsVal == 'ORDER'){
							tab.find('input[name^="EXPRESSION_ORDER_BUTTON"]').removeAttr('disabled');
						}
					});
				}

				function checkGoalsNote(){
					var inUAC = $('.adm-detail-content-table:visible').first().find('tr input[id^=YA_GOALS]');
					var itrYACID = $('.adm-detail-content-table:visible').first().find('tr.YA_COUNTER_ID');
					var itrGNote = $('.adm-detail-content-table:visible').first().find('tr.GOALS_NOTE');
					var itrUFG = $('.adm-detail-content-table:visible').first().find('tr.USE_FORMS_GOALS');
					var itrUBG = $('.adm-detail-content-table:visible').first().find('tr.USE_BASKET_GOALS');
					var itrU1CG = $('.adm-detail-content-table:visible').first().find('tr.USE_1CLICK_GOALS');
					var itrUQOG = $('.adm-detail-content-table:visible').first().find('tr.USE_FASTORDER_GOALS');
					var itrUFOG = $('.adm-detail-content-table:visible').first().find('tr.USE_FULLORDER_GOALS');
					var itrUDG = $('.adm-detail-content-table:visible').first().find('tr.USE_DEBUG_GOALS');

					if(inUAC.length && inUAC.attr('checked')){
						var bShowNote = 6;

						if(itrUFG.find('select').val().indexOf('NONE') == -1){
							itrGNote.find('[data-goal=form]').show();
						}
						else{
							itrGNote.find('[data-goal=form]').hide();
							--bShowNote;
						}

						if(itrUBG.find('input').attr('checked')){
							itrGNote.find('[data-goal=basket]').show();
						}
						else{
							itrGNote.find('[data-goal=basket]').hide();
							--bShowNote;
						}

						if(itrU1CG.find('input').attr('checked')){
							itrGNote.find('[data-goal=1click]').show();
						}
						else{
							itrGNote.find('[data-goal=1click]').hide();
							--bShowNote;
						}

						if(itrUQOG.find('input').attr('checked')){
							itrGNote.find('[data-goal=fastorder]').show();
						}
						else{
							itrGNote.find('[data-goal=fastorder]').hide();
							--bShowNote;
						}

						if(itrUFOG.find('input').attr('checked')){
							itrGNote.find('[data-goal=fullorder]').show();
						}
						else{
							itrGNote.find('[data-goal=fullorder]').hide();
							--bShowNote;
						}

						if(itrUDG.find('input').attr('checked')){
							itrGNote.find('[data-goal=debug]').show();
						}
						else{
							itrGNote.find('[data-goal=debug]').hide();
							--bShowNote;
						}

						if(bShowNote){
							itrGNote.fadeIn();
						}
						else{
							itrGNote.fadeOut();
						}
					}
					else{
						itrGNote.fadeOut();
					}
				}
			</script>
			<script type="text/javascript">
				$(document).ready(function() {
					CheckActive();
					$('form.next_options').submit(function(e) {
						$(this).attr('id', 'next_options');
						jsAjaxUtil.ShowLocalWaitWindow('id', 'next_options', true);
						$(this).find('input').removeAttr('disabled');
					});
					$('select[name^="INDEX_TYPE"]').change(function() {
						var value = $(this).val()
							sub_block = $('tr.block[data-parent='+$(this).attr('name')+']');
						if(sub_block.length)
						{
							sub_block.css({'display':'none'});
							$('tr.block.'+value+'[data-parent='+$(this).attr('name')+']').css({'display':'table-row'});
						}
					});
					$('input.depend-check').change(function() {
						var ischecked = $(this).prop('checked'),
							depend_block = $('.depend-block[data-parent='+$(this).attr('id')+']');
						if(depend_block.length && $(this).attr('id').indexOf('YA_GOALS') < 0)
						{
							if(typeof(depend_block.data('show')) != 'undefined')
							{
								if(depend_block.data('show') == 'Y')
								{
									if(ischecked)
										depend_block.fadeIn();
									else
										depend_block.fadeOut();
								}
								else
								{
									if(ischecked)
										depend_block.fadeOut();
									else
										depend_block.fadeIn();
								}
							}
						}
					});

				})
				$('select[name^="USE_FORMS_GOALS"]').change(function() {
					var parent = $(this).closest('tr').data('parent');
					var inUAC = $(this).parents('table').first().find('input#'+parent);
					if(inUAC.length && inUAC.attr('checked')){
						var isNone = $(this).val().indexOf('NONE') != -1;
						var isCommon = $(this).val().indexOf('COMMON') != -1;
						var itrGNote = $(this).parents('table').first().find('tr.GOALS_NOTE');
						if(!isNone){
							if(isCommon){
								itrGNote.find('[data-value=common]').show();
								itrGNote.find('[data-value=single]').hide();
							}
							else{
								itrGNote.find('[data-value=common]').hide();
								itrGNote.find('[data-value=single]').show();
							}
							itrGNote.find('[data-goal=form]').show();
						}
						else{
							itrGNote.find('[data-goal=form]').hide();
						}
					}

					checkGoalsNote();
				});
				$('input[name^="USE_BASKET_GOALS"]').change(function() {
					var parent = $(this).closest('tr').data('parent');
					var inUAC = $(this).parents('table').first().find('input#'+parent);
					if(inUAC.length && inUAC.attr('checked')){
						var itrGNote = $(this).parents('table').first().find('tr[data-optioncode=GOALS_NOTE]');
						var ischecked = $(this).attr('checked');
						if(typeof(ischecked) != 'undefined'){
							itrGNote.find('[data-goal=basket]').show();
						}
						else{
							itrGNote.find('[data-goal=basket]').hide();
						}
					}

					checkGoalsNote();
				});
				$('input[name^="USE_1CLICK_GOALS"]').change(function() {
					var parent = $(this).closest('tr').data('parent');
					var inUAC = $(this).parents('table').first().find('input#'+parent);
					if(inUAC.length && inUAC.attr('checked')){
						var itrGNote = $(this).parents('table').first().find('tr[data-optioncode=GOALS_NOTE]');
						var ischecked = $(this).attr('checked');
						if(typeof(ischecked) != 'undefined'){
							itrGNote.find('[data-goal=1click]').show();
						}
						else{
							itrGNote.find('[data-goal=1click]').hide();
						}
					}

					checkGoalsNote();
				});
				$('input[name^="USE_FASTORDER_GOALS"]').change(function() {
					var parent = $(this).closest('tr').data('parent');
					var inUAC = $(this).parents('table').first().find('input#'+parent);
					if(inUAC.length && inUAC.attr('checked')){
						var itrGNote = $(this).parents('table').first().find('tr[data-optioncode=GOALS_NOTE]');
						var ischecked = $(this).attr('checked');
						if(typeof(ischecked) != 'undefined'){
							itrGNote.find('[data-goal=fastorder]').show();
						}
						else{
							itrGNote.find('[data-goal=fastorder]').hide();
						}
					}

					checkGoalsNote();
				});
				$('input[name^="USE_FULLORDER_GOALS"]').change(function() {
					var parent = $(this).closest('tr').data('parent');
					var inUAC = $(this).parents('table').first().find('input#'+parent);
					if(inUAC.length && inUAC.attr('checked')){
						var itrGNote = $(this).parents('table').first().find('tr[data-optioncode=GOALS_NOTE]');
						var ischecked = $(this).attr('checked');
						if(typeof(ischecked) != 'undefined'){
							itrGNote.find('[data-goal=fullorder]').show();
						}
						else{
							itrGNote.find('[data-goal=fullorder]').hide();
						}
					}

					checkGoalsNote();
				});
				$('input[name^="USE_DEBUG_GOALS"]').change(function() {
					var parent = $(this).closest('tr').data('parent');
					var inUAC = $(this).parents('table').first().find('input#'+parent);
					if(inUAC.length && inUAC.attr('checked')){
						var itrGNote = $(this).parents('table').first().find('tr[data-optioncode=GOALS_NOTE]');
						var ischecked = $(this).attr('checked');
						if(typeof(ischecked) != 'undefined'){
							itrGNote.find('[data-goal=debug]').show();
						}
						else{
							itrGNote.find('[data-goal=debug]').hide();
						}
					}

					checkGoalsNote();
				});
				$('input[name^="YA_GOALS"]').change(function(){
					var itrYACID = $(this).parents('table').first().find('tr.YA_COUNTER_ID');
					var itrUFG = $(this).parents('table').first().find('tr.USE_FORMS_GOALS');
					var itrUBG = $(this).parents('table').first().find('tr.USE_BASKET_GOALS');
					var itrU1CG = $(this).parents('table').first().find('tr.USE_1CLICK_GOALS');
					var itrUQOG = $(this).parents('table').first().find('tr.USE_FASTORDER_GOALS');
					var itrUFOG = $(this).parents('table').first().find('tr.USE_FULLORDER_GOALS');
					var itrUDG = $(this).parents('table').first().find('tr.USE_DEBUG_GOALS');
					var itrGNote = $(this).parents('table').first().find('tr.GOALS_NOTE');
					var ischecked = $(this).attr('checked');
					if(typeof(ischecked) != 'undefined'){
						itrYACID.fadeIn();
						itrUFG.fadeIn();
						var valUFG = itrUFG.find('select').val();

						if(valUFG.indexOf('NONE') == -1){
							var isCommon = valUFG.indexOf('COMMON') != -1;
							if(isCommon){
								itrGNote.find('[data-value=common]').show();
								itrGNote.find('[data-value=single]').hide();
							}
							else{
								itrGNote.find('[data-value=common]').hide();
								itrGNote.find('[data-value=single]').show();
							}
						}
						itrUBG.fadeIn();
						itrU1CG.fadeIn();
						itrUQOG.fadeIn();
						itrUFOG.fadeIn();
						itrUDG.fadeIn();
					}
					else{
						itrYACID.fadeOut();
						itrUFG.fadeOut();
						itrUBG.fadeOut();
						itrU1CG.fadeOut();
						itrUQOG.fadeOut();
						itrUFOG.fadeOut();
						itrUDG.fadeOut();
						itrGNote.fadeOut();
					}
					checkGoalsNote();
				});

				$('input[name^="USE_WORD_EXPRESSION"], select[name^="BUYMISSINGGOODS"]').change(function() {
					CheckActive();
				});

				$('select[name^="SHOW_SECTION_DESCRIPTION"]').change(function(){
					if($(this).val() != 'BOTH')
						$('select[name*="SECTION_DESCRIPTION_POSITION"]').closest('tr').css('display','none');
					else
						$('select[name*="SECTION_DESCRIPTION_POSITION"]').closest('tr').css('display','');
				});

				$('select[name^="SHOW_QUANTITY_FOR_GROUPS"]').change(function() {
					var val = $(this).val();
					var tab = $(this).parents('.adm-detail-content-item-block');
					var sqcg = tab.find('select[name^="SHOW_QUANTITY_COUNT_FOR_GROUPS"]');

					var isAll = false;
					if(val){
						isAll = val.indexOf('2') !== -1;
					}

					if(!isAll){
						$(this).find('option').each(function() {
							if($(this).attr('selected') != 'selected'){
								sqcg.find('option[value="' + $(this).attr('value') + '"]').removeAttr('selected');
							}
						});
					}
				});

				$('select[name^="SHOW_QUANTITY_COUNT_FOR_GROUPS"]').change(function(e) {
					e.stopPropagation();
					var val = $(this).val();
					var tab = $(this).parents('.adm-detail-content-item-block');
					var sqg_val = tab.find('select[name^="SHOW_QUANTITY_FOR_GROUPS"]').val();

					if(!sqg_val){
						$(this).find('option').removeAttr('selected');
						return;
					}

					var isAll = false;
					if(sqg_val){
						isAll = sqg_val.indexOf('2') !== -1;
					}

					if(!isAll && val){
						for(i in val){
							var g = val[i];
							if(sqg_val.indexOf(g) === -1){
								$(this).find('option[value="' + g + '"]').removeAttr('selected');
							}
						}
					}
				});

				$('select[name^="ONECLICKBUY_PERSON_TYPE"]').change(function() {
					if(typeof arOrderPropertiesByPerson !== 'undefined'){
						var table = $(this).parents('table').first();
						var value = $(this).val();
						if(typeof value !== 'undefined' && typeof arOrderPropertiesByPerson[value] !== 'undefined'){
							var arSelects = [table.find('select[name^=ONECLICKBUY_PROPERTIES]'), table.find('select[name^=ONECLICKBUY_REQUIRED_PROPERTIES]')];
							for(var i in arSelects){
								var $fields = arSelects[i];
								if($fields.length){
									var fields = $fields.val();
									$fields.find('option').remove();
									for(var j in arOrderPropertiesByPerson[value]){
										var selected = '';
										if(fields)
											selected = (fields.indexOf(j) !== -1 ? ' selected="selected"' : '');
										$fields.append('<option value="' + j + '"' + selected + '>' + arOrderPropertiesByPerson[value][j] + '</option>');
									}
									$fields.find('option').eq(0).attr('selected', 'selected');
									$fields.find('option').eq(1).attr('selected', 'selected');
								}
							}
						}
					}
				});

				$('select[name^="ONECLICKBUY_PROPERTIES"]').change(function() {
					var table = $(this).parents('table').first();
					$(this).find('option').eq(0).attr('selected', 'selected');
					$(this).find('option').eq(1).attr('selected', 'selected');
					var fiedsValue = $(this).val();
					var $requiredFields = table.find('select[name^=ONECLICKBUY_REQUIRED_PROPERTIES]');
					var requiredFieldsValue = $requiredFields.val();
					for(var i in requiredFieldsValue){
						if(fiedsValue === null || fiedsValue.indexOf(requiredFieldsValue[i]) === -1){
							$requiredFields.find('option[value=' + requiredFieldsValue[i] + ']').removeAttr('selected');
						}
					}
				});

				$('select[name^="ONECLICKBUY_REQUIRED_PROPERTIES"]').change(function() {
					var table = $(this).parents('table').first();
					$(this).find('option').eq(0).attr('selected', 'selected');
					$(this).find('option').eq(1).attr('selected', 'selected');
					var requiredFieldsValue = $(this).val();
					var $fieds = table.find('select[name^=ONECLICKBUY_PROPERTIES]');
					var fiedsValue = $fieds.val();
					var $FIO = $(this).find('option[value^=FIO]');
					var $PHONE = $(this).find('option[value^=PHONE]');
					for(var i in requiredFieldsValue){
						if(fiedsValue === null || fiedsValue.indexOf(requiredFieldsValue[i]) === -1){
							$(this).find('option[value=' + requiredFieldsValue[i] + ']').removeAttr('selected');
						}
					}
				});

				$('input[name^="USE_GOOGLE_RECAPTCHA"]').change(function(){
					if($(this).attr('checked') != 'checked')
						$(this).closest('.adm-detail-content-table').find('tr[data-optioncode^="GOOGLE_RECAPTCHA"]').each(function(){
							$(this).css('display','none');
						});
					else
						$(this).closest('.adm-detail-content-table').find('tr[data-optioncode^="GOOGLE_RECAPTCHA"]').each(function(){
							$(this).css('display','');
						});
					$('select[name^="GOOGLE_RECAPTCHA_SIZE"]').change();
				});

				$('select[name^="GOOGLE_RECAPTCHA_SIZE"]').change(function() {
					var val = $(this).val();
					var tab = $(this).parents('.adm-detail-content-item-block');
					if(tab.find('input[name^="USE_GOOGLE_RECAPTCHA"]').attr('checked') == 'checked')
					{
						if(val != 'INVISIBLE')
						{
							tab.find('tr[data-optioncode^="GOOGLE_RECAPTCHA_SHOW_LOGO"]').css('display','none');
							tab.find('tr[data-optioncode^="GOOGLE_RECAPTCHA_BADGE"]').css('display','none');
						}
						else
						{
							tab.find('tr[data-optioncode^="GOOGLE_RECAPTCHA_SHOW_LOGO"]').css('display','');
							tab.find('tr[data-optioncode^="GOOGLE_RECAPTCHA_BADGE"]').css('display','');
						}
					}
					else
					{
						tab.find('tr[data-optioncode^="GOOGLE_RECAPTCHA_SHOW_LOGO"]').css('display','none');
						tab.find('tr[data-optioncode^="GOOGLE_RECAPTCHA_BADGE"]').css('display','none');
					}
				})

				$('select[name^="ONECLICKBUY_PERSON_TYPE"]').change();
				$('input[name^="YA_GOALS"]').change();
				$('select[name^="USE_FORMS_GOALS"]').change();
				$('input[name^="USE_BASKET_GOALS"]').change();
				$('input[name^="USE_1CLICK_GOALS"]').change();
				$('input[name^="USE_FASTORDER_GOALS"]').change();
				$('input[name^="USE_FULLORDER_GOALS"]').change();
				$('input[name^="USE_DEBUG_GOALS"]').change();

				$('input[name^="USE_GOOGLE_RECAPTCHA"]').change();
				$('select[name^="GOOGLE_RECAPTCHA_SIZE"]').change();
			</script>
		</form>
		<?$tabControl->End();?>
	<?endif;?>
<?}
else
{
	echo CAdminMessage::ShowMessage(GetMessage('NO_RIGHTS_FOR_VIEWING'));
}?>
<?
function ShowAdminRow($optionCode, $arOption, $arTab, $arControllerOption){
    $optionName = $arOption['TITLE'];
    $optionType = $arOption['TYPE'];
    $optionList = $arOption['LIST'];
    $optionDefault = $arOption['DEFAULT'];
    $optionVal = $arTab['OPTIONS'][$optionCode];
    $optionSize = $arOption['SIZE'];
    $optionCols = $arOption['COLS'];
    $optionRows = $arOption['ROWS'];
    $optionChecked = $optionVal == 'Y' ? 'checked' : '';
    $optionDisabled = isset($arControllerOption[$optionCode]) || array_key_exists('DISABLED', $arOption) && $arOption['DISABLED'] == 'Y' ? 'disabled' : '';
    $optionSup_text = array_key_exists('SUP', $arOption) ? $arOption['SUP'] : '';
    $optionController = isset($arControllerOption[$optionCode]) ? "title='".GetMessage("MAIN_ADMIN_SET_CONTROLLER_ALT")."'" : "";
    $optionsSiteID = $arTab['SITE_ID'];
    $isArrayItem = strpos($optionCode, '_array_') !== false;
    ?>


    <?if($optionType == "note"):?>
        <td colspan="2" align="center">
            <?=BeginNote('align="center"');?>
            <?=$arOption["NOTE"]?>
            <?=EndNote();?>
        </td>
    <?  else:?>
        <?if(!$isArrayItem):?>
            <td class="<?=(in_array($optionType, array("multiselectbox", "textarea", "statictext", "statichtml")) ? "adm-detail-valign-top" : "")?>" width="50%">
                <?if($optionType == "checkbox"):?>
                    <label for="<?=htmlspecialcharsbx($optionCode)."_".$optionsSiteID?>"><?=$optionName?></label>
                <?else:?>
                    <?=$optionName.($optionCode == "BASE_COLOR_CUSTOM" ? ' #' : '')?>
                <?endif;?>
                <?if(strlen($optionSup_text)):?>
                    <span class="required"><sup><?=$optionSup_text?></sup></span>
                <?endif;?>
            </td>
        <?endif;?>
        <td<?=(!$isArrayItem ? ' width="50%"' : '')?>>
            <?if($optionType == "checkbox"):?>
                <input type="checkbox" <?=((isset($arOption['DEPENDENT_PARAMS']) && $arOption['DEPENDENT_PARAMS']) ? "class='depend-check'" : "");?> <?=$optionController?> id="<?=htmlspecialcharsbx($optionCode)."_".$optionsSiteID?>" name="<?=htmlspecialcharsbx($optionCode)."_".$optionsSiteID?>" value="Y" <?=$optionChecked?> <?=$optionDisabled?> <?=(strlen($optionDefault) ? $optionDefault : "")?>>
            <?elseif($optionType == "text" || $optionType == "password"):?>
                <input type="<?=$optionType?>" <?=((isset($arOption['PARAMS']) && isset($arOption['PARAMS']['WIDTH'])) ? 'style="width:'.$arOption['PARAMS']['WIDTH'].'"' : '');?> <?=$optionController?> size="<?=$optionSize?>" maxlength="255" value="<?=htmlspecialcharsbx($optionVal)?>" name="<?=htmlspecialcharsbx($optionCode)."_".$optionsSiteID?>" <?=$optionDisabled?> <?=($optionCode == "password" ? "autocomplete='off'" : "")?>>
            <?elseif($optionType == "selectbox"):?>
                <?
                if(!is_array($optionList)) $optionList = (array)$optionList;
                $arr_keys = array_keys($optionList);
                ?>
                <select name="<?=htmlspecialcharsbx($optionCode)."_".$optionsSiteID?>" <?=$optionController?> <?=$optionDisabled?>>
                    <?if($bIBlocks)
                    {
                        foreach($arIBlocks as $key => $arValue) {
                            $selected="";
                            if(!$optionVal && $arValue["CODE"]=="aspro_next_catalog"){
                                $selected="selected";
                            }elseif($optionVal && $optionVal==$key){
                                $selected="selected";
                            }?>
                            <option value="<?=$key;?>" <?=$selected;?>><?=htmlspecialcharsbx($arValue["NAME"]);?></option>
                        <?}
                    }
                    elseif($optionCode == 'GRUPPER_PROPS')
                    {
                        foreach($optionList as $key => $arValue):
                            $selected="";
                            if($optionVal && $optionVal==$key)
                                $selected="selected";
                            ?>
                            <option value="<?=$key;?>" <?=$selected;?> <?=(isset($arValue['DISABLED']) ? 'disabled' : '');?>><?=htmlspecialcharsbx($arValue["TITLE"]);?></option>
                        <?endforeach;?>
                    <?}
                    else
                    {
                        for($j = 0, $c = count($arr_keys); $j < $c; ++$j):?>
                            <option value="<?=$arr_keys[$j]?>" <?if($optionVal == $arr_keys[$j]) echo "selected"?>><?=htmlspecialcharsbx((is_array($optionList[$arr_keys[$j]]) ? $optionList[$arr_keys[$j]]["TITLE"] : $optionList[$arr_keys[$j]]))?></option>
                        <?endfor;
                    }?>
                </select>
            <?elseif($optionType == "multiselectbox"):?>
                <?
                if(!is_array($optionList)) $optionList = (array)$optionList;
                $arr_keys = array_keys($optionList);
                $optionVal = explode(",", $optionVal);
                if(!is_array($optionVal)) $optionVal = (array)$optionVal;
                ?>
                <select size="<?=$optionSize?>" <?=$optionController?> <?=$optionDisabled?> multiple name="<?=htmlspecialcharsbx($optionCode)."_".$optionsSiteID?>[]" >
                    <?for($j = 0, $c = count($arr_keys); $j < $c; ++$j):?>
                        <option value="<?=$arr_keys[$j]?>" <?if(in_array($arr_keys[$j], $optionVal)) echo "selected"?>><?=htmlspecialcharsbx((is_array($optionList[$arr_keys[$j]]) ? $optionList[$arr_keys[$j]]["TITLE"] : $optionList[$arr_keys[$j]]))?></option>
                    <?endfor;?>
                </select>
            <?elseif($optionType == "textarea"):?>
                <textarea <?=$optionController?> <?=$optionDisabled?> rows="<?=$optionRows?>" cols="<?=$optionCols?>" name="<?=htmlspecialcharsbx($optionCode)."_".$optionsSiteID?>"><?=htmlspecialcharsbx($optionVal)?></textarea>
            <?elseif($optionType == "statictext"):?>
                <?=htmlspecialcharsbx($optionVal)?>
            <?elseif($optionType == "statichtml"):?>
                <?=$optionVal?>
            <?endif;?>
        </td>
    <?endif;?>
    <?
}

function GetBackParametrsValues($SITE_ID, $arParametrsList, $bStatic = true){
    if($bStatic)
        static $arValues;

    $moduleID = 'profitkit.m1';

    if($bStatic && $arValues === NULL || !$bStatic)
    {
        $arDefaultValues = $arValues = $arNestedValues = array();
        $bNestedParams = false;



        if($arParametrsList && is_array($arParametrsList))
        {
            foreach($arParametrsList as $blockCode => $arBlock)
            {
                if($arBlock['OPTIONS'] && is_array($arBlock['OPTIONS']))
                {
                    foreach($arBlock['OPTIONS'] as $optionCode => $arOption)
                    {
                        if($arOption['TYPE'] !== 'note' && $arOption['TYPE'] !== 'includefile')
                        {
                            if($arOption['TYPE'] === 'array'){
                                $itemsKeysCount = Option::get($moduleID, $optionCode, '0', $SITE_ID);
                                if($arOption['OPTIONS'] && is_array($arOption['OPTIONS']))
                                {
                                    for($itemKey = 0, $cnt = $itemsKeysCount + 1; $itemKey < $cnt; ++$itemKey)
                                    {
                                        $_arParameters = array();
                                        $arOptionsKeys = array_keys($arOption['OPTIONS']);
                                        foreach($arOptionsKeys as $_optionKey)
                                        {
                                            $arrayOptionItemCode = $optionCode.'_array_'.$_optionKey.'_'.$itemKey;
                                            $arValues[$arrayOptionItemCode] = Option::get($moduleID, $arrayOptionItemCode, '', $SITE_ID);
                                            $arDefaultValues[$arrayOptionItemCode] = $arOption['OPTIONS'][$_optionKey]['DEFAULT'];
                                        }
                                    }
                                }
                                $arValues[$optionCode] = $itemsKeysCount;
                                $arDefaultValues[$optionCode] = 0;
                            }
                            else
                            {
                                $arDefaultValues[$optionCode] = $arOption['DEFAULT'];
                                $arValues[$optionCode] = Option::get($moduleID, $optionCode, $arOption['DEFAULT'], $SITE_ID);

                                if(isset($arOption['SUB_PARAMS']) && $arOption['SUB_PARAMS']) //get nested params default value
                                {
                                    if($arOption['TYPE'] == 'selectbox' && (isset($arOption['LIST'])) && $arOption['LIST'])
                                    {
                                        $bNestedParams = true;
                                        $arNestedValues[$optionCode] = $arOption['LIST'];
                                        foreach($arOption['LIST'] as $key => $value)
                                        {
                                            if($arOption['SUB_PARAMS'][$key])
                                            {
                                                foreach($arOption['SUB_PARAMS'][$key] as $key2 => $arSubOptions)
                                                    $arDefaultValues[$key.'_'.$key2] = $arSubOptions['DEFAULT'];
                                            }
                                        }
                                    }
                                }

                                if(isset($arOption['DEPENDENT_PARAMS']) && $arOption['DEPENDENT_PARAMS']) //get dependent params default value
                                {
                                    foreach($arOption['DEPENDENT_PARAMS'] as $key => $arSubOption)
                                    {
                                        $arDefaultValues[$key] = $arSubOption['DEFAULT'];
                                        $arValues[$key] = Option::get($moduleID, $key, $arSubOption['DEFAULT'], $SITE_ID);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if($arNestedValues && $bNestedParams) //get nested params bd value
        {
            foreach($arNestedValues as $key => $arAllValues)
            {
                $arTmpValues = array();
                foreach($arAllValues as $key2 => $arOptionValue)
                {
                    $arTmpValues = unserialize(Option::get($moduleID, 'NESTED_OPTIONS_'.$key.'_'.$key2, serialize(array()), $SITE_ID));
                    if($arTmpValues)
                    {
                        foreach($arTmpValues as $key3 => $value)
                        {
                            $arValues[$key2.'_'.$key3] = $value;
                        }
                    }
                }

            }
        }

        if($arValues && is_array($arValues))
        {
            foreach($arValues as $optionCode => $arOption)
            {
                if(!isset($arDefaultValues[$optionCode]))
                    unset($arValues[$optionCode]);
            }
        }
        if($arDefaultValues && is_array($arDefaultValues))
        {
            foreach($arDefaultValues as $optionCode => $arOption)
            {
                if(!isset($arValues[$optionCode]))
                    $arValues[$optionCode] = $arOption;
            }
        }

    }

    return $arValues;
}
?>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_admin.php');?>