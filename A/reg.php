<?php
	$err = "";
	if(isset($_POST["acc"])){
		require_once("db_config.php");
		$cur_time = date('Y-m-d H:i:s');
		$check_sql = "select * from user where UID = '".$_POST['acc']."'";
		$check = mysqli_query($link,$check_sql);
		if(mysqli_num_rows($check)>0){
			$err = "帳號已被使用囉!";
		}else{
			$new_user = "insert into user(UID, PWD, MAIL, TEL, LOGIN_TIMES, LAST_LOGIN) values('".$_POST['acc']."','".$_POST['pwd']."','".$_POST['mail']."','".$_POST['tel']."','1','".$cur_time."')";
			if(mysqli_query($link, $new_user)){
				header("Location: log.php");
			}else{
				$err = "資料庫錯誤";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<div align="center">
		<p>註冊帳號</p>
		<form action="reg.php" method="post">
			<table>
				<tr>
					<td align="right">
						帳號:
					</td>
					<td>
						<input type="text" name="acc" required></input>
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
						<input type="text" name="mail" required></input>
					</td>
				</tr>
				<tr>
					<td align="right">
						電話:
					</td>
					<td>
						<input type="text" name="tel" required></input>
					</td>
				</tr>
			</table>
			<input type="reset" value="重新填寫"></input>
			<input type="submit" value="註冊"></input>
		</form>
		<?php echo $err; ?>
	</div>
</body>
</html>