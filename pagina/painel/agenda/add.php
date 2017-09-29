<div id="posts-titulo"><p>Adicionar data na agenda</p></div>


<form action="" method="POST" enctype="multipart/form-data" class="form-class">

  <div id="texto-form"><p>Categoria</p></div>
  <input type="text" name="categoria" class="form-input" placeholder="Categoria" />

  <div id="texto-form"><p>Titulo</p></div>
  <input type="text" name="titulo" class="form-input" placeholder="Título" />

  <div id="texto-form"><p>Resumo</p></div>
  <input type="text" name="resumo" class="form-input" placeholder="Título" />

  <div id="texto-form"><p>Data do evento</p></div>
  <input type="date" name="data" class="form-input" />  

  <span id="enviar" onclick="agenda_add();">Enviar</span>

</form>
