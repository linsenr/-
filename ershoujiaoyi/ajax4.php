<?php
// session_start();
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('PRC');//设置为中国时区
require_once "db.inc.php";
$d=new db("localhost","root","123456","liuyan");
mysql_connect("localhost","root","123456") or die(mysql_errror());
mysql_select_db("liuyan") or die(mysql_errror());
mysql_query("set names utf8");
$id=$_GET['name'];
$sql1="select * from user_message where id=".$id;
// echo $sql1;
$query1=mysql_query($sql1) or die(mysql_error());
$res=mysql_fetch_assoc($query1);
$b['time']=date('y-m-d H:i:s');//时间
$str1=strtotime($b['time']);
$str2=strtotime($res['time']);
$s=(int)($str1-$str2);
//$yourday = (int)($s/(3600*24));
// $yourhour= (int)(($s%(3600*24))/(3600));
// $yourmin = (int)($s%(3600)/60);
// echo $yourhour;
// echo $yourday;
// echo $s/(24*60*60);
// echo ($s/(24*60*60));
// print_r($_COOKIE['time'.$id]);
// if($_COOKIE['time'.$id]==$id){
// echo $_COOKIE['time'.$id];
// exit;
if(($s/(24*60))<1&&$_COOKIE['time'.$id]==$id){
// if(($s/(24*60*60))<100){
$sql="delete from user_message where id=".$id." limit 1";
mysql_query($sql)or die(mysql_error());
// echo '1';
$sql2="select * from user_message order by id desc limit 4";

$rem=$d->getsqldata($sql2);
// print_r($rem);
if(is_array($rem)){
// $e=print_r($rem);
echo json_encode($rem);
// echo $e;

	//echo '1';
}
// print_r($rem);
}
?>