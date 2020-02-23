$(document).ready(function () {
	$('.product-color span').click(function() {
		$('.product-color span').removeClass("active");
		$(this).addClass("active");
		$('body').css('background', $(this).attr('data-color'));
		$('.product-price').css('color',$(this).attr('data-color'));
		$('.product-button').css('color',$(this).attr('data-color'));
		$('.product-pic').css('background-image',$(this).attr('data-pic'));
	})
});
