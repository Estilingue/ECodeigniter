$(function() {
	
	var headerHeight = $('header').height();
	var delay = 500;
	
	$('html, body').animate({
		scrollTop: $('#oque_e').offset().top - headerHeight
	}, delay);
	
	$('#oq').bind('click', function(e) {
		e.preventDefault();

		var scrollToPosition = $('#oque_e').offset().top - headerHeight;
		
		$('html, body').animate({
			scrollTop: scrollToPosition
		}, delay, function() {
			$('.menu li').removeClass('active');
			$('.menu li a#oq').parent().addClass('active');
		});
	});
	
	$('#cf, #goto_como_funciona').bind('click', function(e) {
		e.preventDefault();

		var scrollToPosition = $('#como_funciona').offset().top - headerHeight;
		
		$('html, body').animate({
			scrollTop: scrollToPosition
		}, delay, function() {
			$('.menu li').removeClass('active');
			$('.menu li a#cf').parent().addClass('active');
		});
	});
	
});