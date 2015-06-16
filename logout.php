<?php
	
	require 'include/common.php';
	
	if($_COOKIE['user_id']){
		setcookie("user_id",'');
		_location("成功退出", "login.php");
	}
	
	
?>