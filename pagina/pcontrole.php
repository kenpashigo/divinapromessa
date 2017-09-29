<?php  
  require '../system/config.php';
  require '../system/conn.php';  
?>

<?php
  
  $link = DBConnect();
  session_start();   

  $user_key = $_SESSION['key-user'] ?? "";
  
  if(!empty($user_key)){

    $query  = "SELECT * FROM dp_users WHERE usuario = '$user_key'";
    $result = mysqli_query($link, $query);
    $rows   = mysqli_num_rows($result);

    if($rows == 0) {
      header( "refresh:0;url=./acesso.php" );
    } else {
      $rows = mysqli_fetch_assoc($result);

      if($rows['ativo'] == 0) {
        header( "refresh:0;url=./acesso.php" );
      } else {
        $userName   = $user_key;
        $userFuncao = $rows['funcao'];        
      }
    }
  } else {
    header( "refresh:0;url=./acesso.php" );
  }

?>

<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, maximum-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
  	<title>Administração</title>
  	<link rel="icon" href="./ico/favicon.ico" type="image/x-icon" />
  	<link rel="stylesheet" type="text/css" href="../css/painel_de_controle.css">
  	<link rel="stylesheet" type="text/css" href="../css/responsive.css" media="screen and (max-width: 1024px)">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-glyphicons.css">
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>    
    <script type="text/javascript" src="../js/painelcontrole.js"></script>    
  </head>
  <body>

    <!-- Header -->

    <div id="toast">
      
      <div class="img-toast">
        <span id="idtoastimg" class="glyphicon glyphicon-ok" aria-hidden="true"></span>
      </div>
      
      <div class="text-toast">
        <span class="resultado" id="txt_toast_titulo">Sucesso!</span>
        <span class="tipo" id="txt_toast_mensagem">Post inserido</span>  
      </div>

      <div class="animacao" id="animacao"></div>

    </div>

    <div id="full-header">

      <span onclick="getPage('inicio');"><div id=logo>
        <div id="imagem-logo">
          <img src="../ico/logodics.png" alt="imagem do logo" />
        </div>
        <div id="texto-logo">
          <p>INDIVS</p>
        </div>
      </div></span>

      <div id="administrador">
        <div id="loggout">
          <a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
        </div>
        <div id="usuario">
          <p>Bem vindo! <?php echo $userName ?></p>
        </div>
        <div id="loggout">
          <span class="glyphicon glyphicon-log-out" aria-hidden="true" onclick="redirect('<?=$userName?>');">
        </div>
      </div>
    </div>

    <!-- Barra de navegação lateral -->

    <div id="holder-all">
      <div id="barra">

        <div id="user-logged">
          
          <div id="user-img">
            <div id="user-img-container">
              <img src="../img/user.jpg" />
            </div>
          </div>

          <div id="user-name">
            <span class="user-name-container"><?= $userName ?></span>
            <span class="user-funcao"><?= $userFuncao ?></span>
          </div>
        </div>


        <!-- Painel de controle -->

        <div id="titulo-barra" onclick="getPage('inicio');">
          <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
          <p>Painel de controle</p>
        </div>

        <?php

          $link   = DBConnect();
          $query  = "SELECT * FROM dp_cpmenu ORDER BY id ASC";

          $result = mysqli_query($link, $query);
          $rows   = mysqli_num_rows($result);

          if($rows < 1) {

          } else {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
        ?>

        <div id="posts-barra" onclick="sanfona(<?= ($row['id']-1) ?>);">
          <div id="holder-barra">
            <span class="glyphicon <?= $row['titulo_icon'] ?>" aria-hidden="true"></span>
            <p><?= $row['titulo'] ?></p>
          </div>

          <div class="arrow" onclick="sanfona(<?= ($row['id']-1) ?>);">&darr;</div>
        </div>

        <div class="sub-posts-barra">
          <div class="sub">
            
            <?php
              $query2  = "SELECT * FROM dp_cpmenu_sub WHERE origem = '$id' ORDER BY ordem ASC";        

              $result2 = mysqli_query($link, $query2);
              $rows2   = mysqli_num_rows($result2);

              if($rows2 < 1) {

              } else {
                while ($row2 = mysqli_fetch_assoc($result2)) {
            ?>    

              <span onclick="getPage(<?= $row2['getPage'] ?>);">
                <div id="holder-barra">
                  <span class="glyphicon <?= $row2['titulo_icon'] ?>" aria-hidden="true"></span>
                  <p class="link"><?= $row2['titulo'] ?></p>
                </div>
              </span>

            <?php }} ?>
            </div>
          </div>
        <?php }} ?>
      </div>

      <!-- Body -->

      <div id="holder-nav-body">
        <div id="titulo">
          <p id="nav-span"></p>
        </div>

        <div id="body-full">
          <div id="body-content">
            <?php
              
              $do = $_GET['painel'] ?? "inicio";            

              if(file_exists("../pagina/painel/".$do.".php")){
                include("../pagina/painel/".$do.".php");
              } else {
                print '<span class="pagina-404">Pagina não encontrada</span>';
              }
            ?>
          </div>
        </div>  
      </div>      
    </div>

    <!-- Rodapé  -->
    
  </body>
</html>
