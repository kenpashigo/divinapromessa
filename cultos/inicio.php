<?php         
  
  $result  = $conn->DBQuery("SELECT * FROM dp_cultos WHERE pin > 0 ORDER BY pin ASC LIMIT 3");  
  if($result != null) { $rows = mysqli_num_rows($result); } else {  }

  if($rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $pregador = $row['pregador'];
      $titulo = $row['titulo'];
      $imagem = $row['imagem'];

      echo '<div id="news">              
              <h2>'.$pregador.'</h2>
              <span>'.$titulo.'</span>
              <img src="'.HTTP.'uploads/cultos/'.$imagem.'" alt="">
            </div>';
    }
  } 

  echo '<style>.grid-top3news { grid-template-columns: repeat('.$rows.', 1fr); }</style>';  
?>

</div>
</section>

<br /><br />

<div id="full-default">
  <div id=body-full-cultos>
   <div id="cultos-full-posts">

<?php 

  $row    = 0;
  $result = 0;

  if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];    
  } else {
    $pagina = 0;
  }
  
  $select = $conn->DBQuery("SELECT * FROM dp_cultos WHERE pin < 1 ORDER BY id DESC");    
  $row = mysqli_num_rows($select);
  
  if($row < 1) {
    
  } else {
    while ($row = mysqli_fetch_assoc($select)) {
      $id = $row['id'];
      $img = $row['pregador'];
      $data = $row['data'];
      $titulo = $row['titulo'];
      $resumo = $row['resumo'];
      $tags = $row['tags'];      
?>

<div id="cultos-holder">
  <div id="culto-post" style="background: linear-gradient(transparent, #222), url('./uploads/cultos/<?=$row['imagem']?>'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    
    <a href="./cultos/post.php?post=<?php echo $id ?>"><div id="abso-back"></div></a>

    <div id="abso-img">    
      <a href="./cultos/post.php?post=<?php echo $id ?>"><img src="./ico/follow.png" alt="ouvir pregação" /></a>
    </div>

    <div class="culto-img" style="background: transparent;"></div>

    <div id="cultos-label">
      <div class="data"><p><?=$img?></p></div>
      <div id="title-<?=$id?>" class="titulo"><p><?=$titulo?></p></div>      
      <div class="tags"><p><?=$tags?></p></div>
    </div>
  </div>
</div>      

<?php }} ?>

</div>

  

<div id="right-column">

      <?php

      date_default_timezone_set('America/Sao_Paulo');
      $ddd = date("d")-1; if($ddd<10){$ddd='0'.$ddd;}    
      $mmm = date("m");      

      $query = $conn->DBQuery("SELECT * FROM dp_agenda WHERE mes = '$mmm' AND dia > '$ddd' ORDER BY mes ASC, dia ASC LIMIT 2");          
      $qtde= mysqli_num_rows($query);    

      if($qtde > 0) {
        while($result = mysqli_fetch_assoc($query)){

          $dia = $result['dia'];
          $mes = $result['mes'];
          $ano = $result['ano'];
          $categoria = $result['categoria'];            
          $titulo = $result['titulo'];

          echo '<div id="agenda">
                  <span class="title-right-columns">Próximo evento</span>
                  <div class="titulo-evento">
                    <p>'.$categoria.'</p>
                  </div>

                  <div class="content-evento">
                    <p><span class="gray">'.$dia.'/'.$mes.'/'.$ano.'</span><br />'.$titulo.'</p>
                </div>
              </div>';

          
        }    
      } else {    
        
        $query = $conn->DBQuery("SELECT * FROM dp_agenda WHERE mes > '$mmm' ORDER BY mes ASC, dia ASC LIMIT 2");        
        $result= mysqli_num_rows($query);

        while($result = mysqli_fetch_assoc($query)){
          $dia = $result['dia'];
          $mes = $result['mes'];
          $ano = $result['ano'];
          $categoria = $result['categoria'];            
          $titulo = $result['titulo'];

          echo '<div id="agenda">
                  <span class="title-right-columns">Próximo evento</span>
                  <div class="titulo-evento">
                    <p>'.$categoria.'</p>
                  </div>

                  <div class="content-evento">
                    <p><span class="gray">'.$dia.'/'.$mes.'/'.$ano.'</span><br />'.$titulo.'</p>
                  </div>
                </div>';
        }
      }



      ?>
        
        <div id="quemsomos">
          <h3 class="title-right-columns">Quem somos</h3>

          <br /><br />
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>    

        <!--<div id="img-sector">            
        </div>-->

      </div>
    </div> 
  </div>
</div>





