<?php          
  
  $result  = $conn->DBQuery("SELECT * FROM dp_posts WHERE pin > 0 ORDER BY pin ASC LIMIT 3");  
  $rows = mysqli_num_rows($result);      

  if($rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $categoria = $row['categoria'];
      $titulo = $row['titulo'];
      $imagem = $row['imagem'];

      echo '<a href="./pagina/post.php?post='.$row['id'].'">
              <div id="news">
                <h2>'.$categoria.'</h2>
                <span>'.$titulo.'</span>
                <img src="'.$imagem.'" alt="">
              </div>
            </a>';
    }
  } 

  echo '<style>.grid-top3news { grid-template-columns: repeat('.$rows.', 1fr); }</style>';  
?>

</a>

</div>
</section>

<div class="separador-section">
  <div class="losangulo"></div>
</div>

<section id="news-wall">
  <div id="max-width-body">
    <div class="news-wall-grid-rightColumn">
      <div class="news-dropper">        

    <?php

      $pg = $_GET['posts'] ?? 1;           

      $maximo = 10;
      $inicio = (($pg * $maximo) - $maximo);    
      
      $result  = $conn->DBQuery("SELECT * FROM dp_posts WHERE pin = 0 ORDER BY id DESC LIMIT $inicio, $maximo");
      $conta = mysqli_num_rows($result);

      if($conta <= 0) {
        //echo '<span class="pagina-404">Nada encontrado!</span>';
      } else {
        while($row = mysqli_fetch_assoc($result)) {

          $id = $row['id'];
          $ministerio = $row['ministerio'];
          $categoria = $row['categoria'];
          $titulo = $row['titulo'];
          $resumo = $row['resumo'];
          $imagem = $row['imagem'];
          $imagem = "'".$imagem."'";        
          $data = $row['data'];
          $hora = $row['hora'];
    ?>


        <div id="posts-holder">
          <a href="./pagina/post.php?post=<?= $id ?>"></a>          

          <?php if(empty($imagem)){
            //Não exibe a div            
                }else{
                  echo '<div class="news-img-holder">
                          <img src="'.$tools->img_news($imagem).'" />
                        </div>';
                }
          ?>

          <div id="post-textos">

            <div id="ministerio">
              <p><?=$ministerio?></p>
            </div>

            <div id="post-categoria">
              <p><?= $categoria ?> <span class="gray"> * HÁ <?= $tools->horas($data, $hora); ?></span></p>
            </div>

            <div id="post-titulo">
              <p><?= $titulo ?></p>
            </div>

            <div id="post-resumo">
              <p><?= $resumo ?></p>
            </div>
          </div>
        </div>    

    <?php }}?>

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

    <div id="full-default">
      <nav id="nav">
        <ul class="pagination">
          <?php

            $seleciona = $conn->DBQuery("SELECT * FROM dp_posts");
            $totalPosts = mysqli_num_rows($seleciona);

            $pags = ceil($totalPosts / $maximo);
            $links = 2;

            echo '<li><a href="?pagina=inicio&posts=1#posts-holder" aria-label="Página Inicial"><span aria-hidden="true">&laquo;</span></a></li>';

            for($i=$pg;$i <= $pg -1;$i++){
              if($i <= 0) {

              } else {
                echo '<li><a href="?pagina=inicio&posts='.$i.'#posts-holder">'.$i.'</a></li>';
              }
            }

            echo '<li><a href="?pagina=inicio&posts='.$pg.'#posts-holder">'.$pg.'</a></li>';

            for($i = $pg + 1;$i <= $pg + $links;$i++){
              if($i > $pags){

              } else {
                echo '<li><a href="?pagina=inicio&posts='.$i.'#posts-holder">'.$i.'</a></li>';
              }
            }

            echo '<li><a href="?pagina=inicio&posts='.$pags.'#posts-holder" aria-label="Última Página"><span aria-hidden="true">&raquo;</span></a></li>';

          ?>
        </ul>
      </nav>
    </div>
  </div>
</section>
