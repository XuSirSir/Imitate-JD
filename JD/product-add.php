<?php
header("Content-Tpye:text/html;charset=utf8");
date_default_timezone_set("PRC");
@$data['color'] = $_POST['color'];
@$data['version'] = $_POST['version'];
@$data['phonememory'] = $_POST['phonememory'];
@$data['way'] = $_POST['way'];
@$data['num'] = $_POST['count'];
@$data['price'] = $_POST['price'];
@$data['picture'] = $_POST['picture'];
$now=date("Y-m-d H:i:s");

//连接数据库
$db= new mysqli('localhost','root','123456','data_php','3306');
//判断连接数据库是否有错误
if($db->connect_errno){
	//输出错误代码并退出当前脚本
	die("连接失败:%s\n".$mysqli->connect_error);
	
}

if(@$data['color']==''||@$data['version']==''||@$data['phonememory']==''||@$data['way']==''||@$data['num']==''||@$data['num']==''||@$data['price']==''||@$data['picture']==''){
	echo "<script> alert('你有选项未填写，请填写后再添加。');parent.location.href='product-add.html'; </script>";
}else if(@$data['color']!=''){
	$sql_insert = "insert into information_phone(color, version, phonememory, way, num, price, picture, addtime) values('".$data['color']."','".$data['version']."','".$data['phonememory']."','".$data['way']."','".$data['num']."','".$data['price']."','".$data['picture']."','".$now."')";
	$query = $db->query($sql_insert);
	echo "<script> alert('添加成功。');parent.location.href='product-add.html'; </script>";
}

?>