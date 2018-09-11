<?php
$h=$_GET['name'];
if(empty($h)){
	echo "image/tuxiang2.jpg";
}else{
echo 'http://q1.qlogo.cn/g?b=qq&nk='.$h.'&s=100';
}
?>