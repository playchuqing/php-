<?php
$conn= mysqli_connect("localhost","root","12345678");
if(!$conn){
	die('数据库链接失败'.mysql_error());
}
//三种链接方法
$dbselsect=mysqli_select_db($conn,"news");//注意mysql与mysqli的参数相反
if(!$dbselsect)
{
	die('数据库不可用：'.mysql_error());
}
mysqli_query($conn,"set names utf8");
?>