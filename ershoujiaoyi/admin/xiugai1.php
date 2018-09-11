<?php 
// $_POST['user'];
// $_POST['pass'];
require_once ".\db1.inc.php";
header("Content-Type:text/html;charset=utf-8");
$a=new db1("localhost","root","123456","news");
if($_POST['xiugai']=='修改'){
	$sql1='update guanliyuan set user='."'".$_POST['user']."'".',pass='."'".$_POST['pass']."'";
	// .' where user='."'"."$_POST[user]"."'"
	// .'where user='.$_POST['user']
	// echo $sql1;
	// exit;
	$query=mysql_query($sql1) or die(mysql_error());
	if(mysql_affected_rows()>0){
	echo "<script>
      	alert('修改成功');
      	window.location.href='right.php';
      	</script>";
      }else{
      	echo "<script>
      	alert('修改失败');
      	window.location.href='right.php';
      	</script>";
      }
	}
 ?>
