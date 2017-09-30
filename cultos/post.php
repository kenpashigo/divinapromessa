<?php
  require '../system/config.php';
  require '../system/conn.php';
  require '../system/tools.php';

  $tools  = new Tools();
  $conn   = new Connection();
?>

<?php
  
  $pg = $_GET['post'] ?? 1;
  $seleciona  = $conn->DBQuery("SELECT * FROM dp_cultos WHERE id = '$pg'");
  $conta      = mysqli_num_rows($seleciona);

  if($conta <= 0) {
    echo '<span class="pagina-404">Nada encontrado!</span>';
  } else {
    while($row = mysqli_fetch_assoc($seleciona)){

      $id       = $row['id'];
      $pregador = $row['pregador'];
      $imagem   = $row['imagem'];
      $data     = $row['data'];
      $titulo   = $row['titulo'];
      $resumo   = $row['resumo'];      
      $conteudo = $row['conteudo'];
      $tags     = '.'.$row['tags'];
      $low      = $row['low'];
      $med      = $row['medium'];
      $hig      = $row['high'];
      $zip      = $row['zip'];

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
    <meta property="og:url" content="<?= $tools->url(); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$titulo?>" />
    <meta property="og:description" content="<?=$resumo?>" />
    <meta property="og:image" content="<?= $tools->pastor($pregador);?>" />

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
    <div id="single-posts-cultos" style="background:  linear-gradient(transparent, rgba(0, 0, 0, 0.9) 70%), url('../uploads/cultos/<?=$imagem?>'); background-size: cover; background-repeat: no-repeat;">
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
   
         <?php
   
         date_default_timezone_set('America/Sao_Paulo');
         $ddd = date("d")-1; if($ddd<10){$ddd='0'.$ddd;}    
         $mmm = date("m");      
   
         $query = $conn->DBQuery("SELECT * FROM dp_agenda WHERE mes = '$mmm' AND dia > '$ddd' ORDER BY mes ASC, dia ASC LIMIT 2");
         $qtde= mysqli_num_rows($query);    
   
         if($qtde > 0) {
           while($result = mysqli_fetch_assoc($query)){
   
             $dia = $result['dia'];
             $mes = $result['mes'];
             $ano = $result['ano'];
             $categoria = $result['categoria'];            
             $titulo = $result['titulo'];
   
             echo '<div id="agenda">
                     <span class="title-right-columns">Próximo evento</span>
                     <div class="titulo-evento">
                       <p>'.$categoria.'</p>
                     </div>
   
                     <div class="content-evento">
                       <p><span class="gray">'.$dia.'/'.$mes.'/'.$ano.'</span><br />'.$titulo.'</p>
                   </div>
                 </div>';
   
             
           }    
         } else {

          $query = $conn->DBQuery("SELECT * FROM dp_agenda WHERE mes > '$mmm' ORDER BY mes ASC, dia ASC LIMIT 2");           
          $result= mysqli_num_rows($query);
  
          while($result = mysqli_fetch_assoc($query)){
            $dia = $result['dia'];
            $mes = $result['mes'];
            $ano = $result['ano'];
            $categoria = $result['categoria'];            
            $titulo = $result['titulo'];
  
            echo '<div id="agenda">
                    <span class="title-right-columns">Próximo evento</span>
                    <div class="titulo-evento">
                      <p>'.$categoria.'</p>
                    </div>
  
                    <div class="content-evento">
                      <p><span class="gray">'.$dia.'/'.$mes.'/'.$ano.'</span><br />'.$titulo.'</p>
                    </div>
                  </div>';
           }
         }
   
   
   
         ?>
           
           <div id="quemsomos">
             <h3 class="title-right-columns">Quem somos</h3>
   
             <br /><br />
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
           </div>    
   
           <!--<div id="img-sector">            
           </div>-->
   
         </div>
       </div> 
     </div>
   </div>
</div>

<!-- Rodapé  -->
<?php require '../pagina/rodape.php'; ?>
