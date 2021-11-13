
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>用户登陆</title>
	<link rel="stylesheet" href="css/login.css" type="text/css">
	<link rel="stylesheet" href="css/message.css" type="text/css">
	<script type="text/javascript" src="js/GetTime.js"></script>
	<!-- 判单用户名密码是否为空 -->
	<script type="text/javascript">
		function check(){
			var admin_name=document.getElementById("admin_name").value;
			var admin_pass=document.getElementById("admin_pass").value;
			if(admin_name==""){
				alert("请输入用户名！");
				document.getElementById("admin_name").focus();
				return false;
			}else if(admin_pass==""){
				alert("请输入密码！");
				document.getElementById("admin_pass").focus();
				return false;
			}else{
				document.getElementById("form1").submit();
				return true;
			}
		}
	</script>
	<style type="text/css">
		.button1:hover{
			color:#83FFF7;
		}
		.button1:link{
			color: #48486C;
		}
	</style>
</head>
<body>
	<!-- 头部 -->
	<header>
		<div class="header">
			<div id="header-top">
				<span id="t-left">在这里可以进行登陆哦&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:'宋体';font-size: 16px;font-weight: bold;">
			</div>
			<div id="header-bottom">
				<span id="bot">登陆&nbsp;~吧&nbsp;</span><br />
			</div>
		</div>
	</header>
	<!-- 用户登录 -->
	<div class="login">
		<p id="title" align="center">~用户登陆~</p>
		<!-- 表单提交到登陆验证php文件 -->
		<form action="php/login_check.php" name="form1" id="form1" method="post" onsubmit="return check()" >
			
			
			
			<br><br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="color: #D3D3D3;">用户名:</label>
			<input style="width: 250px;height: 35px;padding: 5px;border: 0;font-family: '宋体';" class="text1" id="admin_name" type="text" name="username" placeholder="请输入用户名"/>
			<br />
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="color: #D3D3D3;">密码:&nbsp;&nbsp;</label>
			<input style="width: 250px;height: 35px;padding: 5px;border: 0;font-family: '宋体';" class="pass1" id="admin_pass" type="password" name="pass" placeholder="请输入密码">
			<br />
			
			
			
			<div style="width: 260px;height: 40px;margin: 0 auto;">
				<br />
				<input style="float: left;border: 0 ;background-color: skyblue;width: 40%;height: 35px;" type="submit" value="登陆" class="button1" />
				<!-- 点击提交登陆验证 -->
				<a style="display:block;float: right;border: 0 ;background-color: skyblue;width: 40%;height: 35px;color: #304070;" href="zhuce.php"><input  style="border: 0 ;background-color: skyblue;width: 100%;height: 35px;"  type="button" value="注册" class="button1" />
				<br />
				</a>
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
