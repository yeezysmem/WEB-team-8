$('.gallery').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1
  });

  $('.video-slider').slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1
  });

  $(document).ready(function() {

	/* This is basic - uses default settings */
	
	$("a#single_image").fancybox();
	
	/* Using custom settings */
	
	$("a#inline").fancybox({
		'hideOnContentClick': true
	});

	/* Apply fancybox to multiple items */
	
	$("a.group").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
	
});

