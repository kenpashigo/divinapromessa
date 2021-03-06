<?php
  ob_start("ob_gzhandler");
  require './system/config.php';
  require './system/conn.php';  
  require "./system/tools.php";
  
  $conn  = new Connection();
  $tools = new Tools();
?>

<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Expires" content="Tue, 01 Jan 1995 12:12:12 GMT">
    <meta http-equiv="Pragma" content="no-cache">
  	<title>Cultos</title>
  	<link rel="icon" href="./ico/divico.ico" type="image/x-icon" />
  	<link rel="stylesheet" type="text/css" href="./css/default.css">
    <link rel="stylesheet" type="text/css" href="./css/cultos.css">
  	<link rel="stylesheet" type="text/css" href="./css/responsive.css" media="screen and (max-width: 1024px)">    
  </head>
  <body>

  <? require './pagina/lm_controler.php';
     require './pagina/header.php';   ?>

  <br /><br /><br /><br />

  <!-- Body -->
  <section id="top3news">
    <div id="max-width-body" class="grid-top3news">
      <?php
        
        $do = $_GET['pagina'] ?? "inicio";        

        if(file_exists("cultos/".$do.".php")){
          include("cultos/".$do.".php");

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