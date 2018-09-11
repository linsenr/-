<?php
require_once "db.inc.php";
$a=new db("localhost","root","123456","news");
// $b=$a->getalldata("im");
// print_r($b);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻发布管理页面</title>
</head>
<body>
	<div style="width:450px;height:auto;margin:0 auto;background:beige;border:2px solid black">
		<form action="admin_news_im.php?idd1=1" method="post">
			<!-- <h5>增加一级栏目:</h5> -->
			<input type="text" name="add1">
			<input type="submit" value="增加">
		</form>
		<!-- 增加二级栏目 -->
		<?php if(!empty($_GET['im1'])){?>
		<form action="admin_news_im.php?b=1&idd2=<?php echo $_GET['id1']?>" method="post" >
			<!-- <h5>增加一级栏目:</h5> -->
			父栏目:<?php echo $_GET['im1']?>
			<input type="text" name="add2">
			<input type="submit" value="增加子栏目">
			<a href="admin_news.php">取消</a>
		</form>
		<?php
			}
		?>
		<!-- 修改一级栏目 -->
		<?php if(!empty($_GET['im3'])){?>
		<form action="update.php?b=1&idd2=<?php echo $_GET['id3']?>" method="post" >
			<!-- <h5>增加一级栏目:</h5> -->
			父栏目:<!-- <?php //echo $_GET['im1']?> -->
			<input type="text" name="add2" value="<?php echo $_GET['im3']?>">
			<input type="submit" value="修改">
			<a href="admin_news.php">取消</a>
		</form>
		<?php
			}
		?>
		<!-- 增加三级栏目 -->
		<?php if(!empty($_GET['im2'])){?>
		<form action="admin_news_im.php?c=1&idd3=<?php echo $_GET['id2']?>" method="post" >
			<!-- <h5>增加一级栏目:</h5> -->
			父栏目:<?php echo $_GET['im2']?>
			<input type="text" name="add3">
			<input type="submit" value="增加子栏目">
			<a href="admin_news.php">取消</a>
		</form>
		<?php
			}
		?>
		<!-- 修改二级栏目 -->
		<?php if(!empty($_GET['im4'])){?>
		<form action="update.php?c=1&idd3=<?php echo $_GET['id4']?>" method="post" >
			<!-- <h5>增加一级栏目:</h5> -->
			父栏目:<!-- <?php //echo $_GET['im2']?> -->
			<input type="text" name="add3" value="<?php echo $_GET['im4']?>">
			<input type="submit" value="修改">
			<a href="admin_news.php">取消</a>
		</form>
		<?php
			}
		?>
		<!-- 修改三级栏目 -->
		<?php if(!empty($_GET['im5'])){?>
		<form action="update.php?idd4=<?php echo $_GET['id5']?>" method="post" >
			<!-- <h5>增加一级栏目:</h5> -->
			父栏目:<!-- <?php //echo $_GET['im5']?> -->
			<input type="text" name="add4" value="<?php echo $_GET['im5']?>">
			<input type="submit" value="修改">
			<a href="admin_news.php">取消</a>
		</form>
		<?php
			}
		?>
	<?php 
	// 显示一级栏目 
	$sql1="select id,im1 from im where im1 !=''";
	$query1=mysql_query($sql1) or die(mysql_error());
	while($res=mysql_fetch_array($query1)){
		echo $res[im1]."<a href='admin_news.php?im1=$res[im1]&id1=$res[id]'>[增加二级]</a>"."<a href='admin_news.php?im3=$res[im1]&id3=$res[id]'>[修改]</a><br/>";
		echo "<hr/><br/>";
		// 取出所属二级栏目
		$sql2="select id,im2 from im where imid=".$res['id'];
		$query2=mysql_query($sql2) or die(mysql_error());
		while($res1=mysql_fetch_array($query2)){
		echo '-----------'.$res1[im2]."<a href='admin_news.php?im2=$res1[im2]&id2=$res1[id]'>[增加三级]</a>"."<a href='admin_news.php?im4=$res1[im2]&id4=$res1[id]'>[修改]</a><br/>";
		echo "<hr/><br/>";
			// 取出三级栏目
			$sql3="select id,im3 from im where imid=".$res1['id'];
			$query3=mysql_query($sql3) or die(mysql_error());
			while($res2=mysql_fetch_array($query3)){
			echo '-----------------------'.$res2[im3]."<a href='admin_news.php?im5=$res2[im3]&id5=$res2[id]'>[修改]</a><br/>";
			echo "<hr/><br/>";
		}
		}
	}
	?>
	</div>
</body>
</html>