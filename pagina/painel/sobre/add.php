<div id="posts-titulo"><p>Descrever um grupo</p></div>


<form action="" method="POST" enctype="multipart/form-data" class="form-class">

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
          <label for="img-sctn" id="p-text">teste.jpg</label>
          <img src="../img/developer-api.jpg" alt="preview da imagem" id="img-sctn" />            
        </div>        
      </div>
    </div>   
  </div>

  <div id="texto-form"><p>Hierarquia</p></div>
  <input type="text" name="hierarquia" class="form-input" placeholder="Hierarquia" />

  <div id="texto-form"><p>Nome do grupo</p></div>
  <input type="text" name="grupo" class="form-input" placeholder="Nome do grupo" />

  <div id="texto-form"><p>Integrantes</p></div>
  <input type="text" name="resumo" class="form-input" placeholder="Para cada membro, separar por vírgula" />

  <div id="texto-form"><p>Ordem</p></div>
  <input type="text" name="ordem" class="form-input" placeholder="Disposição dos itens" />    

  <div id="texto-form"><p>Descrição do grupo</p></div>
  <textarea name="descricao" class="form-input" id="descricao" placeholder="Descreva o grupo"></textarea>
  <script>CKEDITOR.replace('descricao');</script>

  <span id="enviar" onclick="sobre_add();">Enviar</span>

</form>
