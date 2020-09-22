var touchsupport = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0)
if (!touchsupport){ // browser doesn't support touch
    document.documentElement.className += " non-touch"
}

jQuery(document).ready(function () {

    function check()
    {
        jQuery("body").find(".main_menu .additional > .sub_menu").prepend('<div class="sub_menu_item">'+jQuery(".main_menu_row .menu_item:not(.additional)").last().html()+'</div>');
        jQuery(".main_menu_row .menu_item:not(.additional)").last().remove();

        setTimeout(function () {
            if (jQuery(".main_menu_row .menu_item").last().offset().top != jQuery(".main_menu_row").offset().top)
                check();
        }, 200);
    }

    function needResize()
    {
        return (jQuery(".main_menu_row .menu_item:last-child").offset().top != jQuery(".main_menu_row").offset().top);
    }

    function returnMenu(flag)
    {
        jQuery("body").find(".menu_item.additional > .sub_menu > .sub_menu_item").each(function () {
            jQuery(".main_menu_row .menu_item:not(.additional)").last().after('<div class="menu_item">'+jQuery(this).html()+'</div>');
            jQuery("body").find(".menu_item.additional > .sub_menu > .sub_menu_item:first-child").remove();
            if (jQuery("body").find(".menu_item.additional > .sub_menu > .sub_menu_item").length == 0)
                jQuery(".main_menu_row .menu_item.additional").remove();
            if (needResize() && flag != 1) {
                check();
                return false;
            }
        })
    }

    function adaptivemenu()
    {
        if (jQuery(window).width() > 767) {
            jQuery(".main_menu").show();
            if (needResize()) {
                if (jQuery("body").find(".menu_item.additional").length == 0)
                    jQuery(".main_menu_row").append('<div class="menu_item sub_menu_right additional"><a><i><svg width="26" height="6" viewBox="0 0 26 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 3C6 4.65685 4.65685 6 3 6C1.34315 6 0 4.65685 0 3C0 1.34315 1.34315 0 3 0C4.65685 0 6 1.34315 6 3Z" fill="white"/> <path d="M16 3C16 4.65685 14.6569 6 13 6C11.3431 6 10 4.65685 10 3C10 1.34315 11.3431 0 13 0C14.6569 0 16 1.34315 16 3Z" fill="white"/><path d="M26 3C26 4.65685 24.6569 6 23 6C21.3431 6 20 4.65685 20 3C20 1.34315 21.3431 0 23 0C24.6569 0 26 1.34315 26 3Z" fill="white"/></svg></i></a><div class="sub_menu"><div class="sub_menu_item"></div></div></div>');
                check();
            } else if (jQuery("body").find(".menu_item.additional").length > 0) {
                returnMenu(0);
            }
        }
        else {
            returnMenu(1);
        }
    }
    adaptivemenu();

    /*$(".catalog_menu.menu_tale").mCustomScrollbar({
        theme:"minimal-dark"
    });*/

    jQuery(window).resize(function () {
        let resizeTimeout;
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(function () {
            adaptivemenu();
        }, 200);

    });

    function showModal(btn)
    {
        closeMobileMenu();
        closeMobilePhone();
        closeMobileSearch();
        let id = btn.attr("data-target");
        if (typeof id === 'undefined')
        {
            id = 'pkModal';
        }
        else
            id = id.replace("#", "");
        let url = btn.attr("data-ajax");
        let content;
        content = 'static';
        if (url)
        {
            btn_text = btn.html();
            btn.html('<svg height="8" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#313D50"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle> </svg>');
            jQuery.ajax({
                url: url,
                method: 'GET',
                dataType: "html",
                failure: function (request, error) {
                },
                success: function (data) {
                    buildModal(id, data)
                    btn.html(btn_text);
                }
            });
        }
        else
            buildModal(id, '')

    }

    function buildModal(id, content)
    {
        if (jQuery("#"+id).length == 0) {
            let text = '<div class="modal fade" id="' + id + '" tabindex="-1" role="dialog" aria-labelledby="' + id + 'Label">\n' +
                '            <div class="modal-dialog" role="document">\n' +
                '            <div class="modal-content">\n' +
                '            <div class="modal-header">\n' +
                '            <button class="modal_close"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
                '<path fill-rule="evenodd" clip-rule="evenodd" d="M18.5001 18.5C18.1586 18.8414 17.3415 19.3414 17.0001 19L1.00005 2.99997C0.658577 2.6585 1.15853 1.84171 1.5 1.50024C1.84147 1.15877 2.65858 0.65859 3.00005 1.00006L19.0001 17C19.3415 17.3414 18.8415 18.1585 18.5001 18.5Z" fill="#8E8E8E"/>\n' +
                '<path fill-rule="evenodd" clip-rule="evenodd" d="M1.50005 18.5C1.15858 18.1585 0.658577 17.3416 1.00005 17.0002L17.0001 1.00006C17.3415 0.65859 18.1586 1.1585 18.5001 1.49997C18.8415 1.84144 19.3415 2.6585 19.0001 2.99997L3.00005 19.0002C2.65858 19.3416 1.84152 18.8414 1.50005 18.5Z" fill="#8E8E8E"/>\n' +
                '</svg>\n</button>\n' +
                '            </div>\n' +
                '            <div class="modal-body">\n' + content +
                '            </div>\n' +
                '            <div class="modal-footer">\n' +
                '            </div>\n' +
                '            </div>\n' +
                '            </div>\n' +
                '            </div>';
            jQuery("body").append(text);
        }
        jQuery('#'+id).modal('show');
    }
    
    jQuery(".header_callback").click(function () {
        showModal(jQuery(this));
    });

    jQuery("body").on("click",".modal_close", function() {
        obj = $(this).closest('.modal:not(.not-remove)');
        $(this).closest('.modal').modal('hide');
        setTimeout(function () {
            obj.remove();
        }, 300)
    });

    jQuery("body").on('click', '[data-toggle="pkModal"]', function() {
        showModal(jQuery(this));
    });

    jQuery(window).scroll(function () {

        if (jQuery(window).scrollTop() > 150 && !jQuery("body").hasClass("header_fixed") && jQuery(window).width() > 1023) {
            jQuery(".header_main").css({top:"-103px"});
            setTimeout(function () {
                jQuery("body").addClass("header_fixed");
            }, 300)

        }
        else if (jQuery(window).scrollTop() <= 150 && jQuery("body").hasClass("header_fixed")) {
            jQuery("body").removeClass("header_fixed");
            jQuery("body").removeClass("header_menu_fixed");
            jQuery(".header_main").css({top:"0px"})
            jQuery(".main_menu").removeClass("top_fixed");
        }
    });

    jQuery("body").on("mousedown",".fld_password i", function () {
        console.log('show');
        jQuery(this).parent().find("input").attr("type", "text");
        jQuery(this).addClass("active");
    });
    jQuery("body").on("mouseup", ".fld_password i", function () {
        console.log('show');
        jQuery(this).parent().find("input").attr("type", "password");
        jQuery(this).removeClass("active");
    });

    function mobile_menu()
    {
        if (jQuery(window).width() < 768 &&  !jQuery(".main_menu").hasClass("mobile_view")) {
            //jQuery(".main_menu").addClass("mobile_view");
            let svg = '<span><svg aria-hidden="true" width="6" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg></span>';
            jQuery(".menu_item.menu_has_child>a").append(svg);
            jQuery(".sub_menu_item.menu_has_child>a").append(svg);
        }
    }
    mobile_menu();
    if (jQuery(window).width() > 767) {
        jQuery("html:not(.non-touch) .main_menu_row .menu_has_child>a").click(function () {
            if (jQuery(this).hasClass("touch-click"))
                jQuery(this).removeClass("touch-click");
            else {
                jQuery(this).addClass("touch-click");
                return false;
            }
        })
    }

    jQuery("body").on("click",".menu_item:not(.active_level)>a span",function (e) {
        e.preventDefault();
        jQuery(".mobile_menu_info").hide();
        if (!jQuery(".main_menu").hasClass("sub_level"))
            jQuery(".main_menu").addClass("sub_level");
        jQuery(this).parent().parent().addClass("active_level");
    });

    jQuery("body").on("click",".sub_menu_item:not(.active_level)>a span",function (e) {
        e.preventDefault();
        event.stopPropagation();
        if (!jQuery(".main_menu").hasClass("sub_level"))
            jQuery(".main_menu").addClass("sub_level");
        jQuery(this).closest(".active_level").addClass("level_2");
        jQuery(this).parent().parent().addClass("active_level");
        return false;
    });
    jQuery("body").on("click",".active_level>a span",function (e) {
        e.preventDefault();
        event.stopPropagation();
        jQuery(this).closest(".active_level").removeClass("active_level");
        jQuery(this).closest(".active_level").removeClass("level_2");
        console.log(jQuery(this).parent().parent().hasClass("menu_item"));
        if (jQuery(this).parent().parent().hasClass("menu_item")) {
            jQuery(".mobile_menu_info").show();
            jQuery(".main_menu").removeClass("sub_level");
        }
    });
    jQuery(".mobile_menu").click(function () {
        closeMobilePhone();
        closeMobileSearch();
        jQuery(".main_menu").show();
        jQuery(".main_menu").addClass("mobile_view");
        jQuery("body").append("<div class='main_menu_background'></div>");
    });
    function closeMobileMenu()
    {
        //jQuery(".main_menu").hide();
        if (jQuery(".main_menu").hasClass("mobile_view")) {
            jQuery(".mobile_menu_info").show();
            jQuery(".main_menu").removeClass("mobile_view");
            setTimeout(function () {
                jQuery(".main_menu_background").remove();

                jQuery(".main_menu").find(".active_level").removeClass("active_level");
                jQuery(".main_menu").find(".level_2").removeClass("level_2");
                jQuery(".main_menu").removeClass("sub_level");
            }, 500)
        }
    }
    jQuery("body").on("click", ".main_menu_background", function () {
        closeMobileMenu();
        closeMobilePhone();
        closeMobileSearch();
    });
    $(".main_menu").swipe( {
        //Generic swipe handler for all directions
        swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
            //alert(direction);
            //$(this).text("You swiped " + direction );
            if (direction == 'left' && jQuery(window).width() < 768)
                closeMobileMenu();
        },
        allowPageScroll:"auto"
    });

    jQuery(".header_phone").click(function () {
        if (typeof min_width_phone == 'undefined')
            min_width_phone = 601;
        if (!jQuery(this).hasClass("mobile_show") && jQuery(window).width() < min_width_phone) {
            closeMobileSearch();
            jQuery("header").addClass("mobile_fixed");
            jQuery(this).addClass("mobile_show");
            jQuery("body").append("<div class='main_menu_background'></div>");
        }
    });
    function closeMobilePhone()
    {
        if (jQuery(".header_phone").hasClass("mobile_show")) {
            jQuery("header").removeClass("mobile_fixed");
            jQuery(".header_phone").removeClass("mobile_show");
            jQuery(".main_menu_background").remove();
        }
    }
    jQuery(".header_search").click(function () {
        if (typeof min_width_search == 'undefined')
            min_width_search = 751;
        if (!jQuery(".mobile_menu_search").hasClass("mobile_show") && jQuery(window).width() < min_width_search) {
            closeMobilePhone();
            jQuery("header").addClass("mobile_fixed");
            jQuery(".mobile_menu_search").addClass("mobile_show");
            jQuery(".mobile_menu_search").find("input[type=text]").focus();
            jQuery("body").append("<div class='main_menu_background'></div>");
        }
        if (jQuery(window).width() < min_width_search)
        return false;
    });
    function closeMobileSearch()
    {
        if (jQuery(".mobile_menu_search").hasClass("mobile_show")) {
            jQuery("header").removeClass("mobile_fixed");
            jQuery(".mobile_menu_search").removeClass("mobile_show");
            jQuery(".main_menu_background").remove();
        }
    }

    jQuery(".btn_fixed_menu").click(function () {
        jQuery(".main_menu").toggleClass("top_fixed");
        jQuery("body").toggleClass("header_menu_fixed");
    })

    jQuery('body').on('submit','.bx-system-auth-form form',function(){

        var form_action = jQuery(this).attr('action');
        var form_backurl = jQuery(this).find('input[name="backurl"]').val();
        jQuery.ajax({
            type: "POST",
            url: '/ajax/auth.php',
            data: jQuery(this).serialize(),
            timeout: 3000,
            error: function(request,error) {
                if (error == "timeout") {
                    alert('timeout');
                }
                else {
                    alert('Error! Please try again!');
                }
            },
            success: function(data) {
                jQuery("body").find('.auth_reg_form').replaceWith(data);
                jQuery("body").find('.bx-system-auth-form form').attr('action',form_action);
                jQuery("body").find('.bx-system-auth-form input[name=backurl]').val(form_backurl);
                // $('#reg a[href*="login"]').attr('href','#modal-login').attr('data-uk-modal','');
            }
        });

        return false;
    });

    jQuery('body').on('submit','.bx-auth-reg form',function(){

        var form_action = jQuery(this).attr('action');
        var form_backurl = jQuery(this).find('input[name="backurl"]').val();
        console.log($(this).serialize())
        jQuery.ajax({
            type: "POST",
            url: '/ajax/registration.php',
            data: jQuery(this).serialize(),
            timeout: 3000,
            error: function(request,error) {
                if (error == "timeout") {
                    alert('timeout');
                }
                else {
                    alert('Error! Please try again!');
                }
            },
            success: function(data) {
                jQuery("body").find('.auth_reg_form').replaceWith(data);
                jQuery("body").find('.bx-auth-reg form').attr('action',form_action);
                jQuery("body").find('.bx-auth-reg input[name=backurl]').val(form_backurl);
                jQuery('.modal').animate({scrollTop: 0}, 200);
                // $('#reg a[href*="login"]').attr('href','#modal-login').attr('data-uk-modal','');
            }
        });

        return false;
    });

    jQuery("body").on("click", ".auth_tab a", function () {
        let btn = jQuery(this);
        let url = btn.attr("data-ajax");
        if (url)
        {
            btn_text = btn.html();
            btn.html('<svg height="8" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#313D50"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite" /> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" /> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" /> </circle> </svg>');
            jQuery.ajax({
                url: url,
                method: 'GET',
                dataType: "html",
                failure: function (request, error) {
                },
                success: function (data) {
                    jQuery("body").find('.auth_reg_form').replaceWith(data);
                    btn.html(btn_text);
                }
            });
        }
    })

    if (jQuery(window).width() > 767) {
        jQuery("body").on("mouseenter", ".catalog_item", function (event) {
            if (!jQuery(this).hasClass("active")) {
                jQuery(this).css({"height": jQuery(this).height()})
                jQuery(this).addClass("active");
            }
        });
        jQuery("body").on("mouseleave", ".catalog_item", function (event) {
            if (jQuery(this).hasClass("active")) {
                jQuery(this).removeClass("active");
            }
        })
    }

    jQuery("body").on("click", ".show_filtr_btn",function () {
        jQuery(".width_sidebar>.col-3").addClass("filter_visible");
        jQuery("body").append("<div class='main_menu_background'></div>");
    })
    jQuery("body").on("click",".mobile_filter_header a",function () {
        jQuery(".width_sidebar>.col-3").removeClass("filter_visible");
        jQuery("body").find( ".main_menu_background").remove();
    })

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        if (jQuery(jQuery(e.target).attr("href")).find(".catalog_slider").length > 0)
            jQuery(jQuery(e.target).attr("href")).find(".catalog_slider").slick('refresh');
    })

    jQuery("body").on("click",".mobile_filter_header a, .main_menu_background",function () {
        jQuery(".width_sidebar>.col-3").removeClass("filter_visible");
        jQuery("body").find( ".main_menu_background").remove();
    });

    $("body").on("click", ".show_category_btn", function () {
        $(".width_sidebar>.col-3").addClass("menu_visible");
        jQuery("body").append("<div class='main_menu_background'></div>");
    });

    $("body").on("click", ".main_menu_background", function () {
        $(".width_sidebar>.col-3").removeClass("menu_visible");
        jQuery("body").find( ".main_menu_background").remove();
    });
});