<div id="posts-titulo"><p>Editar um grupo</p></div>

<table id="table">
  <tr class="table-header">
    <th>ID</th>
    <th>HIERARQUIA</th>
    <th>GRUPO</th>
    <th>INTEGRANTES</th>
    <th>IMAGEM</th>
    <th>ORDEM</th>    
    <?php 
      if($excluir == 0) {
        echo '<th>EXCLUIR</th>';
      } 
    ?>
  </tr>

  <?
    $conn   = new Connection();
    if($excluir == 0) { $query = "SELECT * FROM dp_sobre ORDER BY id DESC"; }
    else              { $query = "SELECT * FROM dp_sobre WHERE id = '$excluir'"; }
    $result = $conn->DBQuery($query);
    
    if(mysqli_num_rows($result) > 0) {
      while($linha = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>'.$linha['id'].'</td>
                <td>'.$linha['hierarquia'].'</td>
                <td>'.$linha['nome'].'</td>
                <td>'.$linha['integrantes'].'</td>
                <td><img src="'.$linha['imagem'].'" height="50px" /></td>
                <td>'.$linha['ordem'].'</td>';
                if($excluir == 0) {
                  echo '<td>
                          <span onclick="getPage(`sobre/del`, '.$linha['id'].');">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true">
                            </span>
                          </span>
                        </td>';
                }  
              
      }
    }

  ?>

</table>

<?php 
  if($excluir != 0) {
    echo '<div id="delete">
            <p>Deseja deletar esse post?</p>            
            <span id="enviar" onclick="sobre_del('.$excluir.');">Sim</span>              
            <span id="enviar">Não</span>              
          </div>';
  }
?>