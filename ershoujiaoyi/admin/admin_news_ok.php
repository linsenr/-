<?php 
require_once "db.inc.php";
require_once "db1.inc.php";
$a=new db("localhost","root","123456","news");
$aa=new db1("localhost","root","123456","news");
$_POST['photo']=$aa->uploadphoto($_FILES,'photo',"image");
date_default_timezone_set('PRC');//设置为中国时区
$b=$_POST['la'];
$c=explode('|',$b);
$_POST['im1']=$c[0];
$_POST['im2']=$c[1];
$_POST['im3']=$c[2];
unset($_POST['la']);
unset($_POST['button']);
$_POST['time']=date('Y-m-d H-i-s');
$a->insert('news_table',$_POST,'admin_news_list.php');
// print_r($_POST);
 ?>