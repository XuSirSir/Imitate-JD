<?php
header("Content-Tpye:text/html;charset=utf8");

@$data['user'] = $_POST['user'];
@$data['passwd'] = $_POST['passwd'];

//连接数据库
$db= new mysqli('localhost','root','123456','data_php','3306');
//判断连接数据库是否有错误
if($db->connect_errno){
	//输出错误代码并退出当前脚本
	die("连接失败:%s\n".$mysqli->connect_error);
	
}

if(@$data['user']==''||$data['passwd']==''){
	echo "<script> alert('输入的账号或密码不能为空，请重新输入');parent.location.href='login.html'; </script>";
}else if(@data['user']!=''){
	//获取数据库中是否有用户输入的账号值，用来判断用户账号是否存在
	$sql_select1="select num from information_user where num={$data['user']}";
	$result1 = $db->query($sql_select1)->fetch_array();
	//获取数据库中用户输入的账号的密码，用来判断用户输入的密码是否正确
	$sql_select2="select passwd from information_user where num={$data['user']}" ;
	$result2 = $db->query($sql_select2)->fetch_array(); 
	if($result1==False){
	echo "<script> alert('输入的账号不存在');parent.location.href='login.html'; </script>";
	}else if($result2[0]!=$data['passwd']){
		echo "<script> alert('输入的账号或密码不正确，请重新输入');parent.location.href='login.html'; </script>";
	}else{
		echo "<script> alert('登陆成功');parent.location.href='index.html'; </script>";
	}
}
//释放结果集资源
$result1->free();
$result2->free();
//关闭数据库连接
$mysqli->close();
?>