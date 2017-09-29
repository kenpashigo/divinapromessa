<div id="posts-titulo">
 	<p>Gerenciamento do slider</p>
</div>

<div id="add-holder"> 

  <div class="simple-button" onclick="getPage('slider/novo');">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    <label>New</label>      
  </div>  
</div>

<table id="table">
  <tr class="table-header">  
    <th width="10%">ID</th>
    <th>IMAGEM DO SLIDER</th>
    <th>DESCRIÇÃO</th>
    <th>LEGENDA</th>
    <th width="10%">EDITAR</th>
    <th width="10%">EXCLUIR</th>
  </tr>

  <?php
    $conn = new Connection();
    $select = $conn->DBQuery("SELECT * FROM dp_slider ORDER BY id ASC");
    $rows   = mysqli_num_rows($select);

    if($rows < 1) {
      
    } else {
      while($row = mysqli_fetch_assoc($select)) {      
    
  ?>

  <tr>
  	<td><?= $row['id']; ?></td>
    <td><img src=".<?= $row['link']; ?>" width="100px"></td>
    <td><?= $row['descricao']; ?></td>
    <td><?= $row['legenda']; ?></td>
  	<td><span onclick="getPage('slider/editar', <?= $row['id']; ?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span></td>
  	<td><span onclick="deletarSlide(`<?= $row['id'].'`, `'.$row['link']; ?>`);"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></span></td>
  </tr>

  <?php }} ?>

</table>

<div id="add-holder">
  <div class="simple-button">
    <span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
    <label>Total: <?= $rows; ?></label>
  </div>
</div>


<div id="confirm-exclude-holder">
  <div id="confirm-box">
    <span>Deseja deletar o slide?</span>
    
    <label for="img-slide" id="titulo-link">endereço da imagem</label>
    <img src="../sliders/desktop-wallpaper-minimalist-focus-minimalwall.jpg" id="img-slide" width="300px" />

    <div class="two-elements-centered">
      <button type="" id="btn-yes">sim</button>
      <button type="" id="btn-non">não</button>  
    </div>

    

  </div>
  
</div>