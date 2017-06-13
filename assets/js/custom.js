jQuery(window).load(function() {
        if(jQuery('#slider') > 0) {
        jQuery('.nivoSlider').nivoSlider({
            effect:'fade',
    });
        } else {
            jQuery('#slider').nivoSlider({
            effect:'fade',
    });
        }
});


    


jQuery(document).ready(function() { 
   jQuery('.owl-carousel').owlCarousel({
    loop:true,  
    margin:10,
    autoplay:true,   
    nav:true,
    smartSpeed:250,   
    responsive:{
        0:{
            items:1
        },

        600:{
            items:1
        },

        1000:{
            items:1
        }
    }
})
});

;(function($) {

   'use strict'

    
    var tabs = function() {
        $('.tabs').each(function() {
            var el = $(this);
            el.find('.content').hide();
            el.find('.menu-tab > li').on('click', function(e) {
                var liActive = $(this).index();
                var contentActive = $(this).parents('.tabs').find('.content').eq(liActive);

                $(this).addClass('active').siblings().removeClass('active');
                contentActive.fadeIn().siblings().hide();

                e.preventDefault();
            }).filter('.active').trigger('click');
        });
    };
  var postsCarousel = function() {
        if ( $().owlCarousel ) {
            var container = $('.roll-posts-carousel12');
            var imgLoad = imagesLoaded(container);
            imgLoad.on( 'always', function() {
                container.each(function(){
                        var $this = $(this);
                        $this.find('.owl-carousel12').owlCarousel({
                            autoplay: $this.data('auto'),
                            loop: true,
                            margin: 20,
                            dots: false,
                            nav: true,
                            autoplayTimeout: $this.data('speed'),
                            autoHeight: true,
                            navText: [ "<i class='fa fa-angle-left fa-3x'></i>",
        "<i class='fa fa-angle-right fa-3x'></i>" ],
                            responsive:{
                            0:{
                                items: 1
                            },
                            450:{
                                items: 2
                            },
                            991:{
                                items: $this.data('items')
                            }
                        }
                    });
                });
            });
        } // end if
    };

    var goTop = function() {
        $(window).scroll(function() {
            if ( $(this).scrollTop() > 600 ) {
                $('.go-top').addClass('show');
            } else {
                $('.go-top').removeClass('show');
            }
        }); 

        $('.go-top, .go-top2').on('click', function() {
            $("html, body").animate({ scrollTop: 0 }, 1000);
            return false;
        });

        $(window).on('load scroll', function() {
            $('.go-top2').each(function(e) {
                if ( this.getBoundingClientRect().top < $(window).height() ) {
                    $('.go-top').addClass('hide');
                    $('.go-top2').addClass('show');
                } else {
                    $('.go-top').removeClass('hide');
                    $('.go-top2').removeClass('show');
                }
            })
        }) 
    };

    var removePreloader = function() {
        $('.preloader').css('opacity', 0);
        setTimeout(function(){$('.preloader').hide();}, 600);   
    }






    // DOM Ready
    $(function() {
        tabs();
        postsCarousel();
       
    });

})(jQuery);