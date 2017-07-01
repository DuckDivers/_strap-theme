(function($) {
"use strict";
	$('ul.nav li.dropdown').hover(function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
	}, function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	});
	
	$("#header-2").hide(); // hide the fixed navbar initially
	
	var topofDiv = $("#masthead").offset().top; //gets offset of header
	var height = $("#masthead").outerHeight(); //gets height of header
	
	if ($(window).width() > 768){
		$(window).scroll(function(){
			if($(window).scrollTop() > (topofDiv + height)){
			   $("#header-2").fadeIn(500);
			}
			else{
			   $("#header-2").hide();
			}
		});
	}
	$('.btn.btn-primary').addClass('hvr-outline-in');

	//Dropdown cart in header
		$('.cart-holder > h3').click(function(){
			if($(this).hasClass('cart-opened')) {
				$(this).removeClass('cart-opened').next().slideUp(300);
			} else {
				$(this).addClass('cart-opened').next().slideDown(300);
			}
		});
						
})( jQuery );

// ---------------------------------------------------------
// Back to Top
// ---------------------------------------------------------
	jQuery(window).scroll(function () {
		if (jQuery(this).scrollTop() > 100) {
			jQuery('#back-top').fadeIn('fast', function(){
				clearTimeout(jQuery.data(this, 'scrollTimer'));
    				jQuery.data(this, 'scrollTimer', setTimeout(function() {
       		 jQuery('#back-top').delay(2000).fadeOut('slow');// do something after 2s
	    		}, 2000));
			});
		} else {
			jQuery('#back-top').fadeOut();
		}
	});
	jQuery('#back-top a').click(function () {
		jQuery('body,html').stop(false, false).animate({
			scrollTop: 0
		}, 800);
		return false;
	});
