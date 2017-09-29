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
      if($editar == 0) {
        echo '<th>EDITAR</th>';
      } 
    ?>
  </tr>

<?
  
  if($editar != 0) { $query = "SELECT * FROM dp_sobre WHERE id = '$editar'"; }
  else             { $query = "SELECT * FROM dp_sobre ORDER BY id DESC";     }  

  $conn = new Connection();
  $result = $conn->DBQuery($query);
  $rows   = mysqli_num_rows($result);

  while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $hierarquia = $row['hierarquia'];
    $nome = $row['nome'];
    $integrantes = $row['integrantes'];
    $imagem = $row['imagem'];
    $ordem = $row['ordem'];
    $texto = $row['texto'];

    echo '<tr>
            <td>'.$id.'</td>      
            <td>'.$hierarquia.'</td>      
            <td>'.$nome.'</td>      
            <td>'.$integrantes.'</td>      
            <td>'.$imagem.'</td>      
            <td>'.$ordem.'</td>';            
            if($editar == 0) {
              echo '<td>
                      <span onclick="getPage(`sobre/editar`, '.$row['id'].');">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                        </span>
                      </span>
                    </td>';    
            }           
  }

?>

</table>

<?

  if($editar != 0) {
    echo '  

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
            <input type="file" name="imagem" onchange="upload_img_culto();" id="img_up" />

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
              <label for="img-sctn" id="p-text">'.$imagem.'</label>
              <img src="'.$imagem.'" alt="preview da imagem" id="img-sctn" />            
            </div>        
          </div>
        </div>   
      </div>

      <div id="texto-form"><p>Hierarquia</p></div>
      <input type="text" name="hierarquia" class="form-input" placeholder="Hierarquia" value="'.$hierarquia.'" />

      <div id="texto-form"><p>Nome do grupo</p></div>
      <input type="text" name="grupo" class="form-input" placeholder="Nome do grupo" value="'.$nome.'"/>

      <div id="texto-form"><p>Integrantes</p></div>
      <input type="text" name="resumo" class="form-input" placeholder="Para cada membro, separar por vírgula" value="'.$integrantes.'"/>

      <div id="texto-form"><p>Ordem</p></div>
      <input type="text" name="ordem" class="form-input" placeholder="Disposição dos itens" value="'.$ordem.'"/>    

      <div id="texto-form"><p>Descrição do grupo</p></div>
      <textarea name="descricao" class="form-input" id="descricao" placeholder="Descreva o grupo">'.$texto.'</textarea>      

      <span id="enviar" onclick="sobre_edt('.$id.');">Enviar</span>';
}

?>