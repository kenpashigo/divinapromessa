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
<<<<<<< HEAD
    $uploadfile = $uploaddir.basename($tools->getRandom());  
=======
    $uploadfile = $uploaddir.basename($tools->getRandom());      
>>>>>>> 28089fd... new configs files (edited)
    $tools->uploadImg($uploaddir, $uploadfile);
  }
}