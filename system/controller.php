<?php  

require "./config.php";
require "./conn.php";
require "./modulos/login.php";
require "./modulos/slide.php";
require "./modulos/tools.php";
require "./modulos/posts.php";
require "./modulos/culto.php";
require "./modulos/event.php";
require "./modulos/sobre.php";
require "./modulos/users.php";
require "./modulos/image.php";
require "./modulos/audio.php";
require "./tinify/lib/Tinify/Exception.php";
require "./tinify/lib/Tinify/ResultMeta.php";
require "./tinify/lib/Tinify/Result.php";
require "./tinify/lib/Tinify/Source.php";
require "./tinify/lib/Tinify/Client.php";
require "./tinify/lib/Tinify.php";

\Tinify\setKey(TINYKEY);

class Controller { 
  
  // Controlador
  public function _getFunction() {
    
    // Instacias de Sub Classes
    $login = new Login();
    $slide = new Slide();
    $tools = new Tools();
    $posts = new Posts();
    $culto = new Culto();
    $event = new Event();
    $sobre = new Sobre();
    $users = new Users();
    $image = new Image();
    $audio = new Audio();
    
    // Extrair var de verificação/direciona para a função correta
    $dados    = explode("¬", $_REQUEST['postData']);    
    $redirect = explode("_", $dados[0]);    

    switch($redirect[0]) {
      case "login":   return($login->controlador($dados));     break;    
      case "slide":   return($slide->controlador($dados));     break;
      case "tools":   return($tools->controlador($dados));     break;
      case "posts":   return($posts->controlador($dados));     break;
      case "culto":   return($culto->controlador($dados));     break;
      case "event":   return($event->controlador($dados));     break;
      case "sobre":   return($sobre->controlador($dados));     break;      
      case "users":   return($users->controlador($dados));     break;       
      case "image":   return($image->controlador($dados));     break;
      case "audio":   return($audio->controlador($dados));     break;
    }
  }
}

$conn = new Controller;
$conn->_getFunction();