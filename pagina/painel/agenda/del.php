<div id="posts-titulo">
<p>Deletar evento no calendário</p>
</div>

<table id="table">
  <tr class="table-header">
    <th>ID</th>
    <th>CATEGORIA</th>
    <th>TITULO</th>
<<<<<<< HEAD
    <th>DESCRIÇÃO</th>
=======
    <th>DESCRI</th>
>>>>>>> 28089fd... new configs files (edited)
    <th>DATA</th>
    <?php 
      if($excluir == 0) {
        echo '<th>EXCLUIR</th>';
      }              
    ?>
  </tr>
  
<?php

if($excluir == 0 ){ $query = "SELECT * FROM dp_agenda ORDER BY id DESC";     }
else              { $query = "SELECT * FROM dp_agenda WHERE id = $excluir";  }

$conn = new Connection();
$seleciona = $conn->DBQuery($query);
$conta = mysqli_num_rows($seleciona);

if($conta <= 0) {    
} else {
  while($row = mysqli_fetch_assoc($seleciona)){

    $id = $row['id'];
    $categoria = $row['categoria'];
    $titulo = $row['titulo'];
    $descri = $row['descri'];
    $data = $row['dia'].'/'.$row['mes'].'/'.$row['ano'];
?>

  <tr>
    <td><?= $id           ?></td>
    <td><?= $categoria    ?></td>
    <td><?= $titulo       ?></td>
    <td><?= $descri       ?></td>      
    <td><?= $data         ?></td>      
    <?php 
      if($excluir == 0) {
        echo '<td>
                <span onclick="getPage(`agenda/del`, '.$row['id'].');">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true">
                  </span>
                </span>
              </td>';    
      } 
    ?>
  </tr>

<?php }} ?>

</table>

<?php 
if($excluir != 0) {
  echo '<div id="delete">
          <p>Deseja deletar esse post?</p>            
          <span id="enviar" onclick="agenda_deletar('.$excluir.');">Sim</span>              
          <span id="enviar" onclick="getPage(`agenda/del`);">Não</span>              
        </div>';
}
?>