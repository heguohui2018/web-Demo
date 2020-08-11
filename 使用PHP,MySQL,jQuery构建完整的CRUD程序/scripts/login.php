<?php

global $connection;
global $error1, $error2, $error3, $error4, $error5,$error6;

if (isset($_POST['login'])) {
	$email_login = $_POST['email_login'];
	$pass_login = $_POST['password_login'];

	/* 过滤函数，返回过滤后的数据 ,第一个值为变量，第二个值为过滤器*/
	$email = filter_var($email_login, FILTER_VALIDATE_EMAIL);

	/* 对邮箱中的特殊字符进行转义 */
	$pass = mysqli_real_escape_string($connection, $pass_login);

	/* sql语句 */
	$sql_query = "select * from signup where email='{$email_login}'";

	$query = mysqli_query($connection, $sql_query);

	/* 查询结果计数 */
	$count = mysqli_num_rows($query);

	/* 检测连接是否成功 */
	if (!$query) {
		die("查询失败" . mysqli_errno($connection));
	}

	/* 检测登陆邮箱和登陆密码是否为空 */
	if (!empty($email_login) && ($pass_login)) {
		/* 正则表达式验证 */
		if (!preg_match('/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*S/', $pass_login)) {
			$error1 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>密码不正确</div>";
			$error2 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>密码必须在7-15位字符之间,必须包含大小写</div>";
		}

		/* 查询结果判断 */
		if ($count <= 0) {
			$error3 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>用户没有找到</div>";
		} else {
			/* 从结果集中取出一行 */
			while ($row = mysqli_fetch_row($query)) {
				/* 数据库中返回的值 */
				$id = $rwo['id'];
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$user_email = $row['email'];
				$user_password = $row['password'];
				/* 激活码 */
				$activation_key = $row['activation_key'];
				/* 是否激活 */
				$is_active = $row['is_active'];
			}

			/* crypt() 函数返回使用 DES、Blowfish 或 MD5 算法加密的字符串 */
			$password = crypt($pass, $user_password);

			/* 激活判断 */
			if ($is_active == '1') {
				if ($email == $user_email && $password == $user_password) {
					/* 重定向到 home页 */
					header('location:./user/home.php');

					$_SESSION['id'] = $id;
					$_SESSION['password'] = $password;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['email'] = $email;
					$_SESSION['actiation_key'] = $actiation_key;
				} else {
					$error3 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>用户没有找到</div>";
				}
			}else{
				$error6 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>对不起，你的账号未激活，不能登陆</div>";
			}
		}
	} else {
		/* 如果邮箱为空 */
		if (!empty($email_login)) {
			$error4 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>邮箱登陆失败不能为空</div>";
		/* 如果密码为空 */
		if (!empty($pass_login)) {
			$error5 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>密码登陆失败不能为空</div>";
		}
	}
}
