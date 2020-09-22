jQuery(document).ready(function () {
    jQuery(window).scroll(function () {
        jQuery(".num_number:not(.finished)").each(function () {
            if ((jQuery(window).scrollTop() + jQuery(window).height()) > jQuery(this).offset().top) {
                jQuery(this).addClass("finished");
                go_numbers(jQuery(this));
            }
        });
    })


    function go_numbers (obj)
    {
        let interval = 5000 / parseInt(obj.attr("data-num"));
        console.log(interval);

        // повторить с интервалом 2 секунды
        let timerId = setInterval(() => {
            if (parseInt(obj.attr("data-num")) < 20)
                add = 1;
            else
                add = parseInt(parseInt(obj.attr("data-num")) / 20);

            if (parseInt(obj.text())+add < parseInt(obj.attr("data-num")))
                obj.text(parseInt(obj.text())+add)
            else {
                    clearInterval(timerId);
                    obj.text(obj.attr("data-num"))
            }

        }, 100);

        // остановить вывод через 5 секунд
                setTimeout(() => {
                    clearInterval(timerId);
                    obj.text(obj.attr("data-num"))
                    }, 4000);
    }
})