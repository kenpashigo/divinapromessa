<div id="posts-titulo"><p>Postagens em destaque</p></div>

<table id="table">
    <tr class="table-header">
      <th>ID</th>
      <th>MINISTERIO</th>
      <th>CATEGORIA</th>      
      <th>IMAGEM</th>
      <th>DATA</th>
      <th>HORA</th>
      <th>PIN</th>
    </tr>

<?
    
    $query  = "SELECT * FROM dp_posts WHERE pin > 0 ORDER BY id DESC";
    $conn   = new Connection();
    $result = $conn->DBQuery($query);
    $rows   = mysqli_num_rows($result);

    if($rows < 1) {

    } else {
        while($row = mysqli_fetch_assoc($result)){
          echo '<tr>
                  <td>'.$row['id'].'</td>
                  <td>'.$row['ministerio'].'</td>
                  <td>'.$row['categoria'].'</td>                  
                  <td><img src=".'.$row['imagem'].'" height="50px" /></td>
                  <td>'.$row['data'].'</td>
                  <td>'.$row['hora'].'</td>            
                  <td><input type="checkbox" checked onchange="destaquePost(`posts_dtq`,0,'.$row['id'].');"></td>
                </tr>';

      }
    }

?>

</table>



<div id="add-holder">
  <div class="simple-button">
    <span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
    <label>Total: <?= $rows; ?></label>
  </div>
</div>

<div id="posts-titulo"><p>Todos os posts</p></div>

<table id="table">
    <tr class="table-header">
      <th>ID</th>
      <th>MINISTERIO</th>
      <th>CATEGORIA</th>      
      <th>IMAGEM</th>
      <th>DATA</th>
      <th>HORA</th>            
      <th>PIN</th>       
    </tr>

<?
    $query  = "SELECT * FROM dp_posts WHERE pin = 0 ORDER BY id DESC";    
    $result = $conn->DBQuery($query);
    $rows2   = mysqli_num_rows($result);

    if($rows2 < 1) {

    } else {
        while($row = mysqli_fetch_assoc($result)){
          if($rows < 3) {
            echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['ministerio'].'</td>
                    <td>'.$row['categoria'].'</td>                  
                    <td><img src=".'.$row['imagem'].'" height="50px" /></td>
                    <td>'.$row['data'].'</td>
                    <td>'.$row['hora'].'</td>       
                    <td><input type="checkbox" onchange="destaquePost(`posts_dtq`,1,'.$row['id'].');"></td>
                  </tr>';
          }

      }
    }
?>

</table>