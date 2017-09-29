<div id="posts-titulo">
  <p>Visualizar envio de contatos para Divina Promessa</p>
</div>

<table id="table">
  <tr class="table-header">
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>MOTIVO</th>
    <th>HORA</th>
    <th>DATA</th>
    <?php
    	if($visualizar == 0) {
    		echo '<th>VISUALIZAR</th>';
    	}
    ?>    
  </tr>

<?php 
	
	if($visualizar==0) { $query = "SELECT * FROM dp_contatos ORDER BY id ASC LIMIT 10"; } 
	else 							 { $query = "SELECT * FROM dp_contatos WHERE id = '$visualizar'"; } 

	$conn 	 = new Connection();
	$retorno = $conn->DBQuery($query);	
	$rows    = mysqli_num_rows($retorno);

	if($rows < 1) {

	} else {
		while ($row = mysqli_fetch_assoc($retorno)) {			
			$pedido = $row['pedido'];
?>
	
	<tr>
		<td><?= $row['id']; ?></td>
    <td><?= $row['nome'].' '.$row['sobrenome'] ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['motivo']; ?></td>
    <td><?= $row['hora']; ?></td>
    <td><?= $row['data']; ?></td>
    <?php
    	if($visualizar == 0) {
    		echo '<td>
    						<span onclick="getPage(`mail/visualizar`, '.$row['id'].');" class="	glyphicon glyphicon-th-list" aria-hidden="true">
    						</span>
    					</td>';
    	}
    ?>    
	</tr>

<? }} ?>

</table>

<?php 
	
	if($visualizar != 0) {
		echo '<textarea class="visualizarPedido">'.$pedido.'</textarea>';
	}

?>
