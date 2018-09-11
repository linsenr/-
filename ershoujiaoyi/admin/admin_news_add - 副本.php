<?php 
require_once "db.inc.php";
$a=new db("localhost","root","123456","news");
	$htmlData = '';
	if (!empty($_POST['content'])) {
		if (get_magic_quotes_gpc()) {//获取当前 magic_quotes_gpc 的配置选项设置
			$htmlData = stripslashes($_POST['content']);
		} else {
			$htmlData = $_POST['content'];
		}
	}
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
		<form action="admin_news_ok.php" name="example" method="post">
			标题:<input type="text" name="title"><br/>
			类型:<select name="la">
			<?php $sql1="select id,im1 from im where im1 !=''";
					$query1=mysql_query($sql1);
					while($res1=mysql_fetch_array($query1)){
			?>
				<option value="<?php echo $res1['id']?>|0|0" selected="selected"><?php echo $res1['im1']?>(一级标题)</option>
				<?php $sql2="select id,im2 from im where imid=".$res1['id'];
					$query2=mysql_query($sql2);
					while($res2=mysql_fetch_array($query2)){
			?>
				<option value="<?php echo $res1['id'].'|'.$res2['id']?>|0">---<?php echo $res2['im2']?>(二级标题)</option>
						<?php $sql3="select id,im3 from im where imid=".$res2['id'];
						$query3=mysql_query($sql3);
						while($res3=mysql_fetch_array($query3)){
					?>
					<option value="<?php echo $res1['id'].'|'.$res2['id'].'|'.$res3['id']?>">------<?php echo $res3['im3']?>(三级标题)</option>

				<?php }}}?>
			</select><br/>
			作者:<input type="text" name="writer"><br/>
			内容:<textarea name="content" style="width:700px;height:200px;visibility:hidden;"><?php echo htmlspecialchars($htmlData); ?></textarea>
				<br />
				<!-- htmlspecialchars($htmlData) -->
			浏览量:<input type="text" name="hit"><br/>	
		<input type="submit" name="button" value="提交内容" />
		</form>
	</div>
</body>
</html>