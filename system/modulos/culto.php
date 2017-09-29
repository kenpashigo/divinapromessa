<?

class Culto extends Connection {

  public function controlador($dados) {

    switch($dados[0]) {
      case "culto_add": return($this->culto_add($dados)); break;
      case "culto_edt": return($this->culto_edt($dados)); break;
      case "culto_del": return($this->culto_del($dados)); break;
      case "culto_dtq": return($this->culto_dtq($dados)); break;
    }
  }

  private function culto_add($dados) {
    $tools = new Tools();
    
    $dados[7] = $tools->fixDate($dados[7]);

    $query = "INSERT INTO
                dp_cultos (
                  pregador, 
                  titulo, 
                  resumo, 
                  tags, 
                  low, 
                  medium, 
                  high, 
                  data, 
                  conteudo, 
                  imagem
                ) 
              VALUES (
                '$dados[1]', 
                '$dados[2]', 
                '$dados[3]', 
                '$dados[4]', 
                '../audios/$dados[5]', 
                '../audios/$dados[6]', 
                '../audios/$dados[7]', 
                '$dados[8]', 
                '$dados[9]',
                '$dados[10]'
              )";

    $tools->runQuery($query);
  }

  private function culto_edt($dados) {
    $tools = new Tools();
    
    $dados[7] = $tools->fixDate($dados[7]);    
    $query = "UPDATE 
                dp_cultos 
              SET 
                pregador='$dados[1]', 
                titulo='$dados[2]', 
                resumo='$dados[3]', 
                tags='$dados[4]', 
                low='$dados[5]', 
                medium='$dados[6]', 
                high='$dados[7]', 
                data='$dados[8]', 
                conteudo='$dados[9]',
                imagem='$dados[11]'
              WHERE 
                id = '$dados[10]'";

    $tools->runQuery($query);
  }

  private function culto_del($dados) {
    $tools = new Tools();    
    $query = "DELETE FROM dp_cultos WHERE id = '$dados[1]'";
    $tools->runQuery($query);
  }

  private function culto_dtq($dados) {
    $tools = new Tools();
    $query = "UPDATE dp_cultos SET pin='$dados[1]' WHERE id = '$dados[2]'";
    $tools->runQuery($query);
  }
}