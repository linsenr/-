<?php 
	header("ConTent-Type:image/png");
	session_start();
	$aa="";
	$str='abcdefjhijklmnpqresuvwxyz123456789';
	$l=strlen($str); 
	for($i=0;$i<4;$i++)
	{
		$num=rand(0,$l-1);
		$aa.=$str[$num];
	}
	$_SESSION['name']=$aa;
	$im=imagecreate(50,20);//建立一个宽50高20的画布
	$black=imagecolorallocate($im,10,10,10);//为图像添加颜色
	$white=imagecolorallocate($im,255,255,255);
	$gray=imagecolorallocate($im,200,200,200);
	imagefill($im,200,400,$black);//给画布中填充白色即区域填充
	$li=imagecolorallocate($im,220,180,170);//给画布添加颜色
	for($i=0;$i<3;$i++) 
	{
		imageline($im,rand(0,30),rand(0,20),rand(30,20),rand(0,30),$gray);//绘制实线
	}
	imagestring($im,5,8,2,$aa,$white);//添加4个字符
	for($i=0;$i<50;$i++)
	{
		imagesetpixel($im,rand()%70,rand()%30,$gray);//添加像素点
	}
	imagepng($im);//建立png图像并输出

	imagedestroy($im);
 ?>