<?

class Posts extends Connection {

  public function controlador($dados) {

    switch($dados[0]) {
      case "posts_add": return($this->posts_add($dados)); break;
      case "posts_edt": return($this->posts_edt($dados)); break;
      case "posts_del": return($this->posts_del($dados)); break;
      case "posts_dtq": return($this->posts_dtq($dados)); break;
    }
  }

  private function posts_add($dados) {
    $tools = new Tools();

    $data = $tools->getDate();
    $hour = $tools->getHour();

    $query = "INSERT INTO 
                dp_posts (
                  ministerio, 
                  categoria, 
                  titulo, 
                  resumo, 
                  conteudo, 
                  imagem, 
                  data, 
                  hora
                ) 
              VALUES (
                '$dados[2]', 
                '$dados[3]', 
                '$dados[4]', 
                '$dados[5]', 
                '$dados[6]', 
                './uploads/$dados[1]', 
                '$data', 
                '$hour'
              )";
    $tools->runQuery($query);    
  }

  private function posts_edt($dados) {
    $tools = new Tools();

    $data = $tools->getDate();
    $hour = $tools->getHour();

    $query = "UPDATE 
                dp_posts 
              SET 
                ministerio='$data[2]', 
                categoria='$data[3]', 
                titulo='$data[4]', 
                resumo='$data[5]', 
                conteudo='$data[6]', 
                imagem='./uploads/$data[1]', 
                data_edit= '$data',
                hora_edit= '$hour'
              WHERE 
                id = '$data[7]'";
    
    $tools->runQuery($query);
  }

  private function posts_del($dados) {
    $tools = new Tools();
    $query = "DELETE FROM dp_posts WHERE id = '$dados[1]'";
    $tools->runQuery($query);
  }

  private function posts_dtq($dados) {
    $tools = new Tools();
    $query = "UPDATE dp_posts SET pin='$dados[1]' WHERE id = '$dados[2]'";
    $tools->runQuery($query);
  }
}