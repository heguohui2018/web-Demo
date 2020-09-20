<?php
class Validation
{
	/* 检查提交表单是否为空 */
	public function check_empty($data, $fields)
	{
		$msg = null;
		foreach ($fields as $value) {
			if (empty($data[$value])) {
				/* 等价于 $msg = $msg."$value field empty <br />"; */
				$msg .= "$value field empty <br />";
			}
		}
		return $msg;
	}

	/* 检查年龄是否为数值 */
	public function is_age_valid($age)
	{
		//if (is_numeric($age)) {
		if (preg_match("/^[0-9]+$/", $age)) {
			return true;
		}
		return false;
	}

	/* 检查邮箱是否非法 */
	public function is_email_valid($email)
	{
		//if (preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}
}
