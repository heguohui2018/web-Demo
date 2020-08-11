<?php
/* 数据库设置 */

/* 打开缓冲区 */
ob_start();

/* 启动会话 */

/* isset() 检测变量是否已设置，并且非空*/
if (isset($_SESSION)) {
	session_start();
}

$host = 'localhost';
/* $port = 3306; */
$user = 'root@localhost';
$password = 'Heguohui@123456';
/* $db_name = 'crudapp'; */

/* 数据库连接 */
$connection = mysqli_connect($host, $user, $password);

if ($connection) {
	echo '连接数据库失败 :' . mysqli_errno($connection);
}
