// 事件监听
window.addEventListener('scroll', function() {
	var header = document.querySelector('header');
	// .classList 返回一个元素集合
	// window.scrollY 返回文档从顶部开始滚动的像素值
	// toggle() 切换
	header.classList.toggle('stick',window.scrollY > 0);
})
