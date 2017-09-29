<?php 

	require '../system/config.php';
	require '../system/conn.php';

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>

	<!-- Javascript -->
	<script src="../js/login.js" type="text/javascript" charset="utf-8"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-glyphicons.css">

</head>
<body>

	<div id="background">
		<div id="id-holder">

			<div id="titulo">
				<img src="../ico/logodics.png" alt="logo" />
			</div>

			<div id="campos">
				<div id="campos-holder">					
					<div id="login-field">						
						<div id="img-login-field">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						</div>
						<div id="input-login-field">
							<input type="text" placeholder="Usuário" id="usuario">
							<span id="alert"></span>
						</div>
						<div id="img-password-field">
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
						</div>
						<div id="input-password-field">
							<input type="password" placeholder="Password" id="password">
							<span id="alert2"></span>
						</div>
					</div>
				</div>				
			</div>

			<div id="botoes">
				<input type="submit" value="Login" id="submit-button" />
			</div>


			
		</div>
	</div>	


	
</body>
</html>