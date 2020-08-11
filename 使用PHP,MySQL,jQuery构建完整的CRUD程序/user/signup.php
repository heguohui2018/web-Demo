<?php include('./scripts/insert.php'); ?>

<div class="container">
	<div class="row" style="text-align: center;">
		<h3>用户注册</h3>
	</div>

	<div class="row sub_msg">
		<p>这是一个允许用户创建，读取更新和删除信息的系统</p>
	</div>

	<div class="row signup">

		<form action="" method="POST" class="form-horizontal ">

			<?php $info; ?>
			<?php $fail; ?>

			<?php echo $error1; ?>
			<?php echo $error2; ?>
			<?php echo $error3; ?>
			<?php echo $error4; ?>
			<?php echo $error5; ?>

			<div class="row form-group input_group">
				<label for="">Email:</label>
				<div>
					<input type="text" name="email" id="email" class="form-control ">
					<span id="errorEmail"></span>
				</div>
			</div>

			<div class="row form-group input_group">
				<label for="">Firstname:</label>
				<div>
					<input type="text" name="firstname" id="firstname" class="form-control">
					<span id="errorFirstname"></span>
				</div>
			</div>

			<div class="row form-group input_group">
				<label for="">Lastname:</label>
				<div>
					<input type="text" name="lastname" id="lastname" class="form-control">
					<span id="errorLastname"></span>
				</div>
			</div>

			<div class="row form-group input_group">
				<label for="">Password:</label>
				<div>
					<input type=" password" name="password" id="password" class="form-control">
					<span id="errorPassword"></span>
				</div>
			</div>

			<div class="row form-group ">
				<div class="col-xs-12">
					<input type="submit" name="submit" id="submit" class="form-control">
				</div>
			</div>
		</form>
	</div>

</div>
