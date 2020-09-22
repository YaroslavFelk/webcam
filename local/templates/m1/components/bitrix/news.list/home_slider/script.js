jQuery(window).load(function () {
    jQuery(".main_slider").slick({dots: true});
    $('.main_slider').on('afterChange', function(event, slick, currentSlide){
        console.log(currentSlide);
        console.log(jQuery(".main_slider").find(".slick-active").find(".slider_item").hasClass("element_color_white"));
        jQuery(".main_slider").removeClass("element_color_white");
        if (jQuery(".main_slider").find(".slick-active").find(".slider_item").hasClass("element_color_white"))
            jQuery(".main_slider").addClass("element_color_white");
    });
})
