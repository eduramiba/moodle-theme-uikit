/*!
 * Theme UIkit
 *
 * Copyright (c) 2013-2014 Eduardo Ramos
 * Licensed under GNU GPL v3 or later
 *
 */

(function($){
	$(document).ready(function() {
		$(window).scroll(function() {
			if ( $(this).scrollTop() > 550) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		});
		
		$('#da-slider').cslider({
			autoplay	: true,
			interval : 6000
		});
	});
})(jQuery);