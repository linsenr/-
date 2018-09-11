<?php
require_once ".\db.inc.php";
header("Content-Type:text/html;charset=utf-8");
$a=new db("localhost","root","123456","news");
$sql='select id from im where im1='."'".热门物品."'";
$query=mysql_query($sql);
$imid=mysql_fetch_assoc($query);
// echo $imid['id'];
$sql1="select id,im2 from im where imid=".$imid['id']." order by id asc";
$res=$a->getsqldata($sql1);
// print_r(count($res));
// exit;
for($i=0;$i<count($res);$i++){
	$sql3="select id,im3 from im where imid=".$res[$i]['id']." order by id asc";
	$query3=mysql_query($sql3);
	while($ress=mysql_fetch_assoc($query3)){
		$rem[]=$ress;
	}
}
for($j=0;$j<count($rem);$j++){
	$sql2="select im3,content,photo from news_table where im3=".$rem[$j]['id'];
	$query2=mysql_query($sql2) or die(mysql_error());
	$arr[]=mysql_fetch_assoc($query2);
}
// $res=$a->getalldata("im");
//print_r($arr);
// exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/remen.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/remen.js" type="text/javascript"></script>
	<script src="js/foot.js" type="text/javascript"></script>
</head>
<body>
	<!-- logo和header。 -->
	<div id="tou">
		<div id="logo">
			<img src="image/logo.jpg">
		</div>
		<header>
			<img src="image/header.jpg">
			<div id="zi">
				<pre>
					<a href="login.php" style="text-decoration:none">注册</a>  <a href="login.php" style="text-decoration:none">登录</a>
					<a href="maic.html" style="text-decoration:none">免注册发布</a>
					<a href="maij.html" style="text-decoration:none">我想买</a>
					<a href="maic.html" style="text-decoration:none">我想卖</a>
				</pre>
			</div>
		</header>
	</div>
<!-- 导航栏 -->
		<div id="nav">
			<ul>
					<li><div class="svg-wrapper">
					<svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="index.php">首页</a></div></li>

					<li><div class="svg-wrapper">
					<svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="reqing.php">热情推荐</a></div></li>

					<li><div class="svg-wrapper">
				    <svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="remen.php" style="background:blueviolet">热门物品</a></div></li>

					<li><div class="svg-wrapper">
					<svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="huiyi.php">神秘仓库</a></div></li>

					<li><div class="svg-wrapper">
					<svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="liuyan.php">留言板</a></div></li>

					<li><div class="svg-wrapper">
					<svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="zhanzhang.html">关于站长</a></div></li>
			</ul>	
		</div>
		<div id="bang">热门物品排行榜</div>
		<div id="test">
			<div id="a">
			<div id="dian">电子产品类：</div>
			<div id="test1">
				<h3>1.</h3>
				<!-- image/tou1.jpg -->
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[0]['photo'])){echo $arr[0]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[0]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test1">
				<h3>2.</h3>
				<!-- image/tou2.jpg -->
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[1]['photo'])){echo $arr[1]['photo'];}else{echo '/image/tou2.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[1]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test1">
				<h3>3.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[2]['photo'])){echo $arr[2]['photo'];}else{echo '/image/tou3.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[2]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test1">
				<h3>4.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[3]['photo'])){echo $arr[3]['photo'];}else{echo 'image/tou3.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[3]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test1">
				<h3>5.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[4]['photo'])){echo $arr[4]['photo'];}else{echo '/image/tou5.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[4]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test1">
				<h3>6.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[5]['photo'])){echo $arr[5]['photo'];}else{echo '/image/tou6.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[5]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test1">
				<h3>7.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[6]['photo'])){echo $arr[6]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[6]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			</div>
			<div id="b">
			<div id="shu">书籍类：</div>
			<div id="test2">
				<h3>1.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[7]['photo'])){echo $arr[7]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[7]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test2">
				<h3>2.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[8]['photo'])){echo $arr[8]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[8]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test2">
				<h3>3.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[9]['photo'])){echo $arr[9]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[9]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test2">
				<h3>4.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[10]['photo'])){echo $arr[10]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[10]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test2">
				<h3>5.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[11]['photo'])){echo $arr[11]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[11]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test2">
				<h3>6.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[12]['photo'])){echo $arr[12]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[12]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test2">
				<h3>7.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[13]['photo'])){echo $arr[13]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[13]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			</div>
			<div id="c">
			<div id="yun">运动健身类：</div>
			<div id="test3">
				<h3>1.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[14]['photo'])){echo $arr[14]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[14]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test3">
				<h3>2.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[15]['photo'])){echo $arr[15]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[15]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test3">
				<h3>3.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[16]['photo'])){echo $arr[16]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[16]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test3">
				<h3>4.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[17]['photo'])){echo $arr[17]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[17]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test3">
				<h3>5.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[18]['photo'])){echo $arr[18]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[18]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test3">
				<h3>6.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[19]['photo'])){echo $arr[19]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[19]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			<div id="test3">
				<h3>7.</h3>
				<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[20]['photo'])){echo $arr[20]['photo'];}else{echo '/image/tou7.jpg';}?>">
				<div class="ding"><div class="min"><strong><?php echo $arr[20]['content']?></strong></div><input type="text"><button class="dislike">评价</button><br><button class="like">顶一下</button>
				<button class="tel">联系方式</button></div>
			</div>
			</div>
		</div>
				<!-- // var a=document.getElementsByClassName("like");
				// for(var i=0;i<a.length;i++)
				// (function(i){
				// 	$(a[i]).click(function(){
				// 		$(a[i]).text("你已经顶了").css({'cursor':'help'}).click(alert("物品很棒哦！"));
				// 		})
				// })(i)
				// </script>
				// var b=document.getElementsByClassName("tel");
				// for(var j=0;j<b.length;j++)
				// (function(j){
				// 	$(b[j]).click(function(){
				// 		$(b[j]).click(confirm("联系人qq:123456---微信:4651456---手机号:46565"));
				// 		})
				// })(j) -->
       <!--  版权 -->
       <footer>
        <div id="biao1"><h1>版权仅归制作人所有</h1></div>
        <div id="biao2"><h2>宝鸡文理学院老校区</h2></div>
        <div id="lian"><p>联系站长</p></div>
        <div id="bia"><div id="biao3"><img src="image/qq.gif"></div><div id="biao5"><img src="image/q.jpg"></div></div>
        <div id="bia1"><div id="biao4"><img src="image/weixin.gif"></div><div id="biao6"><img src="image/wei.jpg"></div></div>
        <div id="bia2"><div id="biao7"><img src="image/tel.gif"></div><div id="biao8"><p>18391342360</p></div>
       </footer>
</body>
</html>