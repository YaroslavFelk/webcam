jQuery(window).load(function () {
    jQuery(".brands_slider").slick({slidesToShow: 6, responsive: [{

            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                infinite: true
            }

        }, {

            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            }

        }, {

            breakpoint: 400,
            settings: {
                slidesToShow: 1,
            }

        }]})
})
