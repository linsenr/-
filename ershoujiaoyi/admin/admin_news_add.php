<?php 
require_once "db.inc.php";
$a=new db("localhost","root","123456","news");
$rem=$a->getonedata('news_table',$_GET['update'],MYSQL_ASSOC);
	$htmlData = '';
	if (!empty($_POST['content'])) {
		if (get_magic_quotes_gpc()) {//获取当前 magic_quotes_gpc 的配置选项设置
			$htmlData = stripslashes($_POST['content']);
		} else {
			$htmlData = $_POST['content'];
		}
	}
	// print_r($rem);
	// exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>新闻入库操作</title>
	<link rel="stylesheet" href="./kindeditor/themes/default/default.css" />
	<link rel="stylesheet" href="./kindeditor/plugins/code/prettify.css" />
	<script charset="utf-8" src="./kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="./kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="./kindeditor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : './kindeditor/plugins/code/prettify.css',
				uploadJson : './kindeditor/php/upload_json.php',
				fileManagerJson : './kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body>
	<div>
		<?php echo $htmlData; ?>
		<!-- 先判断是修改表单还是添加表单，rem表示从上一个页面传过来值 -->
		<form <?php if(!empty($rem['id'])){?> action="admin_update_ok.php?id=<?php echo $rem['id']?>"<?php }else{?>
		action="admin_news_ok.php"<?php }?> name="example" method="post" enctype="multipart/form-data">
			标题:<input type="text" name="title" <?php if(!empty($rem['id'])){?> value="<?php echo $rem['title']?>" <?php }?>><br/>
			类型:<select name="la">
			<!-- 走第一个循环，并找出所有一级标题 -->
			<?php $sql1="select id,im1 from im where im1 !=''";
					$query1=mysql_query($sql1);
					while($res1=mysql_fetch_array($query1)){
			?>
			<!-- 判断修改一级栏目时，取到内容， -->
			<?php if(!empty($rem['im1'])&&empty($rem['im2'])){
					$sql2="select im1 from im where id =".$rem['im1'];
					$query2=mysql_query($sql2);
					$res2=mysql_fetch_array($query2);
				?>
				<option value="<?php echo $res2['id']?>|0|0" selected="selected"><?php echo $res2['im1']?>(一级标题)</option>
			<?php }else{?>
					<!-- 添加结束-->
				<!-- 添加一级栏目 -->
			<option value="<?php echo $res1['id']?>|0|0" selected="selected"><?php echo $res1['im1']?>(一级标题)</option>

			<?php }?>
			<!-- 走第二个循环，并找出所有二级标题 -->
				<?php $sql2="select id,im2 from im where imid=".$res1['id'];
					$query2=mysql_query($sql2);
					while($res2=mysql_fetch_array($query2)){
			?>
				<!-- 判断添加二级栏目时，取到内容 -->
			<?php if(!empty($rem['im1'])&&!empty($rem['im2'])&&empty($rem['im3'])){
					$sql5="select im2 from im where id =".$rem['im2'];
					$query5=mysql_query($sql5);
				    // $res5=mysql_fetch_array($query5);
					// 目的是找出所有二级栏目并找出$res5['im2']==$res2['im2']即为选中状态
				    while($res5=mysql_fetch_array($query5)){
				    	if($res5['im2']==$res2['im2']){
					?>
					<option value="<?php echo $res1['id'].'|'.$res2['id']?>|0" selected="selected">---<?php echo $res5['im2']?>(二级标题)</option>
					<?php }else{?>
				<option value="<?php echo $res1['id'].'|'.$res2['id']?>|0">---<?php echo $res2['im2']?>(二级标题)</option>
			<?php }}}else{?>
					<!--   结束 -->
					<!-- 添加二级栏目 -->
				<option value="<?php echo $res1['id'].'|'.$res2['id']?>|0">---<?php echo $res2['im2']?>(二级标题)</option>
				<?php }?>
				<?php?>
				<!-- 走第三个循环，并找出所有三级标题 -->
						<?php $sql3="select id,im3 from im where imid=".$res2['id'];
						$query3=mysql_query($sql3);
						while($res3=mysql_fetch_array($query3)){
					?>
					<!-- 判断添加三级栏目时，取到内容 -->
				<?php if(!empty($rem['im1'])&&!empty($rem['im2'])&&!empty($rem['im3'])){
					$sql6="select im3 from im where id =".$rem['im3'];
					$query6=mysql_query($sql6);
					// $res6=mysql_fetch_array($query6);
					// 目的是找出所有三级栏目并找出$res5['im2']==$res2['im2']即为选中状态
					while($res6=mysql_fetch_array($query6)){
						if($res6['im3']==$res3['im3']){
					?>
					<option value="<?php echo $res1['id'].'|'.$res2['id'].'|'.$res3['id']?>" selected="selected">------<?php echo $res6['im3']?>(三级标题)</option>
					<?php }else{?>
				<option value="<?php echo $res1['id'].'|'.$res2['id'].'|'.$res3['id']?>">------<?php echo $res3['im3']?>(三级标题)</option>
			<?php }}}else{?>
					<!-- 添加三级栏目 -->
					<!--   结束 -->
					<option value="<?php echo $res1['id'].'|'.$res2['id'].'|'.$res3['id']?>">------<?php echo $res3['im3']?>(三级标题)</option>
					<?php }?>

				<?php }}}?>
			</select><br/>
			作者:<input type="text" name="writer" <?php if(!empty($rem['id'])){?> value="<?php echo $rem['writer']?>" <?php }?>><br/>
			图片:<input type="file" name="photo"><br/>
			内容:<textarea name="content" style="width:700px;height:200px;visibility:hidden;"><?php echo htmlspecialchars($htmlData); ?><?php if(!empty($rem['id'])){?> <?php echo $rem['content']?> <?php }?></textarea>
				<br/>
				<!-- htmlspecialchars($htmlData) -->
			浏览量:<input type="text" name="hit" <?php if(!empty($rem['id'])){?> value="<?php echo $rem['hit']?>" <?php }?>><br/>	
		<input type="submit" name="button" value="提交内容" />
		</form>
	</div>
</body>
</html>