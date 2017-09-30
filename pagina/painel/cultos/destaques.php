<div id="posts-titulo"><p>Postagens em destaque</p></div>

<table id="table">
    <tr class="table-header">
      <th>ID</th>
      <th>PREGADOR</th>
      <th>TITULO</th>
      <th>RESUMO</th>
      <th>DATA</th>
      <th>PIN</th>
    </tr>

<?
    $query  = "SELECT * FROM dp_cultos WHERE pin > 0 ORDER BY id DESC";
    $conn   = new Connection();
    $result = $conn->DBQuery($query);
    $rows   = mysqli_num_rows($result);

    if($rows < 1) {

    } else {
        while($row = mysqli_fetch_assoc($result)){
          echo '<tr>
                  <td>'.$row['id'].'</td>
                  <td>'.$row['pregador'].'</td>
                  <td>'.$row['titulo'].'</td>                                    
                  <td>'.$row['resumo'].'</td>
                  <td>'.$row['data'].'</td>            
                  <td><input type="checkbox" checked onchange="destaquePost(`culto_dtq`, 0,'.$row['id'].');"></td>
                </tr>';

      }
    }

?>

</table>



<div id="add-holder">
  <div class="simple-button">
    <span class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
    <label>Total: <?= ($rows == 3 ? "MAX" : $rows); ?></label>
  </div>
</div>

<div id="posts-titulo"><p>Todos os posts</p></div>

<table id="table">
    <tr class="table-header">
      <th>ID</th>
      <th>PREGADOR</th>
      <th>TITULO</th>
      <th>RESUMO</th>
      <th>DATA</th>
      <th>PIN</th>
    </tr>

<?
    $query  = "SELECT * FROM dp_cultos WHERE pin = 0 ORDER BY id DESC";
    $result = $conn->DBQuery($query);
    $rows2   = mysqli_num_rows($result);

    if($rows2 < 1) {

    } else {
        while($row = mysqli_fetch_assoc($result)){
          if($rows < 3) {
            echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['pregador'].'</td>
                    <td>'.$row['titulo'].'</td>                                    
                    <td>'.$row['resumo'].'</td>
                    <td>'.$row['data'].'</td>      
                    <td><input type="checkbox" onchange="destaquePost(`culto_dtq`, 1,'.$row['id'].');"></td>
                  </tr>';
          }

      }
    }
?>

</table>