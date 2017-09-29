<?php
	
	require "../system/config.php";
	require "../system/conn.php";

	$link = DBConnect();
	session_start();

	$data = explode('¬', $_POST['postData']);	
	$query = "SELECT * FROM dp_users WHERE usuario = '$data[0]'";

	$select = mysqli_query($link, $query);
	$rows = mysqli_num_rows($select);

	if($rows == 0) {
		print_r("non-user");
	} else {
		$row = mysqli_fetch_assoc($select);
		if($row['password'] == $data[1]) {

			mysqli_query($link, "UPDATE dp_users SET ativo='1' WHERE usuario = '$data[0]'");
			$_SESSION['key-user'] = $data[0];
			print_r('true');

		} else {
			print_r('non-pass');
		}
	}




?>