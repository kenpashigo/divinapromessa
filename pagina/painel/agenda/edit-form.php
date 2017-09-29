<div id="posts-titulo"><p>Something</p></div>
    
<form action="" method="POST" enctype="multipart/form-data" class="form-class">

<div id="texto-form"><p>Categoria</p></div>
<input type="text" name="categoria" class="form-input" placeholder="Categoria" value="<?=$categoria?>" />

<div id="texto-form"><p>Titulo</p></div>
<input type="text" name="titulo" class="form-input" placeholder="Título" value="<?=$titulo?>" />

<div id="texto-form"><p>Resumo</p></div>
<input type="text" name="resumo" class="form-input" placeholder="Descrição do evento" value="<?=$desc?>" />

<div id="texto-form"><p>Data</p></div>
<input type="date" name="data" class="form-input" value="<?=$data?>" />

<span id="enviar" onclick="agenda_editar(<?= $id ?>);">Enviar</span>
</form>