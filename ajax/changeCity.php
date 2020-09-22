<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?php
$APPLICATION->ShowAjaxHead();
?>
<h2>Выбор города</h2>
<? $APPLICATION->IncludeComponent(
    'bitrix:sale.location.selector.search',
    '.default',
    array(
        "SHOW_DEFAULT_LOCATIONS" => "Y",
        "INPUT_NAME" => "mycity",
        "PROVIDE_LINK_BY" => "code",
        "JS_CALLBACK" => "changecity"),
    false
); ?>
<script>
    function changecity()
    {
        console.log('changecity');
        //console.log(jQuery("input[name=mycity]").val())
        var query = {
            c: 'profitkit:geo',
            action: 'SetCity',
            mode: 'class'
        };
        var data = {
            id: jQuery("input[name=mycity]").val()
        };
        BX.ajax({
            method: 'POST',
            data: data,
            dataType: 'json',
            url: '/bitrix/services/main/ajax.php?' + $.param(query, true),
            onsuccess: function(result) {
                //console.log(result.data.city)
                jQuery(".location__link").html(result.data.city);
                location.reload();

                //console.log(result);
                //obPopupWin.close();
            }
        });
    }
</script>
