<html>

<head>
	<title>添加数据</title>
</head>

<body>
	<?php
	include("classes/Crud.php");
	include("classes/Validation.php");

	$crud = new Crud();
	$validation = new Validation();

	if (isset($_POST['add'])) {
		$name = $crud->escape_string($_POST['name']);
		$age = $crud->escape_string($_POST['age']);
		$email = $crud->escape_string($_POST['email']);

		/* 表单是否有空值 */
		$msg = $validation->check_empty($_POST, array('name', 'age', 'email'));

		/* 检查格式是否正确 */
		$check_age = $validation->is_age_valid($_POST['age']);
		$check_email = $validation->is_email_valid($_POST['email']);

		// 空值处理逻辑
		if ($msg != null) {
			echo $msg;
			echo "<br/><a href='javascript:self.history.back();'>返回</a>";
		} elseif (!$check_age) {
			echo '请输入正确的年龄';
			echo "<br/><a href='javascript:self.history.back();'>返回</a>";
		} elseif (!$check_email) {
			echo '请输入正确的邮箱格式';
			echo "<br/><a href='javascript:self.history.back();'>返回</a>";
		} else {
			//插入数据
			$query = "insert into users2(name,age,email) values('$name','$age','$email')";
			$result = $crud->execute($query);

			//显示成功提示
			echo "<p >数据添加成功</p>";
			echo "<br/><a href='index.php'>查看结果</a>";
		}
	}
	?>
</body>

</html>
