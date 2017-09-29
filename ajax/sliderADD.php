<?php
	
	require '../system/config.php';
	require '../system/conn.php';

	$link = DBConnect();

	$data = explode("¬", $_POST['dataPost']);
	
	$img = './sliders/'.$data[0];
	
	$query = "INSERT INTO 
							dp_slider (link, descricao, legenda) 
						VALUES 
							('$img', '$data[1]', '$data[2]')";

	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
	}
?>