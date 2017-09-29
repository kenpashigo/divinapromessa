<?php
  ob_start("ob_gzhandler");
  require './system/config.php';
  require './system/conn.php';  
  require './system/tools.php';

  $tools = new Tools();
  $conn  = new Connection();

?>

<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Expires" content="Tue, 01 Jan 1995 12:12:12 GMT">
    <meta http-equiv="Pragma" content="no-cache">
  	<title>Home</title>
  	<link rel="icon" href="./ico/divico.ico" type="image/x-icon" />
  	<link rel="stylesheet" type="text/css" href="./css/default.css">
  	    
  </head>
  
  <? require './pagina/lm_controler.php'; ?>

  <body>

  <?php        
    $select = $conn->DBQuery("SELECT * FROM dp_slider");     
    $rows   = mysqli_num_rows($select);
  ?>

  <script type="text/javascript">
    var holder = null;
    var pos = null;
    var s = <?= $rows ?>;
    var t = 7;
    var vezes = 400;

    document.addEventListener("DOMContentLoaded", function(){
      holder = document.getElementById('holder-banner');
      rolar();
    });

    function rolar() {

      for(var total=0; total<=vezes; total++) {
        setTimeout(function(){
          for(var i=1; i<=s; i++) {
            tempo(i);
          }
        }, ((s*t)*1000)*(total));   
      } 
    }

    function tempo(banner) {
      setTimeout(function() {

        pos = ((banner - 1) * 100) / s;        
        holder.style = 'transform: translateX(-'+pos+'%);';
        
      }, (t*1000)*(banner));
    }
  </script>

  
  <? require './pagina/header.php';   ?>

    <style>
      #holder-banner {
        width: <?= $rows*100; ?>%;
      }
      
    </style>

    <div id="banner">
      <div id="holder-banner">
        <?php 
          if($rows < 1) {
          } else {
            while($row = mysqli_fetch_assoc($select)) {
        ?>
          <div class="img-100"><img src="<?= $row['link']; ?>" alt="<?= $row['descricao']; ?>" /><span class="legenda-banner"><?= $row['legenda'] ?></span></div>
        <?php }} ?>
                
      </div>
    </div>    

    <!-- Noticias mais importantes -->    

    <!-- Body -->
    <section id="top3news">
      <div id="max-width-body" class="grid-top3news">
        <?php  
          $do = $_GET['pagina'] ?? "inicio";          

          if(file_exists("pagina/".$do.".php")){
            include("pagina/".$do.".php");

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

<link rel="stylesheet" type="text/css" href="./css/responsive.css" media="screen and (max-width: 1024px)">