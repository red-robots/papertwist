/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});

	/*
	*
	*	Responsive iFrames
	*
	------------------------------------*/
	var $all_oembed_videos = $("iframe[src*='youtube']");
	
	$all_oembed_videos.each(function() {
	
		$(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
 	
 	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
		smoothHeight: true,
		controlNav: false,
		directionNav: false, 
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery, .woocommerce-product-gallery__image a').colorbox({
		rel:'gal',
		maxWidth: '95%',
		maxHeight: '95%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

	$('.hide-field .search-icon').click(function(e){
		e.preventDefault();
		$(".topsearchform").removeClass('hide-field').addClass('show-field');
		$(".topsearchform input.searchfield").focus();
	});

	$(document).on("click",".closemenu",function(){
		$('body').toggleClass('open-menu');
		$('.mobilemenuwrap').toggleClass('open');
	});

	$(document).on("click",".sbprodcatname",function(){
		$(this).parents(".product-cat-parent").find('ul.termchildren').slideToggle("fast");
	});

});// END #####################################    END