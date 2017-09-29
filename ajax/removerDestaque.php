<?php

	require "../system/config.php";
	require "../system/conn.php";

    $link = DBConnect();
    $dados = explode("¬", $_POST['dataPost']);

    if($dados[0] == 1) {
        $query = "
            UPDATE 
                dp_$dados[2]
            SET              
                pin='0'
            WHERE 
                id = '$dados[1]'";
    } else {
        $query = "
            UPDATE 
                dp_$dados[2]
            SET              
                pin='1'
            WHERE 
                id = '$dados[1]'";
    }  
	
	if(mysqli_query($link, $query)) {
		print_r("true");
	} else {
		print_r("false");
    }
    
    

?>