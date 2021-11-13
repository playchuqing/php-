<?php
//留言Id
$userID=$_GET['userID'];
$messageID=$_GET['messageID'];
require_once('php/conn.php');
header("Content-Type:text/html;Charset=utf-8");
$sql="select * from `message` where Id=$messageID";
$result=mysqli_query($conn,$sql);
$msg=mysqli_fetch_all($result,MYSQLI_ASSOC);
// var_dump($msg);
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>查看留言</title>
	<link rel="stylesheet" href="css/login.css" type="text/css">
	<link rel="stylesheet" href="css/message.css" type="text/css">
	<script type="text/javascript" src="js/GetTime.js"></script>
</head>
<body>
	<header>
		<div class="header">
			<div id="header-top">
				<span id="t-left">
					在这里可以查看留言哦&nbsp;&nbsp;&nbsp;&nbsp;
				</span>
			</div>
			<div id="header-bottom">
				<span id="bot">
					查看&nbsp;留言&nbsp;
				</span><br />
			</div>
		</div>
	</header>
	
	
	
	
	<article>
		<div style="width:90%;height: 300px;background-color:#98cfff;margin: 20px auto;border-radius: 10px;padding: 40px;">
				<p id="username" style="margin-top:10px ;	margin-left: 10px;">
					用户名: <?php echo  $msg[0]['user']; ?>
				</p>
				<br />点击下面文本框修改留言
				<form action="php/update.php?time=<?php echo date("Y-m-d"); ?>&messageID=<?php echo $messageID; ?>&userID=<?php echo $userID; ?>&name=<?php echo  $msg[0]['user']; ?>" method="post" name="form1" id="form1" style="width: 100%;height:70% ;">
				<textarea id="msg" name="msg" style="width: 90%;height: 60%;border: 1px solid #fff;border-radius: 10px;background-color: #83fff7;color: #304070;font-size: 14px;font-family: '宋体';text-align: left;">
					<?php echo $msg[0]['usermsg']; ?>
				</textarea>
				<input type="submit" value="保存上传" />
				<label><button>
				<a href="php/userindex.php?messageID=<?php echo $messageID; ?>&userID=<?php echo $userID; ?>" style="color: #304070;">
					返回
				</a></button></label>
				</form>
				<p id="time" style="width: 40%;height: 40px;line-height: 40px;float: right;">发布时间:<?php echo $msg[0]['time']; ?></p>
		</div>
	</article>
	<footer>
		<div id="footer">@小初<br>版权所有-QQ:3361808779</div>
	</footer>	
</body>