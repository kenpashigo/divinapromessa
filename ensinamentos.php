<?php
  ob_start("ob_gzhandler");
  require './system/config.php';
  require './system/conn.php';  
?>

<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Expires" content="Tue, 01 Jan 1995 12:12:12 GMT">
    <meta http-equiv="Pragma" content="no-cache">
  	<title>Ensinamentos</title>
  	<link rel="icon" href="./ico/divico.ico" type="image/x-icon" />
  	<link rel="stylesheet" type="text/css" href="./css/default.css">
    <link rel="stylesheet" type="text/css" href="./css/ensinamentos.css">
  	<link rel="stylesheet" type="text/css" href="./css/responsive.css" media="screen and (max-width: 1024px)">    
  </head>
  <body>

  <? require './pagina/lm_controler.php';
     require './pagina/header.php';   ?>   

  <br /><br /><br /><br /><br />

  <!-- Body -->
  <section id="top3news">
    <div id="max-width-body" class="grid-top3news">
      <?php
        if(isset($_GET['pagina'])){
          $do = ($_GET['pagina']);
        } else {
          $do = "inicio";
        }

        if(file_exists("ensinamentos/".$do.".php")){
          include("ensinamentos/".$do.".php");

        } else {
          print '<span class="pagina-404">Pagina não encontrada</span>';
        }
      ?>
    </div>
  </div>  
    
<?php 
  require_once './pagina/rodape.php';
  ob_flush();
?>