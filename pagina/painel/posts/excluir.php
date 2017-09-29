<div id="posts-titulo">
  <p>Deletar post</p>
</div>

  <table id="table">
    <tr class="table-header">  
      <th>ID</th>
      <th>CATEGORIA</th>
      <th>TITULO</th>
      <th>IMAGEM</th>
      <th>DATA</th>
      <th>HORA</th>
      <?php 
        if($excluir == 0) { 
          echo '<th>DEL</th>'; 
        } 
      ?>
    </tr>

<?php  

  $link = DBConnect();
  if($excluir == 0 ){
    $seleciona = mysqli_query($link, "SELECT * FROM dp_posts ORDER BY id DESC") or die(mysqli_error($link));
  } else {
    $seleciona = mysqli_query($link, "SELECT * FROM dp_posts WHERE id = $excluir") or die(mysqli_error($link));
  }

  $conta = mysqli_num_rows($seleciona);
  if($conta <= 0) {
  } else {
    while($row = mysqli_fetch_assoc($seleciona)){      
?>

    <tr>
      <td><?= $row['id'];                 ?></td>
      <td><?= $row['categoria'];          ?></td>
      <td><?= $row['titulo'];             ?></td>      
      <td class="table-img"><img src=".<?= $row['imagem'];?>"></td>
      <td><?= $row['data'];               ?></td>
      <td><?= $row['hora'];               ?></td>
      <?php if($excluir == 0) { 
        echo '<td>              
                <span onclick="getPage(`posts/excluir&excluir='.$row['id'].'`);">
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
            <span id="enviar" onclick="query_exclude('.$excluir.');">Sim</span>              
            <span id="enviar">Não</span>              
          </div>';
  }
?>



