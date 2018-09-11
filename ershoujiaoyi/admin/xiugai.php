<?php 
require_once ".\db1.inc.php";
header("Content-Type:text/html;charset=utf-8");
$a=new db1("localhost","root","123456","news");
$sql="select * from guanliyuan";
$query=mysql_query($sql);
$res=mysql_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改密码</title>
</head>
<body>
 <div style="background:url(image/denglu.jpg);width:205px;height:200px;margin-left:500px;margin-top:100px;background:beige;border:2px solid black;border-radius:15px">
	<form action="xiugai1.php" method="post">
		用户名:<input type="text" name="user" value="<?php echo $res['user']?>"><br/>
		密码:<input style="margin-left:15px" type="password" name="pass" value="<?php echo $res['pass']?>"><br/>
		<input style="margin-left:30px" type="submit" name="xiugai" value="修改">
		<input style="margin-left:15px" type="reset" value="重置"><br/>
	</form>
	</div>
</body>
</html>