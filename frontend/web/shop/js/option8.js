(function ($) {
    "use strict"; // Start of use strict
    /* ---------------------------------------------
     Scripts scroll
     --------------------------------------------- */
    $(window).scroll(function () {
        /* Show hide scrolltop button */
        /* Main menu on top */
        var h = $(window).scrollTop();
        var width = $(window).width();
        if (width > 767) {
            if (h > 35) {
                $('#main-header').addClass('main-header-ontop');
            } else {
                $('#main-header').removeClass('main-header-ontop');
            }
        }
    });

    $(document).ready(function () {
        $('.bxslider-background').bxSlider({
            useCSS: false,
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>',
            auto: true,
            onSliderLoad: function (currentIndex) {
                var current = $('.bxslider-background > li').eq(currentIndex);
                setTimeout(function () {
                    //current.find('.sl-description').show();
                    current.find('.caption').each(function () {
                        $(this).show().addClass('animated fadeInDown');
                    })
                }, 1000);
            },
            onSlideBefore: function (slideElement, oldIndex, newIndex) {
                //slideElement.find('.sl-description').hide();
                slideElement.find('.caption').each(function () {
                    $(this).hide().removeClass('animated fadeInDown');
                });
            },
            onSlideAfter: function (slideElement, oldIndex, newIndex) {
                //slideElement.find('.sl-description').show();
                setTimeout(function () {
                    slideElement.find('.caption').each(function () {
                        $(this).show().addClass('animated fadeInDown');
                    });
                }, 500);
            }
        });


        // Tab
        $(document).on('click', '.block-tab-products .nav-tab a', function () {
            var time = 0;
            var id = $(this).attr('href');
            $(id).find('.products-style8 .product').each(function (i) {
                $(this).attr("style",
                        "-webkit-animation-delay:" + i * 300 + "ms;"
                        + "-moz-animation-delay:" + i * 300 + "ms;"
                        + "-o-animation-delay:" + i * 300 + "ms;"
                        + "animation-delay:" + i * 300 + "ms;").addClass('fadeInUp animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    $(this).removeClass('fadeInUp animated');
                    $(this).removeAttr('style');
                });
            })
        })
        //testimonial-carousel
        if ($('.testimonial-carousel').length > 0) {
            var owl = $('.testimonial-carousel');
            owl.owlCarousel(
                    {
                        margin: 30,
                        autoplay: false,
                        dots: false,
                        loop: true,
                        items: 3,
                        nav: true,
                        smartSpeed: 1000,
                        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
                    }
            );
            owl.trigger('next.owl.carousel');
            owl.on('changed.owl.carousel', function (event) {
                owl.find('.owl-item.active').removeClass('item-center');
                var caption = owl.find('.owl-item.active').first().prev().find('.info').html();
                owl.closest('.block-testimonials').find('.testimonial-caption').html(caption).addClass('zoomIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    $(this).removeClass('zoomIn animated');
                });
                ;
                setTimeout(function () {
                    owl.find('.owl-item.active').first().next().addClass('item-center');
                    owl.find('.owl-item.active').first().next().addClass('zoomIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                        $(this).removeClass('zoomIn animated');
                    });
                }, 100);
            })
        }

        //
        $(document).on('click', '.header8 .form-search .icon', function () {
            $(this).closest('.form-search').find('.form').fadeIn(600);
        })
        $(document).on('click', '.header8 .form-search .close-form', function () {
            $(this).closest('.form').fadeOut(600);
        })
    });


})(jQuery); // End of use strict

(function ($) {

    $.fn.rating = function (method, options) {
        method = method || 'create';
// This is the easiest way to have default options.
        var settings = $.extend({
// These are the defaults.
            limit: 5,
            value: 0,
            glyph: "glyphicon-star",
            coloroff: "gray",
            coloron: "gold",
            size: "2.0em",
            cursor: "default",
            onClick: function () {},
            endofarray: "idontmatter"
        }, options);
        var style = "";
        style = style + "font-size:" + settings.size + "; ";
        style = style + "color:" + settings.coloroff + "; ";
        style = style + "cursor:" + settings.cursor + "; ";



        if (method == 'create')
        {
//this.html('');	//junk whatever was there

//initialize the data-rating property
            this.each(function () {
                attr = $(this).attr('data-rating');
                if (attr === undefined || attr === false) {
                    $(this).attr('data-rating', settings.value);
                }
            })

//bolt in the glyphs
            for (var i = 0; i < settings.limit; i++)
            {
                this.append('<span data-value="' + (i + 1) + '" class="ratingicon glyphicon ' + settings.glyph + '" style="' + style + '" aria-hidden="true"></span>');
            }

//paint
            this.each(function () {
                paint($(this));
            });

        }
        if (method == 'set')
        {
            this.attr('data-rating', options);
            this.each(function () {
                paint($(this));
            });
        }
        if (method == 'get')
        {
            return this.attr('data-rating');
        }
//register the click events
        this.find("span.ratingicon").click(function () {
            rating = $(this).attr('data-value')
            $(this).parent().attr('data-rating', rating);
            paint($(this).parent());
            settings.onClick.call($(this).parent());
        })
        function paint(div)
        {
            rating = parseInt(div.attr('data-rating'));
            div.find("input").val(rating);	//if there is an input in the div lets set it's value
            div.find("span.ratingicon").each(function () {	//now paint the stars

                var rating = parseInt($(this).parent().attr('data-rating'));
                var value = parseInt($(this).attr('data-value'));
                if (value > rating) {
                    $(this).css('color', settings.coloroff);
                } else {
                    $(this).css('color', settings.coloron);
                }
            })
        }

    };

}(jQuery));