<?php
include('classes/Crud.php');
include('classes/Validation.php');

$crud = new	Crud();
$validation = new Validation();

if (isset($_POST['update'])) {
	$id = $crud->escape_string($_POST['id']);
	$name = $crud->escape_string($_POST['name']);
	$age = $crud->escape_string($_POST['age']);
	$email = $crud->escape_string($_POST['email']);


	/* 检测表单是否有空值 */
	$msg = $validation->check_empty($_POST, array('name', 'age', 'email'));

	/* 验证格式 */
	$check_age = $validation->is_age_valid($_POST['age']);
	$check_email = $validation->is_email_valid($_POST['email']);

	if ($msg) {
		echo $msg;
		echo "<br/><a href='javascript:self.history.back();'>返回</a>";
	} elseif (!$check_age) {
		echo 'Please provide proper age.';
	} elseif (!$check_email) {
		echo 'Please provide proper email.';
	} else {

		//更新表
		$result = $crud->execute("UPDATE users2 SET name='$name',age='$age',email='$email' WHERE id=$id");

		/* 重定向 */
		header("Location: index.php");
	}
}
