<?

class Sobre extends Connection {

  public function controlador($dados) {

    switch($dados[0]) {
      case "sobre_add": return($this->sobre_add($dados)); break;
      case "sobre_edt": return($this->sobre_edt($dados)); break;
      case "sobre_del": return($this->sobre_del($dados)); break;      
    }
  }

  private function sobre_add($dados) {
    $tools = new Tools();
    $query = "INSERT INTO 
                dp_sobre (
                  hierarquia, 
                  nome, 
                  integrantes,                
                  ordem,
                  texto,                
                  imagem
                ) 
              VALUES (
                '$dados[1]',
                '$dados[2]', 
                '$dados[3]',
                '$dados[4]',
                '$dados[5]',
                '$dados[6]'
              )";  
              
    $tools->runQuery($query);
  }
  
  private function sobre_edt($dados) {
    $tools = new Tools();
    $query = "UPDATE
                dp_sobre
              SET              
                hierarquia    ='$dados[1]',
                nome          ='$dados[2]', 
                integrantes   ='$dados[3]',                
                ordem         ='$dados[4]',
                texto         ='$dados[5]',                
                imagem        ='$dados[6]'
              WHERE
                id            = '$dados[7]'";

    $tools->runQuery($query);    
  }
<<<<<<< HEAD

  private function sobre_del($dados) {
    $tools = new Tools();
    $tools->runQuery("DELETE FROM dp_sobre WHERE id = '$dados[1]'");
  }
=======
>>>>>>> 28089fd... new configs files (edited)
}