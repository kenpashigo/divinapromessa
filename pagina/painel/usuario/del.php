<div id="posts-titulo"><p>Remover um usuário</p></div>

<table id="table">
  <tr class="table-header">
    <th>ID</th>
    <th>USUÁRIO</th>
    <th>PERFIL</th>
    <th>FUNÇÃO</th>    
    <?php 
      if($excluir == 0) {
        echo '<th>EXCLUIR</th>';
      } 
    ?>
  </tr>

  <?
    $conn   = new Connection();
    if($excluir == 0) { $query = "SELECT * FROM dp_users ORDER BY id DESC"; }
    else              { $query = "SELECT * FROM dp_users WHERE id = '$excluir'"; }
    $result = $conn->DBQuery($query);
    
    if(mysqli_num_rows($result) > 0) {
      while($linha = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>'.$linha['id'].'</td>
                <td>'.$linha['usuario'].'</td>
                <td><img src="'.$linha['img_perfil'].'" height="50px" /></td>
                <td>'.$linha['funcao'].'</td>';                
                if($excluir == 0) {
                  echo '<td>
                          <span onclick="getPage(`usuario/del`, '.$linha['id'].');">
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
            <span id="enviar" onclick="usuario_del('.$excluir.');">Sim</span>              
            <span id="enviar">Não</span>              
          </div>';
  }
?>