jQuery(function ($) {
    $(function() {

        $(window).scroll(function() {    // this will work when your window scrolled.
            var height = $(window).scrollTop();  //getting the scrolling height of window
            if(height  > 100) {
                $("#navWrap").css({"position": "fixed", "margin": "0 auto",
                "top": "0", "width": "100%"});
            } else{
                $("#navWrap").css({"position": "relative"});
            }
        });
    });    
});

jQuery(function($) {

	jQuery('.stellarnav').stellarNav({
		theme: 'plain', // adds default color to nav. (light, dark)
		breakpoint: 1000, // number in pixels to determine when the nav should turn mobile friendly
		menuLabel: '', // label for the mobile nav
		sticky: false, // makes nav sticky on scroll (desktop only)
		position: 'static', // 'static', 'top', 'left', 'right' - when set to 'top', this forces the mobile nav to be placed absolutely on the very top of page
		openingSpeed: 10, // how fast the dropdown should open in milliseconds
		closingDelay: 0, // controls how long the dropdowns stay open for in milliseconds
		showArrows: false, // shows dropdown arrows next to the items that have sub menus
		phoneBtn: '', // adds a click-to-call phone link to the top of menu - i.e.: "18009084500"
		phoneLabel: 'Call Us', // label for the phone button
		locationBtn: '', // adds a location link to the top of menu - i.e.: "/location/", "http://site.com/contact-us/"
		locationLabel: 'Location', // label for the location button
		closeBtn: false, // adds a close button to the end of nav
		closeLabel: 'Close', // label for the close button
		mobileMode: false,
		scrollbarFix: false // fixes horizontal scrollbar issue on very long navs
	  });
	
});