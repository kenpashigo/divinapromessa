<?php 
	require "../system/config.php";
	require "../system/conn.php";

	$link = DBConnect();	
	$uploaddir = './audios/';
  $uploadfile = $uploaddir.basename($_FILES['dataPost']['name']);  

  if(move_uploaded_file($_FILES['dataPost']['tmp_name'], '.'.$uploadfile)) {

  	$json = array(  		
  		'file'      => $_FILES['dataPost']['name'],
  		'size'			=> $_FILES['dataPost']['size'],
  		'dir'				=> $uploadfile,
  		'resultado' => 'true'  		
  	);

  	$json = json_encode($json);
  	print_r($json);

  } else {
  	print_r('nah');
  }
?>