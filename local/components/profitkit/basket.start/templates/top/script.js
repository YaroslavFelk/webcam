document.addEventListener("addToBasket", refreshCart, true);
function refreshCart()
{
    console.log('refreshCart');
    component = 'basket.start';
    obj = jQuery("#topcart");
    jQuery.ajax({
        type: "POST",
        url: '/local/components/profitkit/'+component+'/ajax.php',
        data: "ajax=y&template=top&signedParamsString="+signedParamsBasketStartTop,
        timeout: 30000,
        dataType: "html",
        error: function(request,error) {
            if (error == "timeout") {
                alert('timeout');
            }
            else {
                alert('Error! Please try again!');
            }
        },
        success: function(data) {
            obj.replaceWith(data);
        }
    });
    event.stopPropagation();
    event.preventDefault();
    return false;
}