<?php include('pagination.php'); ?>

<html>

<head>
	<title>Homepage</title>
</head>

<body>

	<table width='80%' border=0>

		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Age</td>
			<td>Email</td>
		</tr>
		<?php
		/* 显示数据 */
		while ($res = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $res['name'] . "</td>";
			echo "<td>" . $res['age'] . "</td>";
			echo "<td>" . $res['email'] . "</td>";
			echo "</tr>";
		}
		?>
	</table>

	<?php
	// 显示页面数字连接
	if ($page) {
		echo "<a href='index.php?page=1'>First</a> ";
	}
	for ($i = 1; $i <= $number_of_pages; $i++) {
		echo "<a href='index.php?page=$i'>" . $i . "</a> ";
	}
	if (($page + 1) != $number_of_pages) {
		echo "<a href='index.php?page=$number_of_pages'>Last</a> ";
	}
	?>
</body>

</html>
