<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录页面</title>
	<style>
		input{
			margin-top:20px;
		}
	</style>
</head>
<body style="background:url(image/denglu.jpg)">
 <div style="width:205px;height:200px;margin-left:1100px;margin-top:200px;background:beige;border:2px solid black;border-radius:15px">
	<form action="login1.php" method="post">
		用户名:<input type="text" name="user"><br/>
		密码:<input style="margin-left:15px" type="password" name="pass"><br/>
		验证码:<input style="width:60px" type="text" name="yanzheng"><img style="width:70px;margin-left:10px" src="yanzheng.php" onclick="this.src=this.src+'?'+Math.random()"><br/>
		<input style="margin-left:10px" type="submit" name="denglu" value="登录">
		<input style="margin-left:10px" type="submit" name="zhuce" value="注册">
		<input style="margin-left:10px" type="reset" value="重置"><br/>
	</form>
	</div>
</body>
</html>