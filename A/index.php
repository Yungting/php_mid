<?php
	$cooke_name = "c_user";
	if($_COOKIE[$cooke_name]==null){
		header("Location: log.php");
	}
	require_once("db_config.php");
	$u_id = $_COOKIE[$cooke_name];
	$user_sql = "select * from user where UID = '".$u_id."'";
	$user = mysqli_query($link, $user_sql);
	$reslt = mysqli_fetch_array($user, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>INDEX</title>
</head>
<body>
	<div align="center">
		<table>
			<tr>
				<td colspan="2" align="center"><?php echo $reslt['UID']; ?> 歡迎回來</td>
			</tr>
			<tr>
				<td>
					上次登入時間:
				</td>
				<td>
					<?php echo $reslt['LAST_LOGIN']; ?> 
				</td>
			</tr>
			<tr>
				<td align="right">
					登入次數:
				</td>
				<td>
					<?php echo $reslt['LOGIN_TIMES']; ?>
				</td>
			</tr>
		</table>
		<button type="button" name="prof" onclick="location.href='logout.php'">登出</button>
		<button type="button" name="prof" onclick="location.href='profile.php'">修改資料</button>
	</div>
</body>
</html>
<?php
	$cur_time = date('Y-m-d H:i:s');
	$update_last = "update user set LAST_LOGIN = '".$cur_time."' where UID = '".$u_id."'";
	mysqli_query($link, $update_last);
?>