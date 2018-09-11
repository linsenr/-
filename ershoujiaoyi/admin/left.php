<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		ul li{
			list-style:none;
			margin-top:10px;
			margin-left:35px;
		}
		ul li a{
			text-decoration:none;
			color:black;
		}
	</style>

<script type="text/javascript">
function fun(){
if (window.top!=window.self){
	window.top.location="index.htm";
}
}
</script>
</head>
<body>
	<div style="width:120%;height:510px;margin-top:-17px;background:url(image/left.jpg);background-size:cover">
		<ul style="padding-top:20px">
			<li><a href=".\admin_news.php" target="right">编辑栏目</a></li>
			<li><a href=".\admin_news_add.php" target="right">添加新闻</a></li>
			<li><a href=".\admin_news_list.php" target="right">编辑新闻</a></li>
			<li><a href=".\liuyan.php" target="right">管理留言</a></li>
			<li><a href=".\xiugai.php" target="right">修改密码</a></li>
			<li><a href=".\backup.php" target="right">备份数据</a></li>
			<li><a href="..\index.php" target="_top" onclick="fun()">退出系统</a></li>
		</ul>
	</div>
</body>
</html>