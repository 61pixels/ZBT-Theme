// Custom Foundation app.js 
;(function ($, window, undefined) {
  'use strict';
  var $doc = $(document),
  Modernizr = window.Modernizr;  

  // Hide address bar on mobile devices
  if (Modernizr.touch) {
    $(window).load(function () {
      setTimeout(function () {
        window.scrollTo(0, 1);
      }, 0);
    });
  }

})(jQuery, this);

jQuery(document).ready(function($) {
	// custom navigation for mobile phones and small resolutions
	$('#nav-mobile-togg').click(function(){
        $('.main-nav').slideToggle();
        $(this).toggleClass("open");
    });
	
	$('.main-nav .menu>li').has('ul').prepend('<span class="nav-click"><i class="nav-arrow"></i></span>');
    
    $('.main-nav .menu').on('click', '.nav-click', function(){
      $(this).toggleClass('open'); 
      $(this).siblings('.sub-menu').toggleClass('open'); 
      $(this).siblings('.sub-menu').slideToggle('fast');  
      $(this).children('.nav-arrow').toggleClass('nav-rotate');
    });

    // auto open sub menu if you're on a child page OR parent page?
  	if ($('#nav-mobile-togg').css('display') == "block" ){ // only code should only run on mobile menu view
	    $('.main-nav .menu>li.current-page-parent').each(function(index, element) {    	
			$(element).find('.nav-click').toggleClass('open'); 
			$(element).find('.sub-menu').toggleClass('open'); 
			$(element).find('.sub-menu').slideToggle('fast');  
			$(element).find('.nav-arrow').toggleClass('nav-rotate');    	
	    });
	};
	
	// flexslider
	if ( $('.featured-hero .slides').length ) { //do something 		
		$('.flexslider').flexslider({
			animation: "slide",
			animationSpeed: 400,  
    	    slideshowSpeed: 7000, //Integer: Set the speed of the slideshow cycling, in milliseconds
    	    smoothHeight: true,
			controlNav: false,
			pauseOnHover: true,
			pauseOnAction: true,
			useCSS: false,
			randomize: true,
			keyboard: true,
    		customDirectionNav: ".zbt-flex-nav a"
		  });			
	}
	// contact form infield
	if ( $('.infield label').length ) { //do something 
		$('.infield label').inFieldLabels(); 
	}
	
	// fade images on hover
	$('a img').hover( function() {
		$(this).stop().animate({opacity : 0.8}, 300);
	}, function() {
		$(this).stop().animate({opacity : 1}, 300);
	});
	
	// update hrs to use custom div
	$('hr').replaceWith('<div class="hr"></div>');
	
	// alt rows on marked tables
	$(".alt-row tr:odd").addClass("alt");
	
	// fit vids in content area
	$('.p-content').fitVids();
	
	// lets do some custom equal height columns
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
	  equalheight('.extra-cats .extra-grid-content');
	});

	$(window).resize(function(){
	  equalheight('.extra-cats .extra-grid-content');
	});


	var n=$("#nav-search-menu, #nav-archive-menu, #nav-issue-menu"), // these are the mega-menu elements
	o=$("#nav-search, #nav-archive, #nav-issue"); // these are the navigation elements
	$iconlink=o.find("a"),
	$closeButton=$(".nav-close"),
	n.hide(),
	o.click(function(i){
		var s;
		i.preventDefault(),
		o.removeClass("open"),
		$iconlink.removeClass("current-link"),
		s=$("#"+this.id+"-menu"),
		n.slideUp(200),
		s.is(":visible")||(s.slideDown(350),
		$(this).addClass("open"),
		$(this).find("a").addClass("current-link")),
		$closeButton.click(function($){
			$.preventDefault(),
			n.slideUp(),
			$iconlink.removeClass("current-link")
		})
	})


});

