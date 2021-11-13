<?php
// 包含数据库链接文件
require_once('conn.php');
header("Content-Type:text/html;charset=utf-8");
$userID=$_GET['userID'];
$name=$_GET['name'];
$time=$_GET['time'];
$msg=$_POST['msg'];
$messageID=$_GET['messageID'];
if(trim($msg)==""){
	echo "<script>alert('请输入留言！');window.location.href='../showmsg.php?time=$time&messageID=$messageID&userID=$userID&name=$name'</script>";
	exit;
}
// var_dump($id,$name,$time);
$sql="update `message` set usermsg='".$msg."' where id='".$messageID."'";
$result=mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('修改成功！');window.location.href='userindex.php?userID=$userID&name=$name'</script>";
	exit;
}
mysqli_close($conn);
?>