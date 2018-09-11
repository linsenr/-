<?php 
require_once "db.inc.php";
$a=new db("localhost","root","123456","news");//链接库
function news($id,$im2,$im3){//214,im1
	// echo $id;
	// echo $im;
	// exit;
	
		// $sql='select * from news_table where '.$im1.'='.$id.' and '.$im2.'='.$im2. ' and '.$im3.'='.$im3;//214
		$sql = 'select * from news_table where im1='.$id.' and im2='.$im2.' and im3='.$im3;
		// echo $sql;
		$query=mysql_query($sql);
		while($res=mysql_fetch_assoc($query))
		{
				echo "<li style='margin-left:30px'>".$res['title'].'</li>';
		}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>显示页面</title>
	<style>
		.news{
			width:300px;
			height:300px;
			border:2px solid black;
			background:yellow;
			float:left;
			margin-left:50px;
		}

	</style>
</head>
<body>
	<div class="news">
		<h2>宝鸡文理学院</h2>
		<?php
		news(214,0,0);
		?>
	</div>
	<div class="news">
	<h2>电子电气工程学院</h2>
		<ul>

			<?php $sql="select * from news_table where im1!=0 and im2=215 and im3=0";//215
			news(214,215,0);
			// $query=mysql_query($sql);
			// while($res=mysql_fetch_assoc($query)){
			// 	echo '<li>'.$res['title'].'</li>';
			// }
			?>
		</ul>
	</div>
	<div class="news">
	<h2>电子信息工程</h2>
		<ul>
			<?php $sql="select * from news_table where im1!=0 and im2!=0 and im3=218";//218
			news(214,215,218);
			// $query=mysql_query($sql);
			// while($res=mysql_fetch_assoc($query)){
			// 	echo '<li>'.$res['title'].'</li>';
			// }
			?>
		</ul>
	</div>
</body>
</html>