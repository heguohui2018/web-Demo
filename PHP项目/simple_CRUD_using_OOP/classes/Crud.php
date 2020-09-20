<?php
include('DbConfig.php');

class Crud extends DbConfig
{
	public function __construct()
	{
		/* parent:: 用于调用父类中定义的成员方法 */
		/* 调用父类的构造方法 */
		parent::__construct();
	}

	/* 获取数据 */
	public function getData($query)
	{
		/* $this 访问 connection 属性，调用query 方法,然后赋值给 $result */
		$result = $this->connection->query($query);

		if ($result == false) {
			return false;
		}

		$rows = array();

		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}

	/* 执行 */
	public function execute($query)
	{
		$result = $this->connection->query($query);

		if ($result == false) {
			echo "Error:不能执行这个命令";
			return false;
		} else {
			return true;
		}
	}

	/* 数据删除 */
	public function delete($id, $table)
	{
		$query = "delete from $table where id = $id";

		$result = $this->connection->query($query);

		if ($result == false) {
			echo 'Error: 不能够删除 id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}

	/* 字符串转义 */
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}
}
