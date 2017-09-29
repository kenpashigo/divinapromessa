<?

class Audio extends Connection {

  public function controlador($dados) {
    switch($dados[0]) {
      case "audio_cultos": return($this->audio_cultos()); break;      
    }
  }

  private function audio_cultos() {    
    $tools = new Tools();
    $uploaddir = './audios/';
    $uploadfile = $uploaddir.basename($tools->getRandom());    
    $tools->uploadAudio($uploaddir, $uploadfile);
  }
}