(function($) {
	//move-to-top arrow
	$("body").prepend("<div id='move-to-top' class='animate mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent'><i class='material-icons'>expand_less</i></div>");
	var scrollDes = 'html,body';
	if(navigator.userAgent.match(/opera/i)){
		scrollDes = 'html';
	}
	//show ,hide
	$(window).scroll(function () {
		if ($(this).scrollTop() > 500) {
			$('#move-to-top').addClass('filling').removeClass('hiding');
		} else {
			$('#move-to-top').removeClass('filling').addClass('hiding');
		}
	});
	// scroll to top when click 
	$('#move-to-top').click(function () {
		$(scrollDes).animate({ 
			scrollTop: 0
		},{
			duration :500
		});
	});
})(jQuery);