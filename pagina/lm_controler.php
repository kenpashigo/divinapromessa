<script type="text/javascript">
  var pegaBody = null;
  var lateralMenu = null;

  document.addEventListener("DOMContentLoaded", function(){
    pegaBody    = document.body;
    lateralMenu = document.getElementById('lateral-menu');      
  });

  function abrir(){   
    pegaBody.style  = "transform: translateX(-75%);";      
  }

  function fechar(){
    pegaBody.style  = "transform: translateX(0%);";
  }
</script>