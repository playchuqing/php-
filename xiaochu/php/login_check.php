<?php
// 开启会话
session_start();
// 包含数据库链接文件
require_once('conn.php');
// var_dump($i);
header("Content-Type:text/html;charset=utf-8");
//接收表单传值
$admin_name=$_POST['username'];
$admin_pass=md5($_POST['pass']);
//查询语句付给变量
$sql="select * from user where username='".$admin_name."'";
//执行语句返回结果
$result=mysqli_query($conn,$sql);
//判断
if($result){
	//获取数组中记录
	$row=mysqli_num_rows($result);
	//找出当前条记录
	$rowid=mysqli_fetch_all($result,MYSQLI_ASSOC);
	//输出二维数组里面的Id
	// 用户名ID主键
	$userID=$rowid[0]["Id"];
	//用户名
	$name=$rowid[0]['username'];
	$pass=$rowid[0]['pass'];
	//查看id是否正确
	// var_dump($id);
	if($row>0){
		if($admin_pass==$pass){
			//登陆成功跳转
			$_SESSION['ischecked']="ok";
			$_SESSION['username']=$_POST['username'];
			// get传值userID和用户名name
			//登陆成功进行跳转
			echo "<script>alert('登陆成功!');window.location.href='../indexLogin.php?userID=$userID&name=$name'</script>";
			exit;
		}
		else{
			echo "<script>alert('密码错误请重新输入！');window.location.href='../login.php'</script>";
			exit;
		}
	}
	else{
		//用户名不正确返回
		echo "<script>alert('用户名不正确请重新输入！');window.location.href='../login.php'</script>";
		exit;
	}
}
//关闭数据库链接
mysqli_close($conn);
?>