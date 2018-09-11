<?php 
require_once "db.inc.php";
$a=new db("localhost","root","123456","news");
// 判断是否修改一级标题
if(!empty($_GET['idd3'])){
// $im4=$_POST['add3'];
$id4=$_GET['idd3'];
$sql1="select id from im where imid=$id4";//找到二级标题的id
$res=$a->getsqldata($sql1);
$sql2="select count(id) from im where imid=$id4";//找到二级标题的总数
$res1=$a->getsqldata($sql2);
// 删除第一层
$sql7='delete from im where id='.$id4.' or imid='.$id4;//删除掉一级和二级标题
mysql_query($sql7) or die(mysql_error());
for($i=0;$i<$res1[0][0];$i++){//遍历出来所有二级标题的个数,并按照个数找三级标题的imid(即为二级标题的id)
	// $sql4="select count(id) from im where imid=".$res[$i][0];
	// $res4=$a->getsqldata($sql4);
	// $sql5="select id from im where imid=".$res[$i][0];
	// $res5=$a->getsqldata($sql);
	// $sql6='delete from im where id='.$res[$i][0].' or imid='.$res[$i][0];
	$sql6='delete from im where imid='.$res[$i][0];//通过二级标题的id去给3级标题的imid
	mysql_query($sql6);
	// 删除第二层
	// for($j=0;$j<$res4[0][0];$j++){
	// 	// $sql6="select count(id) from im where imid=".$res5[$j][0];
	// 	// $res6=$a->getsqldata($sql6);
	// 	// $sql7="select id from im where imid=".$res5[$j][0];
	// 	// $res7=$a->getsqldata($sql7);
	// 	// 删除第三层
	// 	$sql6='delete from im where id='.$res5[$j][0].'or imid='.$res5[$j][0];
	// 	mysql_query($sql6);
	// 	$sql="delete from im where id=$id4 or imid=$id4";
	// 	mysql_query($sql);
	// }
}
}
$a->jump('删除成功','admin_news.php');
// 判断是否修改二级标题
?>