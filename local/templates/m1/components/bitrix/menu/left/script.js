jQuery(".menu_has_child span").click(function (e) {
    e.preventDefault();
    event.stopPropagation();
    if (!jQuery(this).parent().hasClass("left_menu_item_open")) {
        jQuery(this).parent().addClass("left_menu_item_open");
    }
    else {
        jQuery(this).parent().removeClass("left_menu_item_open");
    }
})