<?php
	require '../system/config.php';
	require '../system/conn.php';
	
	$link = DBConnect();

	$mes = $_GET['call'] ?? 13;	

	//Se o mês < 10 (1 a 9), acresentar um '0'
	if($mes<10){
		$mes= '0'.$mes;
	}
	
	$select = "SELECT * FROM dp_agenda WHERE mes = '$mes' ORDER BY dia ASC";	
	$query = mysqli_query($link, $select);
	$row = mysqli_num_rows($query);

	if($row < 1 ) {
		echo '<div class="eventos-data">
		<div id="dia"><p>-</p></div>
		<div id="dia"><p>-</p></div>
		<div id="mater"><p>-</p></div>
		<div id="descricao"><p>-</p></div></div>';
	} else {
		while($row = mysqli_fetch_assoc($query)) {
			$dia = $row['dia'];
			$mes = $row['mes'];
			$titulo = $row['titulo'];
			$cat = $row['categoria'];
			$evt = $row['descri'];
?>

	<div class="eventos-data">
		<div id="dia"><p><?=$dia?></p></div>
		<div id="dia"><p><?=$mes?></p></div>
		<div id="mater"><p><?=$cat?></p></div>
		<div id="mater"><p><?=$titulo?></p></div>		
		<div id="descricao"><p><?=$evt?></p></div>
	</div>

<?php }} ?>

		
