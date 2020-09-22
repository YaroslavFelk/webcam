jQuery(document).ready(function () {
console.log('script start')
jQuery(".location__link").click(function (){
    console.log('location__link')
    jQuery("#changecity").show();
    jQuery("#popup-window-overlay-changecity").show();
    h = jQuery("#changecity").height();
    w = jQuery("#changecity").width();
    bw = jQuery(window).width();
    bh = jQuery(window).height();
    console.log(h, w)
    console.log(bh, bw)
    popup_top = bh/2-h/2;
    popup_left = bw/2-w/2;
    console.log(popup_top, popup_left)
    jQuery("#changecity").css({top:popup_top, left:popup_left});
   /* var popupContent, popupButtons;
    obPopupWin = BX.PopupWindowManager.create('citychangepopup', null, {
        autoHide: true,
        offsetLeft: 0,
        offsetTop: 0,
        overlay : true,
        closeByEsc: true,
        titleBar: true,
        closeIcon: true,
        contentColor: 'white',
        className: ''
    });
    console.log(obPopupWin);
    obPopupWin.setTitleBar('Выбор города');
    inp = jQuery(".inputChangeCity").detach();
    popupContent = '<div style="width: 100%; margin: 0; text-align: center;" class="citychangepopupIn"></div>';
    obPopupWin.setContent(popupContent);
    inp.appendTo('.citychangepopupIn').show()
    obPopupWin.setButtons(popupButtons);
    obPopupWin.show();*/
})
    jQuery("#changecity .popup-window-close-icon").click(function (){
        jQuery("#changecity").hide();
        jQuery("#popup-window-overlay-changecity").hide();
    })

})

