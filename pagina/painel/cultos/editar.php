<div id="posts-titulo">
  <p>Editar culto</p>
</div>

  <table id="table">
    <tr class="table-header">
      <th>ID</th>
      <th>PREGADOR</th>
      <th>TITULO</th>
      <th>RESUMO</th>
      <th>DATA</th>
      <?php 
        if($editar == 0) {
          echo '<th>EDITAR</th>';
        }              
      ?>
    </tr>

<?php
  
  if($editar == 0 ){
    $query = "SELECT * FROM dp_cultos ORDER BY id DESC";
  } else {
    $query = "SELECT * FROM dp_cultos WHERE id = $editar";
  }

  $conn = new Connection();
  $seleciona = $conn->DBQuery($query);
  $conta = mysqli_num_rows($seleciona);

  if($conta <= 0) {    
  } else {
    while($row = mysqli_fetch_assoc($seleciona)){

      $id = $row['id'];
      $pregador = $row['pregador'];
      $imagem = $row['imagem'];
      $data = $row['data'];
      $titulo = $row['titulo'];
      $resumo = $row['resumo'];      
      $conteudo = $row['conteudo'];
      $tags = $row['tags'];
      $low = $row['low'];
      $med = $row['medium'];
      $hig = $row['high'];
      $zip = $row['zip'];

      $data = explode('/', $data);      
      $data = $data[2].'-'.$data[1].'-'.$data[0];
?>

  <tr>
    <td id="txt_id"><?= $row['id'];                         ?></td>
    <td><?= $row['pregador'];                             ?></td>
    <td><?= $row['titulo'];                              ?></td>
    <td><?= $row['resumo'];                                 ?></td>      
    <td><?= $row['data'];                                   ?></td>      
    <?php 
      if($editar == 0) {
        echo '<td>
                <span onclick="getPage(`cultos/editar`, '.$row['id'].');">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                  </span>
                </span>
              </td>';    
      } 
    ?>
  </tr>

<?php }} ?>

</table>

<?php
  if($editar != 0) { include '../pagina/painel/cultos/edit-form.php'; } 
?>
