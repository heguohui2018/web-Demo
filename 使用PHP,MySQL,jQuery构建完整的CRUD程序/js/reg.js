$(document).ready(function () {
	$('#submit').click(function (e) {
		// 点击按钮时阻止表单数据的提交
		e.preventDefault();

		// obj.val() 返回选择元素的值
		var email = $('#email').val();
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var password = $('#password').val();
		
		var valid = true;
		
		if (email == "" || isEmailvalid(email)) 
		{
			valid = false;
			$("#errorEmail").html("邮箱不能为空");
		} else
		{
			$("#errorEmail").html("");
		}
		

		if (firstname == "" || !isNameValid(firstname))
		{
			valid = false;
			$("#errorFirstname").html("第一个名字不能为空");
		} else
		{
			$("#errorFirstname").html("");
		}
		
		
		if (lastname == "" || !isNameValid(lastname))
		{
			valid = false;
			$("#errorLastname").html("最后个名字不能为空");
		} else
		{
			$("#errorLastname").html("");
		}

		
		if (password == "" || isPasswordValid(password))
		{
			valid = false;
			$("#errorPassword").html("密码不能为空")
		} else
		{
			$("#errorPassword").html("")
		}

		if (valid == true)
		{
			var form_data ={
				firstname: firstname,
				lastname: lastname,
				email: email,
				password: password
			};

			$.ajax({
				url: "../scripts/insert.php",
				type: "POST",
				data: form_data,
				success: function (data) {
				}
			});
			
		}
	});
});

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
