// Sidebar Toggle Menu
jQuery(function($) {
"use strict";
    $('.nav-toggle').click(function() {
    $('#wrapper').toggleClass('show-nav');
    $('#canvas').toggleClass('show');
    $('.nav-toggle').toggleClass('fa-toggle-on');
        return false;
    });
});

// Homepage Responsive Toggle Menu
jQuery(document).ready(function($) {
"use strict";
    $('#mobile-menu-container').hide();
        $('.mobile-nav-toggle').click(function(e) {
    $('#mobile-menu-container').slideToggle(250);

        return false;
    });
});

// Close Toggle on Window Width
jQuery(document).ready(function($) {
"use strict";
 $(window).resize(function(){
            var w = $(window).width();
            if(w > 960) {
                $('#mobile-menu-container').hide();
            }
        });
    });

// Flex Slider 
jQuery(function($) {
"use strict";
		$(window).load(function() {
		  $('.flexslider').flexslider({
		      animation: "slide",
		      controlNav: false,
		      directionNav: true,
		      randomize: false,
		      touch: true
		  });
	   });
    });

