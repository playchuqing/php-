<!-- 链接mysql -->
<?php
session_start();
require_once('conn.php');
header("Content-Type:text/html;Charset=utf-8");
?>
<?php
if($_GET['action']=="logout"){
	session_destroy();
}
?>

<!-- 分页 -->
<?php
if(isset($_GET['page'])){
	$c_page=$_GET['page'];
}else{
	$c_page=1;
}
$offset=($c_page-1)*5;
// var_dump($offset);
?>

<!-- 查询记录 -->
<?php 

$sql="select * from `message` order by Id desc";
$result=mysqli_query($conn,$sql);
$msgs=mysqli_num_rows($result);
// var_dump($msgs);
//获取页面值
$msgnum=$msgs;//留言数量
// var_dump($msgnum);
$page_count=ceil($msgnum/5);//五条取整取页数
// print_r($page_count);

$sql1="select * from `message` order by Id desc limit $offset,5";
$result1=mysqli_query($conn,$sql1);
$msgs1=mysqli_num_rows($result);
?>
<!-- 判断有无留言做出反应 -->
<?php
if(!$result||$msgs==0){
?>
<h1 align="center" style="color: #D3D3D3;">无留言显示... ...</h1>
<?php 
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>留言板主页</title>
			<script type="text/javascript" src="js/GetTime.js"></script>
		<link rel="stylesheet" href="../css/message.css" type="text/css">
	</head>
	<body>
		<header>
			<div class="header">
				<div id="header-top">
					<span id="t-left">欢迎访问留言板&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:'宋体';font-size: 16px;font-weight: bold;">用户请：</span>				
					<a href="../login.php">
					<span style="font-family:'宋体';font-size: 16px;font-weight: bold;color: chocolate;" title="点击进行登陆">
						[登陆]
					</span>
					</a></span>
					<span id="t-right">现在是：
						<script>document.write(Y+"-"+(M+1)+"-"+D);</script>
					</span>
				</div>
				<div id="header-bottom">
					<span id="bot">留&nbsp;言&nbsp;~&nbsp;版</span><br />
					我是可以留言的版子哦~(⊙o⊙)！！
				</div>
			</div>
		</header>
		<article class="section1">
			<?php
			$rows=mysqli_fetch_all($result1,MYSQLI_ASSOC);//获取留言数据
			// var_dump($rows);
			?>
			<div id="centent">
				<?php  foreach($rows as $key=>$message){?>
				<div id="msg">
					<p id="username">用户名: <?php echo $message['user'];?></p>
					<p id="message">&nbsp;&nbsp;<?php echo $message['usermsg'];?></p>
					<p id="time">发布时间:<?php echo $message['time'];?></p>
				</div>
				<?php }?>
				<div id="page" align="center" style="color: #D3D3D3;">
					<?php
					if($page_count!=1)
					{
						echo "<a style='color:#D3D3D3;' href=index.php?page=1&userID=$userID>首页</a>";
					}
					for($i=1;$i<=($page_count-1);$i++){
						echo "<a style='color:#D3D3D3;' href=index.php?page=$i&userID=$userID>".$i.'&nbsp;'."</a>";
					}
					if($page_count){
						echo "<a style='color:#D3D3D3;' href=index.php?page=$page_count&userID=$userID>尾页</a>";
					}
					?>
				</div>
			</div>
		</article>
		<footer>
			<div id="footer">@小初<br>版权所有-QQ:3361808779</div>
		</footer>
	</body>
</html>
