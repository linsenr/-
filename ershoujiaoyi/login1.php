<?php 
require_once ".\db.inc.php";
session_start();
header("Content-Type:text/html;charset=utf-8");
$a=new db("localhost","root","123456","news");
$sql="select * from guanliyuan";
$query=mysql_query($sql);
while($res=mysql_fetch_assoc($query)){
	$res10[]=$res;
}
$_SESSION['zheng']='denglu';
// print_r(count($res1));
// exit;
if($_POST['denglu']!='登录')
{	
		// 用户注册
		if($_POST['zhuce']=='注册'){
			if($_POST['user']=='')
		{
			$a->goback('用户名不能为空');
		}else{
			if($_POST['pass']=='')
				{
				$a->goback('密码不能为空');
				}else{
						if($_SESSION['name']!=$_POST['yanzheng'])
						{
							$a->goback('验证码不正确');
						}else{
							// 先检测表中是否已经有值
							$sql4="select * from yonghu where name="."'".$_POST['user']."'"." and pass="."'".$_POST['pass']."'";
							$query4=mysql_query($sql4);
							if(mysql_num_rows($query4)>0){
								$a->goback('你已经注册过了,可以直接登录');
							}else{
								// 如果没有就添加
							$sql1="insert into yonghu(name,pass) values('$_POST[user]','$_POST[pass]')";
							$query1=mysql_query($sql1);
							$a->jump('恭喜，注册成功,可以登录了','login.php');
								 }

						    }
					}
			 }
				// $_POST['user'];
				// $_POST['pass'];
				// $_POST['yanzheng'];
				// $_SESSION['name'];
		}
		exit;


	$a->goback('请通过正常路径登录');
}else{   
		// 当是管理员登录时，从表单接来的名字1判断
	// && $_POST['pass']==$res['pass'] && $_SESSION['name']==$_POST['yanzheng']
		for($i=0;$i<count($res10);$i++){
		if($_POST['user']==$res10[$i]['user']){
		// if($_POST['user']!=$res['user'])
		// {   
		// 	$a->goback('用户名错误');
		// }else{
			if($_POST['pass']!=$res10[$i]['pass'])
				{
				$a->goback('密码错误');
				}else{
						if($_SESSION['name']!=$_POST['yanzheng'])
						{
							$a->goback('验证码不正确');
						}else{
							 $a->jump('登录成功','admin/admin.php');
							 }
					}
				}
			  
			}
			// 当是用户登录时，满足条件必须和管理员名字不一样
				if($_POST['user']!=$res10[0]['user'] && $_POST['pass']!=$res10[0]['pass']){
			 	$sql5="select * from yonghu where name="."'".$_POST['user']."'"." and pass="."'".$_POST['pass']."'";
					// echo $sql5;
					// exit;
					$query5=mysql_query($sql5);
					$res5=mysql_fetch_assoc($query5);
					if(empty($res5['name'])){
						$a->goback('用户名不存在');
					}else{
						if(empty($res5['pass'])){
							$a->goback('密码不正确！');
						}else{
							if($_SESSION['name']!=$_POST['yanzheng'])
								{
									$a->goback('验证码不正确');
								}else{
									 $a->jump('登录成功','index.php?id='.$res5['id']);
									 }
						}
						}
					}

	 }


?>