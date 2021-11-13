	<?php
	//修改密码
		require_once('conn.php');
		session_start();
		header("Content-Type:text/html;Charset=utf-8");
		$userID=$_GET['userID'];
		$opass1=$_POST['o_pass'];
		$npass1=$_POST['n_pass'];
		$vpass=$_POST['v_pass'];
		$opass=md5($opass1);
		$npass=md5($npass1);
	//检查新密码确认是否一致
	// var_dump($userID);
	// var_dump($opass);
	if($npass1!=$vpass){
		echo "<script language='javascript'>
		alert('输入的密码不一致请重新输入');
		window.location.href='../xiugaipass.php?userID=$userID'
		</script>";
		exit;
	}
	//检查旧密码是否正确
	$sql="select * from `user` where id='".$userID."' and pass='".$opass."'";
	$result=mysqli_query($conn,$sql);
	$rows=mysqli_num_rows($result);
	// var_dump($rows);
	if($result && $rows>0)//用户旧密码正确
	{
		if(trim($npass1)==''){
			echo "<script>
			alert('请输入新密码并确认密码');
			window.location.href='../xiugaipass.php?userID=$userID'
			</script>";
			exit;
		}
		else{
			$arr=mysqli_fetch_array($result);
			$sqlupdate="update user set pass='".$npass."' where Id='".$userID."'";
			$result=mysqli_query($conn,$sqlupdate);
			if($result)
			{
				session_destroy();
				echo "<script>
				alert('密码修改成功请重新登陆');
				window.parent.frames.location.href='../login.php'
				</script>";
				exit;
			}
			else{
				echo "<script>
				alert('密码修改失败,请重新修改');
				window.location.href='../xiugaipass.php?userID=$userID'
				</script>";
				exit;
			}
		}
	}
	else{
		echo "<script>
		alert('输入的原密码错误');
		window.location.href='../xiugaipass.php?userID=$userID'
		</script>";
		exit;
	}
	?>