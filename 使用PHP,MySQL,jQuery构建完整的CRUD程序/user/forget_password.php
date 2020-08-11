<?php

/* 忘记密码，这个相当于html文件 */

/* 载入数据库配置 */
include('../config/db.php');
/* 载入处理逻辑 */
include('..//scripts/forget_pass.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>FORGET PASSWORD RECOVERY</title>
	<link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/custom.css">
</head>

<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<div class="container">
			<!-- Toggler/collapsibe Button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color: gray;">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- Brand -->
			<a class="navbar-brand crud" href="#">CRUD System</a>
		</div>
	</nav>

	<div class="container">

		<div class="row" style="text-align: center;">
			<h3>忘记密码了吗？</h3>
		</div>

		<div class="row sub_msg">
			<p>请输入你的邮箱:</p>
		</div>

		<div class="row signup">

			<?php echo $info; ?>
			<?php echo $fail; ?>
			<?php echo $error; ?>

			<form action="" method="POST" class="form-horizontal ">

				<div class="row form-group input_group">
					<label for="">Email:</label>
					<div>
						<input type="text" name="email_login" id="email_login" class="form-control ">
						<span id="error_Email"></span>
					</div>
				</div>

				<div class="row form-group ">
					<div class="col-xs-12">
						<input type="submit" name="forget" id="submit" class="form-control" value="SUBMIT">
					</div>
				</div>
			</form>
		</div>

	</div>
</body>

</html>
