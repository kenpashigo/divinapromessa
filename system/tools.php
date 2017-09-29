<? 


  class Tools extends Connection {


    // Função para limpar campos dos forms
    function DBEscape($dados){
      $link = Connection::DBConnect();
  
      if(!is_array($dados)){
        $dados = mysqli_real_escape_string($link, $dados);
      }else {
        $arr = $dados;
        foreach ($arr as $key => $value) {
          $key = mysqli_real_escape_string($link, $key);
          $value = mysqli_real_escape_string($link, $value);
  
          $dados[$key] = $value;
        }
      }				
      return $dados;
    }

    function horas($data, $horas) {
      
      $data = explode('/', $data);
      $datePost = $data[2].'-'.$data[1].'-'.$data[0].' '.$horas;
      $dateNow = date("Y-m-d H:i:s");
  
      $seg = round(abs(strtotime($dateNow) - strtotime($datePost)));
      if($seg>60){$seg=$seg%60;}

      $min = round(abs(strtotime($dateNow) - strtotime($datePost)) / 60);
      if($min > 60) {$min = $min % 60;}

      $horas = round(abs(strtotime($dateNow) - strtotime($datePost)) / (60*60));
      if($horas > 24) {$horas = $horas % 24;}

      $dias = round(abs(strtotime($dateNow) - strtotime($datePost)) / ((60*60)*24));
      if($dias > 365) {$anos = round($dias / 365);} else { $anos = 0; }
  
      if($anos > 0) {
        if($anos > 1) { return $anos.' anos.';} else { return $anos.' ano.';}
      } elseif($dias > 0) {
        if($dias > 1) { return $dias.' dias.'; } else { return $dias.' dia.'; }
      } elseif($horas > 0) {
        if($horas > 1) { return $horas.' horas.'; } else { return $horas.' hora.'; }
      } elseif($min > 0) {
        if($min > 1) { return $min.' minutos.'; } else { return $min.' minuto.'; }
      } else { return 'recém postado.'; }
    }

    function url() {
      $dominio = $_SERVER['HTTP_HOST'];
       $url = "http://" . $dominio. $_SERVER['REQUEST_URI']."/"; 
       return $url;
    }
  
    function img($imagem){
      $host = $_SERVER['HTTP_HOST'];
      $imagem = explode('..', $imagem);		
      $img = 'http://'.$host.$imagem[1];		
      return $img;		
    }
  
    function img_news($imagem){		
      $imagem = explode("'", $imagem);								
      return '.'.$imagem[1];		
    }
  
    function pastor($imagem){
      $host = $_SERVER['HTTP_HOST'];
      $patch = '/img/pregadores/';
      $img = 'http://'.$host.$patch.$imagem.'.jpg';		
      return $img;		
    }

  }