<?php
	require_once ".\db.inc.php";
	require_once ".\page.inc.php";
header("Content-Type:text/html;charset=utf-8");
	$a=new db("localhost","root","123456","liuyan");
	$h=$a->getalldata("user_message");//获取数据库中所有数据
	if(empty($_GET['a'])){
	$page1=new page("user_message",4,"liuyan.php");
		if($_GET['page']){
		$num=$_GET['page'];}
		else{$num=1;}
  	$records=$page1->records;
	$page1->get_cur_page();	
	$p=$page1->get_cur_data();
	$q=$page1->getalldata("user_message");
	function replace_em1($str){
	$str = preg_replace('/\</','&lt;',$str);
	$str = preg_replace('/\>/','&gt;',$str);
	$str = preg_replace('/\n/','<br/>',$str);
	$str = preg_replace('/\[em_([0-9]*)\]/','<img src="arclist/$1.gif" style="width:20px;height:20px;margin-top:0px;margin-left:0px;float:none" border="0" />',$str);
	return $str;
	}
	}
	//判断是否搜索
	if($_GET['sou']=='搜索' || !empty($_GET['a'])){
	$su=$_GET['a'];
	$page2=new page("user_message",4,"liuyan.php");
	// $sql="select * from user_message where content like '%$su%'";
	$sql="select * from user_message where content like '%$su%'";
	$q=$a->getsqldata($sql);//执行上面sql语句
	$y=count($q);//记下总记录数
	if(!empty($q)){//判断是否找到相同语句
		// $records=count($q);
		if($_GET['page']){
		$num=$_GET['page'];}
		else{$num=1;}
	}
	$page2->get_cur_page();	
	$p=$page2->get_cur_data1("$su");
	$records=count($p);//返回当前显示记录数
	$ss=count($q);////记下总记录数 和上面$y一样，但是$y用来自减，$ss用来给分页传参数
	function replace_em1($str){
	$str = preg_replace('/\</','&lt;',$str);
	$str = preg_replace('/\>/','&gt;',$str);
	$str = preg_replace('/\n/','<br/>',$str);
	$str = preg_replace('/\[em_([0-9]*)\]/','<img src="arclist/$1.gif" style="width:20px;height:20px;margin-top:0px" border="0" />',$str);
	return $str;
	}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
	<link rel="stylesheet" href="css/liuyan.css">
	<link rel="stylesheet" href="css/biaoqing.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/liuyan.js"></script>
	<style>
	.aa{
		width:200px;
		height:80px;
		background:yellow;
	}
	</style>
</head>
<body>
	<div id="da"><img src="image/header.jpg"><a style="position:absolute;margin-left:-50px" href="login.php">登录</a></div>
	<div id="nav"><a href="index.php">返回首页</a><div id="nav1"><div id="wei"><div id="wei1"><p>请大家畅所欲言吧！</p></div><div id="wei2"><p>请大家畅所欲言吧！</p></div></div></div></div>
	<div id="zheng">
		<div id="aside">
			<div class="aside1"><div id="an"><h3 id="an1">默认图片</h3><h3 id="an2">历史访客</h3></div>
				<div id="li1">
				<img src="image/tuxiang1.jpg">
				<img src="image/tuxiang2.jpg">
				<img src="image/tuxiang3.jpg">
				<img src="image/tuxiang4.jpg">
				<img src="image/tuxiang5.jpg">
				<img src="image/tuxiang6.jpg">
				<img src="image/tuxiang7.jpg">
				<img src="image/tuxiang8.jpg">
				<img src="image/1.jpg">
				</div>
				<div id="li2">
				<?php for($x=0;$x<9;$x++){?>
				<?php if(empty($h[$x][qq])){
							?>
						<img src="image/<?php echo $h[$x][photo]?>">
						<?php }else{?>
						<img id="photo2" src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $h[$x][qq]?>&s=100">
						<?php }?>
				<?php }?>
				</div>
			</div>
			<div id="aside3" style="width:200px;height:230px"><h3 style="width:200px;height:30px;margin-left:150px">显示图片</h3>
				<img style="width:200px;height:200px;margin-left:80px" id="photoj" src="image/tuxiang2.jpg">
			</div>
			<div id="aside2">
			<h3>456</h3>
			<div id="nei">
			<div id="nei1">
				<?php 
				for($i=0;$i<$records;$i++){
				 ?>
			<p><strong style="color:red;font-family:宋体"><?php echo $q[$i][name] ?></strong>访问了你的空间</p>
			<?php } ?>
			</div>
			</div></div>
		</div>
		<div id="text">
			<div id="kuai">
				<p>留言</p>
				<div id="su">
				<!-- a=1表示处于搜索状态 -->
				<form action="liuyan.php" method="get">
				<input type="text" name="a">
				<input type="submit" id="sou" name="sou" value="搜索">
				</form>
				</div>
			</div>
			<form action="biaodan.php" method="post" enctype="multipart/form-data">
			<div id="zhong">
				<div id="yao">
					<div id="yao1"><p>留言昵称：</p><input type="text" name="name" placeholder="留言昵称"></div>
					<div id="yao2"><p>选择头像：</p>
					<!-- <form action="biaodan.php" type="file"  name="photo"> -->
						<select id="haa" name="photo">
							<option value="tuxiang1.jpg">头像1</option>	
							<option value="tuxiang2.jpg">头像2</option>	
							<option value="tuxiang3.jpg">头像3</option>	
							<option value="tuxiang4.jpg">头像4</option>	
							<option value="tuxiang5.jpg">头像5</option>	
							<option value="tuxiang6.jpg">头像6</option>	
							<option value="tuxiang7.jpg">头像7</option>	
							<option value="tuxiang8.jpg">头像8</option>	
							<option value="1.jpg">头像9</option>
						</select>
						<!-- </form> -->
						</div>
				<div id="yao3"><p>输入qq号自动获取：</p><input type="text" name="qq" id="photo" placeholder="输入qq号自动获取"></div>
				</div>
				<div id="kua"><textarea class="input" id="huoqu" placeholder="请输入留言内容" name="content"></textarea>
				<!-- onchange="fun(this.value)" -->
				<div id="ku">
					<div id="kua1"><p>表情</p>
					<img class="emotion" src="arclist/1.gif" class='bq'/>
					</div>
<script  src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.qqFace.js"></script> 
<script type="text/javascript" src="js/jquery-browser.js"></script> 
<script type="text/javascript">
$(function(){
	$('.emotion').qqFace({
		id : 'facebox', 
		assign:'huoqu', 
		path:'arclist/'	//表情存放的路径
	});
	// $(".sub_btn").click(function(){
	// 	var str = $("#saytext").val();
	// 	$("#show").html(replace_em(str));
	// });
});
//查看结果
function replace_em(str){
	str = str.replace(/\</g,'&lt;');
	str = str.replace(/\>/g,'&gt;');
	str = str.replace(/\n/g,'<br/>');
	str = str.replace(/\[em_([0-9]*)\]/g,'<img src="arclist/$1.gif" border="0" />');
	return str;
}
</script>

					<!-- 验证码 -->
					<div id="kua2"><p>验证码</p><input type="text" name="yanzheng"><img src="yanzheng.php" onclick="this.src=this.src+'?'+Math.random()"></div>
					<!-- 字数比 -->
					<div id="kua3"><p style="float:left;text-align:right">字数比：<p id="num" style="width:40px;float:left;text-align:right">0</p>/120</p></div>
					<!-- 类型，判断是否时私密 -->
					<div id="k"><input name="type" type="checkbox">私密</div>
					<!-- <input style="display:none" name="zan"> -->
					<!-- 留言按钮 -->
					<div id="kua4"><input name="liu" type="submit" value="留言"></div>
				</div>
			</div>
			</div>
	</form>
			<div id="ji"><p>留言板</p></div>
				<!-- 走一个for循环，遍历出所有显示数据 -->
				<?php 
				for($i=0;$i<count($p);$i++){
				 	$p[$i]['content']=replace_em1($p[$i]['content']);
				 ?>
				<div class="test">
					<div class="test1">
					<!-- 获取头像 -->
					<?php if(empty($p[$i][qq])){
							?>
						<img id="photo<?php echo $i ?>" src="image/<?php echo $p[$i]['photo']?>">
						<?php }else{?>
						<img id="photo<?php echo $i ?>" src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $p[$i][qq]?>&s=100">
						<?php }?>
						<!-- 获取留言昵称 -->
						<div class="ni" style="position:relative"><div class="ni1"><h4 id="a1<?php echo $i ?>" style="color:red"><?php echo $p[$i][name] ?></h4>
						<!-- 撤销功能 -->
						<div id="che" style="float:left;margin-left:500px;margin-top:8px;position:absolute;cursor:pointer" onclick="che(<?php echo $p[$i]['id']?>)">撤销</div>
						<!-- 获取楼层 -->
						<p id="a3<?php echo $i?>">#<?php if(!empty($_GET['a'])){echo $y-($num-1)*4;}
						else{echo $records-($num-1)*4;}?>楼</p>
						</div>
				<!-- $res['tel']=str_ireplace($a,"<span style='color:red;font-weight:bold'>".$a."</span>",$res['tel']);
				echo $res['tel']; -->
						<!-- 获取留言内容 -->
						<div class="ni2">
						<?php if($p[$i]['type']==0){
						if(!empty($_GET['a'])){?>
						<h5 id="a2<?php echo $i ?>"><?php $p[$i]['content']=str_ireplace($_GET['a'],"<span style='color:blue;font-weight:bold'>".$_GET['a']."</span>",$p[$i]['content']);
						echo $p[$i]['content'] ?></h5>
						<?php }else{?> 
						<h5 id="a2<?php echo $i ?>">
						<?php 
						echo $p[$i]['content'] ?></h5>
						<?php }}else{?>
						 <h5 style="font-size:20px;color:red">私密文件,无法查看</h5>
						<?php }?>
						<!-- 获取留言时间 -->
										<h6 class="nini" style="margin-left:410px"><?php echo $p[$i]['time'] ?></h6>
										<!-- 获取赞数 -->
										<div class="ni4">
										<img class="qq" src="image/heart.gif" onclick="zan(<?php echo $p[$i]['id']?>,<?php echo $i; ?>)">
										<p class="q1" id="<?php echo $p[$i]['id']?>"><?php echo $p[$i]['zan'] ?></p>
										</div></div>

							<!-- 管理员回复和其他回复 -->
						<?php $sql='select * from reply_message where user_message_id='.$p[$i]['id'];
							$query=mysql_query($sql);
							$res=mysql_fetch_assoc($query);
							// print_r($res);
							$sql1='select * from other_message where user_message_id='.$p[$i]['id'];
							$query1=mysql_query($sql1);
							$rem=mysql_fetch_assoc($query1);
						?>
						<!-- 管理员回复 -->
						<div class="ni3"><h4 id="huifu1" style="cursor:pointer" 
						onclick="huifu(<?php echo $p[$i]['id']?>)">管理员回复:<p style="margin-top:-40px;margin-left:90px" id="guan<?php echo $i?>"><?php echo $res['user_message_content']?></p></h4>
						<!-- 隐藏的管理员回复 -->
						<!-- <div id="qi1" style="float:left;width:400px;margin-top:9px">
						<input style="float:left;width:290px" type="text" id="write">
						<button style="float:left">回复</button>
						</div> -->
						<p id="shi<?php echo $i?>"><?php echo $res['time']?></p>
						<input type="button" id="chehui1" value="撤回"></div>
						<!-- 其他回复 -->
						<div class="ni5"><h4><strong style="color:blue"><?php echo $rem['other_name']?></strong> <?php echo $rem['other_content']?></h4><p><?php echo $rem['other_time']?></p><input type="button" value="撤回"></div>
						</div>
					</div>
					<?php if(!empty($_GET['a'])){$y--;}else{$records--;}} ?>
					<div id="di">
					<?php if(!empty($ss)){
						$page2->show_fenye1($ss);
						}else{$page1->show_fenye();}?></div>
		</div>
	</div>
	<!-- 管理员点击回复 -->
	<div id="qi1" style="display:none;width:200px;height:200px;background:red;margin-top:-320px;margin-left:200px;clear:both;position:absolute;">
				<div class="b1" style="width:198px;height:80px">
				<p id="b1" style="width:50px;height:30px"></p>
				<p id="b2" style="margin-left:30px;width:170px;height:60px"></p></div>
						<textarea id="b3" style="float:left;margin-top:10px;width:198px;height:80px" type="text" id="write"></textarea>
						<button style="float:left">回复</button>
						</div>
	<script>

	// $(function(s){
		function huifu(s){
			 // alert(s);
	    	// $("huifu1").click(function(){
	    	$("#qi1").toggle();
	    		$.ajax({
						url:"ajax6.php",
						type:"GET",
						dataType:"json",
		 				data:{name:s},						
		 				error:function(){
	 					alert('加载失败');
		 				},
		 				success:function(data,status){
		 					$("#b1").text(data[0]['name']);
		 					$("#b2").text(data[0]['content']);
	 				}
		 			});
	    	$("button").click(function(){
			$.ajax({
						url:"ajax7.php",
						type:"GET",
						dataType:"json",
		 				data:{user_message_id:s,user_message_content:$("#b3").val(),},					
		 				error:function(){
	 					alert('加载失败');
		 				},
		 				success:function(data,status){
		 					//alert(data);
		 				   $("#guan0").text(data[0]['user_message_content']);
		 				   $("#shi0").text(data[0]['time']);
	 				}
		 			});
				$("#qi1").toggle();
					})
			 	}
	// 撤销功能
	function che(p){
			$.ajax({
						url:"ajax4.php",
						type:"GET",
					    dataType:"json",
		 				data:{name:p},						
		 				error:function(){
	 					alert('加载失败');
		 				},
		 				success:function(data,status){
		 					// alert(data[0]['photo']);
		 					// alert(data[0]['qq']);
		 					// alert(data[0]['photo'].length);
		 					// alert(data[1]['photo']);
		 					// alert(data[1]['photo'].length);
		 				// 撤销并修改其中内容
		 			if((data[0]['qq']).length != 0){
		 				 $("#photo0").attr('src',"http://q1.qlogo.cn/g?b=qq&nk="+data[0]['qq']+"&s=100");
		 				   }else{
		 				 $("#photo0").attr('src','image/'+data[0]['photo']);
		 				   }
		 				 $("#a30").text("#"+($("#a30").text().replace(/[^0-9]/ig,"")-1)+"楼");
		 					$("#a10").text(data[0]['name']);
		 					$("#a20").text(data[0]['content']);
		 					$(".nini").text(data[0]['time']);
		 					$(".q1").text(data[0]['zan']);

		 			if((data[1]['qq']).length != 0){
		 				$("#photo1").attr('src',"http://q1.qlogo.cn/g?b=qq&nk="+data[1]['qq']+"&s=100");
		 				   }else{
		 				  $("#photo1").attr('src','image/'+data[1]['photo']);
		 				   }
		 				 $("#a31").text("#"+($("#a31").text().replace(/[^0-9]/ig,"")-1)+"楼");
		 					$("#a11").text(data[1]['name']);
		 					$("#a21").text(data[1]['content']);
		 					$(".nini").text(data[1]['time']);
		 					$(".q1").text(data[1]['zan']);
		 			if((data[2]['qq']).length != 0){
		 				$("#photo2").attr('src',"http://q1.qlogo.cn/g?b=qq&nk="+data[2]['qq']+"&s=100");
		 				   }else{
		 				 $("#photo2").attr('src','image/'+data[2]['photo']);
		 				  }
		 				 $("#a32").text("#"+($("#a32").text().replace(/[^0-9]/ig,"")-1)+"楼");
		 					$("#a12").text(data[2]['name']);
		 					$("#a22").text(data[2]['content']);
		 					$(".nini").text(data[2]['time']);
		 					$(".q1").text(data[2]['zan']);

		 			if((data[3]['qq']).length != 0){
		 				$("#photo3").attr('src',"http://q1.qlogo.cn/g?b=qq&nk="+data[3]['qq']+"&s=100");
		 				   }else{
		 				  	$("#photo3").attr('src','image/'+data[3]['photo']);
		 				   }
		 				 $("#a33").text("#"+($("#a33").text().replace(/[^0-9]/ig,"")-1)+"楼");
		 					$("#a13").text(data[3]['name']);
		 					$("#a23").text(data[3]['content']);
		 					$(".nini").text(data[3]['time']);
		 					$(".q1").text(data[3]['zan']);
		 					
		 					// if(data==1){
		 					// 	alert('123');
		 					// }
	 				}
		 			});
					}
	// var b=document.getElementsByName("ji");
	// var lii=document.getElementsByName("qq");
	// 	for(var r=0;r<lii.length;r++)
	// 		(function(r){
	// 			$(b[r]).click(function(){
	// 				alert('123');
	// 				 $(".qq").attr('src','image/heart1.gif');
	// 			});
	// 		})(r)
		function zan(i,j){//通过click传值
	 			$.ajax({
						url:"ajax3.php",
						type:"GET",
		 				data:{name:i},						
		 				error:function(){
	 					alert('加载失败');
		 				},
		 				success:function(data,status){
		 				// var lii=document.getElementsByName("qq");
		 				// alert(lii.length);
		 				if(data=='111'){
		 					$(".qq").eq(j).attr('src','image/heart1.gif');
		 					alert('你已经赞过了！');
		 				}else{
		 				$(".qq").eq(j).attr('src','image/heart1.gif');
		 				// $(this).attr('src','image/heart1.gif');
	 					$("#"+i).html(data);//给赞位置赋予点赞数
	 				}
		 				}
		 			});
					}
	</script>
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