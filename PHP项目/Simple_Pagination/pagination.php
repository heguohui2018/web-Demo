<?php
include("db.php");

/* 每页限制条数 */
$limit = 2;

if (isset($_GET['page'])) {
	/* 页数 */
	$page = $_GET['page'] - 1;
	/* 偏移量 */
	$offset = $page * $limit;
} else {
	$page = 0;
	$offset = 0;
}


/* 返回 users2 表中数据条数 */
$sql = "SELECT * FROM users2";
$sql_result = mysqli_query($connection, $sql);
$row = mysqli_num_rows($sql_result);

/* 字符串 和 数字比较，字符串会转化为数字 */
if ($row > $limit) {
	/* 需要多少页 */
	/* call 取整 */
	$number_of_pages = ceil($row / $limit);
} else {
	$pages = 1;
	$number_of_pages = 1;
}

/* 分页查询 */
$result = mysqli_query($connection, "SELECT * FROM users2 ORDER BY id DESC LIMIT $offset, $limit");
