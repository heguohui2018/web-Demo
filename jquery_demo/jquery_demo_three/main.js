$(document).ready(function () {
	$('.m').css('background', 'yellow');
	$('p').css('color', 'red');

	// 添加一个类去使用css中的样式，作用在元素上
	$('div').addClass('changeRed');
	$('p').addClass('changeRed');

	// 隐藏元素
	$('.a').hide();

	// 可以延迟元素消失时间，需要指定时间
	$('.b').fadeOut(500);

	// 淡入
	$('.c').fadeIn(2000).css('color','orange');

	$('.d').slideUp(1000).css('color','red');

	$('.d').slideDown(1000);
});
