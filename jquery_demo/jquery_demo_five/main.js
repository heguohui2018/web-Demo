// 公告栏在可见的时候点击按钮会隐藏，隐藏的时候点击按钮会显示
$(document).ready(function () {
	var cardTrigger = $('.card-trigger1');
	var card1 = $('.card1');
	cardTrigger.on('click', function () {
		if (card1.is(':visible')) {
			card1.hide();
		} else {
			card1.show();
		}
	});

	var cardTrigger2 = $('.card-trigger2');
	var card2 = $('.card2');
	cardTrigger2.on('click', function () {
		if (card2.is(':visible')) {
			// 滑动向上隐藏
			card2.slideUp(500);
		} else {
			// 滑动向下显示
			card2.slideDown(500);
		}
	});

});

