<?php

/* 忘记密码逻辑处理 */

/* 载入数据库配置文件 */
include('../config/db.php');
/* 引入第三方库 */
include('../lib/swift_required.php');

global $connection;
global $info, $fail, $error;


if (isset($_POST['forget'])) {

	$email = $_POST['email'];

	/* 对邮箱中的特殊字符进行转义 */
	$email = mysqli_real_escape_string($connection, $email);

	/* sql查询 */
	$query_sql = 'select * from signup where email= "{$email}"';
	/* 查询结果 */
	$query = mysqli_query($connection, $query_sql);

	/* 统计查询结果 */
	$count = mysqli_num_rows($query);

	if (!empty($email)) {
		if ($count <= 0) {
			$error = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>邮箱不存在</div>";
		} else {
			while ($row = mysqli_fetch_row($query)) {
				$user_email = $row['email'];
				$user_key = $row['activation_key'];
			}
			/* if ($query) { */

			/* 	// Create the Transport */
			/* 	$transport = (new Swift_SmtpTransport('smtp.example.org', 25)) */
			/* 		->setUsername('your username') */
			/* 		->setPassword('your password'); */

			/* 	// Create the Mailer using your created Transport */
			/* 	$mailer = new Swift_Mailer($transport); */

			/* 	// Create a message */
			/* 	$message = (new Swift_Message('Wonderful Subject')) */
			/* 		->setFrom(['john@doe.com' => 'John Doe']) */
			/* 		->setTo(['receiver@domain.org', 'other@domain.org' => 'A name']) */
			/* 		->setBody('Here is the message itself'); */

			/* 	// Send the message */
			/* 	$result = $mailer->send($message); */
			/* } */
		}
	}
}
