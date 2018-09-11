<?php 
require_once "db.inc.php";
header("Content-Type:text/html;charset=utf-8");
session_start();
$b=$_POST;
$a=new db("localhost","root","123456","liuyan");
if($b['liu']!='留言'){//防注入
$a->goback('请通过正常路径登录');}
unset($b['liu']);
if($b['yanzheng']!=$_SESSION['name'])//验证码验证
$a->goback('验证码不正确');
unset($b['yanzheng']);
date_default_timezone_set('PRC');//设置为中国时区
$b['time']=date('Y-m-d H:i:s');//时间
if(empty($b['name'])&&empty($b['qq'])&&empty($b['content'])){
	$a->goback('你没有输入数据');
}
if($b['type']=='on')
	{$b['type']=1;}
else{$b['type']=0;}
// print_r($b);
// exit;
// $_SESSION['time']=$b['id'];
$a->insert("user_message",$b,"liuyan.php",1);
 ?>