<?php

  // Load system patch
  require '../system/config.php';

  require("../system/tinify/lib/Tinify/Exception.php");
  require("../system/tinify/lib/Tinify/ResultMeta.php");
  require("../system/tinify/lib/Tinify/Result.php");
  require("../system/tinify/lib/Tinify/Source.php");
  require("../system/tinify/lib/Tinify/Client.php");
  require("../system/tinify/lib/Tinify.php");

  \Tinify\setKey(TINYKEY);

  $uploaddir = './uploads/';
  $uploadfile = $uploaddir.basename($_FILES['postFile']['name']);

  if(move_uploaded_file($_FILES['postFile']['tmp_name'], '.'.$uploadfile)) {

    $targetFile = '.'.$uploadfile;       
    $newUrl = explode('../', $targetFile);      
    $ourUrl = "http://www.divinapromessa.16mb.com/".$newUrl[1];            

    $source = \Tinify\fromUrl($ourUrl);       
    $source->toFile($targetFile);

    $resized = $source->resize(array(
      "method" => "scale",
      "width" => 1024
    ));
    
    if($resized->toFile($targetFile)) {
      $json = array(
        'dir'       => $uploadfile,
        'file'      => $_FILES['postFile']['name'],
        'resultado' => 'true',
        'tamanho'   => filesize('../uploads/'.$_FILES['postFile']['name'])
      );
      $json = json_encode($json);
      print_r($json);
    } else {
      $json = array('resultado' => 'false');
      $json = json_encode($json);
      print_r($json);
    }
  }

?>