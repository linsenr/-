<?php
/*
功能：在内容块之间加入分格线、
层数：string $type 线的形状* - ~ #
*/
    function bye($type){
    	echo "<div style='font-size:15px;color:red;font-weight:bold'>";
    	if($type=='*'){
    	echo "<br />******************************************华丽分割线**************************************<br />";
    }else if($type=='-'){
    	echo "<br />------------------------------------------华丽分割线--------------------------------------<br />";
    }else if($type=='~'){
    	echo "<br />~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~华丽分割线~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br />";
    }else if($type=='#'){
    	echo "<br />##########################################华丽分割线######################################<br />";
    }
    else if($type==''){
    	echo "<br />******************************************华丽分割线**************************************<br />";
    }
    echo "</div>";
    
    }
    //获取中英文字符串的长度；
    //string str统计的字符串；
    function my_length($str){
    	$n=0;
    	$len=strlen($str);
      for($i=0;$i<$len;$i++){
    	if(ord($str[$i])>127)
    	{
    		$n++;
    		$i+=2;
    	}
    	else{
    		$n++;
    	}
    	}
    echo $n; 
    }
    //截取文本内容的前n个字符；
    //一个汉字三个字节，一个英文一个字节；
    //用substr截取，（$str,$start,$num）没有$start代表从首位开始截取。
    function my_jiequ($str,$num){
    $res='';
    $n=0;
    $len=strlen($str);
    for($i=0;$i<$len;$i++)
    {
    	if(ord($str[$i])>127){
    		$res.=substr($str,$i,3);
    		$i+=2;
    		$n++;
    	}
    	else{
    		$res.=substr($str,$i,1);
    		$n++;
    	}
    	if($n==$num){
    	break;
    	}

    }
    return $res;
    }
  ?>