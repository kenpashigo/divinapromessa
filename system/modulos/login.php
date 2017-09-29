<?

class Login extends Connection {

  public function controlador($dados) {    
    switch($dados[0]) {      
      case "login_check": return($this->login_check($dados)); break;
      case "login_redirect": return($this->login_redirect($dados)); break;
    }
  }

  private function login_check($dados) {   
    $tools = new Tools();
    $resultado = $tools->localConn("SELECT * FROM dp_users WHERE usuario = '$dados[1]'");
    $linha = mysqli_fetch_assoc($resultado);    

    if(strcmp($linha['password'], $dados[2]) == 0) {      
      
      $tools->localConn("UPDATE dp_users SET ativo='1' WHERE usuario = '$dados[1]'");
      session_start();  
      $_SESSION['key-user'] = $dados[1];
      
      print_r("true");
    } else {
      print_r("false");
    }        
  }

  private function login_redirect($dados) {
    $tools = new Tools();
    session_start();  
    $_SESSION['key-user'] = NULL;
    $tools->runQuery("UPDATE dp_users SET ativo='0' WHERE usuario = '$dados[1]'");
  }
}