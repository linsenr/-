<?php
require_once "db.inc.php";
// echo $_GET['name'];
// exit;
$a=new db("localhost","root","123456","liuyan");
$sql="select * from user_message where id=".$_GET['name'];
$s=$a->getsqldata($sql);
// $a->insert("reply_message");
// echo $q;
// echo $s[0]['name'];
// echo $s[0]['content'];
echo json_encode($s);
?>