<?php 
	require "../system/config.php";
	require "../system/conn.php";	
	
	$link = DBConnect();

  $dados = explode('¬', $_POST['dataPost']);	
  
  $date = explode('-', $dados[3]);
  $dia  = $date[2];]
  $mes  = $date[1];
  $ano  = $date[0];

  $query = "
    UPDATE 
      dp_agenda
    SET 
      categoria='$dados[0]', 
      titulo='$dados[1]', 
      descri='$dados[2]', 
      dia='$dia', 
      mes='$mes', 
      ano='$ano'
    WHERE 
      id = '$dados[4]'";

	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
	}

?>