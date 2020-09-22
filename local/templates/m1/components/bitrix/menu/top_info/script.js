jQuery(document).ready(function () {

    function check2() {
        jQuery("body").find(".top_info_menu .additional > .sub_menu").prepend('<div class="sub_menu_item">' + jQuery(".top_info_menu .top_menu_item:not(.additional)").last().html() + '</div>');
        jQuery(".top_info_menu .top_menu_item:not(.additional)").last().remove();

        setTimeout(function () {
            if (jQuery(".top_info_menu .top_menu_item").last().offset().top != jQuery(".top_info_menu").offset().top)
                check2();
        }, 200);
    }

    function needResize2() {
        console.log(jQuery(".top_info_menu .top_menu_item:last-child").offset().top);
        console.log(jQuery(".top_menu_item:first-child").offset().top)
        return (jQuery(".top_info_menu .top_menu_item:last-child").offset().top != jQuery(".top_menu_item:first-child").offset().top);
    }

    function returnMenu2(flag) {
        jQuery("body").find(".top_menu_item.additional > .sub_menu > .sub_menu_item").each(function () {
            jQuery(".top_info_menu .top_menu_item:not(.additional)").last().after('<li class="top_menu_item">' + jQuery(this).html() + '</li>');
            jQuery("body").find(".top_menu_item.additional > .sub_menu > .sub_menu_item:first-child").remove();
            if (jQuery("body").find(".top_menu_item.additional > .sub_menu > .sub_menu_item").length == 0)
                jQuery(".top_info_menu .top_menu_item.additional").remove();
            if (needResize2() && flag != 1) {
                check2();
                return false;
            }
        })
    }

    function adaptivemenu2() {
        if (jQuery(window).width() > 767) {
            jQuery(".main_menu").show();
            if (needResize2()) {
                if (jQuery("body").find(".top_menu_item.additional").length == 0)
                    jQuery(".top_info_menu").append('<li class="top_menu_item sub_menu_right additional"><a><i><svg width="26" height="6" viewBox="0 0 26 6" xmlns="http://www.w3.org/2000/svg"><path d="M6 3C6 4.65685 4.65685 6 3 6C1.34315 6 0 4.65685 0 3C0 1.34315 1.34315 0 3 0C4.65685 0 6 1.34315 6 3Z"/> <path d="M16 3C16 4.65685 14.6569 6 13 6C11.3431 6 10 4.65685 10 3C10 1.34315 11.3431 0 13 0C14.6569 0 16 1.34315 16 3Z" /><path d="M26 3C26 4.65685 24.6569 6 23 6C21.3431 6 20 4.65685 20 3C20 1.34315 21.3431 0 23 0C24.6569 0 26 1.34315 26 3Z" /></svg></i></a><div class="sub_menu"></div></li>');
                check2();
            } else if (jQuery("body").find(".top_menu_item.additional").length > 0) {
                returnMenu2(0);
            }
        } else {
            returnMenu2(1);
        }
    }

    adaptivemenu2();
    jQuery(window).resize(function () {
        let resizeTimeout;
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function () {
            adaptivemenu2();
        }, 200);

    });
})