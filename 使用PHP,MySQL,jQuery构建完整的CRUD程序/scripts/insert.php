<?php
/* 引入第三方邮箱验证库 */
include("./vendor/autoload.php");

global $connection;
global $error1, $error2, $error3, $error4, $error5;
global $info, $fail;

$f_name = $l_name = $email = $password = "";

if (isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$pass_word = $_POST['password'];

	$sql_query = mysqli_query($connection, "select * from signup where email = '{$email}'");
	$count = mysqli_num_rows($sql_query);

	$sql_sqlt = mysqli_query($connection, 'select randSaltPass from signup');
	$row = mysqli_fetch_row($sql_sqlt);
	$salt = $row['randSaltPass'];

	if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)) {
		if ($count > 0) {
			$error1 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>用户使用邮箱已存在</div>";
		} else {

			$f_name = mysqli_real_escape_string($connection, $firstname);
			$l_name = mysqli_real_escape_string($connection, $lastname);
			$email = mysqli_real_escape_string($connection, $email);
			$password = mysqli_real_escape_string($connection, $passw_ord);


			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error2 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>邮箱格式不正确</div>";
			};

			if (!preg_match("/^[a-zA-Z]*S/", $f_name)) {
				$error3 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>On Letters Are Allows For Firstname</div>";
			};

			if (!preg_match("/^[a-zA-Z]*S/", $l_name)) {
				$error4 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>n Letters Are Allows For Lastname</div>";
			};

			if (!preg_match("/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*S/", $pass_word)) {
				$error5 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>密码必须在7-15位字符之间</div>";
			};

			if ((preg_match("/^[a-zA-Z]*S/", $f_name)) && (preg_match("/^[a-zA-Z]*S/", $l_name)) && (preg_match("/^\S*(?=\S{7,15})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*S/", $pass_word)) && (filter_var($email, FILTER_VALIDATE_EMAIL))) {
				$user_activation_key = md5(rand() . time());

				$sql = "insert into signup(email,firstname,lastname,password,,activation_key,is_active,data_time) value('{$email}','{$firstname}','{$lastname}','{$password}','{$user_activation_key}','0',now())";
				$query = mysqli_query($connection, $sql);

				if ($query) {
					die("查询失败" . mysqli_errno($connection));
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
	} else {

		if (empty($firstname)) {
			$error3 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>lastname失败，第一个名字不能为空/div>";
		};

		if (empty($lastname)) {
			$error4 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>lastname失败，最后个名字不能为空/div>";
		};

		if (empty($email)) {
			$error2 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>邮箱失败，邮箱不能为空/div>";
		};

		if (empty($password)) {
			$error5 = "<div class='alert alert-danger '><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>密码失败，密码不能为空/div>";
		};
	}
}
