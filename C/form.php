<?php
	function s_url(){
		$rnd = "1234567980abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		for($i=0;$i<5;$i++){
			$sh .= $rnd{rand(0,61)};
		}
		return $sh;
	}
	if(isset($_POST['o_url'])){
		require_once("db_config.php");
		$org = $_POST['o_url'];
		$sh_url = s_url();
		$cur_time = date('Y-m-d H:i:s');
		$new_sh = "insert into uploadurl(NAME, ORG, SH_URL, UP_TIME, TIMES) values('".$_POST['name']."', '".$_POST['o_url']."', '".$sh_url."', '".$cur_time."', '0')";
		mysqli_query($link, $new_sh);
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Short URL</title>
</head>
<body>
	<div align="center">
		<form action="form.php" method="post">
			<p>名稱</p>
			<input type="text" name="name" required></input></br>
			<p>原始網址</p>
			<input type="text" name="o_url" required></input></br>
			<input type="submit" value="送出"></input></br>
		</form>
	</div>
</body>
</html>