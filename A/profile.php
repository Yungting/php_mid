<?php
	$cooke_name = "c_user";
	if($_COOKIE[$cooke_name]==null){
		header("Location: log.php");
	}
	require_once("db_config.php");
	$u_id = $_COOKIE[$cooke_name];
	if(isset($_POST['pwd'])){
		$update_sql = "update user set PWD = '".$_POST['pwd']."', MAIL = '".$_POST['mail']."', TEL = '".$_POST['tel']."' where UID = '".$u_id."'";
		mysqli_query($link, $update_sql);
		header("Location: index.php");
	}else{
		$user_sql = "select * from user where UID = '".$u_id."'";
		$user = mysqli_query($link, $user_sql);
		$reslt = mysqli_fetch_array($user, MYSQLI_ASSOC);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>
	<div align="center">
		<p>修改個人資料</p>
		<form action="profile.php" method="post">
			<table>
				<tr>
					<td align="right">
						帳號:
					</td>
					<td>
						<?php echo $reslt['UID']; ?>
					</td>
				</tr>
				<tr>
					<td align="right">
						密碼:
					</td>
					<td>
						<input type="password" name="pwd" required></input>
					</td>
				</tr>
				<tr>
					<td align="right">
						E-Mail:
					</td>
					<td>
						<?php echo "<input type='text' name='mail' value='".$reslt['MAIL']."' required></input>"; ?>
					</td>
				</tr>
				<tr>
					<td align="right">
						電話:
					</td>
					<td>
						<?php echo "<input type='text' name='tel' value='".$reslt['TEL']."' required></input>"; ?>
					</td>
				</tr>
			</table>
			<input type="reset" value="重新填寫"></input>
			<input type="submit" value="修改"></input>
		</form>
		<button type="button" name="del" onclick="location.href='checkdel.php'">刪除帳號</button>
	</div>
</body>
</html>