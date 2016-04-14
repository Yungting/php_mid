<?php
	$cooke_name = "c_user";
	$u_id = $_COOKIE[$cooke_name];
	if($_COOKIE[$cooke_name]==null){
		header("Location: log.php");
	}
	if(isset($_GET['c'])){
		require_once("db_config.php");
		$del_sql ="delete from user where UID = '".$u_id."'";
		mysqli_query($link, $del_sql);
		header("Location: logout.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DEL</title>
</head>
<body>
	<div align="center">
		<p>確定要刪除?</p>
		<button type="button" name="del" onclick="location.href='checkdel.php?c=1'">刪除</button>
		<button type="button" name="undo" onclick="location.href='index.php'">取消</button>
	</div>
</body>
</html>