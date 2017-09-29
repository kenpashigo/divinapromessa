<div id="posts-titulo">
  <p>Visualizar links</p>
</div>

<table id="table">
  <tr class="table-header">
    <th>ID</th>
    <th>ORDEM</th>
    <th>TITULO</th>
    <th>LINK</th>
  </tr>

<?php 

  $query   = "SELECT * FROM dp_links";
  $conn    = new Connection();
	$retorno = $conn->DBQuery($query);
	$rows    = mysqli_num_rows($retorno);

	if($rows < 1) {

	} else {
		while ($row = mysqli_fetch_assoc($retorno)) {						
?>
	
	<tr>
		<td><?= $row['id']; ?></td>
    <td><?= $row['ordem'] ?></td>
    <td><?= $row['titulo']; ?></td>
    <td><?= $row['link']; ?></td>    
	</tr>

<? }} ?>

</table>