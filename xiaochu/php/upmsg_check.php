<?php
// 包含数据库链接文件
require_once('conn.php');
header("Content-Type:text/html;charset=utf-8");
$userID=$_GET['userID'];
$name=$_GET['name'];
$time=$_GET['time'];
$msg=$_POST['msg'];
// var_dump($id,$name,$time);
if($msg==""){
	echo "<script>alert('请先填写内容');alert('返回页面');window.location.href='userindex.php?userID=$userID'</script>";
	exit;
}else{
$sql="insert into `message` (`userId` ,`user` ,`usermsg` ,`time`) values('{$userID}' ,'{$name}' ,'{$msg}' ,'{$time}')";
$result=mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('上传成功！');window.location.href='userindex.php?userID=$userID&name=$name'</script>";
	exit;
}
}
mysqli_close($conn);
?>