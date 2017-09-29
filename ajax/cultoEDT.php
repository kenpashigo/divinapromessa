<?php

	require "../system/config.php";
	require "../system/conn.php";

	$link = DBConnect();

	$dados = explode('¬', $_POST['dataPost']);

	$audiodir = '../audios/';
	$dados[7] = explode('-', $dados[7]);
	$dados[7] = $dados[7][2].'/'.$dados[7][1].'/'.$dados[7][0];

	$query = "

	UPDATE 
		dp_cultos 
	SET 
		pregador='$dados[0]', 
		titulo='$dados[1]', 
		resumo='$dados[2]', 
		tags='$dados[3]', 
		low='$audiodir$dados[4]', 
		medium='$audiodir$dados[5]', 
		high='$audiodir$dados[6]', 
		data='$dados[7]', 
		conteudo='$dados[8]'
	WHERE 
		id = '$dados[9]'";
	
	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
	}

?>