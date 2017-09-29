<?php 
	require "../system/config.php";
	require "../system/conn.php";	
	
	$link = DBConnect();

	$dados = explode('¬', $_POST['dataPost']);

	$audiodir = '../audios/';
	$dados[7] = explode('-', $dados[7]);
	$dados[7] = $dados[7][2].'/'.$dados[7][1].'/'.$dados[7][0];

	$query = "INSERT INTO dp_cultos (pregador, titulo, resumo, tags, low, medium, high, data, conteudo) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dados[3]', '$audiodir$dados[4]', '$audiodir$dados[5]', '$audiodir$dados[6]', '$dados[7]', '$dados[8]')";

	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
	}
?>