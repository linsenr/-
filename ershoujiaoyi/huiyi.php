<?php
require_once ".\db.inc.php";
header("Content-Type:text/html;charset=utf-8");
$a=new db("localhost","root","123456","news");
$sql='select id from im where im1='."'".神秘仓库."'";
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
// print_r($arr);
// exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/huiyi.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
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
					<a href="index.html">首页</a></div></li>

					<li><div class="svg-wrapper">
					<svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="reqing.php">热情推荐</a></div></li>

					<li><div class="svg-wrapper">
				    <svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="remen.php">热门物品</a></div></li>

					<li><div class="svg-wrapper">
					<svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="huiyi.php" style="background:blueviolet">神秘仓库</a></div></li>

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
	<div id="zong">
		<div id="tu"><h2>个人仓库</h2>
			<div id="huo"><h3>免费送出，先到先得</h3>
				<div id="tu1"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[0]['photo'])){echo $arr[0]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p1">我要领</button><button class="p2">有货</button>
							  <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[1]['photo'])){echo $arr[1]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p3">我要领</button><button class="p4">有货</button>
							  <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[2]['photo'])){echo $arr[2]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p1">我要领</button><button class="p2">有货</button>
							  <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[3]['photo'])){echo $arr[3]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p3">我要领</button><button class="p4">有货</button>
				</div>
			</div>
			<div id="huo1"><h3>友情出售</h3>
				<div id="tu2"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[4]['photo'])){echo $arr[4]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p1">我要领</button><button class="p2">有货</button>
							  <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[5]['photo'])){echo $arr[5]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p3">我要领</button><button class="p4">有货</button>
				</div>
			</div>
	</div>

		<div id="tu"><h2>好友仓库</h2>
			<div id="huo"><h3>免费送出，先到先得</h3>
				<div id="tu1"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[6]['photo'])){echo $arr[6]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p1">我要领</button><button class="p2">有货</button>
						      <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[7]['photo'])){echo $arr[7]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p3">我要领</button><button class="p4">有货</button>
							  <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[8]['photo'])){echo $arr[8]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p1">我要领</button><button class="p2">有货</button>
							  <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[9]['photo'])){echo $arr[9]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p3">我要领</button><button class="p4">有货</button>
				</div>
			</div>
			<div id="huo1"><h3>友情出售</h3>
				<div id="tu2"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[10]['photo'])){echo $arr[10]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p1">我要领</button><button class="p2">有货</button>
							  <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[11]['photo'])){echo $arr[11]['photo'];}else{echo '/image/kaoyan.jpg';}?>"><button class="p3">我要领</button><button class="p4">有货</button>
				</div>
			</div>
		</div>
	</div>
			<script>
				var a=document.getElementsByTagName("button");
				for(var i=1;i<a.length+1;i++)
					(function(i){
						if(i%2==0)
							$(a[i-1]).click(function(){
							$(a[i-1]).text("无货").css({'cursor':'pointer-events'});
							});
						else
						$(a[i-1]).click(function(){
							$(a[i-1]).text("已送完");
							});
					})(i)
			</script>
	<footer>
        <div id="biao1"><h1>版权仅归制作人所有</h1></div>
        <div id="biao2"><h2>宝鸡文理学院老校区</h2></div>
        <div id="lian"><p>联系站长</p></div>
        <div id="bia"><div id="biao3"><img src="image/qq.gif"></div><div id="biao5"><img src="image/q.jpg"></div></div>
        <div id="bia1"><div id="biao4"><img src="image/weixin.gif"></div><div id="biao6"><img src="image/wei.jpg"></div></div>
        <div id="bia2"><div id="biao7"><img src="image/tel.gif"></div><div id="biao8"><p>18391342360</p></div>
        <script>
          $(document).ready(function(){
            $("#bia").mouseover(function(){
              $("#biao3").hide()
              $("#biao5").show()
            })
            $("#bia").mouseout(function(){
              $("#biao3").show()
              $("#biao5").hide()
            })
          })
          $(document).ready(function(){
            $("#bia1").mouseover(function(){
              $("#biao4").hide()
              $("#biao6").show()
            })
            $("#bia1").mouseout(function(){
              $("#biao4").show()
              $("#biao6").hide()
            })
          })
          $(document).ready(function(){
            $("#biao7").mouseover(function(){
              $("#biao8").show()
            })
            $("#biao7").mouseout(function(){
              $("#biao8").hide()
            })
          })
        </script>
       </footer>
</body>
</html>