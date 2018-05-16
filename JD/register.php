<?php
header("Content-Tpye:text/html;charset=utf8");

@$data['user'] = $_POST['user'];
@$data['passwd1'] = $_POST['passwd1'];
@$data['passwd2'] = $_POST['passwd2'];
//$ensure=0;

//连接数据库
$db= new mysqli('localhost','root','123456','data_php','3306');
//判断连接数据库是否有错误
if($db->connect_errno){
	//输出错误代码并退出当前脚本
	die("连接失败:%s\n".$mysqli->connect_error);
	
}

if(@$data['user']==''||$data['passwd1']==''||$data['passwd2']==''){
	echo "<script> alert('输入的用户名或密码不能为空，请重新输入');parent.location.href='register.html'; </script>"; 
}else if(@$data['user']!=''){
	$sql_select="select num from information_user where num={$data['user']}";
	$result = $db->query($sql_select)->fetch_array();
	if($result){
	echo "<script> alert('该用户名已被注册，请重新注册');parent.location.href='register.html'; </script>"; 
	}else if($data['passwd1']!=$data['passwd2']){
	echo "<script> alert('两次密码输入不一致，请重新输入');parent.location.href='register.html'; </script>"; 
	}
	else{
	$sql_insert = "insert into information_user(num,passwd) values('".$data['user']."','".$data['passwd1']."')";
	$query = $db->query($sql_insert);
	echo "<script> alert('注册成功，点击确认进入到首页');parent.location.href='index.html'; </script>";
	}
}

?>