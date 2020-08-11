<?php

/* 密码重设页 */

include('../config/db.php');
include('..//scripts/reset_pass.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>RESET PASSWORD</title>
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
			<h3>重设密码</h3>
		</div>

		<div class="row sub_msg">
			<p>请输入你的密码:</p>
		</div>

		<div class="row signup">

			<?php echo $error; ?>
			<?php echo $success_update; ?>
			<?php echo $fail_update; ?>
			<?php echo $empty_update; ?>

			<form action="" method="POST" class="form-horizontal ">

				<div class="row form-group input_group">
					<label for="">Password:</label>
					<div>
						<input type="password" name="password" id="password" class="form-control ">
						<span id="error_Password"></span>
					</div>
				</div>

				<div class="row form-group ">
					<div class="col-xs-12">
						<input type="submit" name="reset" id="reset_submit" class="form-control" value="reset_password">
					</div>
				</div>
			</form>
		</div>

	</div>
</body>

</html>
