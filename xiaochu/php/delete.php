<?php
require_once('conn.php');
header("Content-Type:text/html;charset=utf-8");
$userID=$_GET['userID'];
$messageID=$_GET['messageID'];
$sql="delete from `message` where Id='".$messageID."'";
$result=mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('删除成功');window.location.href='userindex.php?userID=$userID'</script>";
	exit;
}
mysqli_close($conn);
?>