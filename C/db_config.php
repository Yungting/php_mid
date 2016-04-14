<?php
	$link = mysqli_connect("localhost","root","123456","simon");
	mysqli_query($link,"SET NAMES 'utf8'"); 
    mysqli_query($link,"SET CHARACTER_SET_CLIENT=utf8"); 
    mysqli_query($link,"SET CHARACTER_SET_RESULTS=utf8");
?>