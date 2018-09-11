<?php 
require_once "db.inc.php";
$a=new db("localhost","root","123456","news");
// 判断是否添加一级标题
if(!empty($_GET['idd1'])){
$im1=$_POST['add1'];
$sql="insert into im(im1) values('$im1')";
mysql_query($sql);
header("Location:admin_news.php");
}
// 判断是否添加二级标题
if(!empty($_GET['b'])){
$im2=$_POST['add2'];
$id1=$_GET['idd2'];
$sql="insert into im(im2,imid) values('$im2','$id1')";
mysql_query($sql);
header("Location:admin_news.php");
}
// 判断是否添加三级标题
if(!empty($_GET['c'])){
$im3=$_POST['add3'];
$id2=$_GET['idd3'];
$sql="insert into im(im3,imid) values('$im3','$id2')";
mysql_query($sql);
header("Location:admin_news.php");
}
 ?>