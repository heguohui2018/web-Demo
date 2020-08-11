<?php

/* 密码重设逻辑 */

include('../config/db.php');

global $connection;
global $error,$success_update,$fail_update,$empty_update;

/* isset() 检测变量是否为空*/
if (isset($_POST['reset'])) {
	if (!empty($_GET['key'])) {
		$key = $_GET['key'];
	} else {
		$key = '';
	}

	if ($key != '') {
		$pass_word = $_POST['password'];

		/* pass_word转义 */
		$pass = mysqli_real_escape_string($connection, $pass_word);
		/* 返回查询结果 */
		$salt_query = mysqli_query($connection, 'select randSaltPass from signup');
		/* 从结果集中取出一行作为关联数组和数字数组 */
		$row = mysqli_fetch_array($salt_query);
		$salt = $row['randSaltPass'];

		$password = crypt($pass, $salt);

		$sql = mysqli_query($connection, "select * from signup where activation_key ='{$key}'");
		/* 对结果集计数 */
		$count = mysqli_num_rows($sql);

		if ($count == 1) {
			/* 正则匹配，匹配成功返回1，匹配失败返回0； */
			if (!preg_match('/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*S/', $pass_word)) {
				$error = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>密码不正确</div>";
			}else{
				$update_sql = "update signup set password = '{$password}' where activation_key ='{$key}'";
				$update_query = mysqli_query($connection,$update_query);

				if ($update_query ) {
					$success_update = "<div class='alert alert-success '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>你的密码已经重设成功</div>";
				}

			}
		}else{
			$fail_update = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>数据没有找到</div>";
		}
	}else{
			$empty_update = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>密码失败，不能为空</div>";
	}
