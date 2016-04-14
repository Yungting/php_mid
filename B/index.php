<?php
	function add($x,$y){
		return $x+$y;
	}
	function sub($x,$y){
		return $x-$y;
	}
	function plus($x,$y){
		return $x*$y;
	}
	function div($x,$y){
		return $x/$y;
	}
	$ans = 0;
	if(isset($_POST['oper'])){
		if($_POST['oper']==0){
			$ans = add($_POST['n1'],$_POST['n2']);
		}elseif (($_POST['oper']==1)) {
			$ans = sub($_POST['n1'],$_POST['n2']);
		}elseif (($_POST['oper']==2)) {
			$ans = plus($_POST['n1'],$_POST['n2']);
		}elseif (($_POST['oper']==3)) {
			$ans = div($_POST['n1'],$_POST['n2']);
		}elseif (($_POST['oper']==4)) {
			$ans = pow($_POST['n1'],$_POST['n2']);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="index.php" method="post">
		<input type="text" name="n1"></input><br/>
		<input type="text" name="n2"></input><br/>
		<input type="radio" name="oper" value="0">+
		<input type="radio" name="oper" value="1">-
		<input type="radio" name="oper" value="2">*
		<input type="radio" name="oper" value="3">/
		<input type="radio" name="oper" value="4">指數<br/>
		<input type="submit" value="計算"></input>
	</form>
	<?php echo "ANS=".$ans; ?>
</body>
</html>