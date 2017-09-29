<table>
	<tr>
		<th>DIA</th>
		<th>MES</th>
		<th>CATEGORIA</th>
		<th>TITULO</th>
		<th>QUANDO?</th>
	</tr>

            

<?php
	require '../system/config.php';
	require '../system/conn.php';

	$conn = new Connection();
	$mes = $_GET['call'] ?? 13;	

	//Se o mês < 10 (1 a 9), acresentar um '0'
	if($mes<10){
		$mes= '0'.$mes;
	}
	
	$select = 	
	$result = $conn->DBQuery("SELECT * FROM dp_agenda WHERE mes = '$mes' ORDER BY dia ASC");
	$row = mysqli_num_rows($result);

	if($row < 1 ) {
		echo '<div class="eventos-data">
		<div id="dia"><p>-</p></div>
		<div id="dia"><p>-</p></div>
		<div id="mater"><p>-</p></div>
		<div id="descricao"><p>-</p></div></div>';
	} else {
		while($row = mysqli_fetch_assoc($result)) {
			$dia = $row['dia'];
			$mes = $row['mes'];
			$titulo = $row['titulo'];
			$cat = $row['categoria'];
			$evt = $row['descri'];
?>

	<tr>
		<td><?= $dia 		?></td>
		<td><?= $mes 		?></td>
		<td><?= $cat 		?></td>
		<td><?= $titulo ?></td>
		<td><?= $evt		?></td>
	</tr>	

<?php }} ?>

		
</table>