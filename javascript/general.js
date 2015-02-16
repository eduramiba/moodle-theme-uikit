/*!
 * Theme UIkit
 *
 * Copyright (c) 2013-2014 Eduardo Ramos
 * Licensed under GNU GPL v3 or later
 *
 */

(function($) {
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 550) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });

        $("#navigationAccordionToggle").click(function(event) {
            event.preventDefault();
            $("#navigationAccordion").slideToggle();
        });
        
        $(window).resize(function() {
            if(this.resizeTO) clearTimeout(this.resizeTO);
            this.resizeTO = setTimeout(function() {
                $(this).trigger('resizeEnd');
            }, 300);
        });
        
        //Restore accordion visibility on window resize:
        $(window).bind('resizeEnd', function() {
            $("#navigationAccordion").attr('style', null);//Remove slideToggle display rule
        });
    });
})(jQuery);