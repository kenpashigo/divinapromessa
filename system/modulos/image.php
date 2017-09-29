<?

class Image extends Connection {

  public function controlador($dados) {    
    switch($dados[0]) {      
      case "image_upload": return($this->image_upload($dados)); break;      
    }
  }

  private function image_upload() {
    $tools = new Tools();
    $uploaddir = $_REQUEST['filePath'];
    $uploadfile = $uploaddir.basename($tools->getRandom());      
    $tools->uploadImg($uploaddir, $uploadfile);
  }
}