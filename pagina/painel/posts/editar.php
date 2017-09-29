<div id="posts-titulo">
  <p>Editar post</p>
</div>

  <table id="table">
    <tr class="table-header">
      <th>ID</th>
      <th>MINISTERIO</th>
      <th>CATEGORIA</th>
      <th>TITULO</th>
      <th>IMAGEM</th>
      <th>DATA</th>
      <th>HORA</th>      
      <?php 
        if($editar == 0) {
          echo '<th>Edit</th>';
        } 
      ?>
    </tr>
<?php  

  if($editar == 0 ){
    $query = "SELECT * FROM dp_posts ORDER BY id DESC";    
  } else {
    $query = "SELECT * FROM dp_posts WHERE id = $editar";    
  }

  $conn = new Connection();
  $seleciona = $conn->DBQuery($query);
  $conta = mysqli_num_rows($seleciona);

  if($conta <= 0) {
    echo '<div id="recentes-posts"><span class="pagina-404">Nada encontrado!</span></div>';
  } else {
    while($row = mysqli_fetch_assoc($seleciona)){

      $id = $row['id'];
      $ministerio = $row['ministerio'];
      $categoria = $row['categoria'];
      $titulo = $row['titulo'];
      $resumo = $row['resumo'];
      $conteudo = $row['conteudo'];
      $imagem = $row['imagem'];
      $data = $row['data'];
      $hora = $row['hora'];
?>


    <tr>
      <td id="txt_id"><?= $row['id'];                         ?></td>
      <td><?= $row['ministerio'];                             ?></td>
      <td><?= $row['categoria'];                              ?></td>
      <td><?= $row['titulo'];                                 ?></td>
      <td class="table-img"><img src=".<?= $row['imagem'];    ?>"></td>
      <td><?= $row['data'];                                   ?></td>
      <td><?= $row['hora'];                                   ?></td>
      <?php 
        if($editar == 0) {
          echo '<td><span onclick="getPage(`posts/editar`, '.$row['id'].');"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span></td>';    
        } 
      ?>

    </tr>
<?php }} ?>

  </table>

<?php

  if($editar == 0) {

  } else {    
    if($imagem == '') { $imagem = '../img/developer-api.jpg'; }    
    echo '<div id="posts-titulo"><p>Something</p></div>';
    echo '<div id="upload-total">
    <div id="upload-content">      
      <div id="upload-pai">
        
        <label class="upload-file">Enviar imagem</label>        
        <label for="img_up" class="btn-upload" id="btn-upload">Escolha a imagem</label>        
        <input type="file" name="imagem" onchange="upload_img(`./uploads/`);" id="img_up" />

        <div class="tamanho-imagem">
          <span class="tmh-img-size">Tamanho: </span>
          <span id="tmh-img-size">...</span>          
        </div>

        <div class="tamanho-imagem">
          <span class="tmh-img-size">Tamanho Optimizado: </span>
          <span id="tmh-img-size-2">...</span>          
        </div>

        

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
          <img src=".'.$imagem.'" alt="preview da imagem" id="img-sctn" />            
        </div>        
      </div>
    </div>   
  </div>';    
    echo '<div id="texto-form"><p>Ministerio</p></div>';
    echo '<input type="text" id="txt_ministerio" class="form-input" placeholder="Ministerio" value="'.$ministerio.'" />';
    echo '<div id="texto-form"><p>Categoria</p></div>';
    echo '<input type="text" id="txt_categoria" class="form-input" placeholder="Categoria" value="'.$categoria.'" />';
    echo '<div id="texto-form"><p>Titulo</p></div>';
    echo '<input type="text" id="txt_titulo" class="form-input" placeholder="Título" value="'.$titulo.'" />';
    echo '<div id="texto-form"><p>Resumo</p></div>';
    echo '<input type="text" id="txt_resumo" class="form-input" placeholder="Título" value="'.$resumo.'" />';
    echo '<div id="texto-form"><p>Conteúdo da postagem</p></div>';
    echo '<textarea name="conteudo" class="form-input" id="conteudo">'.$conteudo.'</textarea>';
    echo '<script>CKEDITOR.replace("conteudo");</script>';    
    echo '<span id="enviar" onclick="posts_edt();">Enviar</span>';
  }
  ?>
