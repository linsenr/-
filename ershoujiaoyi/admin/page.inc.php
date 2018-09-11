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
	//对分页所需的数据初始化
	public function __construct($table,$pagesize,$url)
	{
		$this->table=$table;
		$this->pagesize=$pagesize;
		//获取表格中数据
		$arr=$this->getalldata('news_table');
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
   	$sql="select * from $this->table limit $offset,$this->pagesize";
    // echo $sql;
    // exit;
   	//获取sql语句数据
   	$arr=$this->getsqldata($sql,MYSQL_ASSOC);
   	return $arr;
   }
    public function show_fenye()
    {
        if($this->cur_page==1)
         {
       echo"<td colspan='2'>
         <a>首页</a>
         <a>上一页</a>
         <a href='$this->url?page=",$this->cur_page+1,"'>下一页</a>
         <a href='$this->url?page=",$this->pagecount,"'>尾页</a>
         </td>";
        
         }else if($this->cur_page==$this->pagecount){
       
       echo"<td colspan='2'>
         <a href='$this->url'>首页</a>
         <a href='$this->url?page=",$this->cur_page-1,"'>上一页</a>
         <a>下一页</a>
         <a>尾页</a>
         </td>";
         }else{
       echo"<td colspan='2' width='200px'>
         <a href='$this->url'>首页</a>
         <a href='$this->url?page=",$this->cur_page-1,"'>上一页</a>
         <a href='$this->url?page=",$this->cur_page+1,"'>下一页</a>
         <a href='$this->url?page=",$this->pagecount,"'>尾页</a>
         </td><br/>";
          } 
          echo"<td colspan='1'>总记录数共".$this->records."条</td>
        <td colspan='1'>第".$this->cur_page.'/'.$this->pagecount."页</td>";
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