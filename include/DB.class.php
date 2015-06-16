<?php
	/*
	 * @Author Excelsior
	 * @Date 10-10 15:04
	 * @Description 数据库操作类
	 * @TODO 
	 */
	require_once "config.php";//引入配置文件,配置文件里的数据都是使用define定义的常量，方便维护和管理
	require_once 'common.php';//可能使用到的函数

	class DB {

		private  $conn;//与服务器建立连接
		
		
		
		/*
		 * 构造方法
		 * 你在index.php中实例化这个类时,会自动执行这个函数
		 * 即执行mysql_connect()，去连接数据库
		 * 并把结果赋给一个变量,方便判断是否连接上了数据库
		 */
		public function __construct(){
			$this->conn = mysql_connect(DB_Port,DB_User,DB_Pass);
			if ($this->conn) {
				if($this->selectDb()){//调用这个类中的函数,使用  $this->函数名() 
					$this->setNames(); //跟上面一样,调用这个类中的setNames函数 设置编码
				}
			}else {
				alert("数据库连接失败");
			}
		}

		
		public static function test(){
			
		}
		
		
		/*
		 * 选择一个数据库
		 */
		private function selectDb(){
			if(!mysql_select_db(DB_Name)){
				exit('该数据库找不到!');
			}
		}
		/*
		 * 设置字符集的函数
		 */
		private function setNames(){
			if(!mysql_query('SET NAMES UTF8')){
				exit('字符集错误!');
			}
		}
		
		
		/*
		 * 新增数据
		 */
		public function insert($sql){
			if ($this->conn) {
				$flag= mysql_query($sql);
				return $flag;
			}else {
				alert("操作失败");//这个函数写在common.php中,去看一下在php中怎么执行js代码
			}
		}
		
		/*
		 * 取出数据
		 */
		public function select($sql){		
			if ($this->conn) {
				 $resourceResult = mysql_query($sql);//取出来的数据是资源句柄,还不能直接使用
				 return $resourceResult;
			}
		}
		
		/*
		 * 删除数据
		 */
		public function delete($sql){
			if ($this->conn) {
				$flag = mysql_query($sql);
				return $flag;
			}
		}
		

	}





?>