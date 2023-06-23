// Small misc functions not worth creating another file for.
var $ = jQuery.noConflict();

//Get window width
var window_widht = $(window).width();

/* Script on ready
------------------------------------------------------------------------------*/
$( document ).ready( function() {
	//do jQuery stuff when DOM is ready

	if($('.header-site-info').length > 0){
		var header_site_info = $('.header-site-info');
		$(header_site_info).children('button').click(function(){
			$(this).toggleClass("is-open");
		})
	}
} );

/* Script on load
------------------------------------------------------------------------------*/
$( window ).on( 'load', function() {
} );

/* Script on scroll
------------------------------------------------------------------------------*/
$( window ).on( 'scroll', function() {
} );

/* Script on resize
------------------------------------------------------------------------------*/
$( window ).on( 'resize', function() {
} );

/* Script all functions
------------------------------------------------------------------------------*/