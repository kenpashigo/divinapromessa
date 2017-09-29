
<!-- Barra lateral -->
<div id="lateral-menu" onclick="fechar();">  
  <div class="lm-header">
    <div class="lm-logo"><img src="<?= HTTP ?>img/logo.png" width="50px"/></div>
    <div class="lm-titulo"><h1 style="font-size: 20px; color: #fff;">DIVINA<br />PROMESSA</h1></div>
    <div class="lm-hamburger"><img src="<?= HTTP ?>/ico/hamburger.png" width="50px" /></div>
  </div>
  <div class="lm-links">
    <?php 
      $resultado = retorna_query("SELECT * FROM dp_links ORDER BY ordem ASC");
      while($row = mysqli_fetch_assoc($resultado)) {
        echo '<a href="'.HTTP.''.$row['link'].'">'.$row['titulo'].'</a>';
      }
    ?>
  </div>
</div>

<!-- Header -->
<div id="full-default-header">
  <div id="header-holder">

    <div id="logo-header">

      <a href="<?= HTTP ?>index.php"><img src="<?= HTTP ?>img/logo.png" alt="logo da igreja envangélica pentecostal" /></a>
      <a href="<?= HTTP ?>index.php"><h1>Divina<br /> Promessa</h1></a>

    </div>

    <div id="links-header">          

      <?php 

        $resultado = retorna_query("SELECT * FROM dp_links ORDER BY ordem ASC");
        while($row = mysqli_fetch_assoc($resultado)) {
          echo '<div class="link"><a href="'.HTTP.''.$row['link'].'">'.$row['titulo'].'</a></div>';
        }
      ?>

    </div>
    <div id="links-responsive" onclick="abrir();">
      <img src="<?= HTTP ?>ico/hamburger.png" alt="menu-responsivo" />
    </div>
  </div>
</div>