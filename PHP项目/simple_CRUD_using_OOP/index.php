<?php
//including the database connection file
include("classes/Crud.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "select * from users2 order by id desc";

$result = $crud->getData($query);
?>

<html>

<head>
	<title>主页</title>
</head>

<body>
	<a href="add.html">添加数据</a><br /><br />

	<table width='80%' border=0>

		<tr bgcolor='#CCCCCC'>
			<td>姓名</td>
			<td>年龄</td>
			<td>邮箱</td>
			<td>更新</td>
		</tr>
		<?php
		foreach ($result as $key => $res) {
			echo "<tr>";
			echo "<td>" . $res['name'] . "</td>";
			echo "<td>" . $res['age'] . "</td>";
			echo "<td>" . $res['email'] . "</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">编辑</a>  
						<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">删除</a></td>";
		}
		?>
	</table>
</body>

</html>
