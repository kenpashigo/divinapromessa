<div id="posts-titulo"><p>Adicionar novo culto gravado</p></div>


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
      <input type="file" name="imagem" onchange="upload_img('./uploads/cultos/');" id="img_up" />

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

  <div id="texto-form"><p>Pregador</p></div>
  <input type="text" name="pregador" class="form-input" placeholder="Pregador" value="<?php echo $pregador ?>" />

  <div id="texto-form"><p>Titulo</p></div>
  <input type="text" name="titulo" class="form-input" placeholder="Título" value="<?php echo $titulo ?>" />

  <div id="texto-form"><p>Resumo</p></div>
  <input type="text" name="resumo" class="form-input" placeholder="Título" value="<?php echo $resumo ?>" />

  <div id="texto-form"><p>Tags</p></div>
  <input type="text" name="tags" class="form-input" placeholder="Separar tags por vírgula" value="<?php echo $tags ?>" />


  <div id="texto-form"><p>Aúdio de baixa qualidade</p></div>
  <div class="upper-holder">
    <div class="spinner"></div>
    <div id="button-uploader">
      <label for="low-quality-file" class="real-uploader">Upload</label>
      <input type="file" name="baixa" class="form-input" id="low-quality-file" onchange="up_audio(0);" />
    </div>
    <div id="progress">
      <div id="progress-base">
        <div class="progress-atual"></div>
        <span class="porcentagem-atual">0%</span>
      </div>
    </div>
    <div id="result">
      <span id="result" class="glyphicon" aria-hidden="true"></span>
    </div>
  </div>
  

  <div id="texto-form"><p>Aúdio de média qualidade</p></div>
  <div class="upper-holder">
    <div class="spinner"></div>
    <div id="button-uploader">
      <label for="med-quality-file" class="real-uploader">Upload</label>
      <input type="file" name="baixa" class="form-input" id="med-quality-file" onchange="up_audio(1);" />
    </div>
    <div id="progress">
      <div id="progress-base">
        <div class="progress-atual"></div>
        <span class="porcentagem-atual">0%</span>
      </div>
    </div>
    <div id="result">
      <span id="result" class="glyphicon" aria-hidden="true"></span>
    </div>
  </div>  

  <div id="texto-form"><p>Aúdio de Alta qualidade</p></div>
  <div class="upper-holder">
    <div class="spinner"></div>
    <div id="button-uploader">
      <label for="hig-quality-file" class="real-uploader">Upload</label>
      <input type="file" name="baixa" class="form-input" id="hig-quality-file" onchange="up_audio(2);" />
    </div>
    <div id="progress">
      <div id="progress-base">
        <div class="progress-atual"></div>
        <span class="porcentagem-atual">0%</span>
      </div>
    </div>
    <div id="result">
      <span id="result" class="glyphicon" aria-hidden="true"></span>
    </div>
  </div>  

  <!--<div id="texto-form"><p>Aúdio zipado</p></div>
  <div class="upper-holder">
    <div class="spinner"></div>
    <div id="button-uploader">
      <label for="zip-file" class="real-uploader">Upload</label>
      <input type="file" name="baixa" class="form-input" id="zip-file" onchange="up_audio(3);" />
    </div>
    <div id="progress">
      <div id="progress-base">
        <div class="progress-atual"></div>
        <span class="porcentagem-atual">0%</span>
      </div>
    </div>
    <div id="result">
      <span class="glyphicon" aria-hidden="true"></span>
    </div>
  </div>-->

  <div id="texto-form"><p>Data do evento</p></div>
  <input type="date" name="data" class="form-input" />  

  <div id="texto-form"><p>Conteúdo da postagem</p></div>
  <textarea name="conteudo" class="form-input" id="conteudo"></textarea>
  <script>CKEDITOR.replace('conteudo');</script>

  <span id="enviar" onclick="culto_add();">Enviar</span>

</form>
