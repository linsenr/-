<?php

/*
	测试页面，补充下边需要填空的代码，实现封装类--分页操作。
      相信自己
*/
require_once "db.inc.php";
class page extends db
{
	public $records;//总记录数
	public $pagecount;//总页数
	public $table;//表名
	public $pagesize;//每页显示的条数
	public $cur_page;//当前页
	public $url;//跳转路径
  public $offset;
	//对分页所需的数据初始化
	public function __construct($table,$pagesize,$url)
	{
		$this->table=$table;
		$this->pagesize=$pagesize;
		//获取表格中数据
		$arr=$this->getalldata('user_message');
		$this->records=count($arr);//总记录数
		//根据每页的记录数，计算出总页数
		$this->pagecount=ceil($this->records/$this->pagesize);
		$this->url=$url;
	}
//当前所处的页面
	public function get_cur_page()
	{    
		if(empty($_GET['page']))
       {
           $this->cur_page=1;
        }else{
           $this->cur_page=$_GET['page'];
	       }	
   }
//获取当前页的数据
   public function get_cur_data()
   {
   	//每次翻页的起始位置
   	$offset=($this->cur_page-1)*$this->pagesize;
   	//构建sql语句
   	$sql="select * from $this->table order by id desc limit $offset,$this->pagesize";
   	//获取sql语句数据

   	$arr1=$this->getsqldata($sql,MYSQL_ASSOC); 
   	return $arr1;
   }
   public function get_cur_data1($su)
   {
    //每次翻页的起始位置
    $offset=($this->cur_page-1)*$this->pagesize;
    //构建sql语句
    $sql="select * from user_message where content like '%$su%' limit $offset,$this->pagesize";
    //获取sql语句数据
    $arr=$this->getsqldata($sql,MYSQL_ASSOC); 
    return $arr;
   }
   public function show_fenye1($ss)    
    { 
      if(!empty($ss)){
        $this->records=$ss;
        $this->pagecount=ceil($this->records/4);
        if(empty($_GET['page']))
       {   
           $this->cur_page=1;
        }else{
           $this->cur_page=$_GET['page'];
         }  
      }
      // print_r($this->records);
     if($this->pagecount==1)
        {
          echo"<div style='width:500px;height:40px;float:left;font-size:25px;font-family:宋体'>
         <a style='margin-left:40px'>首页</a>
         <a style='margin-left:40px'>上一页</a>
         <a style='margin-left:40px'>下一页</a>
         <a style='margin-left:40px'>尾页</a>
         </div>";
         }
        else if($this->cur_page==1)
         {
        echo"<div style='width:500px;height:40px;float:left;font-size:25px;font-family:宋体'>
         <a style='margin-left:40px'>首页</a>
         <a style='margin-left:40px'>上一页</a>
         <a style='margin-left:40px' href='$this->url?a=$_GET[a]&page=",$this->cur_page+1,"'>下一页</a>
         <a style='margin-left:40px' href='$this->url?a=$_GET[a]&page=",$this->pagecount,"'>尾页</a>
         </div>";
        
         }else if($this->cur_page==$this->pagecount){
       
       echo"<div style='width:500px;height:40px;float:left;font-size:25px;font-family:宋体'>
         <a style='margin-left:25px' href='$this->url?a=$_GET[a]&&page=1'>首页</a>
         <a style='margin-left:25px' href='$this->url?a=$_GET[a]&&page=",$this->cur_page-1,"'>上一页</a>
         <a style='margin-left:25px'>下一页</a>
         <a style='margin-left:25px'>尾页</a>
         <a style='margin-left:25px' href='$this->url'>返回</a>
         </div>";
         }else{
       echo"<div style='width:500px;height:40px;float:left;font-size:25px;font-family:宋体'>
         <a style='margin-left:25px' href='$this->url?a=1&page=1'>首页</a>
         <a style='margin-left:25px' href='$this->url?a=$_GET[a]&&page=",$this->cur_page-1,"'>上一页</a>
         <a style='margin-left:25px' href='$this->url?a=$_GET[a]&&page=",$this->cur_page+1,"'>下一页</a>
         <a style='margin-left:25px' href='$this->url?a=$_GET[a]&&page=",$this->pagecount,"'>尾页</a>
         <a style='margin-left:25px' href='$this->url'>返回</a>
         </div>";
          } 
          echo"<div style='width:160px;height:40px;margin-left:480px;font-size:23px;font-family:宋体'>记录数共".$this->records."条</div>
        <div style='width:120px;height:40px;margin-left:680px;font-size:25px;font-family:宋体;margin-top:-40px'>第".$this->cur_page.'/'.$this->pagecount."页</div>";
    }
    public function show_fenye()    
    { 
      // if(!empty($ss)){
      //   $this->records=$ss;
      //   $this->pagecount=ceil($this->records/4);
      // }
      // print_r($this->records);
     if($this->pagecount==1)
        {
          echo"<div style='width:500px;height:40px;float:left;font-size:25px;font-family:宋体'>
         <a style='margin-left:40px'>首页</a>
         <a style='margin-left:40px'>上一页</a>
         <a style='margin-left:40px'>下一页</a>
         <a style='margin-left:40px'>尾页</a>
         </div>";
         }
        else if($this->cur_page==1)
         {
        echo"<div style='width:500px;height:40px;float:left;font-size:25px;font-family:宋体'>
         <a style='margin-left:40px'>首页</a>
         <a style='margin-left:40px'>上一页</a>
         <a style='margin-left:40px' href='$this->url?page=",$this->cur_page+1,"'>下一页</a>
         <a style='margin-left:40px' href='$this->url?page=",$this->pagecount,"'>尾页</a>
         </div>";
        
         }else if($this->cur_page==$this->pagecount){
       
       echo"<div style='width:500px;height:40px;float:left;font-size:25px;font-family:宋体'>
         <a style='margin-left:40px' href='$this->url?page=1'>首页</a>
         <a style='margin-left:40px' href='$this->url?page=",$this->cur_page-1,"'>上一页</a>
         <a style='margin-left:40px'>下一页</a>
         <a style='margin-left:40px'>尾页</a>
         </div>";
         }else{
       echo"<div style='width:500px;height:40px;float:left;font-size:25px;font-family:宋体'>
         <a style='margin-left:40px' href='$this->url?page=1'>首页</a>
         <a style='margin-left:40px' href='$this->url?page=",$this->cur_page-1,"'>上一页</a>
         <a style='margin-left:40px' href='$this->url?page=",$this->cur_page+1,"'>下一页</a>
         <a style='margin-left:40px' href='$this->url?page=",$this->pagecount,"'>尾页</a>
         </div>";
          } 
          echo"<div style='width:160px;height:40px;margin-left:480px;font-size:23px;font-family:宋体'>记录数共".$this->records."条</div>
        <div style='width:120px;height:40px;margin-left:680px;font-size:25px;font-family:宋体;margin-top:-40px'>第".$this->cur_page.'/'.$this->pagecount."页</div>";
    }
    public function jumppage($page,$fun){
        echo "<form action='$page' method='get'> 
            <select name='page' onchange='$fun(this.value)'>";
            for($i=1;$i<=$this->pagecount;$i++)
            {
                if ($this->cur_page ==$i)
                {
                echo "<option value='$i' selected>$i</option>";
                }else{
                echo "<option value='$i'>$i</option>";             
                }
            }
        echo "</select>
        </form>";
    }
          
}
?>