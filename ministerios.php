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
  	<title>Ministerios</title>
  	<link rel="icon" href="./ico/divico.ico" type="image/x-icon" />
  	<link rel="stylesheet" type="text/css" href="./css/default.css">
    <link rel="stylesheet" type="text/css" href="./css/ministerios.css">        
  	<link rel="stylesheet" type="text/css" href="./css/responsive.css" media="screen and (max-width: 1024px)">    
    <script type="text/javascript" src="./js/ministerios.js"></script>
  </head>
  <body>

  

  <? require './pagina/lm_controler.php';
     require_once './pagina/header.php';   ?>

    <!-- BODY -->   

    <div id="holder-fully">
      <div id="body-fully">
      
        <div id="nav-holder">          
          <div id="selector-opt"></div>
          <div class="opt" onclick="pos(0);">
            <h3>SEDE</h3>
          </div>
          <div class="opt" onclick="pos(1);">
            <h3>UNIDADE 1</h3>
          </div>
          <div class="opt" onclick="pos(2);">
            <h3>UNIDADE 2</h3>
          </div>          
        </div>
        
        <div id="loading"><div id="loaded"></div></div>        
        <div id="img-ministerio">
          <img src="#" id="img-source" />
        </div>
        
      </div>      
    </div>

<?php 
  require_once './pagina/rodape.php';
  ob_flush();
?>