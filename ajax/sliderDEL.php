<?php
	
	require '../system/config.php';
	require '../system/conn.php';

	$link = DBConnect();

	$id = $_GET['id'] ?? 0;	
	
	$query = "DELETE FROM dp_slider WHERE id = '$id'";

	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
	}
?>