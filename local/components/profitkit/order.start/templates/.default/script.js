$(document).ready(function () {
    window.old_width = $(window).outerWidth()+1;
    $("body").on("click","#ud__inform_way .input_radio_block",function(){
        var parent = $(this).parent();
        parent.find('.input_radio_block').removeClass("checked_group_radio");
        $(this).addClass("checked_group_radio");
        parent.find("input[type='radio']").prop('checked', false);
        $(this).find('input[type="radio"]').prop('checked', true);

    });
   /* $("body").on("click",".dynamic_input_radio",function(){
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
    });*/

    $("select").niceSelect();
    $("input[name='orderprop_3']").mask("+7(000)000-00-00");
    $('.input_card input').mask('000 - 000 - 000 - 000');

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

    var elems = document.querySelectorAll('.orderform.orderform-reload');

    for (var i = 0; i < elems.length; i++) {
        elems[i].addEventListener("submit", {handleEvent: formSubmit, action: 'submit'}, true);
    }

    var persons = document.querySelectorAll('input[name=person_type_id]');
    for (var i = 0; i < persons.length; i++) {
        persons[i].addEventListener("change", {handleEvent: formSubmit, action: 'reload'}, true);
    }

    var deliverys = document.querySelectorAll('.dynamic_input_radio');
    for (var i = 0; i < deliverys.length; i++) {
        deliverys[i].addEventListener("click", {handleEvent: changeDelivery, action: 'reload', obj:deliverys[i]}, true);
    }

    function changeDelivery()
    {
        var parent = $(this.obj);
        var tabindex = parent.attr("tabindex");
        $(this.obj).parents('#ud__inform_delivery').find('.way_tab').hide();
        $(this.obj).parents('#ud__inform_delivery').find('.way_tab[tabindex="'+tabindex+'"]').show();
        $('#way_adress .dynamic_input_radio').removeClass("checked_group_radio");
        parent.addClass("checked_group_radio");
        parent.find("input[type='radio']").prop('checked', false);
        $(this.obj).find('input[type="radio"]').prop('checked', true);

        var width = $(window).outerWidth();
        if(width < 767) {
            $(document).scrollTop($(this.obj).offset().top-100);
        }

        formSubmit('reload');
    }

    function formSubmit(action)
    {
        if (this.action)
            action = this.action
        jQuery("body").addClass("preload-active");
        obj = jQuery(".orderform.orderform-reload");
        jQuery.ajax({
            type: "POST",
            url: '/local/components/profitkit/order.start/ajax.php?action='+action,
            data: obj.serialize()+"&signedParamsString="+signedParamsStringOrder,
            timeout: 30000,
            dataType: "html",
            error: function(request,error) {
                if (error == "timeout") {
                    jQuery("body").removeClass("preload-active");
                    alert('timeout');
                }
                else {
                    jQuery("body").removeClass("preload-active");
                    alert('Error! Please try again!');
                }
            },
            success: function(data) {
                obj.parent().replaceWith(data);
                jQuery("body").removeClass("preload-active");
            }
        });
        event.stopPropagation();
        event.preventDefault();
        return false;

    }

});