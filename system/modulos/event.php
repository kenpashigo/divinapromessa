<?

class Event extends Connection {

  public function controlador($dados) {

    switch($dados[0]) {
      case "event_add": return($this->event_add($dados)); break;
      case "event_edt": return($this->event_edt($dados)); break;
      case "event_del": return($this->event_del($dados)); break;      
    }
  }

  private function event_add($dados) {
    $tools = new Tools();

    $date = $tools->extractDate($dados[4]);  

    $query = "INSERT INTO 
                dp_agenda (
                  categoria, 
                  titulo, 
                  descri, 
                  dia, 
                  mes, 
                  ano
                ) 
              VALUES (
                '$dados[1]', 
                '$dados[2]', 
                '$dados[3]', 
                '$date[2]', 
                '$date[1]', 
                '$date[0]'
              )";

    $tools->runQuery($query);
  }

  private function event_edt($dados) {
    $tools = new Tools();    
    $date = $tools->extractDate($dados[4]);
    $query = "UPDATE 
                dp_agenda
              SET 
                categoria='$dados[1]', 
                titulo='$dados[2]', 
                descri='$dados[3]', 
                dia='$date[2]', 
                mes='$date[1]', 
                ano='$date[0]'
              WHERE 
                id = '$dados[5]'";

    $tools->runQuery($query);
  }

  private function event_del($dados) {
    $tools = new Tools();
    $query = "DELETE FROM dp_agenda WHERE id = '$dados[1]'";
    $tools->runQuery($query);
  }
}