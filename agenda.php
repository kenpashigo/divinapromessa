<?php
  ob_start("ob_gzhandler");
  require './system/config.php';
  require './system/conn.php';  

  $conn = new Connection();
?>

<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Expires" content="Tue, 01 Jan 1995 12:12:12 GMT">
    <meta http-equiv="Pragma" content="no-cache">
  	<title>Calendário</title>
  	<link rel="icon" href="./ico/divico.ico" type="image/x-icon" />
  	<link rel="stylesheet" type="text/css" href="./css/default.css">
    <link rel="stylesheet" type="text/css" href="./css/calendario.css">
  	<link rel="stylesheet" type="text/css" href="./css/responsive.css" media="screen and (max-width: 1024px)">
    <script type="text/javascript" src="./js/calendario.js"></script>    
  </head>
  <body>

  <? require './pagina/lm_controler.php';
     require './pagina/header.php';   ?>
  <br><br><br><br><br>

    <!-- Noticias mais importantes -->    

    <!-- Body -->
    <div id="full-default">
      <div id="body-full">
        <div id="calendario-holder">        
          <div id="nav-holder">
            <div id="nav-title">
              <h2 id="cldr"></h2>
            </div>
            <div id="nav">
              <span class="left" onclick="changeMonth(-1)"><</span>
              <span class="righ" onclick="changeMonth(1)">></span>
            </div>
          </div>

          <div id="week">         
            <div class="day"><p>D</p></div>
            <div class="day"><p>S</p></div>
            <div class="day"><p>T</p></div>
            <div class="day"><p>Q</p></div>
            <div class="day"><p>Q</p></div>
            <div class="day"><p>S</p></div>
            <div class="day"><p>S</p></div>
          </div>

          <div id="week">
            <? 
              for($dia=0; $dia < 6; $dia++) {
                for($semana=0;$semana<7;$semana++) {
                  echo '<div class="day"><p class="index" data-index="'.$semana.'"></p></div>';
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div id="full-default">
      <div id="body-full">
        <div id="eventos">
          <div id="eventos-titulo"><h2>Próximos eventos</h2></div>
          <div id="response"></div>
        </div>
      </div>
    </div>
    



<?php 
  require_once './pagina/rodape.php';
  ob_flush();
?>
