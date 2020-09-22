$(document).ready(function() {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title');
            }
        }
    });
});

jQuery(window).load(function () {
    jQuery(".popup-gallery").each(function () {
        jQuery(this).slick({slidesToShow: 4, infinite:false,  responsive: [{

                breakpoint: 1023,
                settings: {
                    slidesToShow: 3,
                    infinite: true
                }

            }, {

                breakpoint: 767,
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
})