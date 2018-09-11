<?php
require_once "db1.inc.php";
header("Content-Type:text/html;charset=utf-8");
session_start();
$a=new db1("localhost","root","123456","news");
if($_SESSION['zheng']!='denglu'){
$a->goback('请通过正常路径登录');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
</head>
	<frameset rows="15%,70%,15%" border="1">
  		<frame src='top.php' name="top" scrolling="no"/>
  		<frameset cols="15%,*">
  			<frame src="left.php" name="left" scrolling="no">
  			<frame src="right.php" name="right">
  		</frameset>
  		<frame src="bottom.php" name="bottom" scrolling="no"/>
	</frameset>
</html>