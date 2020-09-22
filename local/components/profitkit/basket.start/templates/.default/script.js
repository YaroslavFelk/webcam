$(document).ready(function () {
    window.old_width = $(window).outerWidth()+1;
    $("body").on("click","#ud__inform_way .input_radio_block",function(){
        var parent = $(this).parent();
        parent.find('.input_radio_block').removeClass("checked_group_radio");
        $(this).addClass("checked_group_radio");
        parent.find("input[type='radio']").prop('checked', false);
        $(this).find('input[type="radio"]').prop('checked', true);

    });
    $("body").on("click",".dynamic_input_radio",function(){
        var parent = $(this);
        var tabindex = parent.attr("tabindex");
        $(this).parents('#ud__inform_delivery').find('.way_tab').hide();
        $(this).parents('#ud__inform_delivery').find('.way_tab[tabindex="'+tabindex+'"]').show();
        $('#way_adress .dynamic_input_radio').removeClass("checked_group_radio");
        parent.addClass("checked_group_radio");
        parent.find("input[type='radio']").prop('checked', false);
        $(this).find('input[type="radio"]').prop('checked', true);

        var width = $(window).outerWidth();
        if(width < 767) {
            $(document).scrollTop($(this).offset().top-100);
        }
    });

    $("select").niceSelect();

    resize();
    $( window ).resize(function() {
        resize();
    });
    function resize(){
        if($(window).outerWidth() != old_width){
            var width = $(window).outerWidth();
            old_width = width;
            var width = $(window).outerWidth();
            if(width < 767) {
                $( "#ud__inform_delivery .way_delivery_tabs .way_tab" ).each(function( index ) {
                    index = $(this).attr("tabindex");
                    $(this).appendTo("#way_adress .dynamic_input_radio[tabindex='"+index+"'] .dynamic_layout_tabindex");
                });

                $(".gift .product_descript").each(function( index ) {
                    $(this).appendTo(".gift[data-index='"+(index+1)+"'] .product_descript_mob");
                });
            }
            else {
                $("#way_adress .dynamic_input_radio .dynamic_layout_tabindex .way_tab" ).each(function( index ) {
                    index = parseInt(index)+1;
                    $(this).appendTo("#ud__inform_delivery .way_delivery_tabs");
                });

                $(".gift .product_descript_mob .product_descript").each(function( index ) {
                    $(".gift[data-index='"+(index+1)+"'] .product_article").after(this);
                });
            }
        }
    }
    $("body").on("click",".input_card",function(){
        $(this).find("input").css("opacity","1");
        $(this).find("label").hide();
    });
    $("body").on("click",".gift",function(){
        var parent = $(this).parent();
        $(this).find('input[type="checkbox"]').prop('checked', true);
        parent.find(".gift").removeClass("select");
        $(this).addClass("select");
    });

    var elems = document.querySelectorAll('.order_del');

    for (var i = 0; i < elems.length; i++) {
        elems[i].addEventListener("click", {handleEvent: delfromcart, obj: elems[i]}, true);
    }
    function delfromcart()
    {
        var params = {};
        params['act'] = 'del';
        params['item_id'] = jQuery(this.obj).closest(".row.product").attr("data-id");
        updatecart(params);
    }

    var elems2 = document.querySelectorAll('.input_price_del');

    for (var i = 0; i < elems2.length; i++) {
        elems2[i].addEventListener("click", {handleEvent: downitemcart, obj: elems2[i]}, true);
    }
    function downitemcart()
    {
        var params = {};
        params['act'] = 'down';
        params['item_id'] = jQuery(this.obj).closest(".row.product").attr("data-id");
        updatecart(params);
    }

    var elems3 = document.querySelectorAll('.input_price_add');

    for (var i = 0; i < elems3.length; i++) {
        elems3[i].addEventListener("click", {handleEvent: upitemcart, obj: elems3[i]}, true);
    }
    function upitemcart()
    {
        var params = {};
        params['act'] = 'up';
        params['item_id'] = jQuery(this.obj).closest(".row.product").attr("data-id");
        updatecart(params);
    }

    function updatecart(params)
    {

        component = 'basket.start';
        jQuery(".preload-ajax").addClass("preload-active");
        obj = jQuery("#order_product");
        jQuery.ajax({
            type: "POST",
            url: '/local/components/profitkit/'+component+'/ajax.php',
            data: "act="+params['act']+"&id="+params['item_id']+"&signedParamsString="+signedParamsBasketStart,
            timeout: 30000,
            dataType: "html",
            error: function(request,error) {
                if (error == "timeout") {
                    jQuery(".preload-ajax").removeClass("preload-active");
                    alert('timeout');
                }
                else {
                    jQuery(".preload-ajax").removeClass("preload-active");
                    alert('Error! Please try again!');
                }
            },
            success: function(data) {
                obj.parent().replaceWith(data);
                jQuery(".preload-ajax").removeClass("preload-active");
                let event = new Event("addToBasket", {bubbles: true}); // (2)
                document.dispatchEvent(event);
            }
        });
        event.stopPropagation();
        event.preventDefault();
        return false;

    }
});