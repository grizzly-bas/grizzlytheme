(function($) {
    $(document).ready(function(){
        $('#back-to-top').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
        
        $('.gm-click').live("click", function(e) {
            e.preventDefault();
            var val = $(this).data('id');
            $('#' + val).toggleClass('toggle');
            $(this).toggleClass('toggle');
        });

        $('.sub-menu-items-button').on("click", function(e) {
            $(this).parent().children('.sub-menu').toggleClass('toggle');
            $(this).toggleClass('toggle');
        });

        
        menuWrap();
    });

    $( window ).resize(menuWrap);

    function menuWrap() {
        var lastWindowWidth = 0;
        var windowWidth = $(window).width();
        var menuWidth = $('#menu-hoofdmenu').width();

        if (windowWidth >= lastWindowWidth) {
            lastWindowWidth = windowWidth;
        }

        if((windowWidth < menuWidth)) {
            if (!$('#menu-hoofdmenu > li.wrap-menu').length) {
                $('#menu-hoofdmenu').append('<li class="menu-item wrap-menu"><a href="#" class="gm-click" data-id="menu-items-wrap"><i class="fas fa-bars"></i></a></li>');
                console.log('kleiner');
            }

            $( "#menu-items-wrap > ul" ).prepend( $( "#menu-hoofdmenu > li.menu-item:nth-last-child(2)" ) );
            
        } else if (windowWidth >= menuWidth + 100) {
            $('#menu-hoofdmenu > li.menu-item:nth-last-child(2)').after($('#menu-items-wrap > ul > li.menu-item:first-child'));
            console.log('groter');
        }
    }

    $(window).on("scroll", function() {
        if($(window).scrollTop() > 20) {
            $('[data-scroll="add-class"]').addClass('scrolled');
        } else {
            $('[data-scroll="add-class"]').removeClass('scrolled');
        }
    });

    
})( jQuery );