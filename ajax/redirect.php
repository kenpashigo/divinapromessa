<?php

	require "../system/config.php";
	require "../system/conn.php";

	$link = DBConnect();
	$user = $_GET['user'];

	$query = "UPDATE dp_users SET ativo='0' WHERE usuario = '$user'";
	if(mysqli_query($link, $query)){
		print_r("true");
	} else {
		print_r("false");
	}

?>