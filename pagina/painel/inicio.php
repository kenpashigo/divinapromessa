<?php
  $link = DBConnect();
  $seleciona = mysqli_query($link, "SELECT * FROM dp_posts") or die(mysqli_error($link));
  $qtde_posts = mysqli_num_rows($seleciona);

  $seleciona = mysqli_query($link, "SELECT * FROM dp_agenda") or die(mysqli_error($link));
  $qtde_agenda = mysqli_num_rows($seleciona);

  $query = mysqli_query($link, "SELECT * FROM dp_cultos");
  $qtde_cultos = mysqli_num_rows($query);

  $query = mysqli_query($link, "SELECT * FROM dp_contatos");
  $qtde_contatos = mysqli_num_rows($query);
?>

<div id="resumo-holder">
  <div id="total-posts"><p>Posts</p></div>
  <div id="total-pedidos"><p>Agenda</p></div>
  <div id="total-acessos"><p>Cultos</p></div>
  <div id="total-eventos"><p>Orações</p></div>
</div>

<div id="resumo-holder">
  <div id="total-posts"><p>  <?= $qtde_posts    ?></p></div>
  <div id="total-pedidos"><p><?= $qtde_agenda   ?></p></div>
  <div id="total-acessos"><p><?= $qtde_cultos   ?></p></div>
  <div id="total-eventos"><p><?= $qtde_contatos ?></p></div>
</div>

<label for="recentes-posts-holder" id="posts-label">Últimos posts registrados</label>
<div id="recentes-posts-holder">
  <div class="page">

    <div id="posts-titulo"><p>Posts padrão</p></div>
    
    <table id="table">
      <tr class="table-header">  
        <th>ID</th>                 
        <th>TITULO</th>        
        <th>IMAGEM</th>
      </tr>
    
    <?php
      $link = DBConnect();
      $seleciona = mysqli_query($link, "SELECT * FROM dp_posts ORDER BY id DESC LIMIT 5") or die(mysqli_error($link));
      $conta = mysqli_num_rows($seleciona);

      if($conta <= 0) {
        echo '<tr><td>Nada encontrado!</td></tr>';
      } else {
        while($row = mysqli_fetch_assoc($seleciona)){      
    ?>

      <tr>
        <td><?= $row['id'] ?></td>        
        <td><?= $row['titulo'] ?></td>
        <td><img src=".<?= $row['imagem'] ?>" height="30px"></td>           
      </tr>
    
      <?php }} ?>

    </table>
  </div>
  <div class="page">

    <div id="posts-titulo"><p>Cultos gravados</p></div>
    
    <table id="table">
      <tr class="table-header">  
        <th>ID</th>                 
        <th>TITULO</th>        
      </tr>
    
    <?php
      $link = DBConnect();
      $seleciona = mysqli_query($link, "SELECT * FROM dp_cultos ORDER BY id DESC LIMIT 5") or die(mysqli_error($link));
      $conta = mysqli_num_rows($seleciona);

      if($conta <= 0) {
        echo '<tr><td>Nada encontrado!</td></tr>';
      } else {
        while($row = mysqli_fetch_assoc($seleciona)){      
    ?>

      <tr>
        <td><?= $row['id'] ?></td>        
        <td><?= $row['titulo'] ?></td>           
      </tr>
    
      <?php }} ?>

    </table>
  </div>
  <div class="page">

    <div id="posts-titulo"><p>Ensinamentos gravados</p></div>
    
    <table id="table">
      <tr class="table-header">  
        <th>ID</th>                 
        <th>TITULO</th>        
      </tr>
    
    <?php
      $link = DBConnect();
      $seleciona = mysqli_query($link, "SELECT * FROM dp_ensinamentos ORDER BY id DESC LIMIT 5") or die(mysqli_error($link));
      $conta = mysqli_num_rows($seleciona);

      if($conta <= 0) {
        echo '<tr><td>Nada encontrado!</td></tr>';
      } else {
        while($row = mysqli_fetch_assoc($seleciona)){      
    ?>

      <tr>
        <td><?= $row['id'] ?></td>        
        <td><?= $row['titulo'] ?></td>           
      </tr>
    
      <?php }} ?>

    </table>
  </div>
  <div class="page">

    <div id="posts-titulo"><p>Agenda de eventos</p></div>
    
    <table id="table">
      <tr class="table-header">  
        <th>ID</th>                 
        <th>CATEGORIA</th>        
        <th>DATA</th>        
      </tr>
    
    <?php
      $link = DBConnect();
      $seleciona = mysqli_query($link, "SELECT * FROM dp_agenda ORDER BY id DESC LIMIT 5") or die(mysqli_error($link));
      $conta = mysqli_num_rows($seleciona);

      if($conta <= 0) {
        echo '<tr><td>Nada encontrado!</td></tr>';
      } else {
        while($row = mysqli_fetch_assoc($seleciona)){      
    ?>

      <tr>
        <td><?= $row['id'] ?></td>        
        <td><?= $row['categoria'] ?></td>           
        <td><?= $row['dia'].'/'.$row['mes'].'/'.$row['ano'] ?></td> 
      </tr>
    
      <?php }} ?>

    </table>
  </div>
  <div class="page">

    <div id="posts-titulo"><p>Últimos contatos de usuários</p></div>
    
    <table id="table">
      <tr class="table-header">  
        <th>ID</th>                 
        <th>NOME</th>        
        <th>DATA</th>
      </tr>
    
    <?php
      $link = DBConnect();
      $seleciona = mysqli_query($link, "SELECT * FROM dp_contatos ORDER BY id DESC LIMIT 5") or die(mysqli_error($link));
      $conta = mysqli_num_rows($seleciona);

      if($conta <= 0) {
        echo '<tr><td>Nada encontrado!</td></tr>';
      } else {
        while($row = mysqli_fetch_assoc($seleciona)){      
    ?>

      <tr>
        <td><?= $row['id'] ?></td>        
        <td><?= $row['nome'] ?></td>           
        <td><?= $row['data'] ?></td>
      </tr>
    
      <?php }} ?>

    </table>
  </div>
  <div class="page">

    <div id="posts-titulo"><p>Sliders</p></div>
    
    <table id="table">
      <tr class="table-header">  
        <th>ID</th>                           
        <th>LINK</th>
        <th>DESCRIÇÃO</th>
        <th>LEGENDA</th>    
      </tr>
    
    <?php
      $link = DBConnect();
      $seleciona = mysqli_query($link, "SELECT * FROM dp_slider ORDER BY id DESC LIMIT 5") or die(mysqli_error($link));
      $conta = mysqli_num_rows($seleciona);

      if($conta <= 0) {
        echo '<tr><td>Nada encontrado!</td></tr>';
      } else {
        while($row = mysqli_fetch_assoc($seleciona)){      
    ?>

      <tr>
        <td><?= $row['id'] ?></td>                
        <td><img src=".<?= $row['link'] ?>" height="50px"></td>
        <td><?= $row['descricao']; ?></td>
        <td><?= $row['legenda']; ?></td>                
      </tr>
    
      <?php }} ?>

    </table>
  </div>
</div>