<?

class Tools extends Connection {

  public function controlador($dados) {
    switch($dados[0]) {
      case "tools_getPage": return($this->tools_getPage($dados)); break;
    }
  }

  private function tools_getPage($dados) {       
    $page = "../pagina/painel/".$dados[1].".php";    
    $editar = $excluir = $visualizar = $dados[2];

    if(file_exists($page)){		      
      include $page;
    } else {      
      print_r('<span class="pagina-404">Pagina não encontrada</span>');
    }
  }

  public function localConn($query) {
    return Connection::DBQuery($query);
  }

  public function runQuery($query) {
    if($this->localConn($query)) {
      print_r("true");
    } else {
      print_r("false");
    }
  }

  public function getDate() {
    date_default_timezone_set('America/Sao_Paulo');
    return date("d/m/Y");         
  }

  public function getHour() {
    date_default_timezone_set('America/Sao_Paulo');    
    return date("H:i:s");    
  }

  public function fixDate($date) {
    $date = explode('-', $date);
    return $date[2].'/'.$date[1].'/'.$dados[0];
  }

  public function extractDate($date) {
    return explode("-", $date);
  }

  public function getRandom() {
    date_default_timezone_set('America/Sao_Paulo');
    srand(floor(time() / (60*60*24)));    
    $type = $_FILES['postFile']['Content-Type'] ?? $_FILES['postFile']['type'];          
    return rand().$this->extention($type);
  }

  public function extention($type) {
    $tipos = array(
      'image/jpeg'  => '.jpg', 
      'image/png'   => '.png',
      'audio/mp3'   => '.mp3'
    );

    foreach ($tipos as $key => $value) {
      if(strcmp($key, $type) == 0) {
        return $value;
      }
    }
  }

  public function uploadImg($uploaddir, $uploadfile) {
    if(move_uploaded_file($_FILES['postFile']['tmp_name'], '.'.$uploadfile)) {      
      $targetFile = '.'.$uploadfile;       
      $newUrl = explode('../', $targetFile);      
      $ourUrl = HTTP.$newUrl[1];            
  
      $source = \Tinify\fromUrl($ourUrl);       
      $source->toFile($targetFile);
  
      $resized = $source->resize(array(
        "method" => "scale",
        "width" => 1024
      ));
      
      if($resized->toFile($targetFile)) {
        $json = array(
          'resultado' => 'true',
          'dir'       => $uploadfile,
          'file'      => explode($uploaddir, $uploadfile)[1],          
          'tamanho'   => filesize('.'.$uploadfile)
        );
        $json = json_encode($json);
        print_r($json);
      } else {
        $json = array('resultado' => 'false');
        $json = json_encode($json);
        print_r($json);
      }
    }
  }

  public function uploadAudio($uploaddir, $uploadfile) {
    if(move_uploaded_file($_FILES['postFile']['tmp_name'], '.'.$uploadfile)) {      
      $json = array(  		
        'resultado' => 'true',  		
        'dir'				=> $uploadfile,
        'file'      => explode($uploaddir, $uploadfile)[1],  
        'size'			=> filesize('.'.$uploadfile)
      );
  
      $json = json_encode($json);
      print_r($json);
  
    } else {
      print_r('nah');
    }
  }
}