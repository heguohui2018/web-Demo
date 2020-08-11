<?php include('../config/db.php') ?>
<?php include('../scripts/user_activation.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>user activated</title>
	<link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="./css/custom.css">
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

		<div class="row text-center">
			<?php echo $update_good; ?>
			<?php echo $ugood_update; ?>
			<?php echo $uerror; ?>
		</div>


		<div class="row sub_msg">
			<p>点击下面按钮跳转到登陆页</p>
		</div>

		<div class="row signup">
			<div class="row" style="margin-bottom: 20px;">
				<h3><a href="../index.php" class="btn btn-primary">CLICK HERE TO LOGO</a></h3>
			</div>
		</div>
	</div>


</body>

</html>
