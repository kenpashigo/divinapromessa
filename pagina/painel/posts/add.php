<div id="posts-titulo"><p>Adicionar postagem</p></div>

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
        <input type="file" name="imagem" onchange="upload_img('./uploads/');" id="img_up" />

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

  <div id="texto-form"><p>Unidade</p></div>
  <input type="text" name="unidade" class="form-input" placeholder="Sede, Unidade RJ..." id="txt_unidade" />

  <div id="texto-form"><p>Categoria</p></div>
  <input type="text" name="categoria" class="form-input" placeholder="Categoria" id="txt_categoria" />

  <div id="texto-form"><p>Titulo</p></div>
  <input type="text" name="titulo" class="form-input" placeholder="Título" id="txt_titulo" />

  <div id="texto-form"><p>Resumo</p></div>
  <input type="text" name="resumo" class="form-input" placeholder="Resumo" id="txt_resumo"/>

  <div id="texto-form"><p>Conteúdo da postagem</p></div>
  <textarea name="conteudo" class="form-input" id="conteudo"></textarea>
  <script>CKEDITOR.replace('conteudo');</script>  

  <span id="enviar" onclick="posts_add();">Enviar</span>
  



