<!-- 链接mysql -->
<?php
	session_start();
	require_once('conn.php');
	header("Content-Type:text/html;Charset=utf-8");
?>
<?php
// 获取get传值用户ID
	$userID=$_GET['userID'];
	// 查询用户个人留言记录
	$sql="select * from user where Id='".$userID."'";
	// 执行sql语句
	$result=mysqli_query($conn,$sql);
	if($result){
		//获取数组中记录
		$row=mysqli_num_rows($result);
		//找出当前条记录
		$rowid=mysqli_fetch_all($result,MYSQLI_ASSOC);
		// var_dump($rowid);
		// 获取数据库表用户名
		$name=$rowid[0]["username"];
		// var_dump($username);
	}
?>
<!-- 分页 -->
<?php
	if(isset($_GET['page'])){
		$c_page=$_GET['page'];
	}else{
		$c_page=1;
	}
		$offset=($c_page-1)*2;
		// var_dump($offset);
?>

<!-- 查记录 -->
<?php 

$sql="select * from `message` where `userId`='".$userID."'order by Id desc";
$result=mysqli_query($conn,$sql);
$msgs=mysqli_num_rows($result);
// var_dump($msgs);
//获取页面值
$msgnum=$msgs;//留言数量
// var_dump($msgnum);
$page_count=ceil($msgnum/2);//2条取整取页数
// print_r($page_count);
// sql查询个人留言取前两条
$sql1="select * from `message`  where `userId`='".$userID."' order by Id desc limit $offset,2";
$result1=mysqli_query($conn,$sql1);
$msgs1=mysqli_num_rows($result);
?>
<!-- 判断有无留言做出反应 -->
<?php
if(!$result||$msgs1==0){
?>
<h1 align="center" style="color: #D3D3D3;">无留言显示... ...</h1>
<?php 
}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/message.css" type="text/css">
	<link rel="stylesheet" href="../css/userindex.css" type="text/css">
	<script src="../js/GetTime.js" type="text/javascript"></script>
	<title>个人主页</title>
	<style type="text/css">
		*{
				padding: 0;
				margin: 0;
		}
		.body{
			width: 800px;
			background-color:skyblue;
			margin: 0 auto;
		}
		a:link{
			color: #FFFFFF;
		}
		a:visited{
			color: #D3D3D3;
		}
		.button1:hover{
			color:#83FFF7;
		}
		.button2:hover{
			color:red;
		}
	</style>
</head>
<body>
	<header>
		<div class="header">
			<div id="header-top">
				<span id="t-left">
					欢迎访问个人主页&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;^-^欢迎留言哦！
			</a></span>
				<span id="t-right">现在是：
					<script>document.write(Y+"-"+(M+1)+"-"+D);</script>
				</span>
				<span>
					<a class="button2" href="../indexLogin.php?userID=<?php echo $userID; ?>" target="_top">返回主页</a>
				</span>
			</div>
			<div id="header-bottom">
				<table width="100%" height="100%">
					<tr>
						<td align="right" width="30%">个人主页</td>
						<td width="5%"></td>
						<td align="left" width="30%">
							用户名:【<?php echo $name;?> 】
						</td>
						<td width="45%" height="50px"></td>
					</tr>
					<tr>
						<td align="right"></td>
						<td></td>
						<td align="left">
							<a class="button1" href="../xiugaipass.php?userID=<?php echo $userID; ?>"><li style="list-style: none;">点击修改密码用户</li></a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</header>
	<article>
		<div id="centent">
			<?php
			$rows=mysqli_fetch_all($result1,MYSQLI_ASSOC);//获取留言数据
			// var_dump($rows);
			?>
			<div id="text">
				<!-- 发布留言 提交到upmsg_check.php验证-->
				<form action="upmsg_check.php?userID=<?php echo $userID; ?>&name=<?php echo $name; ?>&time=<?php echo date("Y-m-d")?> " method="post" name="form3" id="form3" onsubmit="check();">
					<textarea placeholder="请输入内容:" id="msg" name="msg"></textarea><br />
					<input style="border: none; width: 70px;height: 40px;margin-left: 80%;" type="submit" value="发布" />
				</form>
				
				
				
				<?php  foreach($rows as $key=>$message){?>
				<div id="msg" style="width: 80%;height: 270px;background-color: #304070;border: 1px solid #FFFFFF;border-radius: 10px;color: #83FFF7;padding: 20px;margin: 0 auto;display: block;">
					<p id="username" style="margin-top:10px ;	margin-left: 10px;">
						用户名: <?php echo $message['user'];?>
					</p>
					<p id="message" style="	margin: 0 auto;width: 90%;height: 60%;border: 1px solid #fff;border-radius: 10px;background-color: #83fff7;color: #304070;font-size: 14px;font-family: '宋体';">
						&nbsp;&nbsp;<?php echo $message['usermsg'];?>
					</p>
					
					<!-- 查看用户留言 -->
					<a href="../showmsg.php?messageID=<?php echo $message['Id']; ?>&userID=<?php echo $userID; ?>"><button>查看编辑</button></a>
					
					
					<form action="delete.php?messageID=<?php echo $message['Id'];?>&userID=<?php echo $userID; ?>" method="post"  name="form4" id="form4" >
					<!-- 是否删除留言js -->
					<script type="text/javascript">
					window.onload=function()
					{
					  var bt=document.getElementById("bt");
					  bt.onclick=function()
					  {
					     if(confirm("确定要删除吗"))
					     {
					       alert("我要删除了");
						   return true;
					     }else{
							 return false;
						 }
					  }
					}
					</script>
						<input id="bt" type="submit" style="width: 100px;" value="删除留言" />
					</form>
					<p id="time" style="width: 40%;height: 40px;line-height: 40px;float: right;">发布时间:<?php echo $message['time'];?></p>
				</div>
				<?php }?>
			</div>
		</div>
		<div id="page" align="center" style="color: #D3D3D3;">
			<?php
			if($page_count!=1)
			{
				echo "<a style='color:#D3D3D3;' href=userindex.php?page=1&userID=$userID>首页</a>";
			}
			for($i=1;$i<=($page_count-1);$i++){
				echo "<a style='color:#D3D3D3;' href=userindex.php?page=$i&userID=$userID>".$i.'&nbsp;'."</a>";
			}
			if($page_count){
				echo "<a style='color:#D3D3D3;' href=userindex.php?page=$page_count&userID=$userID>尾页</a>";
			}
			?>
		</div>
	</article>
	<footer>
		<div id="footer">@小初<br>版权所有-QQ:3361808779</div>
	</footer>
</body>
</html>