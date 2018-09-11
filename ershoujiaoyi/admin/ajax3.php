<?php 
header("Content-Type:text/html;charset=utf-8");
// session_start();
mysql_connect("localhost","root","123456") or die(mysql_errror());
mysql_select_db("news") or die(mysql_errror());
mysql_query("set names utf8");
$id=$_GET['name'];//17
if($_COOKIE['user'.$id]==$id)//17 18
{
	echo 111;
	exit;
// echo "<script>
//       	alert('你已经赞过了！');
//       	</script>";
// $sql1="select zan from user_message where id=".$id." limit 1";
// $query1=mysql_query($sql1);
// $s=mysql_fetch_row($query1);
// echo $s[0];
}else{
// $arr=array();
// $arr=$id;
$sql="update user_message set zan=zan+1 where id=".$id;
$query=mysql_query($sql);
$sql1="select zan from user_message where id=".$id." limit 1";
$query1=mysql_query($sql1);
$s=mysql_fetch_row($query1);
setcookie("user".$id, $id, time()+3600);//17 18
echo $s[0];
}
?>