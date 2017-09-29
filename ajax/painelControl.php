<?php 		

	require '../system/config.php';
	require '../system/conn.php';

	$page 			= $_GET['page'] 		?? 0;
	$excluir 		= $_GET['excluir']	?? 0;	
	$editar 		= $_GET['editar'] 	?? 0;
	$visualizar = $_GET['visualizar'] ?? 0;

	if(file_exists("../pagina/painel/".$page.".php")){		
    include("../pagina/painel/".$page.".php");
  } else {
    print '<span class="pagina-404">Pagina não encontrada</span>';
  }
?>