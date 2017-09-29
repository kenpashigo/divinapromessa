<?php  
  $conn = new Connection();
  $seleciona = $conn->DBQuery("SELECT * FROM dp_posts");
  $qtde_posts = mysqli_num_rows($seleciona);

  $seleciona = $conn->DBQuery("SELECT * FROM dp_agenda");
  $qtde_agenda = mysqli_num_rows($seleciona);

  $query = $conn->DBQuery("SELECT * FROM dp_cultos");
  $qtde_cultos = mysqli_num_rows($query);

  $query = $conn->DBQuery("SELECT * FROM dp_contatos");
  $qtde_contatos = mysqli_num_rows($query);
?>

<section id="contador">  
  <div id="total-posts">
    <span class="cont-titulo">Posts</span>
    <span class="cont-quanti"><?= $qtde_posts ?></span>
  </div>      

  <div id="total-posts">
    <span class="cont-titulo">Agenda</span>
    <span class="cont-quanti"><?= $qtde_agenda ?></span>
  </div>      

  <div id="total-posts">
    <span class="cont-titulo">Cultos</span>
    <span class="cont-quanti"><?= $qtde_cultos ?></span>
  </div>      

  <div id="total-posts">
    <span class="cont-titulo">Contatos</span>
    <span class="cont-quanti"><?= $qtde_contatos ?></span>
  </div>      
</section>


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
      $seleciona = $conn->DBQuery("SELECT * FROM dp_posts ORDER BY id DESC LIMIT 5");
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
      $seleciona = $conn->DBQuery("SELECT * FROM dp_cultos ORDER BY id DESC LIMIT 5");
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
      $seleciona = $conn->DBQuery("SELECT * FROM dp_ensinamentos ORDER BY id DESC LIMIT 5");
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
      $seleciona = $conn->DBQuery("SELECT * FROM dp_agenda ORDER BY id DESC LIMIT 5");
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
      $seleciona = $conn->DBQuery("SELECT * FROM dp_contatos ORDER BY id DESC LIMIT 5");
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
      $seleciona = $conn->DBQuery("SELECT * FROM dp_slider ORDER BY id DESC LIMIT 5");
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