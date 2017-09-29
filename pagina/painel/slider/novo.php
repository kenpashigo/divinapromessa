<div id="posts-titulo">
 	<p>Adicionar novo slider</p>
</div>

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
      <input type="file" name="imagem" onchange="upload_slide();" id="img_up" />

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

<div id="texto-form"><p>Descrição</p></div>
  <input type="text" name="descricao" class="form-input" placeholder="Descrição visual da imagem (ALT)" id="txt_descricao" />  

<div id="texto-form"><p>Legenda</p></div>
  <input type="text" name="legenda" class="form-input" placeholder="Legenda do slide" id="txt_legenda" />  

<span id="enviar" onclick="addSlider_query();">Adicionar novo slider</span>