<?php

	require '../system/config.php';
	require '../system/conn.php';

	$link = DBConnect();

	$data = $_POST['dataPost'] ?? 0;
	$data = explode('¬', $data);	

	date_default_timezone_set('America/Sao_Paulo');
  $date = date("d/m/Y");
  $hora = date("H:i:s");

  $data[0] = './uploads/'.$data[0];

	$query = "UPDATE dp_posts SET ministerio='$data[1]', categoria='$data[2]', titulo='$data[3]', resumo='$data[4]', conteudo='$data[5]', imagem='$data[0]', data='$date', hora='$hora' WHERE id = '$data[6]'";

	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
	}

?>