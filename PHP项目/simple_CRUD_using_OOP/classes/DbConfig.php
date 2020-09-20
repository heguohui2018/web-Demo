<?php
/* 创建类 */
class DbConfig
{
	/* 定义类的属性 */
	private $_host = 'localhost';
	private $_user = 'root';
	private $_password = 'heguohui2018';
	private $_name = 'test';

	/* 这里使用public 关键字，否则 子类无法访问,会报错 */
	public $connection;

	/* 初始化类 */
	/* $this当前实例对象,在类的内部调用 类的属性和方法 */
	public function __construct()
	{
		if (!isset($this->connection))
		{
			/* $this 访问成员属性 */
			$this->connection = new mysqli($this->_host, $this->_user, $this->_password, $this->_name);
			if ($this->connection)
			{
				echo '连接失败';
			}
		}
		return $this->connection;
	}
}
