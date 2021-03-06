<?php
  require '../system/config.php';
  require '../system/conn.php';
  require "../system/tools.php";
  
  $conn = new Connection();
  $tools = new Tools();
?>

<?php

  $pg = $_GET['post'] ?? 1;

  
  $seleciona = $conn->DBQuery("SELECT * FROM dp_posts WHERE id = '$pg'");
  $conta = mysqli_num_rows($seleciona);

  if($conta <= 0) {
    echo '<span class="pagina-404">Nada encontrado!</span>';
  } else {
    while($row = mysqli_fetch_assoc($seleciona)){

      $id = $row['id'];
      $categoria = $row['categoria'];
      $titulo = $row['titulo'];
      $resumo = $row['resumo'];
      $conteudo = $row['conteudo'];      
      $imagem = '.'.$row['imagem'];
      $data = $row['data'];
      $hora = $row['hora'];
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta property="og:url"           content="<?= $tools->url(); ?>" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="<?=$titulo?>" />
    <meta property="og:description"   content="<?=$resumo?>" />
    <meta property="og:image"         content="<?= $tools->img($imagem);?>" />

    <title>IEP - Divina Promessa</title>
    <link rel="icon" href="../ico/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <link rel="stylesheet" type="text/css" href="../css/single.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css" media="screen and (max-width: 1024px)">    
  </head>
  <body>
  
  <? require '../pagina/lm_controler.php';
     require '../pagina/header.php'; ?>
  
  <br><br><br><br><br>



<div id="full-default">
  <div id=body-full>
    
    <div id="single-holder">      

      <div id="single-titulo">
        <h2><?=$titulo?></h2>
      </div>

      <div id="single-resumo">
        <p><?= $resumo ?></p>
      </div>

      <div class="fb-share-button" data-href="<?= $tools->url(); ?>" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="<?= $tools->url(); ?>">Compartilhar</a></div>

      <div id="single-categoria">
        <p><span class="blue"><?= $categoria ?>, Divina Promessa Sede, São Paulo.</span></p>
        <p>postado em <?=$data?> às <?=$hora?></p>
      </div>      

      <?php if(empty($imagem)) {} else {
        echo '<div id="single-img">
          <img src="'.$imagem.'" height="100%" width="100%" />
        </div>';
      } ?>

      <div id="single-conteudo">
        <?=$conteudo?>
      </div>
    </div>  
  </div>
</div>

<!-- Rodapé  -->
<?php 
  require './rodape.php';
?>
