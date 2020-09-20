<?php
/* 获取数据填充表单 */
include("classes/Crud.php");

$crud = new Crud();

$id = $crud->escape_string($_GET['id']);

$result = $crud->getData("SELECT * FROM users2 WHERE id=$id");

foreach ($result as $res) {
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
} ?>
<html>

<head>
	<title>编辑数据</title>
</head>

<body>
	<a href="index.php">主页</a>
	<br /><br />

	<form name="form1" method="post" action="editaction.php">
		<table border="0">
			<tr>
				<td>姓名</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>" /></td>
			</tr>
			<tr>
				<td>姓名</td>
				<td><input type="text" name="age" value="<?php echo $age; ?>" /></td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>" /></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
				<td><input type="submit" name="update" value="更新" /></td>
			</tr>
		</table>
	</form>
</body>

</html>
