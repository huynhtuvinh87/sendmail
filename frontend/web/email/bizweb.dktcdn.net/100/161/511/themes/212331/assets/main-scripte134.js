$(document).ready(function() {
	new WOW().init();
});
(function($) { 
	"use strict"; 
	$('.carousel-boxed').owlCarousel({
		loop: false,margin: 30,nav: true,navText: ['', ''],dots: false,
		responsive:{
			0:{items: 1},
			480:{items: 2},
			768:{items: 2},
			992:{items: 3}
		}
	});
	$('.owl-best-sell').owlCarousel({
		autoplay: true,autoplayTimeout: 10000,loop: true,margin: 5,nav: true,navText: ['', ''],dots: false,
		responsive: {
			0:{items: 1},
			768:{items: 2},
			992:{items: 1}
		}
	});
	$('.slide-owl-collection').owlCarousel({
		autoplay: true,autoplayTimeout: 3000,loop: true,margin: 0,nav: true,navText: ['', ''],dots: false,
		responsive:{
			0:{items: 1},
			768:{items: 1},
			992:{items: 1}
		}
	});
	$('.carousel-boxed2').owlCarousel({
		loop: false,margin: 15,nav: true,navContainer: '.nav-outside',navClass: ['btn btn-square nav-outside-prev', 'btn btn-square nav-outside-next'],navText: ['<i class="icon-left-open-big"></i>', '<i class="icon-right-open-big"></i>'],dots: false,
		responsive:{
			0:{items: 1},
			480:{items: 2},
			768:{items: 2},
			1024:{items: 3}
		}
	});
	$('.carousel-boxed3').owlCarousel({
		loop: false,margin: 30,nav: true,navText: ['', ''],dots: false,
		responsive:{
			0:{items: 1},
			768:{items: 2},
			992:{items: 4}
		}
	});
	$('.clients').owlCarousel({
		autoplay: true,autoplayTimeout: 3000,loop: true,margin: 50,nav: false,dots: false,
		responsive: {
			0:{items: 2},
			480:{items: 3},
			768:{items: 5},
			1200:{items: 7}
		}
	});
	$('.testimonials3').owlCarousel({
		autoplay: true,autoplayTimeout: 5000,loop: true,margin: 0,nav: false,dots: false,items: 1
	});
	$('.basic-slider').owlCarousel({
	items: 1,nav: true,navText: ['', ''],dots: true,loop: true,margin: 0
	});
	$('.basic-carousel').owlCarousel({
		items: 3,nav: true,navText: ['', ''],dots: false,loop: false,margin: 0,autoWidth: false,
		responsive: {
			0:{items: 1},
			768:{items: 2},
			1441:{items: 3}
		}
	});
	$('.blog-carousel').owlCarousel({
		items: 5,nav: true,navText: ['', ''],dots: false,loop: false,margin: 0,autoWidth: false,
		responsive: {
			0:{items: 1},
			550:{items: 2},
			1026:{items: 3},
			1681:{items: 4},
			1921:{items: 5}
		}
	});

	jQuery("#bx-pager").owlCarousel({
		items : 4,
		itemsDesktop : [1024,4],
		itemsDesktopSmall : [900,4],
		itemsTablet: [600,4],
		itemsMobile : [320,4],nav : true,navText: ['', ''],slideSpeed : 500,pagination : false
	});

	(function ($) {
		"use strict";
		var tfs_close = $( ".tfs-close" );
		var tfs_wrap =  $(".tfs-wrap");
		var tfs_popup_bg =  $(".tfs-popup-bg");
		var popup_search = $(".popup-search");
		var search_popup = $( ".search-popup" );
		var search_close =  $( ".search-close" );
		tfs_close.click(function() {
			tfs_wrap.removeClass("tfs-popup-ready");
			tfs_popup_bg.removeClass("tfs-popup-ready");
		});
		tfs_popup_bg.click(function() {
			tfs_wrap.removeClass("tfs-popup-ready");
			tfs_popup_bg.removeClass("tfs-popup-ready");
			popup_search.removeClass("search-show");
		});
		search_popup.click(function() {
			popup_search.addClass("search-show");
			tfs_popup_bg.addClass("tfs-popup-ready");
		});
		search_close.click(function() {
			popup_search.removeClass("search-show");
			tfs_popup_bg.removeClass("tfs-popup-ready")
		});
	})(jQuery);
})(jQuery); 
/*-----------------------------------------------------------------------------------*/
/*	LOADING
/*-----------------------------------------------------------------------------------*/
$(window).load(function() {
	$(".carousel-wrapper:not(.wow)").css("visibility", "visible");
	$(".circle-progress-wrapper strong").css("visibility", "visible");
	$(".basic-carousel").css("visibility", "visible");
	$('#status').fadeOut();
	$('#preloader').delay(350).fadeOut('slow');
	$('body').delay(350).css({'overflow': 'visible'}); 
});
$(document).ready(function() {
	/*-----------------------------------------------------------------------------------*/
	/*	AJAXFORM
	/*-----------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------------------------------*/
	/* WIDTH CLASS
	/*-----------------------------------------------------------------------------------*/
	assign_bootstrap_mode();
	$(window).resize(function() {
		assign_bootstrap_mode();
	});
	function assign_bootstrap_mode() {
		width = $(window).width();
		var mode = '';
		if (width < 768) {
			mode = "mode-xs";
		} else if (width < 992) {
			mode = "mode-sm";
		} else if (width < 1200) {
			mode = "mode-md";
		} else if (width > 1200) {
			mode = "mode-lg";
		}
		$("body").removeClass("mode-xs").removeClass("mode-sm").removeClass("mode-md").removeClass("mode-lg").addClass(mode);
	}
	/*-----------------------------------------------------------------------------------*/
	/*	REVOLUTION
	/*-----------------------------------------------------------------------------------*/
	$('.tp-fullscreen').revolution({
		delay: 9000,
		startwidth: 1170,
		startheight: 750,
		hideThumbs: 200,
		hideArrowsOnMobile: "off",
		fullWidth: "on",
		fullScreen: "on",
		soloArrowLeftHOffset: 0,
		soloArrowRightHOffset: 0,
		fullScreenOffsetContainer: ".mode-xs .navbar"
	});
	$('.tp-fullwidth').revolution({
		delay: 9000,
		startwidth: 1170,
		startheight: 650,
		hideThumbs: 200,
		hideArrowsOnMobile: "off",
		fullWidth: "on",
		fullScreen: "off",
		soloArrowLeftHOffset: 0,
		soloArrowRightHOffset: 0
	});
	$('.tp-banner').revolution({
		delay: 9000,
		startwidth: 1170,
		startheight: 550,
		hideThumbs: 200,
		hideArrowsOnMobile: "off",
		fullWidth: "off",
		fullScreen: "off",
		soloArrowLeftHOffset: 0,
		soloArrowRightHOffset: 0
	});
	/*-----------------------------------------------------------------------------------*/
	/*	MODAL
	/*-----------------------------------------------------------------------------------*/
	$("#contact-info-button, .btn-pricing").animatedModal({
		modalTarget: 'contact-info',
		animatedIn: 'lightSpeedIn',
		animatedOut: 'bounceOutDown',
		animationDuration: '0.6s',
		color: 'rgba(252, 252, 252, 0.97)'
	});
	/*-----------------------------------------------------------------------------------*/
	/*	STICKY HEADER
	/*-----------------------------------------------------------------------------------*/
	var menu = $('.navbar'),
		pos = menu.offset();
	$(window).scroll(function() {
		if ($(this).scrollTop() > pos.top + menu.height() && menu.hasClass('default') && $(this).scrollTop() > 300) {
			menu.fadeOut('fast', function() {
				$(this).removeClass('default').addClass('fixed').fadeIn('fast');
			});
		} else if ($(this).scrollTop() <= pos.top + 300 && menu.hasClass('fixed')) {
			menu.fadeOut(0, function() {
				$(this).removeClass('fixed').addClass('default').fadeIn(0);
			});
		}
	});
	/*-----------------------------------------------------------------------------------*/
	/*	MENU
	/*-----------------------------------------------------------------------------------*/
	$('.js-activated').dropdownHover({
		instantlyCloseOthers: false,
		delay: 0
	}).dropdown();
	$('.dropdown-menu a, .social .dropdown-menu, .social .dropdown-menu input').click(function(e) {
		e.stopPropagation();
	});
	$('.btn.responsive-menu').on('click', function() {
		$(this).toggleClass('opn');
	});
	$('.navbar .nav li a').on('click', function() {
		$('.navbar .navbar-collapse.in').collapse('hide');
		$('.btn.responsive-menu').removeClass('opn');
	});
	if ($(window).width() < 992) {
		$('#h4-mobile-display').on('click', function(e){
			e.preventDefault();
			var $this = $(this);
			$this.parents('#widget-display-mobile').find('.cat-list-hasicon').stop().slideToggle();
			$(this).toggleClass('active');
			return false;
		});
		$('.open-close').on('click', function(e){
			e.preventDefault();
			var $this = $(this);
			$this.parents('.level00').find('.hide-menu-left').stop().slideToggle();
			$(this).toggleClass('active')
			return false;
		});
		$('.open-closes').on('click', function(e){
			e.preventDefault();
			var $this = $(this);
			$this.parents('.vl-000').find('.col-menu_child').stop().slideToggle();
			$(this).toggleClass('active')
			return false;
		});
		$('.open-close-menu').on('click', function(e){
			e.preventDefault();
			var $this = $(this);
			$this.parents('.dropdown').find('.dropdown-menu').stop().slideToggle();
			$(this).toggleClass('active')
			return false;
		});
	}
	$('.mobile-but').on('click', function(e){
		e.preventDefault();
		var $this = $(this);
		$this.parents('#filter-mobile').find('.filter-container').stop().slideToggle();
		return false;
	});
	/*-----------------------------------------------------------------------------------*/
	/*	IMAGE ICON HOVER
	/*-----------------------------------------------------------------------------------*/
	$('.icon-overlay a').prepend('<span class="icn-more"></span>');
	/*-----------------------------------------------------------------------------------*/
	/*	TABS
	/*-----------------------------------------------------------------------------------*/
	$('.tabs.tabs-top').easytabs({
		animationSpeed: 300,
		updateHash: false
	});
	$('.tabs.tabs-bottom').easytabs({
		animationSpeed: 300,
		updateHash: false,
		cycle: 5000
	});
	/*-----------------------------------------------------------------------------------*/
	/*	TOGGLE
	/*-----------------------------------------------------------------------------------*/
	$('.panel-group').find('.panel-default:has(".in")').addClass('panel-active');
	$('.panel-group').on('shown.bs.collapse', function(e) {
		$(e.target).closest('.panel-default').addClass(' panel-active');
	}).on('hidden.bs.collapse', function(e) {
		$(e.target).closest('.panel-default').removeClass(' panel-active');
	});
	/*-----------------------------------------------------------------------------------*/
	/*	PARALLAX MOBILE
	/*-----------------------------------------------------------------------------------*/
	if (navigator.userAgent.match(/Android/i) ||
		navigator.userAgent.match(/webOS/i) ||
		navigator.userAgent.match(/iPhone/i) ||
		navigator.userAgent.match(/iPad/i) ||
		navigator.userAgent.match(/iPod/i) ||
		navigator.userAgent.match(/BlackBerry/i)) {
		$('.parallax').addClass('mobile');
	}
	/*-----------------------------------------------------------------------------------*/
	/*	DATA REL
	/*-----------------------------------------------------------------------------------*/
	$('a[data-rel]').each(function() {
		$(this).attr('rel', $(this).data('rel'));
	});
	/*-----------------------------------------------------------------------------------*/
	/*	COMMENT FORM PLACEHOLDERS
	/*-----------------------------------------------------------------------------------*/
	$('.comment-form input[title], .comment-form textarea').each(function() {
		if ($(this).val() === '') {
			$(this).val($(this).attr('title'));
		}
		$(this).focus(function() {
			if ($(this).val() == $(this).attr('title')) {
				$(this).val('').addClass('focused');
			}
		});
		$(this).blur(function() {
			if ($(this).val() === '') {
				$(this).val($(this).attr('title')).removeClass('focused');
			}
		});
	});
	/*-----------------------------------------------------------------------------------*/
	/*	LOCALSCROLL
	/*-----------------------------------------------------------------------------------*/
	$('.navbar, .scroll').localScroll({
		hash: true
	});
	/*-----------------------------------------------------------------------------------*/
	/*	TOOLTIP
	/*-----------------------------------------------------------------------------------*/
	if ($("[rel=tooltip]").length) {
		$("[rel=tooltip]").tooltip();
	}
	/*-----------------------------------------------------------------------------------*/
	/*	PRETTIFY
	/*-----------------------------------------------------------------------------------*/
	window.prettyPrint && prettyPrint()
});
$(function() {
	/*-----------------------------------------------------------------------------------*/
	/*	SCROLL NAVIGATION HIGHLIGHT
	/*-----------------------------------------------------------------------------------*/
	headerWrapper = parseInt($('.navbar').height(), 10);
	var header_height = $('.navbar').height();
	var shrinked_header_height = 68;
	$('.onepage section').css('padding-top', shrinked_header_height + 'px');
	$('.onepage section').css('margin-top', -(shrinked_header_height) + 'px');
	$('.onepage section:first-of-type').css('padding-top', header_height + 'px');
	$('.onepage section:first-of-type').css('margin-top', -(header_height) + 'px');
	offsetTolerance = -(header_height);
	//Detecting user's scroll
	$(window).scroll(function() {
		//Check scroll position
		scrollPosition = parseInt($(this).scrollTop(), 10);
		//Move trough each menu and check its position with scroll position then add current class
		$('.onepage .navbar ul a').each(function() {
			thisHref = $(this).attr('href');
			thisTruePosition = parseInt($(thisHref).offset().top, 10);
			thisPosition = thisTruePosition - headerWrapper - offsetTolerance;
			if (scrollPosition >= thisPosition) {
				$('.current').removeClass('current');
				$('.navbar ul a[href=' + thisHref + ']').parent('li').addClass('current');
			}
		});
		//If we're at the bottom of the page, move pointer to the last section
		bottomPage = parseInt($(document).height(), 10) - parseInt($(window).height(), 10);
		if (scrollPosition == bottomPage || scrollPosition >= bottomPage) {
			$('.current').removeClass('current');
			$('.onepage .navbar ul a:last').parent('li').addClass('current');
		}
	});
});
equalheight = function(container){
	var currentTallest = 0,
		currentRowStart = 0,
		rowDivs = new Array(),
		$el,
		topPosition = 0;
	$(container).each(function() {
		$el = $(this);
		$($el).height('auto')
		topPostion = $el.position().top;
		if (currentRowStart != topPostion) {
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
			rowDivs.length = 0; // empty the array
			currentRowStart = topPostion;
			currentTallest = $el.height();
			rowDivs.push($el);
		} else {
			rowDivs.push($el);
			currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
		}
		for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
			rowDivs[currentDiv].height(currentTallest);
		}
	});
}
$(window).load(function() {
	equalheight('.product-content.product-no-padding .item');
});
$(window).resize(function(){
	equalheight('.product-content.product-no-padding .item');
});
$(window).load(function() {
	equalheight('.search-results .col-lg-15 .item');
});
$(window).resize(function(){
	equalheight('.search-results .col-lg-15 .item');
});
$(window).load(function() {
	equalheight('.blog_search_img .boxs');
});
$(window).resize(function(){
	equalheight('.blog_search_img .boxs');
});
jQuery(function() {
	jQuery('.swatch :radio').change(function() {
		var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
		var optionValue = jQuery(this).val();
		jQuery(this)
			.closest('form')
			.find('.single-option-selector')
			.eq(optionIndex)
			.val(optionValue)
			.trigger('change');
	});
});