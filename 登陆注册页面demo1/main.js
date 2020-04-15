$(document).ready(function () {
	$(".login").click(function() {
		$("switch span").removeClass("active");
		$(this).addClass("active");
		$(this).parents("content").removeClass(".signup");
		$(this).parents("content").addClass(".login");
	})
	$(".signup").click(function() {
		$("switch span").removeClass("active");
		$(this).addClass("active");
		$(this).parents("content").removeClass(".login");
		$(this).parents("content").addClass(".signup");
	})
});
