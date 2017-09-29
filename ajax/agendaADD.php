<?php 
	require "../system/config.php";
	require "../system/conn.php";	
	
	$link = DBConnect();

  $dados = explode('¬', $_POST['dataPost']);	
  
  $date = explode('-', $dados[3]);
  $dia  = $date[2];
  $mes  = $date[1];
  $ano  = $date[0];

	$query = "INSERT INTO dp_agenda (categoria, titulo, descri, dia, mes, ano) VALUES ('$dados[0]', '$dados[1]', '$dados[2]', '$dia', '$mes', '$ano')";

	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
	}
?>