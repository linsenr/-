<?php
require_once ".\db.inc.php";
header("Content-Type:text/html;charset=utf-8");
$a=new db("localhost","root","123456","news");
if(!empty($_GET['id'])){
$res=$a->getonedata('yonghu',$_GET['id'],MYSQL_ASSOC);
}
// 开始
$sql='select id from im where im1='."'".首页."'";
$query=mysql_query($sql);
$imid=mysql_fetch_assoc($query);
// echo $imid['id'];
$sql1="select id,im2 from im where imid=".$imid['id']." order by id asc";
// echo $sql1;
// exit;
$res=$a->getsqldata($sql1);
for($i=0;$i<count($res);$i++){
  $sql3="select id,im3 from im where imid=".$res[$i]['id']." order by id asc";
  $query3=mysql_query($sql3);
  while($ress=mysql_fetch_assoc($query3)){
    $rem[]=$ress;
  }
}
for($j=0;$j<count($rem);$j++){
  $sql2="select title,im3,content,photo from news_table where im3=".$rem[$j]['id'];
  $query2=mysql_query($sql2) or die(mysql_error());
  $arr[]=mysql_fetch_assoc($query2);
}
// $res=$a->getalldata("im");
//print_r($arr);
// exit;
?> 
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<!-- 主页css -->
<link rel="stylesheet" href="css/index.css">
<!-- 大图轮播css -->
<link rel="stylesheet" href="css/lunbo.css">
<!-- 新闻边框CSS -->
<link rel="stylesheet" href="css/border.css">
<!-- 友情链接css -->
<link rel="stylesheet" href="css/lianjie.css">
<!-- 隐藏遮罩css -->
<link rel="stylesheet" href="css/yincang.css">
<!-- 新闻滚动css -->
<link rel="stylesheet" href="css/news.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- 轮播js -->
<!-- <script type="text/javascript" src="js/lunbo.js"></script> -->
<!-- 隐藏js -->
<script type="text/javascript" src="js/yincang.js"></script>
<!-- 友情链接js -->
<!-- <script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="wowslider.js"></script> -->
<!-- 新闻边框js -->
<script type="text/javascript" src="js/border.js"></script>
<!-- 新闻滚动插件js -->
<!-- 侧边栏消失 -->
<script src="js/miss.js" type="text/javascript"></script>

<!-- 返回顶端js -->
<script src="js/gotop.js" type="text/javascript"></script>
<script src="js/foot.js" type="text/javascript"></script>
<meta charset="UTF-8">
<title>二手交易网</title> 
</head>
<body>
<!-- 返回顶端 -->
    <div>  
     <a id="gotop" href="">
     <img src="image/1.png" alt="">
     </a>  
     </div>
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
          <p style="margin-left:400px;margin-top:-25px"><?php if(!empty($_GET['id'])){echo $res['name'];}?></p>
          <p style="margin-left:400px;margin-top:-50px"><a style="text-decoration:none" href="index.php">退出登录</a></p>
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
					<a href="index.php" style="background:blueviolet">首页</a></div></li>

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
<!-- 搜索框 -->
      <div id="search">
      	<input type="text" id="text">
      	<input type="submit" name="submit" value="搜索" id="submit">
        <a href="choujiang.html" style="overflow:hidden"><img src="image/surprise.jpg"></a>
      </div>


      <article id="main">
  <!-- 页面收起按钮 -->
      <div id="try">
            <image src="image/btn.jpg">点我试试
      </div>
  <!-- 大图轮播 -->
    <section class="section">
	  <div class="lunbo" id="3Dlunbo">
    <div class="slideshow grid_12">
        <div class="holder">            
            <div id="wowslider-container">
                <div class="ws_images">
                    <ul>
                        <li><a href="#"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[0]['photo'])){echo $arr[0]['photo'];}else{echo '/image/kaoyan.jpg';}?>" alt="123" title="" id="lunbo_img" /></a>			
                        </li>
                        <li><a href="#"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[1]['photo'])){echo $arr[1]['photo'];}else{echo '/image/kaoyan.jpg';}?>" alt="456" title="" id="lunbo_img" /></a>
                        </li>
                        <li><a href="#"><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[2]['photo'])){echo $arr[2]['photo'];}else{echo '/image/kaoyan.jpg';}?>" alt="789" title="" id="lunbo_img" /></a>
                        </li>
                        <li><iframe  src="#" frameborder="0" allowfullscreen></iframe><img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[3]['photo'])){echo $arr[3]['photo'];}else{echo '/image/kaoyan.jpg';}?>" alt="012" title="" id="lunbo_img" />
                        </li>
                    </ul>
                </div>
                <div class="ws_bullets">
                    <div>
                       <a href="#"><img src="images/banner1.jpg" alt="CSS3 Slider" /></a>
                       <a href="#"><img src="images/banner2.jpg" alt="CSS Slideshow" /></a>
                       <a href="#"><img src="images/banner3.png" alt="CSS Gallery" /></a>
                       <a href="#"><img src="images/banner4.jpg" alt="Video Support" /></a>
                    </div>
                </div>
            </div>
        <!--------------3D大图轮播JS代码-------------------------->
        <script type="text/javascript" src="js/wowslider.js"></script>
    	  <script type="text/javascript" src="js/script.js"></script>
      </div>
    </div>
  </div>  
	  </section>
      	
<!-- 表格部分 -->
        <section class="section">
      		<div id="group">
                    <table cellspacing="5" id="tu">
                        <tr><td colspan="3" class="ff">电子产品类</td><td class="ff"><a href="#">查看更多</a></td>
                        </tr>
                <tr>
                    <td class="f">
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[8]['photo'])){echo $arr[8]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[8]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                    </td>

                <td class="f">
               
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[9]['photo'])){echo $arr[9]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[9]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                        
                </td>


                   <td class="f">
                
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[10]['photo'])){echo $arr[10]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[10]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                       
                </td>

                 <td class="f">
                  
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[11]['photo'])){echo $arr[11]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[11]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                     
                </td>
                </tr>
                        <tr><td colspan="3" class="ff">书籍类</td><td class="ff"><a href="#">查看更多</a></td></tr>
                        <tr>
                        <td class="f">
                  
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[12]['photo'])){echo $arr[12]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[12]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                     
                    </td>
                        <td class="f">
                  
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[13]['photo'])){echo $arr[13]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[13]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                     
                    </td>
                        <td class="f">
                  
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[14]['photo'])){echo $arr[14]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[14]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                     
                    </td>
                        <td class="f">
                  
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[15]['photo'])){echo $arr[15]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[15]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                     
                    </td>
                        </tr>
                        <tr><td colspan="3" class="ff">自行车</td><td class="ff"><a href="#">查看更多</a></td></tr>
                        <tr>
                        <td class="f">
                  
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[16]['photo'])){echo $arr[16]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[16]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                     
                    </td>
                        <td class="f">
                  
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[17]['photo'])){echo $arr[17]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[17]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                     
                    </td>
                        <td class="f">
                  
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[18]['photo'])){echo $arr[18]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[18]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>

                     
                    </td>
                        <td class="f">
                  
                        <img src="http://localhost/ershoujiaoyi/admin/<?php if(!empty($arr[19]['photo'])){echo $arr[19]['photo'];}else{echo '/image/kaoyan.jpg';}?>">
                        <span class="mask"><?php echo $arr[19]['content']?>
                        <div class="ren"><p>qq:1376923177</p><p style="margin-left:-42px">微信:林</p><p style="font-size:12px">photo:18391342360</p></div>
                        <button class="zhu">联系物主</button>
                        <img src="image/heart.gif">
                        </span>
                     
                    </td>
                        </tr>

                    </table>
                </div>
      	</section>
        <!-- 新闻框 -->
        <aside>
    <div id="news">
      		<div class="scrollbox" style="position: relative;height:278px">
          <div id="scroll" style="width:250px;height:620px;position:absolute;">
           <div id="scrollDiv" style="position:absolute;/*top:286px*/">
        <ul>
          <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit"><?php echo $arr[4]['title']?></a></h3><div><?php echo $arr[4]['content']?>... </div></li>

          <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit"><?php echo $arr[5]['title']?></a></h3> <div><?php echo $arr[5]['content']?>... </div></li>

          <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit"><?php echo $arr[6]['title']?></a></h3> <div><?php echo $arr[6]['content']?>... </div></li>

          <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit"><?php echo $arr[7]['title']?></a></h3> <div><?php echo $arr[7]['content']?>... </div></li>

          <!-- <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit">第一条新闻</a></h3> <div>
          目前已有包括咖啡厅、酒吧、餐厅、瑜伽室在内的8家商铺入驻该火车... </div></li> -->
      </ul>
           </div>
           <div id="scrollDiv1" style="width:250px;height:280px;top:270px;position:absolute;">
              <ul>
          <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit"><?php echo $arr[4]['title']?></a></h3><div><?php echo $arr[4]['content']?>... </div></li>

          <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit"><?php echo $arr[5]['title']?></a></h3> <div><?php echo $arr[5]['content']?>... </div></li>

          <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit"><?php echo $arr[6]['title']?></a></h3> <div><?php echo $arr[6]['content']?>... </div></li>

          <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit"><?php echo $arr[7]['title']?></a></h3> <div><?php echo $arr[7]['content']?>... </div></li>

          <!-- <li><h3><a href="#" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" class="linktit">第一条新闻</a></h3> <div>
          目前已有包括咖啡厅、酒吧、餐厅、瑜伽室在内的8家商铺入驻该火车... </div></li> -->
      </ul>


           </div>
           </div>
            </div>
      		</div>
          <script src="js/news.js" type="text/javascript"></script>
         <!--  // var r=document.getElementsByClassName("scrollbox");//获取竖向滚动的id
          // var x=document.getElementById("scrollDiv");//获取竖向滚动的id
          // var height1=r.offsetHeight;//父盒子高度250px
          // var height2=x.offsetHeight;//子盒子高度135px
          // var t=x.scrollTop;
          // function move(){
          //   t=t+5;
          //   x.style.top=-t+285+"px";
          //   if(t==530)
          //   {
          //     t=0;
          //   }
          // }
          //     var time=setInterval('move()','100');
          // x.onmouseenter=function(){
          //   clearInterval(time);
          // }
          //  x.onmouseleave=function(){
          //   time=setInterval('move()','100');
          //  }  -->
		<!-- 排行榜 -->
		    <div id="top">
		    	<h1>收藏排行</h1>
          
            <div class="no1">
            <img src="image/d1.jpg">
            <h2>nsdjsdkvingfeb<br>获赞4314次</h2>
            </div>
            <div class="no1">
              <img src="image/s1.jpg">
              <h2>cnodvhwpvjwlv<br>获赞3314次</h2>
            </div>
            <div class="no1">
              <img src="image/c1.jpg">
              <h2>vnelrivrifdsugu<br>获赞2314次</h2>
            </div>
        <ul>
          <li>健身卡</li>
          <li>旧书架</li> 
          <li>架子鼓</li>
        </ul>
          
		    </div>

			<!-- <div id="con">
				<h2>联系方式:</h2>
				<h3>QQ:</h3>
				<h3>微信：</h3>
			</div> -->
      	</aside>
      </article>
    <!--  友情链接 -->
     <div id="lianjie">
             <h1>友情链接</h1>          
                <div id="friendshipImg">
                  <ul style="width: 3700px; left: -723px;">
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                  
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href="#"><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href=""><img src="image/01.jpg" width="150px" height="150px"></a></li>
                    <li><a href=""><img src="image/01.jpg" width="150px" height="150px"></a></li>
                  </ul> 
               </div>
        </div>
        <script type="text/javascript" src="js/lunbo.js"></script>
    <!--  版权 -->
       <footer>
        <div id="biao1"><h1>版权仅归制作人所有</h1></div>
        <div id="biao2"><h2>宝鸡文理学院老校区</h2></div>
        <div id="lian"><p>联系站长</p></div>
        <div id="bia"><div id="biao3"><img src="image/qq.gif"></div><div id="biao5"><img src="image/q.jpg"></div></div>
        <div id="bia1"><div id="biao4"><img src="image/weixin.gif"></div><div id="biao6"><img src="image/wei.jpg"></div></div>
        <div id="bia2"><div id="biao7"><img src="image/tel.gif"></div><div id="biao8"><p>18391342360</p></div>
        </footer>
        <script src="jquery.min.js"></script>
       
</body>
</html>