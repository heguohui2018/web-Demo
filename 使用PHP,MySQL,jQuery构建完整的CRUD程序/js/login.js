$(document).ready(function () {
	$('#login').click(function () {

		// obj.val() 返回获取元素的值
		var email = $('#email_login').val();
		var password = $('#password_login').val();
		
		var valid = true;
		
		// 进行邮箱验证
		// 满足条件中的任意一条
		if (email == "" || isEmailvalid(email)) 
		{
			valid = false;
			$("#error_Email").html("邮箱不能为空");
		} else
		{
			$("#error_Email").html("");
		}
		
		// 进行密码验证
		if (password == "" || isPasswordValid(password))
		{
			valid = false;
			$("#error_Password").html("密码不能为空")
		} else
		{
			$("#error_Password").html("")
		}

		
		// ajax请求
		if (valid == true)
		{
			var login_data = {
				email: email,
				password: password
			};

			$.ajax({
				url: "../scripts/login.php",
				type: "POST",
				data: login_data,
				success: function (data, textStatus, jqxhr) {
					console.log("__成功__");
					console.log(data);
					console.log(textStatus);
					console.log(jqxhr);
					console.log("______");
				}
			});
			
		}
	});
});

// 验证规则
function isNameValid(name) {
	return /[A-Z]+ /i.test(name) && /[a - z] + /.test(name) && /\S{7, 15}+/.test(name);
}

function isEmailvalid(emailAddress) {
	var pattern = "/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/ ";
	return pattern.test(emailAddress);
}

function isPasswordValid(string) {
	return /(A-Z)+/.test(string) && /(a-z)+/.test(string) && /[\d\W]/.test(string) && /\S{7,15}/.test(string);
}
