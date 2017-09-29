<div id="posts-titulo">
  <p>Editar post</p>
</div>

  <table id="table">
    <tr class="table-header">  
      <th>ID</th>
      <th>CATEGORIA</th>
      <th>TITULO</th>
      <th>DESCRICAO</th>
      <th>DATA</th>
      <?php if($editar == 0) { echo '<th>Edit</th>'; } ?>
    </tr>

<?php



  $link = DBConnect();
  if($editar == 0 ){
    $seleciona = mysqli_query($link, "SELECT * FROM dp_agenda ORDER BY id DESC") or die(mysqli_error($link));
  } else {
    $seleciona = mysqli_query($link, "SELECT * FROM dp_agenda WHERE id = $editar") or die(mysqli_error($link));
  }

  $conta = mysqli_num_rows($seleciona);

  if($conta <= 0) {
    echo '<span class="pagina-404">Nada encontrado!</span>';
  } else {
    while($row = mysqli_fetch_assoc($seleciona)){

      $id = $row['id'];
      $categoria = $row['categoria'];
      $titulo = $row['titulo'];
      $desc = $row['descri'];
      $dia = $row['dia'];
      $mes = $row['mes'];
      $ano = $row['ano'];
      $data = $ano.'-'.$mes.'-'.$dia;
?>

    <tr>
      <td><?= $id ?></td>
      <td><?=$categoria?></td>
      <td><?=$titulo?></td>  
      <td><?=$desc?></td>
      <td><?php echo $data ?></td>
      <?php 
        if($editar == 0) {
          echo '<td><span onclick="getPage(`agenda/edit&editar='.$id.'`);"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></td>';          
        } 
      ?>
    </tr>

<?php }} ?>

</table>


<?php  

  if($editar != 0) { 
    include '../pagina/painel/agenda/edit-form.php';
  } 
?>