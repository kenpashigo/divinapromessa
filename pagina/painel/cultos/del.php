<div id="posts-titulo">
  <p>Deletar post</p>
</div>

  <table id="table">
    <tr class="table-header">
      <th>ID</th>
      <th>PREGADOR</th>
      <th>TITULO</th>
      <th>RESUMO</th>
      <th>DATA</th>
      <?php 
        if($excluir == 0) {
          echo '<th>EXCLUIR</th>';
        }              
      ?>
    </tr>

<?php
  $link = DBConnect();
  if($excluir == 0 ){
    $seleciona = mysqli_query($link, "SELECT * FROM dp_cultos ORDER BY id DESC") or die(mysqli_error($link));
  } else {
    $seleciona = mysqli_query($link, "SELECT * FROM dp_cultos WHERE id = $excluir") or die(mysqli_error($link));
  }

  $conta = mysqli_num_rows($seleciona);

  if($conta <= 0) {    
  } else {
    while($row = mysqli_fetch_assoc($seleciona)){

      $id = $row['id'];
      $pregador = $row['pregador'];
      $titulo = $row['titulo'];
      $tags = $row['tags'];
      $data = $row['data'];
?>

    <tr>
      <td id="txt_id"><?= $row['id'];                         ?></td>
      <td><?= $row['pregador'];                             ?></td>
      <td><?= $row['titulo'];                              ?></td>
      <td><?= $row['resumo'];                                 ?></td>      
      <td><?= $row['data'];                                   ?></td>      
      <?php 
        if($excluir == 0) {
          echo '<td>
                  <span onclick="getPage(`cultos/del&excluir='.$row['id'].'`);">
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
            <span id="enviar" onclick="culto_deletar('.$excluir.');">Sim</span>              
            <span id="enviar" onclick="getPage(`cultos/del`);">Não</span>              
          </div>';
  }
?>
