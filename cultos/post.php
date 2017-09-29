<?php
  require '../system/config.php';
  require '../system/conn.php';
?>

<?php


  if(isset($_GET['post'])){
    $pg = (int)$_GET['post'];
  } else {
    $pg = 1;
  }

  $link = DBConnect();
  $seleciona = mysqli_query($link, "SELECT * FROM dp_cultos WHERE id = '$pg'") or die(mysqli_error($link));
  $conta = mysqli_num_rows($seleciona);

  if($conta <= 0) {
    echo '<span class="pagina-404">Nada encontrado!</span>';
  } else {
    while($row = mysqli_fetch_assoc($seleciona)){

      $id = $row['id'];
      $pregador = $row['pregador'];
      $data = $row['data'];
      $titulo = $row['titulo'];
      $resumo = $row['resumo'];      
      $conteudo = $row['conteudo'];
      $tags = '.'.$row['tags'];
      $low = $row['low'];
      $med = $row['medium'];
      $hig = $row['high'];
      $zip = $row['zip'];

      if($low == "" || $low == null) { $low = 'nada'; }
      if($med == "" || $med == null) { $med = 'nada'; }
      if($hig == "" || $hig == null) { $hig = 'nada'; }

    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta property="og:url" content="<?= url(); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$titulo?>" />
    <meta property="og:description" content="<?=$resumo?>" />
    <meta property="og:image" content="<?=pastor($pregador);?>" />

    <title><?=$titulo?></title>
    <link rel="icon" href="../ico/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="../css/default.css">
    <link rel="stylesheet" type="text/css" href="../css/single.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css" media="screen and (max-width: 1024px)">    
    <script type="text/javascript" src="../js/player.js"></script>
  </head>
  <body>

  <?  require '../pagina/lm_controler.php';
      require '../pagina/header.php'; ?>

    <div id="blue">
      <div id="player-holder">

        <audio id="audio-src" src="#"></audio>
        
        <div id="play-pause" onclick="playPause(1);">
          <img src="../ico/play.png" />
        </div>

        <div id="player-title">
          <marquee behavior="scroll" direction="left">Teste teste teste teste teste teste teste teste teste</marquee>
        </div>

        <div id="stade">
          <div id="tempo-atual">
            <span>-:--:--</span>
          </div>
          <div class="range">
            <input id="ragerino" type="range" name="volume" min="0" max="0" value="0" onchange="range(value);">
          </div>
          <div id="tempo-restante">
            <span>-:--:--</span>
          </div>
        </div>

        <div class="volume">
          <div onclick="volume(0);" class="volume-img">
            <img src="../ico/low_volume.png" alt="Volume minimo" />
          </div>        
          <input id="volume" type="range" name="volume" min="0" max="100" value="100" onchange="volume(value);" /> 
          <div onclick="volume(100);" class="volume-img">
            <img src="../ico/max_volume.png" alt="Volume minimo" />
          </div>        
        </div>

        <div id="close" onclick="crose();"><img src="../ico/close.png" alt="Fechar o player" /></div>

      </div>
    </div>



<div id="full-default">
  <div id=body-full>
    <div id="single-posts-cultos" style="background:  linear-gradient(transparent, rgba(0, 0, 0, 0.9) 70%), url('../img/pregadores/<?=$pregador?>.jpg'); background-size: cover; background-repeat: no-repeat;">
      <div id="descricao">
        
        <div id="categoria">
          <p>Pregador: <?=$pregador?></p>
        </div>
        <div id="titulo">
          <h1><?=$titulo?></h1>
        </div>
        <div id="resumo">
          <p><?=$resumo?></p>
        </div>
        
      </div>

      <div id="player">
        <div class="ouvir">
          <h3>Qualidade: </h3>                
          <div id="lown" data-baixa="<?=$low?>" onclick="low(<?=$id?>);">Baixa<img src="../ico/play.png" /></div>
          <div id="medi" data-media="<?=$med?>" onclick="med(<?=$id?>);">Média<img src="../ico/play.png" /></div>
          <div id="high" data-altas="<?=$hig?>" onclick="hig(<?=$id?>);">Alta<img src="../ico/play.png" /></div>
        </div>
 
        <div class="baixar">
          <a href="<?=$zip?>"><h3>Download Zip</h3></a>           
        </div>
    </div>
      
    </div>
  </div>
</div>

<div id="full-default">
  <div id=body-full-cultos>
   
   <div id="cultos-full-posts">
    <?=$conteudo?>
   </div>

  

   <div id="right-column">      

      <div id="quemsomos">
        <h3>Quem somos</h3>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>      

      <br /><br />
    </div>  
  </div>
</div>

<!-- Rodapé  -->
<?php require '../pagina/rodape.php'; ?>