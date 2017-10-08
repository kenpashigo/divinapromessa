<?

class Slide extends Connection {

  public function controlador($dados) {

    switch($dados[0]) {
      case "slide_add": return($this->slide_add($dados)); break;
      case "slide_edt": return($this->slide_edt($dados)); break;
      case "slide_del": return($this->slide_del($dados)); break;
    }
  }

  private function slide_add($dados) {    
    $tools = new Tools();
    $query = "INSERT INTO 
                dp_slider (link, descricao, legenda) 
              VALUES 
                ('$dados[1]', '$dados[2]', '$dados[3]')";
  
    $tools->runQuery($query);    
  }

  private function slide_edt($dados) {
    $tools = new Tools();
    $query = "UPDATE 
                dp_slider 
              SET 
<<<<<<< HEAD
                link='./sliders/$dados[2]',
=======
                link='$dados[2]',
>>>>>>> 28089fd... new configs files (edited)
                descricao='$dados[3]',
                legenda='$dados[4]'
              WHERE 
                id = '$dados[1]'";
    $tools->runQuery($query);
  }

  private function slide_del($dados) {
    $tools = new Tools();
    $query = "DELETE FROM dp_slider WHERE id = '$dados[1]'";
    $tools->runQuery($query);
  }
}