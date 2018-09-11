<?php
// session_start();
/*
  测试页面，补充下边需要填空的代码，实现封装类--更新--上传图片操作。
    加油~
*/
// 数据库操作类
header("ConTent-type:text/html;charset=utf-8");
class db1
{
	private $host='localhost';//数据库主机
	private $user='root';//数据库用户
	private $pwd='123456';//密码
	private $dbname='news';//数据库主机
	public $conn;
//功能：自执行 完成对数据库连接参数的初始化功能
//参数：$host  string  主机
//	    $user   string 用户
//      $pwd    string  密码
//      $dbname string  数据库名
//return :void
	function  __construct($host=' ',$user=' ',$pwd=' ',$dbname=' ')
	{
		if(!empty($host) && !empty($user) && !empty($pwd) && !empty($dbname))
		{
		$this->host=$host;
		$this->user=$user;
		$this->pwd=$pwd;
		$this->dbname=$dbname;  
	    }

	    	$this->link();
	    
    }
//功能：完成对数据库连接功能
//参数：void
//return :void
	private function link()
	{
    
		$this->conn=mysql_connect($this->host,$this->user,$this->pwd)or die(mysql_error());
		mysql_select_db($this->dbname,$this->conn)or die(mysql_error());
		mysql_query('set names utf8');
	}
//功能：根据表名获取表中所有数据
//参数：$table  string  表名
//	    $type   const   关联或索引类型

//return :array  二维数组
	public function getalldata($table,$type=MYSQL_ASSOC)
	{
       $arr=array();
       $i=0;
       $sql="select * from $table order by id desc";
       $query=$this->query($sql);
       while($res=mysql_fetch_array($query,$type))
       {
       	$arr[$i]=$res;
       	$i++;
       }
       return $arr;
	}
//功能：根据sql语句获取表中所有数据
//参数：$table  string  表名
//	    $type   const   关联或索引类型

//return :array  二维数组
	public function getsqldata($sql,$type=MYSQL_ASSOC)
	{
       $arr=array();
       $i=0;
       $query=$this->query($sql);
       while($res=mysql_fetch_array($query,$type))
       {
       	$arr[$i]=$res;
       	$i++;
       }
       // print_r($arr);
       return $arr;
	}
 //功能：根据id获取表中所有数据
//参数：$table  string  表名
//	    $type   const   关联或索引类型

//return :array  二维数组   
    public function getonedata($table,$id,$type=MYSQL_NUM)
	{
   
       $res=array();
       $i=0;
       $sql="select * from $table where id=$id limit 1";
       $query=$this->query($sql);
       $res=mysql_fetch_array($query,$type);
       return $res;
	}


//功能：执行sql语句
//参数：$sql  string  sql语句
  
   public function query($sql)
   {
      if(!empty($sql))
      {
         $query=mysql_query($sql) or die(mysql_error());
         return $query;
      }else
      {
      	return false;
      }
   }
//功能：删除
//参数：$table  string  表名
//	    $id     id值
//      $page string 跳转页面

	public function delete($table,$id,$page='show_stu_test.php')
	{
		if(empty($id))
		{
			$this->goback('选择要删除的id');
      	     exit;
		}
      $sql="delete from $table where id=$id limit 1";
      $query=$this->query($sql);
      if(mysql_affected_rows()>0)
      {
      	$this->jump('删除成功',$page);
      	exit;
      }else
      {
      	$this->goback('删除失败');
      	exit;
      }
	}
//功能：插入
//参数：$table  string  表名
//	    $data    array  准备好插入的数据
//      $page string 入库之后要跳转页面
//return  : void
   public function insert($table,$data,$page='liuyan.php',$s)
   {
   	$v=' ';
   	$k=' ';
   	if(!is_array($data))
   	{
   		$this->jump('类型不对',$page);
   	}
   	if(empty($data))
   	{
   		$this->jump('插入信息不能为空',$page);
   	}
   	foreach ($data as $key => $value) {
   		$k.=$key.',';
   		$v.="'".$value."',";;
   		   	}
   		$k=substr($k, 0,-1);
   		$v=substr($v, 0,-1);
   	$sql="insert into $table($k)values($v)";
   	$query=$this->query($sql);
    if(!empty($s)){
       $sqls="select * from user_message where name="."'".$data['name']."'";
       $bp=mysql_query($sqls);
       $p=mysql_fetch_assoc($bp);
       $id=$p['id'];
       //echo $id;
       // echo $_COOKIE['time'.$id];
       // $_SESSION['time']=$p['id'];
       // echo $_SESSION['time'];
       // exit;
    }
   	if(mysql_insert_id()>0)
   	{
       setcookie("time".$id,$id);
       $this->jump('插入成功','liuyan.php');
   	}else
   	{
   		$this->goback('入库失败');
   	} 
   }

//功能：1.更新
//参数：$table  string  表名
//      $data    array  准备好插入的数据
//      $id      
//      $page string 入库之后要跳转页面
//return  : void
public function update($table,$data,$id,$page='show_stu_test.php')
    {
    //先保存id值 后删除id值   
    unset($data['id']);
    $v=' ';
//判断是否为数组类型
    if(is_array($data))
    foreach ($data as $key => $value) {
//链接键值
    $v.=$key.'='."'".$value."'".',';   
    }
    $v=substr($v, 0,-1);     
    $sql="update $table set $v where id=$id";//写出sql语句
    $query=$this->query($sql);
    if(mysql_affected_rows()>0)
    {
      $this->jump('信息修改成功','show_stu_test.php');
    }else
    {
      
    $this->goback('更新失败');
       
    }  
   }

//功能：2.完成图片的上传功能
//参数：$files  array  包含上传信息的二维数组
//      $up    string   与表单上传框一致
//      $upload   string   服务器端图片存放的文件夹     
//      return ：成功---返回存储在服务器端的 图片路径
//                失败--false
//return  : void
public function uploadphoto($files,$up,$upload)
{
  if(!empty($files[$up]['tmp_name']))
{
     if(is_uploaded_file($files[$up]['tmp_name']))
     {
          $upd=$files[$up];
          $name=$upd['name'];
          $type=$upd['type'];
          $tmp_name=$upd['tmp_name'];
          $size=$upd['size'];
          $error=$upd['error'];
     }
 
      switch($type)
    {
      case "image/jpg":$ok=1;
      break;
      case "image/jpeg":$ok=1;
      break;
      case "image/gif":$ok=1;
      break;
      case "image/png":$ok=1;
      break;
      default:$ok=0;
      break;
    }
    // echo $ok;
    // echo $error;
    // exit;
    if($ok&&$error=='0')
     {
       move_uploaded_file($tmp_name,$upload.'/'.time().$name);
       $url=$upload.'/'.time().$name;
       return $url;
      }else{
        return false;
      }
 }


 }


//功能：跳转页面
//参数：$info  string 警告信息
//      $page  string 跳转页面
	public function jump($info,$page)
	{
		echo "<script>
      	alert('$info');
      	window.location.href='$page';
      	</script>";
      	exit;
	}
//功能：返回上一步
//参数：$info  string 警告信息
	public function goback($info)
	{
		echo "<script>
      	alert('$info');
      	window.history.go(-1);
      	</script>";
      	exit;
	}
// 功能：防跳墙，防止非法登入
 public function fangjump($pass,$page){
  session_start();
    if(empty($_SESSION[$pass]))
    {

      $this->jump('请通过正常路径登入',$page);
    }
}
}
?>