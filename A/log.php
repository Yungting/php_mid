<?php
	$cooke_name = "c_user";
	if(@$_COOKIE[$cooke_name]!=null){
		header("Location: index.php");
	}
	$login_msg = "";
	if(isset($_POST['acc'])){
		require_once("db_config.php");
		$check_sql = "select * from user where UID = '".$_POST['acc']."'";
		$check = mysqli_query($link,$check_sql);
		if(mysqli_num_rows($check)>0){
			$result = mysqli_fetch_array($check, MYSQLI_ASSOC);
			if($_POST['pwd'] == $result['PWD']){
				$cur_time = date('Y-m-d H:i:s');
				$last_time = strtotime($result['LAST_LOGIN']);
				if ((strtotime($cur_time)-$last_time)>86400){
					$times = (int)$result['LOGIN_TIMES']+1;
				}else{
					$times = (int)$result['LOGIN_TIMES'];
				}
				$update_sql = "update user set LOGIN_TIMES = '".$times."' where UID = '".$_POST['acc']."'";
				mysqli_query($link, $update_sql);
				setcookie($cooke_name, $result['UID']);
				header("Location: index.php");//登入成功 資料設定
			}else{
				$login_msg = "密碼錯誤!!";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div align="center">
		<form action="log.php" method="POST">
			<table>
				<tr>
					<td>帳號</td>
					<td><input type="text" name="acc" required></input>
				</tr>
				<tr>
					<td>密碼</td>
					<td><input type="password" name="pwd" required=""></input></td>
				</tr>
				<tr>
					<td><input type="button" name="reg" onclick="location.href='reg.php'" value="註冊"></input></td>
					<td align="right"><input type="submit" value="登入"></input></td>
				</tr>
			</table>
			<?php
				echo $login_msg;
			?>
		</form>
	</div>
</body>
</html>