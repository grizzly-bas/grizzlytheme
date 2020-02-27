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
            var animate = $(this).data('animate');
            if (animate == 'slide') {
                $('#' + val).slideToggle('toggle');
            } else {
                $('#' + val).toggleClass('toggle');
            }
            
            $(this).toggleClass('toggle');
        });

        $('.sub-menu-items-button').on("click", function(e) {
            $(this).parent().children('.sub-menu').slideToggle();
            $(this).toggleClass('toggle');
        });
    });

    $(window).on("scroll", function() {
        if($(window).scrollTop() > 20) {
            $('[data-scroll="add-class"]').addClass('scrolled');
        } else {
            $('[data-scroll="add-class"]').removeClass('scrolled');
        }
    });

    
})( jQuery );