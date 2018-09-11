<?php 
require_once "db.inc.php";
$a=new db("localhost","root","123456","news");
// 判断是否修改一级标题
if(!empty($_GET['idd2'])){
$im4=$_POST['add2'];
$id4=$_GET['idd2'];
$sql="update im set im1='$im4' where id=$id4";
// echo $sql;
// exit;
mysql_query($sql);
header("Location:admin_news.php");
}
// 判断是否修改二级标题
if(!empty($_GET['idd3'])){
$im2=$_POST['add3'];
$id1=$_GET['idd3'];
$sql="update im set im2='$im2' where id=$id1";
// echo $sql;
// exit;	
mysql_query($sql);
header("Location:admin_news.php");
}
// 判断是否修改三级标题
if(!empty($_GET['idd4'])){
$im3=$_POST['add4'];
$id2=$_GET['idd4'];
$sql="update im set im3='$im3' where id=$id2";
// echo $sql;
// exit;
mysql_query($sql);
header("Location:admin_news.php");
}
 ?>