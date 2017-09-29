<?php
  ob_start("ob_gzhandler");
  require './system/config.php';
  require './system/conn.php';  
  require './system/tools.php';  

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
  	<title>Contato</title>
  	<link rel="icon" href="./ico/divico.ico" type="image/x-icon" />
  	<link rel="stylesheet" type="text/css" href="./css/default.css">
    <link rel="stylesheet" type="text/css" href="./css/contato.css">
  	<link rel="stylesheet" type="text/css" href="./css/responsive.css" media="screen and (max-width: 1024px)">    
  </head>
  <body>

  <? require './pagina/lm_controler.php';
     require './pagina/header.php';   ?>  

    <br /><br /><br /><br />

    <div id="full-default">
      <div id="body-full">

        <div id="con-holder">
          <div id="con-info">
            <div id="con-img-info">
              <img src="<?= HTTP ?>ico/church.png">
            </div>

            <div id="con-titulo">
                <p>Igreja evangélica pentecostal<br />Divina Promessa</p>
            </div>

            <div id="con-texto">
                <p>Rua são José, 59 - Helena Maria Osasco/SP</p>
            </div>
          </div>

          <div id="contato-form">
            <div id="formulario">
          <?php

          if(isset($_POST['enviar']) && $_POST['enviar'] == "send"){

            $nome = $_POST['nome'];
            $nome = $tools->DBEscape($link, $nome);
            if(empty($nome)) { $nome = 'anônimo'; }            

            $sobrenome = $_POST['sobrenome'];
            $sobrenome = $tools->DBEscape($link, $sobrenome);
            if($nome == 'anônimo' && empty($sobrenome)) { $sobrenome = 'anônimo'; }

            $email = $_POST['email'];
            $email = $tools->DBEscape($link, $email);

            $motivo = $_POST['motivo'];            
            $motivo = $tools->DBEscape($link, $motivo);            
          
            $pedido = $_POST['pedido'];
            $pedido = $tools->DBEscape($link, $pedido);            

            date_default_timezone_set('America/Sao_Paulo');
            $data = date("d/m/Y");
            $hora = date("H:i:s");            

            $query = "INSERT INTO dp_contatos (nome, sobrenome, email, motivo, pedido, data, hora) VALUES ('$nome', '$sobrenome', '$email', '$motivo', '$pedido', '$data', '$hora')";

            print_r($query);

            //Inserção de dados no banco            

            if(empty($motivo)){
              echo '<div id="alert-container"><img src="./ico/warning.png" alt="hora-do-post" width="45px" height="45px" height="auto" style="margin-right: 15px" /><p class="alert">Escolha um motivo</p></div>';
            }elseif(empty($email)){
              echo '<div id="alert-container"><img src="./ico/warning.png" alt="hora-do-post" width="45px" height="45px" height="auto" style="margin-right: 15px" /><p class="alert">Insira um e-mail</p></div>';
            }elseif(empty($pedido)){
              echo '<div id="alert-container"><img src="./ico/warning.png" alt="hora-do-post" width="45px" height="45px" height="auto" style="margin-right: 15px" /><p class="alert">Descreva o seu pedido/oração/opinião</p></div>';
            }else {              
              if($conn->DBQuery($query)){
                echo '<div id="alert-container"><img src="./ico/success.png" alt="hora-do-post" width="45px" height="45px" height="auto" style="margin-right: 15px" /><p id="sucess">Informações enviadas com sucesso!</p></div>';
                unset($_POST);
              } else {
              echo '<div id="alert-container"><img src="./ico/error.png" alt="hora-do-post" width="45px" height="45px" height="auto" style="margin-right: 15px" /><p class="erro">Algo deu errado</p></div>';
              }
            }
          }
          ?>
            
              <form action="" method="POST" enctype="multipart/form-data" class="form-class">

                <div id="texto-form"><p>Nome</p></div>
                <input type="text" name="nome" class="form-input" placeholder="Nome"/>

                <div id="texto-form"><p>Sobrenome</p></div>
                <input type="text" name="sobrenome" class="form-input" placeholder="Sobrenome"/>

                <div id="texto-form"><p>E-mail</p></div>
                <input type="email" name="email" class="form-input" placeholder="E-mail" />

                <div id="texto-form"><p>Motivo</p></div>
                <select name="motivo" class="form-select">
                  <option value="">Escolha um motivo</option>
                  <option value="Oração">Oração</option>
                  <option value="Dúvida">Dúvida</option>
                  <option value="Ajuda">Ajuda</option>
                  <option value="Agradecimento">Agradecimento</option>
                  <option value="Sugestão">Sugestão</option>
                  <option value="Outros">Outros</option>                  
                </select>                               

                <div id="texto-form"><p>Comentário</p></div>
                <textarea name="pedido" class="form-input" placeholder="Como a divina promessa pode te ajudar?"></textarea>

                <input type="submit" value="Publicar" id="enviar"/>
                <input type="hidden" name="enviar" value="send" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
<?php 
  require_once './pagina/rodape.php';
  ob_flush();
?>