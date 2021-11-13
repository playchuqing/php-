
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>用户注册</title>
	<link rel="stylesheet" href="css/login.css" type="text/css">
	<link rel="stylesheet" href="css/message.css" type="text/css">
	<script type="text/javascript" src="js/GetTime.js"></script>
	<script type="text/javascript" src="js/yzm.js"></script>
	<!-- 调用验证码函数 -->
	<script type="text/javascript">
		yzm();
		var i=num;
		// document.write(i);
		sessionStorage.setItem("yzm",i);
		
	</script>
<!-- 	<script type="text/javascript">
		var i=sessionStorage.getItem("yzm");
		document.write(i);
	</script> -->
</head>
	<style type="text/css">
		.button1:hover{
			color:#83FFF7;
		}
		.button1:link{
			color: #48486C;
		}
	</style>
<body>
	<!-- 头部 -->
	<header>
		<div class="header">
			<div id="header-top">
				<span id="t-left">在这里可以进行注册哦&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:'宋体';font-size: 16px;font-weight: bold;">
			</div>
			<div id="header-bottom">
				<span id="bot">注册&nbsp;~吧&nbsp;</span><br />
			</div>
		</div>
	</header>
	<!-- 用户注册 -->
	<div class="login">
		<p id="title" align="center">~用户注册~</p>
		<form action="php/zhuce_check.php" method="POST" id="form2" class="form2" name="form2"><br><br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color: #D3D3D3;">用户名:</label>
			<input style="width: 250px;height: 35px;padding: 5px;border: 0;font-family: '宋体';" class="text1" id="zcname" type="text" name="username" placeholder="请输入用户名" /><br />
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color: #D3D3D3;">密码:&nbsp;&nbsp;</label>
			<input style="width: 250px;height: 35px;padding: 5px;border: 0;font-family: '宋体';" class="pass1" id="zcpass" type="text" name="pass" placeholder="请输入密码"><br />
			<!-- 确认密码 -->
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color: #D3D3D3;">确认密码:&nbsp;&nbsp;</label>
			<input style="width: 250px;height: 35px;padding: 5px;border: 0;font-family: '宋体';" class="pass2" id="zcpass2" type="text" name="pass2" placeholder="请确认密码">
			<br />
			<?php
			session_start();
									$yzm="";
									for($i=0;$i<4;$i++){
										$a=rand(0,9);
										$yzm.=$a;
									}
									$_SESSION['yzm']=$yzm;
									// echo $_SESSION['yzm'];
										
			?>
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			验证码:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="Gyzm" name="Gyzm" ><?php echo $yzm; ?>
									
									
			<div style="width: 260px;height: 40px;margin: 0 auto;">
				<br />
				<input style="float: left;border: 0 ;background-color: skyblue;width: 40%;height: 35px;"  type="submit" value="注册" class="button1" />
				<label>
					<a href="login.php">
						<input class="button1" type="button" style="float: left;border: 0 ;background-color: skyblue;width: 40%;height: 35px;margin-left:50px;" value="返回登陆"></a>
					</label>
				<!-- 跳转注册页面 -->
			</div>
		</form>
	</div>
	
	<!-- footer -->
	<footer>
		<div id="footer">@小初<br>版权所有-QQ:3361808779</div>
	</footer>	
</body>
</html>