<?php
global $connection;
global $update_good, $good_update, $errror;

if (!empty($_GET['key'])) {
	$key = $_GET['key'];
} else {
	$key = "";
}

if ($key != '') {
	$sql = mysqli_query($connection, "select * from signup where activation_key=''$key'");
	$count = mysqli_num_rows($sql);

	if ($count == 1) {
		while ($row = mysqli_fetch_array($sql)) {
			$is_active = $row['is_active'];

			if ($is_active == 0) {
				$update_sql = "update signup set is_active='1' where activation_key='$key'";
				$update_query = mysqli_query($connection, $update_sql);

				if ($update_query) {

					$update_good = "	<div class='alert alert-danger email_address'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'> &time</a>
		你的邮箱已验证成功</div>";
				}
			} else {

				$good_update = "	<div class='alert alert-danger email_address'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'> &time</a>
		你的邮箱已被验证</div>";
			}
		}
	} else {
		$errror = "	<div class='alert alert-danger email_address'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'> &time</a>
		错误码</div>";
	}
}
