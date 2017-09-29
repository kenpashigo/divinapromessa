<?php

	require '../system/config.php';
	require '../system/conn.php';

	$link = DBConnect();	

	$id_delete = $_GET['id'];

	$query = "DELETE FROM dp_posts WHERE id = '$id_delete'";

	if(mysqli_query($link, $query)) {
		echo 'true';
	} else {
		print_r("false");
	}


?>