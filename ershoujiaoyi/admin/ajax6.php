<?php
require_once "db1.inc.php";
// echo $_GET['name'];
// exit;
$a=new db1("localhost","root","123456","news");
$sql="select * from user_message where id=".$_GET['name'];
$s=$a->getsqldata($sql);
// $a->insert("reply_message");
// echo $q;
// echo $s[0]['name'];
// echo $s[0]['content'];
echo json_encode($s);
?>