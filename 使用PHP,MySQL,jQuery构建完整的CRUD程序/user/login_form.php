<?php

include('../scripts/login.php') ?>

<div class="container">
	<div class="row" style="text-align: center;">
		<h3>用户登陆</h3>
	</div>

	<div class="row sub_msg">
		<p>这是一个允许用户创建，读取更新和删除信息的系统</p>
	</div>

	<div class="row signup">

		<form action="" method="POST" class="form-horizontal ">

			<?php echo $error1; ?>
			<?php echo $error2; ?>
			<?php echo $error3; ?>
			<?php echo $error4; ?>
			<?php echo $error5; ?>
			<?php echo $error6; ?>

			<div class="row form-group input_group">
				<label for="">Email:</label>
				<div>
					<input type="text" name="email_login" id="email_login" class="form-control ">
					<span id="error_Email"></span>
				</div>
			</div>

			<div class="row form-group input_group">
				<label for="">Password:</label>
				<div>
					<input type=" password" name="password_login" id="password_login" class="form-control">
					<span id="error_Password"></span>
				</div>
			</div>

			<div class="row form-group ">
				<div class="col-xs-12">
					<input type="submit" name="login" id="login" class="form-control" value="Login">
				</div>
			</div>
		</form>

		<div class="row ">
			<div class="col-xs-12">
				<a href="./user/forget_password.php">Forget Password?</a>
			</div>
		</div>
	</div>

</div>
