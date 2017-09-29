<script type="text/javascript">
  var corpo = null;    

  document.addEventListener("DOMContentLoaded", function(){    
    corpo = document.body;     
  });

  function abrir(){   
    corpo.style  = "transform: translateX(-100%);";    
    setTimeout(function() {
      corpo.style  = "transform: translateX(-100%); position: fixed;";    
    }, 310);
  }

  function fechar(){
    corpo.style  = "transform: translateX(0%); position: inherit";
  }
</script>