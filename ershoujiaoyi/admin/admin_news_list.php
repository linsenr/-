<?php 
require_once "db.inc.php";
require_once "page.inc.php";
$a=new db("localhost","root","123456","news");
$s=new page('news_table',4,'admin_news_list.php');
// $table,$pagesize,$url
$s->get_cur_page();
$res=$s->get_cur_data();
// print_r($res);
// exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻编辑页面</title>
</head>
<body>
<div style="width:270px;height:auto;margin:0 auto;background:beige">
	<table border="2" cellspacing="2" cellpadding="2" style="margin:0 auto">
		<tr><a style="margin-left:100px;color:black" href="admin_news_add.php">添加内容</a></tr>
		<tr><th width="300">标题</th><th width="100">栏目</th><th width="100">操作1</th><th width="100">操作2</th></tr>
		<?php
			// $sql1="select id,title,im1,im2,im3 from news_table limit 4";
			// $query1=mysql_query($sql1);
			// while($res=mysql_fetch_assoc($query1)){
		for($i=0;$i<count($res);$i++){
		// while($res=$s->get_cur_data()){
				// 判断一级标题并且取值
				if(!empty($res[$i]['im1'])&&empty($res[$i]['im2'])){
					// $im='一级栏目';
					$sql2="select im1 from im where id=".$res[$i]['im1'];
					$query2=mysql_query($sql2);
					$res2=mysql_fetch_assoc($query2);
					$im=$res2['im1'];
				}
				// 判断一级标题并且取值
				else if(!empty($res[$i]['im1'])&&!empty($res[$i]['im2'])&&empty($res[$i]['im3'])){
					// $im='二级栏目';
					$sql2="select im2 from im where id=".$res[$i]['im2'];
					$query2=mysql_query($sql2);
					$res2=mysql_fetch_assoc($query2);
					$im=$res2['im2'];
				// 判断一级标题并且取值
				}else{
					// $im='三级栏目';
					$sql2="select im3 from im where id=".$res[$i]['im3'];
					$query2=mysql_query($sql2);
					$res2=@mysql_fetch_assoc($query2);
					$im=$res2['im3'];
				}
		?>
		<tr><th><?php echo $res[$i]['title']?></th><th><?php echo $im?></th><th><a href="admin_delete.php?delete=<?php echo $res[$i]['id']?>">删除</a></th><th><a href="admin_news_add.php?update=<?php echo $res[$i]['id']?>">修改</a></th></tr>
		<?php }?>
		<?php $s->show_fenye()?>
	</table>
	</div>
</body>
</html>