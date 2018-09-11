<?php
require_once "db1.inc.php";
date_default_timezone_set('PRC');//设置为中国时区
// $data[]=$_GET['user_message_id'];
// $data[]=$_GET['user_message_content'];
// print_r($data[1]);
// exit;
$a=new db1("localhost","root","123456","news");
mysql_connect("localhost","root","123456") or die(mysql_errror());
mysql_select_db("news") or die(mysql_errror());
mysql_query("set names utf8");
$b[time]=date('y-m-d H:i:s');//时间
$sql="insert into reply_message(user_message_content,time,user_message_id)values('$_GET[user_message_content]','$b[time]','$_GET[user_message_id]')";
mysql_query($sql);
$sql1="select * from reply_message where user_message_id=".$_GET[user_message_id];
$s=$a->getsqldata($sql1);
//print_r($s);
// echo "留言成功";
// echo $q;
// echo $s[0]['name'];
// echo $s[0]['content'];
echo json_encode($s);
?>