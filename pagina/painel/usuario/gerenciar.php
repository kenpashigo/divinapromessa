<div id="posts-titulo">
  <p>Usuários cadastrados</p>
</div>

  <table id="table">
    <tr class="table-header">
      <th>ID</th>
      <th>USUARIO</th>
      <th>PERFIL</th>
      <th>FUNÇÃO</th>      
      <?php 
        if($editar == 0) {
          echo '<th>EDITAR</th>';
        }              
      ?>
    </tr>

    <?
      if($editar < 1) {
        $query = "SELECT * FROM dp_users";
      } else {
        $query = "SELECT * FROM dp_users WHERE id = '$editar'";
      }
      
      $conn = new Connection();
      $result = $conn->DBQuery($query);
      while($row = mysqli_fetch_assoc($result)) {
        $resposta = $row;


        echo '<tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['usuario'].'</td>
                <td><img src="'.$row['img_perfil'].'" height="50px" /></td>
                <td>'.$row['funcao'].'</td>';
                if($editar == 0) {
                  echo '<td>
                          <span onclick="getPage(`usuario/gerenciar`, '.$row['id'].');">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                            </span>
                          </span>
                        </td>';    
                }
        echo    '</tr>';
      }
    ?>

  </table>

<?

  if($editar > 0) {
    echo '<div id="posts-titulo"><p>Adicionar data na agenda</p></div>
    
    <div id="upload-total">
      <div id="upload-content">      
        <div id="upload-pai">
    
          <label class="upload-file">Enviar imagem</label>        
    
          <div class="tamanho-imagem">
            <span class="tmh-img-size">Tamanho: </span>
            <span id="tmh-img-size">...</span>          
          </div>
    
          <div class="tamanho-imagem">
            <span class="tmh-img-size">Tamanho Optimizado: </span>
            <span id="tmh-img-size-2">...</span>          
          </div>
          
          
          <label for="img_up" class="btn-upload" id="btn-upload">Escolha a imagem</label>        
          <input type="file" name="imagem" onchange="upload_img(`./uploads/perfil_adm/`);" id="img_up" />
    
          <div id="progress-data-send">
            <div id="loading"></div>      
            <div id="complete"><img src="../ico/success.png" alt="upload concluído" width="70%" /></div>
            <div id="upload-holder"><div id="upload-status"></div></div>
            <div id="upload-percentage"></div>
          </div>
    
        </div>
      </div>
    
      <div id="preview">
        <div id="img-preview-holder">
          <span class="upload-file">Preview</span>
          <div id="preview-container">
            <label for="img-sctn" id="p-text">'.$resposta['img_perfil'].'</label>
            <img src="'.$resposta['img_perfil'].'" alt="preview da imagem" id="img-sctn" />            
          </div>        
        </div>
      </div>   
    </div>
    
    <div id="texto-form"><p>Usuário</p></div>
    <input type="text"  class="form-input" placeholder="Digite o usuário" value="'.$resposta['usuario'].'" />
    
    <div id="texto-form"><p>Senha</p></div>
    <input type="password" class="form-input" placeholder="Digite o password" value="'.$resposta['password'].'" />
    
    <div id="texto-form"><p>Função</p></div>
    <input type="text"  class="form-input" placeholder="Defina a função" value="'.$resposta['funcao'].'" />
    
    <span id="enviar" onclick="usuario_editar('.$resposta['id'].');">Enviar</span>';
  }