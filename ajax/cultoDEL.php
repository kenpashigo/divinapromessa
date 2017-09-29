<?php

	require '../system/config.php';
	require '../system/conn.php';

	$link = DBConnect();	

	$id_delete = $_POST['dataPost'];

	$query = "DELETE FROM dp_cultos WHERE id = '$id_delete'";

	if(mysqli_query($link, $query)) {
		echo 'true';
	} else {
		print_r("false");
	}

?>