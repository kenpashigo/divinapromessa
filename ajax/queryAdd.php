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

	$query = "INSERT INTO dp_posts (ministerio, categoria, titulo, resumo, conteudo, imagem, data, hora) VALUES ('$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[0]', '$date', '$hora')";	 

	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
	}

?>