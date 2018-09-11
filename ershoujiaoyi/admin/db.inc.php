<?php 
header("ConTent-type:text/html;charset=utf-8");
	class db{
		private $host="localhost";
		private $user="root";
		private $pwd="123456";
		private $dbname="news";
		public $conn;
		// 功能：自执行，完成对数据库参数的初始化操作；
		//4个参数(para):
		//		string 主机名$host;
		//		string 用户名$user;
		//		string 密码$pwd;
		//		string 选择的数据库$dbname;
		//return void;
		//date 2018.7.23
		function __construct($host='',$user='',$pwd='',$dbname=''){
			if(!empty($host)&&!empty($user)&&!empty($pwd)&&!empty($dbname))
			{
			$this->host=$host;
			$this->user=$user;
			$this->pwd=$pwd;
			$this->dbname=$dbname;
			}
			$this->link();
		}
		// 功能：自执行，完成对数据库的链接操作；
		//4个参数(para):
		//		void;空
		//return void;
		//date 2018.7.23
		private function link(){
			$this->conn=mysql_connect($this->host,$this->user,$this->pwd)or die(mysql_error());
			mysql_select_db($this->dbname)or die(mysql_error());
			mysql_query("set names utf8");
		}
	// $d=new db("localhost","root","123456","_class_info");
		//根据表名获取表中所有数据
		public function getalldata($table,$type=MYSQL_NUM){
			$i=0;
			$arr=array();
			$sql="select * from $table order by id desc";
			$query=mysql_query($sql);
			while($res=@mysql_fetch_array($query,$type))
			{
				$arr[$i]=$res;
				$i++;
			}
			return $arr;
		}
		public function insert($table,$data,$page='show_stu_test.php'){
			$k='';
			$v='';
			if(!is_array($data))
			{
				$this->jump('你输入的值类型不对',$page);
			}
			if(empty($data))
			{
				$this->jump('你没有插入值',$page);
			}
				foreach($data as $key=>$value)
				{
					$k.=$key.',';
					$v.="'".$value."',";
				}
				$k=substr($k,0,-1);
				$v=substr($v,0,-1);
				$sql="insert into $table($k)values($v)";
				$this->query($sql);
				if(mysql_insert_id()>0)
				{
					$this->jump('成功登入页面',$page);
				}else{
					$this->jump('失败！',$page);
				}
			}
		

		//根据sql获取表中所有数据
		public function getsqldata($sql,$type=MYSQL_NUM){
			$i=0;
			$arr=array();
			$query=mysql_query($sql);
			while($res=@mysql_fetch_array($query,$type))
			{
				$arr[$i]=$res;
				$i++;
			}
			return $arr;
		}
		//根据主键id获取表中所有数据
		//三个参数： string $table 表名
		//			string $id 	根据id取值
		//			string $type 包括MYSQL_NUM索引和MYSQL_ASSOC关联取值方式
		public function getonedata($table,$id,$type=MYSQL_NUM){
			$i=0;
			$res=array();
			$sql="select * from $table where id=$id limit 1";
			$query=mysql_query($sql);
			$res=@mysql_fetch_array($query,$type);
			return $res;
		}
		//根据主键id删除表中所有数据
		//三个参数： string $table 表名
		//			string $id 	根据id取值
		//			string $type 包括MYSQL_NUM索引和MYSQL_ASSOC关联取值方式
		public function deletedata($table,$id,$page='show_stu_test.php'){
			if(empty($id)){
				$this->goback('你输入的id呢？');
			}
			$sql="delete  from $table where id=$id limit 1";
			// echo $sql;
			// exit;
			$query=mysql_query($sql) or die(mysql_error());
			if(mysql_affected_rows()>0){//返回上一次mysql语句操作所影响的行数
				$this->jump('数据删除成功',$page);
			}else{
				$this->goback('数据删除失败');
			}
		}
		public function query($sql){
			$query=mysql_query($sql)or die(mysql_error());
			if($query){
			return $query;
		}else{
			return false;
		}
		}
		//跳转到指定页面
		//两个参数： string $info 弹出信息提示
		//			string $page 	指定页面		
		public function jump($info,$page){
			echo "<script>
			alert('$info');
			window.location.href='$page';
			</script>";
		}
		//跳转上层页面
		//两个参数： string $info 弹出信息提示
		//					
		public function goback($info){
			echo "<script>
			alert('$info');
			window.histroy.go(-1);
			</script>";
		}
	}
 ?>