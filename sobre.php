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
  	<title>Sobre</title>
  	<link rel="icon" href="./ico/divico.ico" type="image/x-icon" />
  	<link rel="stylesheet" type="text/css" href="./css/default.css">    
    <link rel="stylesheet" type="text/css" href="./css/sobre.css">
  	<link rel="stylesheet" type="text/css" href="./css/responsive.css" media="screen and (max-width: 1024px)">    
  </head>
  <body>

  <? require './pagina/lm_controler.php';
     require './pagina/header.php';   ?>
    
    <br><br><br><br><br>

    <!-- BODY -->

    <div id="full-default">
      <div id="body-full">
        <?          
          $result   = $conn->DBQuery("SELECT * FROM dp_sobre ORDER BY ordem ASC");
          while($row = mysqli_fetch_assoc($result)) {
            echo '<div id="sobre-titulo">
                    <h2>'.$row['hierarquia'].'</h2>          
                    <h1>'.$row['nome'].'</h1>
                    <h3>'.$row['integrantes'].'</h3>
                  </div>
  
                  <div id="church" style="background: url('.$row['imagem'].'); background-size: cover; background-position: center"></div>
  
                  <div id="area-texto">'.$row['texto'].'</div>';
          }
        ?>
      </div>
    </div>

<?php 
  require_once './pagina/rodape.php';
  ob_flush();
?>