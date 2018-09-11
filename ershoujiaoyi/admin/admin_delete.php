<?php 
require_once "db.inc.php";
$a=new db("localhost","root","123456","news");
// echo $_GET['delete'];
$a->deletedata('news_table',$_GET['delete'],'admin_news_list.php');
 ?>