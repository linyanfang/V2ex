	
<?php 
header("Content-type:text/html;charset=utf-8");
	require 'include/DB.class.php';
	if (!empty($_POST)) {//这儿判断一下,当点击了提交按钮，有数据传过来时才去执行php,否则这个页面只要显示html就好
		// print_r($_POST);//可以通过打印这个$_POST数组来调试
		$username = $_POST['username'];//$_POST['username']跟你html表单中input的name值是对应的
		$password = $_POST['password'];//同理
		// mysql_query("set names utf8");
		$db = new DB();//现在已经接收到数据,把这个数据去和数据中的数据比较	
		$sql = "select * from user where user_name = '$username' and user_pass = '$password'";	
		$userInfo = $db->select($sql);
		$userInfo = mysql_fetch_assoc($userInfo);
		if ($userInfo) {
			$flag = setcookie("user_id",$userInfo['user_id']);//设置cookie,在主页index.php会读取这个cookie    **好好去看看**
			$flag != null ? header("Location:index.php") : false;
		}else {
			alert("用户名或密码错误");
		}
	}
?>


<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>登陆</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
		@import
			url(http://fonts.googleapis.com/css?family=Montserrat:400,700|Handlee);
		body {
			background: #eedfcc url(img/bg3.jpg) no-repeat center top;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			background-size: cover;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<section class="main">
				
				<form class="form-5 clearfix" method="post" action="login.php">
					<p>
						<input type="text" id="login" name="username" placeholder="Username">
						<input type="password" name="password" id="password"
							placeholder="Password">
					</p>
					<button type="submit" name="submit">
						<i class="icon-arrow-right"></i> <span>Sign in</span>
					</button>
				</form>
				​​​​
			</section>
	
		</div>
		
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="js/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$('input, textarea').placeholder();
			});
		</script>
		
	</body>
</html>