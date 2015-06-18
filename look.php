	


<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>登陆</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
		
		body {
			background: #eedfcc url(img/bg3.jpg) no-repeat center top;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			background-size: cover;
		}
		.score{
			margin-top: 10px;
			font-size: 16px;
		}
		</style>
	</head>
	<body>
	
		<form id="form1" name="form1" method="post" action="">
		  <label>
		  <div align="center"><span class="STYLE2">选择查询学院：</span>
		      <select name="xueyuan">
		        <option value="通信学院">通信学院</option>
		        <option value="计算机学院">计算机学院</option>
		        <option value="自动化学院">自动化学院</option>
		        <option value="光电学院">光电学院</option>
		        <option value="体育学院">体育学院</option>
		        <option value="外国语学院">外国语学院</option>
		        <option value="理学院">理学院</option>
		        <option value="法学院">法学院</option>
		        <option value="生物学院">生物学院</option>
		        <option value="经济管理学院">经济管理学院</option>
		        <option value="传媒与艺术学院">传媒与艺术学院</option>
		        <option value="软件学院">软件学院</option>
		      </select>
		      <select name="project">
			      <option value="100米跑">100米跑</option>
			      <option value="200米跑">200米跑</option>
			      <option value="400米跑">400米跑</option>
			      <option value="4*100米接力">4*100米接力</option>
			      <option value="3000米长跑">3000米长跑</option>
			      <option value="跳高">跳高</option>
			      <option value="立定跳远">立定跳远</option>
			      <option value="三级跳远">三级跳远</option>
			      <option value="铅球">铅球</option>
			      <option value="单人乒乓球">单人乒乓球</option>
			      <option value="篮球">篮球</option>
		      </select>
		      <input type="submit" name="submit" value="查询" />
		      <div align="center" class="score">
			 
			    <?php 
					header("Content-type:text/html;charset=utf-8");
						require 'include/DB.class.php';

						if (!empty($_POST)) {//这儿判断一下,当点击了提交按钮，有数据传过来时才去执行php,否则这个页面只要显示html就好
							// print_r($_POST);
							$xueyuan = $_POST['xueyuan'];
							$project = $_POST['project'];
							// echo $xueyuan;
							$db = new DB();
							$sql = "select * from score where institute = '$xueyuan' and project = '$project'";

							// $userInfo = mysql_query($sql);//这是你的所有信息
							// if (!$userInfo) {
						    // echo "Could not successfully run query ($sql) from DB: " . mysql_error();
						    // exit;
							// }
							 $userInfo = $db->select($sql);
							// $row=mysql_fetch_array($userInfo);
							  $userInfo = mysql_fetch_assoc($userInfo);
							  echo "此项得分:".$userInfo["this_score"];
							  echo "<br/>";
							  echo "当前总分:".$userInfo["total_score"];
							// $row = mysql_fetch_array($userInfo);
							
						}
						
					 	
				?>
			 
			  </div>
		      <br />
		      <br />
		  </div>
		  </label>
		</form>
		
		<script src="js/jquery-1.8.3.min.js"></script>
		<script src="js/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$('input, textarea').placeholder();
			});
		</script>
		
	</body>
</html>