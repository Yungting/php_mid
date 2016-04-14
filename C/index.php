<?php
	require_once("db_config.php");
	if(isset($_GET['s'])){
		$chosen = $_GET['url'];
		$sel = "select * from uploadurl where SH_URL = '".$chosen."'";
		$result_set = mysqli_query($link, $sel);
		$result = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
		$redir= "Location: ".$result['ORG'];
		$times = (int)$result['TIMES']+1;
		$update_times = "update uploadurl set TIMES = '".$times."' where SH_URL = '".$chosen."'";
		mysqli_query($link, $update_times);
		header($redir);
	}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div align="center">
		<table>
			<tr>
				<td>原始網址</td>
				<td>短網址</td>
				<td>點擊率</td>
				<td>上傳時間</td>
			</tr>
			<?php
				$sel_sql = "select * from uploadurl ORDER BY UP_TIME DESC";
				$result_set = mysqli_query($link, $sel_sql);
				while ($result = mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
					echo "<tr>";
					echo "<td><a href='".$result['ORG']."'>".$result['ORG']."</a></td>";
					echo "<td><a href='?url=".$result['SH_URL']."&s=1'>".$result['SH_URL']."</a></td>";
					echo "<td>".$result['TIMES']."</td>";
					echo "<td>".$result['UP_TIME']."</td>";
					echo "</tr>";
				}
			}
			?>
		</table>
		<button type="button" name"new" onclick="location.href='form.php'">新增</button>
	</div>
</body>
</html>