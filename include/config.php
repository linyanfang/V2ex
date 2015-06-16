<?php
	/*
	 * 配置信息都应该设置常量来保存
	 * 这样以后需要更改数据库信息时就只需要改这个地方就可以了
	 * define['常量名','值']
	 * 设置好了直接写常量名就能取到对应的值
	 */
	define('DB_Port', "localhost");
	define("DB_User", "root");
	define("DB_Pass", "");
	define("DB_Name", "test");
	
?>