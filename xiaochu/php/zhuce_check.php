<?php
//开启session会话
session_start();
// 链接数据库文件插入
require_once('conn.php');
header("Content-Type:text/html;charset=utf-8");
// 接收提交表单
$zcuname=$_POST['username'];//用户名
$zcpass=$_POST['pass'];//用户密码
$zcpass2=$_POST['pass2'];//确认密码
$Gyzm=$_POST['Gyzm'];//验证码
$_SESSION['username']=$zcuname;//用户名存到session
$_SESSION['pass']=$zcpass;//密码存到session
$yzm=$_SESSION['yzm'];
//验证码
// var_dump($Gyzm);
// var_dump($yzm);
// if($Gyzm==$yzm){
// 	echo "true";
// }
// else{
// 	echo "f";
// }
// var_dump($_SESSION);
//判断用户名密码是否为空
			if(trim($zcuname)==""){
					echo "<script>alert('请输入用户名');alert('返回页面');window.location.href='../zhuce.php'</script>";
					exit;
			}if(trim($zcpass)==""){
				echo "<script>alert('请输入密码');alert('返回页面');window.location.href='../zhuce.php'</script>";
				exit;
			}
			if(trim($zcpass)!=trim($zcpass2)){
				echo "<script>alert('输入密码不一致');alert('返回页面');window.location.href='../zhuce.php'</script>";
				exit;
			}
			if($Gyzm!=$yzm){
				session_destroy();
				echo "<script>alert('验证码错误');alert('返回页面');window.location.href='../zhuce.php'</script>";
				exit;
			}
$sql_c="select * from user where username='".$zcuname."'";
$result=mysqli_query($conn,$sql_c);
if($result){
	$row=mysqli_num_rows($result);
	if($row>0){
		echo "<script>alert('账号已经被注册请重新输入');alert('返回页面');window.location.href='../zhuce.php'</script>";
		exit;
	}
}
// 密码加密
$zcpass1=md5($zcpass);
// // 插入sql语句
$sql="insert into `user` (`username` ,`pass`) values('{$zcuname}' ,'{$zcpass1}')";
//执行sql语句
$result=mysqli_query($conn,$sql);
var_dump($result);//检测插入数据注册信息是否成功//成功返回true
// 注册成功回到登陆界面
if($result){
	echo "<script>alert('注册成功！');alert('返回登陆页面');window.location.href='../login.php'</script>";
	exit;
}
// 关闭数据库
mysqli_close($conn);
?>