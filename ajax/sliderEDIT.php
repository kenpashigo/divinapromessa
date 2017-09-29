<?php
	
	require '../system/config.php';
	require '../system/conn.php';

	$link = DBConnect();

	$data = $_POST['dataPost'] ?? 0;
	$data = explode('¬', $data);
	
	$img = './sliders/'.$data[1];
	
	$query = "UPDATE 
							dp_slider 
						SET 
							link='$img',
							descricao='$data[2]',
							legenda='$data[3]'
						WHERE 
							id = '$data[0]'";	

	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
	}
?>