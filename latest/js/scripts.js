/*
** Limit menu number of lists
*/
var full_width = 0;

jQuery(".container ul:first > li").each(function( index ) {
	if((jQuery(this).width() + full_width) > 750) {
		jQuery(this).remove();
	}
	full_width = full_width + jQuery(this).width();
});

/*
** FancyBox
*/
jQuery(document).ready(function($) {
	$(".fancybox").fancybox();
});

/*
** Masonry
*/
jQuery(document).ready(function($) {

	var $container = $('.gallery');

	$container.imagesLoaded( function(){
		$container.masonry({
			itemSelector : 'dl.gallery-item'
		});
	});
});

/*
** Masonry
*/
jQuery(document).ready(function($) {

	var $container = $('.testimonial-container');

	$container.imagesLoaded( function(){
		$container.masonry({
			itemSelector : '.testimonial'
		});
	});
});

/*
** Responsive Menu
*/
jQuery(document).ready(function($) {
	$('.openresponsivemenu').click(function() {
		$('nav').toggleClass("responsivemenu");
	});
});