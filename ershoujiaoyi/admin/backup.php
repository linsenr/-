<?php
header("Content-Type:text/html;charset=utf-8");
error_reporting(E_ALL & ~ E_NOTICE);//显示 E_NOTICE 之外的所有错误信息 
global $mysqlhost, $mysqluser, $mysqlpwd, $mysqldb;
$mysqlhost="localhost";    //host name
$mysqluser="root";                //login name
$mysqlpwd="123456";                //password
$mysqldb="news";          //name of database
include("mydb.php");
$d=new db($mysqlhost,$mysqluser,$mysqlpwd,$mysqldb);//创建了一个数据库操作对象
/*----------------------------------------------------界面----------------------------------------------*/
if(!$_POST['act']){//没提交备份之前，界面显示 
?>
<div style="background:#eff8fd;border:#98a7ac 1px solid;width:750px;padding:180px 0 0 280px;height:290px;">
<form name="form1" method="post" action="backup.php">
    <table width ="50%" border="1" cellpadding='0' cellspacing='1'>
      <tr><td><input type="radio" name="bfzl" value="quanbubiao">备份全部数据</td></tr>

      <tr><td><input type="radio" name="bfzl" value="danbiao">备份单张表数据
          <select name="tablename">
        <option value="">请选择</option>
            <?
    $d->query("show table status from $mysqldb");//show table status from 查看表的引擎类型等状态信息：
    while($d->fetch_row_array()){//mysql_fetch_array 获取记录集啊
    echo "<option  value='".$d->row_array_index('Name')."'>".$d->row_array_index('Name')."</option>";}
    ?>
          </select>
</td></tr>
      <tr><td colspan="2"><input type="submit" name="act" value="backup"></td></tr>
</table></form>
</div>
<?
}else{
/*----------------------------------------------------主程序--------------------------------------------*/

    /*/////////////////////////////////////备份全部表/////////////////////////////////////-*/
    if($_POST['bfzl']=="quanbubiao"){
$tables=$d->query("show table status from $mysqldb"); //SHOW TABLE STATUS命令来获取每个数据表的信息
$sql="";
while($d->fetch_row_array($tables))//返回一个record结果集,显示所有的数据库指定表中的所有数据
{
    $table=$d->row_array_index("Name");//获取表的名字
    $sql.=creat_table_sql($table);//获取创建表的sql语句(creat table开始的地方)
    $d->query("select * from $table");//查找表中所有的记录
    print_r($d->query("select * from $table"));
    $num_fields=$d->num_field();//返回结果集中字段的数目
    while($d->fetch_row_array())//生成插入数据的sql语句
    {
        $sql.=insert_table_date_sql($table,$num_fields);
    }
}
$filename=date("Ymd",time())."_all.sql";
//如果点击提交备份时则调用
if($_POST['act']=="backup")
{
    if(write_file($sql,$filename))
        $msgs[]="全部数据表数据备份完成,生成备份文件'./backup/$filename'";
else 
         $msgs[]="备份全部数据表失败";
show_msg($msgs);
exit();        
    }
}
/*/////////////////////////////////////备份单表//////////////////////////////////////////////*/
elseif($_POST['bfzl']=="danbiao"){
if(!$_POST['tablename'])
{
    $msgs[]="请选择要备份的数据表"; show_msg($msgs);
    exit();
}
$sql=creat_table_sql($_POST['tablename']);
$d->query("select * from ".$_POST['tablename']);
$num_fields=$d->num_field();
while($d->fetch_row_array())//mysql_fetch_array()
{
    $sql.=insert_table_date_sql($_POST['tablename'],$num_fields);
}
    $filename=date("Ymd",time())."_".$_POST['tablename'].".sql";
    if($_POST['act']=="backup")
    {
        if(write_file($sql,$filename))
        $msgs[]="表-".$_POST['tablename']."-数据备份完成,生成备份文件'./backup/$filename'";
        else $msgs[]="备份表-".$_POST['tablename']."-失败";
        show_msg($msgs);
        exit();
    }
}
else{
    echo "<script type='text/javascript' charset='utf-8'>
        alert('请选择数据备份方式!');
        window.location.href='backup.php';
    </script>";
}
}
/*-----------------------------------------主程序结束--------------------------------------------*/

/*
 *
 *向文件写sql语句
 */
function write_file($sql,$filename)
{
    $re=true;
    mysql_query("set names utf8");
    if(!create_folder('backup'))//创建文件夹
    {
        exit;
    }
if(!@$fp=fopen("./backup/".$filename,"w+")) {$re=false; echo "failed to open target file";}
if(!@fwrite($fp,$sql)) {$re=false; echo "failed to write file";}
if(!@fclose($fp)) {$re=false; echo "failed to close target file";}
return $re;
}

function down_file($sql,$filename)
{
ob_end_clean();//b_end_clean — 清空（擦除）缓冲区并关闭输出缓冲
header("Content-Encoding: none");
header("Content-Type: ".(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'application/octetstream' : 'application/octet-stream'));
  
header("Content-Disposition: ".(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'inline; ' : 'attachment; ')."filename=".$filename);
  
header("Content-Length: ".strlen($sql));
header("Pragma: no-cache");
  
header("Expires: 0");
echo $sql;
$e=ob_get_contents();//得到缓存取的数据
ob_end_clean();
}
/*
 *
 *创建目录
 */
function create_folder($dir)
{

if(!is_dir($dir)) {
@mkdir($dir, 0777);//0777是文件夹的操作权限
}

if(is_dir($dir))
{

if($fp = @fopen("$dir/test.test", 'w'))
    {
@fclose($fp);
@unlink("$dir/test.test");
$create_folder = 1;
}
else {
$create_folder = 0;
}

}

return $create_folder;

}
/*
 *返回创建表的sql语句
 * creat_table_sql   
 */
function creat_table_sql($table)
{
    global $d;
//如果表存在则先删除
$sql="DROP TABLE IF EXISTS ".$table.";\n";//1.让后边这个封号害惨了! <删除表>
//显示用于创建给定表的CREATE TABLE语句。本语句对视图也起作用。
$d->query("show create table ".$table);
$d->fetch_row_array();
//把匹配到的换行全部替换成了空字符串
$tmp=preg_replace("/\n/","",$d->row_array_index("Create Table"));
$sql.=$tmp.";\n";//2.想想，为什么这儿要加一个封号 <创建表>
return $sql;
}

/*
 *
 *组合插入sql语句   insert_table_date_sql
 */
function insert_table_date_sql($table,$num_fields)
{
    global $d; 
    $comma="";
    $sql .= "INSERT INTO ".$table." VALUES(";
    for($i = 0; $i < $num_fields; $i++)
    {
         //mysql_escape_string 转 义字符串  和mysql_real_escape_string 完全一样 
        $sql .= ($comma."'".mysql_escape_string($d->record[$i])."'"); $comma = ",";
    }
    $sql .= ");\n";//3.让后边这个封号害惨了…… <表中插入数据>
    return $sql;
}
/*
 *表格形式输出提示
 *
 */
function show_msg($msgs)
{
    $title="提示：";
    echo "<table width='100%' border='1'    cellpadding='0' cellspacing='1'>";
    echo "<tr><td>".$title."</td></tr>";
    echo "<tr><td><br><ul>";
    while (list($k,$v)=each($msgs))
    {//each — 返回数组中当前的键／值对并将数组指针向前移动一步
    echo "<li>".$v."</li>";
    }
    echo "</ul></td></tr></table>";
}
/*
 *  退出代码
 */
?>

