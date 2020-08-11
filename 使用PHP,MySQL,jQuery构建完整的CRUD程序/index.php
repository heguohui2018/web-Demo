<?php include('./config/db.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>CRUD APPLICATION</title>
	<link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/custom.css">
	<script src="./js/reg.js"></script>
	<script src="./js/login.js"></script>
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
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#index">主页</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#login">登陆</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#signup">注册</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#admin">管理员</a>
			</li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane fade in" id="index">
				<p>主页</p>
			</div>

			<div class="tab-pane fade" id="login">
				<?php include('./user/login_form.php'); ?>
			</div>

			<div class="tab-pane fade in" id="signup">

				<?php include('./user/signup.php'); ?>
			</div>

			<div class="tab-pane fade" id="admin">
				<p>管理员</p>
			</div>
		</div>
	</div>

	<div class="alert alert-danger email_address">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"> &time</a>
		你的邮箱已验证成功
	</div>
</body>

</html>
