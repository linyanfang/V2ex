<?php 
	require 'include/common.php';
	error_reporting(0);
	if ($_COOKIE['user_id'] != null) {
		
		/*
		 * 在登录时把你的id存了下来
		 * id是唯一的
		 * 所以你又可以通过id把你的所有信息取出来
		 */
		
		$user_id = $_COOKIE['user_id'];//这就是你登录时存到cookie中的id

		require "include/DB.class.php";
		$db = new DB();

		$sql = "select * from user where user_id = '$user_id'";//根据id来取出数据
		$userInfo = $db->select($sql);//这是你的所有信息
		$userInfo = mysql_fetch_assoc($userInfo);
		
		
		//取出所有的用户信息(除了你)
		$sql2 = "select * from user where user_id != '$user_id'";
		$users = $db->select($sql2);
		
		
		//删除用户的操作
		//a标签中的href="index.php?userid=2" 
		//?后面的东西能通过GET方式传递到服务器端 并且是对应 类似于js中的对象{userid:2},你在后台通过$_GET['user_id']就可以接收到userid的值
		if ($_GET['userid'] != null) {
			$userid = $_GET['userid'];
			$sql3 = "delete from user where user_id = '$userid'";
			(($db->delete($sql3)) != null) ? _location("删除成功", "index.php") : alert("删除失败");
		}
		
	}else {
		_location("请先登录","login.php");
	}





?>
<!doctype html>
<html lang="en">
	<head>
	<meta charset="UTF-8" />
	<title>首页</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
	
			<div class="row col-md-8 col-md-offset-2">
			
				<div class="jumbotron">
					<h1>
						Hello,
						<!-- PHP和HTML是可以任意混写的 -->
						<?php 
							if ($userInfo != null) {
								echo $userInfo['user_name'];//你在login.php中设置的cookie
							}
						?>

					</h1>
					<p>	
						我的邮箱:
						<?php
							if ($userInfo != null) {
								echo $userInfo['user_email'];
							}
						?>
					</p>
					<p>
						<a class="btn btn-primary btn-lg" role="button" href="logout.php">退出登陆</a>
						<a class="btn btn-primary btn-lg" role="button" href="look.php">查询成绩</a>
					</p>
				</div>
			</div>
			
	
			<div class="row col-md-8 col-md-offset-2">
	
	
				<div class="page-header">
				    <h1>用户列表<small>共<?php echo mysql_num_rows($users);?>人</small></h1>
				</div>
	
				<table class="table table-striped">
					<tr style="font-size:15px;text-align:center;">
						<th style="font-size:15px;text-align:center;">ID</th>
						<th style="font-size:15px;text-align:center;">姓名</th>
						<th style="font-size:15px;text-align:center;">邮箱</th>
						<th style="font-size:15px;text-align:center;">操作</th>
					</tr>
					
					<?php 
						while (!!$user = mysql_fetch_assoc($users)){
					?>
						<tr style="font-size:15px;text-align:center;">
							<td><?php echo $user['user_id'];?></td>
							<td><?php echo $user['user_name'];?></td>
							<td><?php echo $user['user_email'];?></td>
							<td><a class="btn btn-sm btn-danger" href="index.php?userid=<?php echo $user['user_id'];?>">删除</a></td>
						</tr>
					<?php 	
						}
					?>
					
				</table>
			</div>
		</div>
	</body>
</html>


