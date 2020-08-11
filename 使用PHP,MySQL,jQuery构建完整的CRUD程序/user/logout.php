<?php
/* 退出登陆 */

session_start();

/* 会话属性值为空值 */
$_SESSION['id'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['email'] = null;
$_SESSION['password'] = null;

/* 跳转到首页 */
header('location:../index.php');
