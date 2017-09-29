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

        <div id="church" style="background: url('./uploads/1280px-Stonehenge_back_wide.jpg'); background-size: cover; background-position: center"></div>

        <div id="sobre-titulo">
          <h2>Um pouco sobre nós</h2>
          <h1>Igreja Divina Promessa</h1>
          <h3>Desde 2005 - <?php date_default_timezone_set('America/Sao_Paulo'); $ano = date("Y"); echo $ano?></h3>
        </div>

        <div id="area-texto">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. <br />
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <!-- ãsdo8901j90dlsa-dç=-;=-1d90sajd90as.dl0-e.e0-rnm90fl0-d,.0-fnrui924m0 -->

        <div id="sobre-titulo">
          <h2>Liderança</h2>          
          <h1>Alcemir Mota</h1>
          <h3>Pastor presidente</h3>
        </div>

        <div id="church" style="background: url('./uploads/1280px-Stonehenge_back_wide.jpg'); background-size: cover; background-position: center"></div>

        <div id="area-texto">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. <br />
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <!-- ãsdo8901j90dlsa-dç=-;=-1d90sajd90as.dl0-e.e0-rnm90fl0-d,.0-fnrui924m0 -->

        <div id="sobre-titulo">
          <h2>Banda</h2>          
          <h1>Diogenes Sales </h1>
          <h3>Lider</h3>
        </div>

        <div id="church" style="background: url('./uploads/1280px-Stonehenge_back_wide.jpg'); background-size: cover; background-position: center"></div>

        <div id="area-texto">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. <br />
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <!-- ãsdo8901j90dlsa-dç=-;=-1d90sajd90as.dl0-e.e0-rnm90fl0-d,.0-fnrui924m0 -->

        <div id="sobre-titulo">
          <h2>Adoração</h2>          
          <h1>Grupo de louvor</h1>
          <h3>Alessandra Mota, Debora Medeiros, Daiane Medeiros, Poliane Mota</h3>
        </div>

        <div id="church" style="background: url('./uploads/1280px-Stonehenge_back_wide.jpg'); background-size: cover; background-position: center"></div>

        <div id="area-texto">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. <br />
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <!-- ãsdo8901j90dlsa-dç=-;=-1d90sajd90as.dl0-e.e0-rnm90fl0-d,.0-fnrui924m0 -->

        <div id="sobre-titulo">
          <h2>Adoração</h2>          
          <h1>Filhas da Divina Promessa</h1>
          <h3>Lideres: Cinthia, Pastora Sonia, Nair Medeiros</h3>
        </div>

        <div id="church" style="background: url('./uploads/1280px-Stonehenge_back_wide.jpg'); background-size: cover; background-position: center"></div>

        <div id="area-texto">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. <br />
          Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>


      </div>
    </div>

<?php 
  require_once './pagina/rodape.php';
  ob_flush();
?>