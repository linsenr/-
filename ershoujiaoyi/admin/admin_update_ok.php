<?php 
require_once "db.inc.php";
require_once "db1.inc.php";
$a=new db("localhost","root","123456","news");//链接库
$aa=new db1("localhost","root","123456","news");//链接库
// $files,$up,$upload
$_POST['photo']=$aa->uploadphoto($_FILES,'photo',"image");
date_default_timezone_set('PRC');//设置为中国时区
// print_r($_POST);
// exit;
$b=$_POST['la'];
$c=explode('|',$b);//炸开，只要碰见|就把之前的内容放进一个数组中
$_POST['im1']=$c[0];
$_POST['im2']=$c[1];
$_POST['im3']=$c[2];
unset($_POST['la']);//去掉其中的la值
unset($_POST['button']);//去掉其中的button值
$_POST['time']=date('Y-m-d H-i-s');
// Array ( [title] => 阿达强强强强 [la] => 214|0|0 [writer] => 冉 [content] => 阿达 [hit] => 0 [button] => 提交内容 )
$sql="update news_table set title="."'".$_POST['title']."'".',im1='."'".$_POST['im1']."'".',im2='."'".$_POST['im2']."'".',im3='."'".$_POST['im3']."'".',writer='."'".$_POST['writer']."'".',content='."'".$_POST['content']."'".',hit='."'".$_POST['hit']."'".',time='."'".$_POST['time']."'".',photo='."'".$_POST['photo']."'"." where id="."'".$_GET['id']."'";
// echo $sql;
// exit;
// unlink($_POST['photo']);
$query=mysql_query($sql);
$a->jump('更改成功','admin_news_list.php');
// $a->insert('news_table',$_POST,'admin_news_list.php');
// print_r($_POST);
 ?>