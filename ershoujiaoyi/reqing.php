<?php
require_once ".\db.inc.php";
header("Content-Type:text/html;charset=utf-8");
$a=new db("localhost","root","123456","news");
$sql='select id from im where im1='."'".热情推荐."'";
$query=mysql_query($sql);
$imid=mysql_fetch_assoc($query);
// echo $imid['id'];
$sql1="select id,im2 from im where imid=".$imid['id']." order by id asc";
$res=$a->getsqldata($sql1);
// Array ( [0] => Array ( [id] => 226 [im2] => 自行车 ) [1] => Array ( [id] => 225 [im2] => 热门小说 ) [2] => Array ( [id] => 224 [im2] => 电子产品 ) [3] => Array ( [id] => 223 [im2] => 热门书籍 ) ) 
for($i=0;$i<count($res);$i++){
	$sql2="select im2,content,photo from news_table where im2=".$res[$i]['id'];
	$query2=mysql_query($sql2) or die(mysql_error());
	$rem[]=mysql_fetch_assoc($query2);
}
// $res=$a->getalldata("im");
// print_r($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>热情推荐</title>
	<link rel="stylesheet" href="css/reqing.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="js/reqing.js" type="text/javascript"></script>
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
					<a href="reqing.html" style="background:blueviolet">热情推荐</a></div></li>

					<li><div class="svg-wrapper">
				    <svg height="40" width="122">
                              <rect class="shape" height="40" width="122"></rect>
                         </svg>
					<a href="remen.php">热门物品</a></div></li>

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
		<!-- 主要内容 -->
		<div id="tuijian"><h1>本站倾情为您推荐几款物品</h1></div>
		<div id="tex"><h3 id="a">推荐星级</h3>
						<h3 id="b">产品类</h3>
						<h3 id="c">产品描述</h3>
						<h3 id="d">性价比</h3>
						</div>
		<div id="xing"><img id="img1" src="image/xing5.gif">
						<img id="img2" src="image/xing5.gif">
						<img id="img3" src="image/xing4.gif">
						<img id="img4" src="image/xing4.gif"></div>
		<div id="da">
		<div class="text">
		<!-- image/kaoyan.jpg	 -->
			<img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($rem[0]['photo'])){echo $rem[0]['photo'];}else{echo '/image/kaoyan.jpg';}?>" style="width:300px;height:250px">
			<!-- 关于大二，大三有意考研的学生，本站可以为你提供几种往届考研所使用的考研书，仅供参考，同时也希望大家考研顺利！ -->
						<div class="ha"><?php echo $rem[0]['content']?><br><div class="h">联系方式</div><div class="nei"><p>qq:1376923177</p><p>微信:林</p><p>手机:18391342360</p><br></div></div>
				<div class="jia"><div class="zhi"><div class="bao"><h5>质量：</h5><img class="img1" src="image/xing5.gif"></div>
												<div class="bao"><h5>价格：</h5><img class="img2" src="image/xing5.gif"></div>
												<div class="bao"><h5 style="color:red">实用价值：</h5><img class="img3" src="image/xing5.gif"></div>
												<input type="text" id="qp" name="liuyan" value="">
												<button onclick="fun1()" id="liu1" value="123">留言</button>
												<div id="kuang"><div id="kua1">1232</div><button class="guan">关闭</button></div></div>
				</div></div>

		<div class="text"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($rem[1]['photo'])){echo $rem[1]['photo'];}else{echo '/image/d1.jpg';}?>" style="width:300px;height:250px">
						<div class="ha"><?php echo $rem[1]['content']?><!-- 对于一个理工科学生，动手能力必须培养，所以时常去看和拆一些小型电子产品也显得尤为重要，所以为大家提供一些小器件！ --><br><div class="h">联系方式</div><div class="nei"><p>qq:1376923177</p><p>微信:林</p><p>手机:18391342360</p><br></div></div>

				<div class="jia"><div class="zhi"><div class="bao"><h5>质量：</h5><img src="image/xing5.gif"></div>
												<div class="bao"><h5>价格：</h5><img src="image/xing5.gif"></div>
												<div class="bao"><h5 style="color:red">实用价值：</h5><img src="image/xing5.gif"></div>
												<input type="text" id="qp1" name="liuyan" value="">
												<button onclick="fun2()" id="liu2" value="123">留言</button>
												<div id="kuang1" ><div id="kua2">1232</div><button class="guan">关闭</button></div></div>
				</div></div>

		<div class="text"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($rem[2]['photo'])){echo $rem[2]['photo'];}else{echo '/image/s2.jpg';}?>" style="width:300px;height:250px">
						<div class="ha"><?php echo $rem[2]['content']?><!-- 对于现在的大学生而言，学习很重要，但是自己的身体也同样重要，所有可以利用空闲时间去作一些锻炼，因此为大家提供一些室内健身器材！ --><br><div class="h">联系方式</div><div class="nei"><p>qq:1376923177</p><p>微信:林</p><p>手机:18391342360</p><br></div></div>
						<div class="jia"><div class="zhi"><div class="bao"><h5>质量：</h5><img src="image/xing5.gif"></div>
												<div class="bao"><h5>价格：</h5><img src="image/xing5.gif"></div>
												<div class="bao"><h5 style="color:red">实用价值：</h5><img src="image/xing5.gif"></div>
												<input type="text" id="qp2" name="liuyan" value="">
												<button onclick="fun3()" id="liu3" value="123">留言</button>
												<div id="kuang2" ><div id="kua3">1232</div><button class="guan">关闭</button></div></div>
				</div></div>

		<div class="text"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($rem[3]['photo'])){echo $rem[3]['photo'];}else{echo '/image/c1.jpg';}?>" style="width:300px;height:250px">
						<div class="ha"><?php echo $rem[3]['content']?><!-- 对于喜欢骑行的同学可以了解一下，为大家平时出去玩提供一些学校或者校外比较方便的山地车！ --><br><div class="h">联系方式</div><div class="nei"><p>qq:1376923177</p><p>微信:林</p><p>手机:18391342360</p><br></div></div>
						<div class="jia"><div class="zhi"><div class="bao"><h5>质量：</h5><img src="image/xing5.gif"></div>
												<div class="bao"><h5>价格：</h5><img src="image/xing5.gif"></div>
												<div class="bao"><h5 style="color:red">实用价值：</h5><img src="image/xing5.gif"></div>
												<input type="text" id="qp3" name="liuyan" value="">
												<button onclick="fun4()" id="liu4" value="123">留言</button>
												<div id="kuang3" ><div id="kua4">1232</div><button class="guan">关闭</button></div></div>
				</div></div>
				</div>

					<!-- // function fun1(){
					// 	var liu=document.getElementById("qp").value;
					// 	$("#kua1").html(liu);
					// }
					// function fun2(){
					// 	var liu=document.getElementById("qp1").value;
					// 	$("#kua2").html(liu);
					// }
					// function fun3(){
					// 	var liu=document.getElementById("qp2").value;
					// 	$("#kua3").html(liu);
					// }
					// function fun4(){
					// 	var liu=document.getElementById("qp3").value;
					// 	$("#kua4").html(liu);
					// } -->

				<!-- //联系方式的实现
					// var a=document.getElementsByClassName("h");
					// var b=document.getElementsByClassName("nei");
					// 	for(var i=0;i<a.length;i++)
					// 	(function(i){
					// 		$(a[i]).click(function(){
					// 			for(var j=0;j<b.length;j++)
					// 				(function(j){
					// 					if(i==j)
					// 					$(b[i]).toggle();
					// 				})(j)
					// 		})	
					// 	})(i)
					// 	// 留言功能的实现 
					// var button=document.getElementsByTagName("button");
					// 		for(var i=0;i<button.length;i++)
					// 			(function(i){
					// 	    	$(button[i]).click(function(){
					// 	    		// alert(i);
					// 	    		if(i==0){
					// 			    $("#kuang").show();}
					// 			    if(i==1){
					// 			    $("#kuang").hide();	
					// 			    }
					// 			    if(i==2){
					// 			    $("#kuang1").show();}
					// 			    if(i==3){
					// 			    $("#kuang1").hide();
					// 			    }
					// 			    if(i==4){
					// 			    $("#kuang2").show();}
					// 			    if(i==5){
					// 			    $("#kuang2").hide();}
					// 			    if(i==6){
					// 			    $("#kuang3").show();}
					// 	    		if(i==7){
					// 			    $("#kuang3").hide();}
					// 			});
					// 			})(i);
					// var a=document.getElementsByTagName("input")[0];
					// var b=a.innerhtml();
					// alert(b);	
					// 	for(var j=0;j<button.length;j++)
					// 	{
					// 		(function(j){

					// 		})(j);
					// 	}		
							 -->	

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