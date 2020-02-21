$(document).ready(function () {
	$('.div1').children().css('border','3px solid orange')
	$('.div1').find('.p1').css('border','3px solid orange')

	// $('.p2').parent().css('border','3px solid orange');
	$('.p2').parents().css('border','3px solid orange');
});
