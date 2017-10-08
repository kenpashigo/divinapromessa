<?

class Users extends Connection {

  public function controlador($dados) {

    switch($dados[0]) {
      case "users_add": return($this->users_add($dados)); break;
      case "users_edt": return($this->users_edt($dados)); break;      
<<<<<<< HEAD
      case "users_del": return($this->users_del($dados)); break;      
=======
>>>>>>> 28089fd... new configs files (edited)
    }
  }

  private function users_add($dados) {
    $tools = new Tools();

    if(mysqli_num_rows($tools->localConn("SELECT * FROM dp_users WHERE usuario = '$dados[1]'"))>0) {
      exit("exist");
    } else {
      $query = "INSERT INTO 
                  dp_users (usuario, password, img_perfil, funcao)
                VALUES
                  ('$dados[1]', '$dados[2]',  '$dados[4]',  '$dados[3]')";
    }
    $tools->runQuery($query);  
  }
  
  private function users_edt($dados) {
    $tools  = new Tools();
    $result = $tools->localConn("SELECT * FROM dp_users WHERE usuario = '$dados[1]'");
    $qtde   = mysqli_num_rows($result);
    $row    = mysqli_fetch_assoc($result);
    
    // Verifica se o novo user é do mesmo id em edição
    // Se sim, efetua as alterações
    // Se não, verifica se o novo user já está cadastrado
    if($qtde > 0) { if($row['id'] != $dados[5]) { exit("exist"); }}

    $query = "UPDATE 
                dp_users 
              SET 
                usuario='$dados[1]',
                password='$dados[2]',
                funcao='$dados[3]',
                img_perfil='$dados[4]'
              WHERE 
                id = '$dados[5]'";	    

    $tools->runQuery($query);
  }

<<<<<<< HEAD
  private function users_del($dados) {
    $tools = new Tools();
    $tools->runQuery("DELETE FROM dp_users WHERE id = '$dados[1]'");
  }
=======
>>>>>>> 28089fd... new configs files (edited)
}