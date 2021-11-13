<?php 
$userID=$_GET['userID']; 
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>修改密码</title>
	<style type="text/css">
		input{
			width:200px;
			height:25px;
			border: 1px solid #aca8c3;
		}
		#button:hover{
			color:#0ad7ff;
		}
		#button{
			    width: 112px;
			    height: 30px;
			    background-color: #4e6ef2;
			    font-size: 17px;
			    font-weight: 400;
			    border:2px solid #141f5f;
				border-radius: 5px;
			    letter-spacing: normal;
		}
	</style>
</head>
<body style="width: 500px;height: 300px;background-color: #7e9ec1;margin: 0 auto;">
	<form id="form1" method="post" action="php/updatepass.php?userID=<?php echo $userID; ?>">
		<table width="100%" height="192" border="0" align="center" id="tlist">
			<tr>
				<td colspan="2" align="center" bgcolor="#E4FF5C">修改账户密码</td>
			</tr>
			<tr>
				<td width="19%" height="38" align="center" bgcolor="#FFFFFF">原来密码</td>
				<td width="81%" bgcolor="#ffffff">
					<label for="o_pass">
						<input type="password" name="o_pass" class="list" id="o_pass">
					</label>
				</td>
			</tr>
			<tr>
				<td width="19%" height="38" align="center" bgcolor="#FFFFFF">新密码</td>
				<td bgcolor="#ffffff">
					<label for="n_pass">
						<input type="password" name="n_pass" class="list" id="n_pass">
					</label>
				</td>
			</tr>
			<tr>
				<td height="37" align="center" bgcolor="#FFFFFF">确认新密码</td>
				<td bgcolor="#ffffff">
					<label for="v_pass">
						<input type="password" name="v_pass" class="list" id="v_pass">
					</label>
				</td>
			</tr>
			<tr>
				<td height="39" colspan="2" align="center">
					<input type="submit" name="button" id="button" value="确认修改">
					<a href="php/userindex.php?userID=<?php echo $userID; ?>">
					<input type="button" id="button" value="取消">
					</a>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>