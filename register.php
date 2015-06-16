<?php
header("Content-type:text/html;charset=utf-8");
	require 'include/common.php';
	require 'include/DB.class.php';
 
	 if(!empty($_POST)){
	 	mysql_query('set names utf8');
	 	$db = new DB();
	 	$username = $_POST["username"];
	 	$usermail = $_POST["usermail"];
	 	$userpass = $_POST["userpass"];	
	 	$sql = "select * from user where user_email = '$usermail'";
	 	$userinfo = $db->select($sql);
	 	$userInfo = mysql_fetch_assoc($userinfo);
	 	if($userInfo){
	 		alert("邮箱已被注册");
	 	}else{
	 		// alert(aaa);
	 		$sql = "insert into user (user_name, user_email, user_pass) values ('$username', '$usermail', '$userpass')";
	 		$flag = $db->insert($sql);
	 		if($flag){
	 			$user_id = mysql_insert_id();
	 			$flag = setcookie('user_id', $user_id);
	 			$flag != null ? header("Location:index.php") : header("Location:login.php");
	 		}else{
	 			// echo "false";
	 			alert("注册失败！");
	 		}
	 	}
	 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>register</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

	<div id="container">
		<section class="main">
			<form class="form-horizontal" role="form" action="register.php" method="post">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">please put your name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control"  placeholder="name" name="username">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">please put your email</label>
				    <div class="col-sm-10">
				      <input type="email" class="form-control"  placeholder="Email" name="usermail">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">please put your password</label>
				    <div class="col-sm-10">
				      <input type="password" class="form-control" placeholder="Password" name="userpass">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">注册</button>
				    </div>
				</div>
			</form>
		</section>
	</div>
	
</body>
</html>