//vars
var menuPos = [];
var textBoxValue = 0;

// SOON THE PAGE LOADS, INCLUDE HOMEPAGE
document.addEventListener('DOMContentLoaded', function(){
  getPage('inicio');
});

// GET ELEMENT BY ID
function _(caminho) {
  return document.getElementById(caminho);
}

// GET ELEMENT BY CLASS
function __(caminho) {
  return document.getElementsByClassName(caminho);
}

// REMOVE FAKEPATH
function removalFakepath(caminho) {
  var tempo = caminho.split('\\');
  return tempo[2];
}

function sanfona(index) {
  var el = __("sub-posts-barra");
  var ar = __("arrow");
  
  for (var i = 0; i < el.length ; i++) {
    if(i == index) {
      if(menuPos[i] == 0 || menuPos[i] == null) {
        el[i].style = "max-height: 300px;";
        ar[i].style = "transform: rotate(90deg);";
        menuPos[i]  = 1;  
      } else {
        el[i].style = "max-height: 0px;";
        ar[i].style = "transform: rotate(0deg);";
        menuPos[i]  = 0;  
      }        
    } else {
      el[i].style = "max-height: 0px;";
      ar[i].style = "transform: rotate(0deg);";
      menuPos[i]  = 0;
    }
  }
}  

// LOADS SELECT'S OPTION
function atribuir_opcoes(a){  
  if(a == "") {
    var option = document.getElementById('response-option');
    option.innerHTML = '<option>Escolha um semestre</option>'
  } else {
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var option = document.getElementById('response-option');              
              option.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../paginas/materlista.php?sem="+a,true);
        xmlhttp.send();
  }
}

var mark = [];
var node = [];

// NAVIGATOR BUILD
function nav(array, pagename) {   

  removeAllChilds();

  for(var i=0;i<array.length;i++) {      
    if(i==0) {
      var tipo = document.createElement('p');
      var text = document.createTextNode('Home');
      tipo.appendChild(text);                              
      _("nav-span").appendChild(tipo);   

      mark[i] = document.createElement('p');
      node[i] = document.createTextNode(trataTexto(array[i]));
      mark[i].appendChild(node[i]);        
      
      _("nav-span").appendChild(mark[i]);

    } else {
      mark[i] = document.createElement('p');
      node[i] = document.createTextNode(trataTexto(array[i]));
      mark[i].appendChild(node[i]);        

      _("nav-span").appendChild(mark[i]);
    }        
  }          
}

// FIX TEXT
function trataTexto(texto) {

  if(texto == 'editar&editar=0') {
    return 'editar';
  } else if(texto == 'excluir&excluir=0') {
    return 'excluir';
  } else if(texto == 'cultos') {
    return 'cultos';
  } else if(texto == 'edit&edit=0') {
    return 'editar';
  } else if(texto == 'del&del=0') {
    return 'excluir';
  } else if(texto == 'agenda') {
    return 'agenda';
  } else if(texto == 'add') {
    return 'add';
  } else if (texto == 'posts') {      
    return 'post';
  } else {

    texto = texto.split('=');

    if (texto.length > 1) {
      if(texto[0] == 'editar&editar') {
        texto[0] = 'editar';
        return texto[0];
      } else if(texto[0] == 'excluir&excluir') {
        texto[0] = 'excluir';
        return texto[0];
      } else {
        return texto[0];
      }
    } 
    
  }
}

// REMOVE AN ELEMENT
function removeAllChilds() {

  var size = _("nav-span").childNodes.length - 1;     
  for(var i=size;i > -1;i--) {
    _("nav-span").removeChild(_("nav-span").childNodes[i]);
  }
}

// REDIRECT TO LOGIN PAGE

function redirect(user) {

  var ajax = new XMLHttpRequest();
  ajax.addEventListener('load', redirecionarPagina, false);
  ajax.open("GET", "../ajax/redirect.php?user="+user+"&time="+Math.random(), true);
  ajax.send();

  function redirecionarPagina(evt) {
    
    var resultado = evt.target.responseText;

    if(resultado == 'true') {
      location.reload();
    }
  } 
}

/*************************************************************************************
FIM
*************************************************************************************/







/*************************************************************************************
GETS A PAGE
*************************************************************************************/

function getPage(pagename) {

  var separado = pagename.split('/');
  var num = pagename.split('=');

  if(separado.length > 1) {
      nav(separado, pagename);
  } else {

    removeAllChilds();

    var tipo = document.createElement('p');
    var text = document.createTextNode('Home');
    tipo.appendChild(text);                              
    _("nav-span").appendChild(tipo);  
  }

  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      var resposta = document.getElementById("body-content");
      resposta.innerHTML = this.responseText;

      if(num[1] > 0 || pagename == 'posts/add' || pagename == 'cultos/add') {
        CKEDITOR.replace("conteudo");          
      }
    }
  }
  ajax.open("GET", "../ajax/painelControl.php?page="+pagename+"&time="+Math.random(), true);
  ajax.send();
}

/*************************************************************************************
FIM
*************************************************************************************/





/*************************************************************************************
UPLOAD DA IMAGEM
*************************************************************************************/

function upload_img () {
  
  var file = _("img_up").files[0];    
  var size = ((file.size/Math.pow(2, 20)).toFixed(2));

  if(size > 3) {

    toasters('error', 'Upload', 'falha no envio');
    alert("Escolha um arquivo menor que 4mb!");
    
  } else {

    _("tmh-img-size").innerHTML = size+" mb";
    var postContent = new FormData();
    postContent.append("postFile", file);

    var ajax = new XMLHttpRequest();

    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completado, false);

    ajax.open("POST", "../ajax/sendIMG.php?time="+Math.random());
    ajax.send(postContent);
  }  
}

function progressHandler(event) {

  var porcentagem = (event.loaded/event.total) * 100;
  
  _("progress-data-send").style = "height: 70px; padding: 20px 0px;";
  _("upload-holder").style = "display: flex";
  _("upload-status").style = "width: "+ Math.round(porcentagem) +"%; opacity: 1";
  _("upload-percentage").innerHTML = Math.round(porcentagem)+"%";

  if(Math.round(porcentagem) == 100) {
    _("upload-percentage").innerHTML = "Aguarde, finalizando...";      
  }
}

function completado(event) {         

  var resposta = JSON.parse(event.target.responseText);

  if(resposta.resultado == 'true') {

    toasters('info', 'Upload', 'imagem enviada');

    var size = ((resposta.tamanho/Math.pow(2, 20)).toFixed(3));
    size = size.split('0,');

    _("tmh-img-size-2").innerHTML = size+" kb";
    _("btn-upload").innerHTML = "Reenviar?";
    _("upload-percentage").innerHTML = "Arquivo enviado!";
    _("upload-holder").style = "display: none";
    _("loading").style = "opacity: 0;";
    _("complete").style = "opacity: 1;";      
    _("img-sctn").src = "."+ resposta.dir;
    _("p-text").innerHTML = resposta.file;
  }    
}

/*************************************************************************************
FIM
*************************************************************************************/

function upload_slide () {
  
  var file = _("img_up").files[0];    
  var size = ((file.size/Math.pow(2, 20)).toFixed(2));

  if(size > 3) {

    toasters('error', 'Upload', 'falha no envio');
    alert("Escolha um arquivo menor que 4mb!");
    
  } else {

    _("tmh-img-size").innerHTML = size+" mb";
    var postContent = new FormData();
    postContent.append("postFile", file);

    var ajax = new XMLHttpRequest();

    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completado, false);

    ajax.open("POST", "../ajax/sendSLIDE.php?time="+Math.random());
    ajax.send(postContent);
  }  
}

function addSlider_query() {
  var img       = _("img_up").value;
  var descricao = _("txt_descricao").value;
  var legenda   = _("txt_legenda").value;
  img = img.split("\\");    

  var data = img[2]+"¬"+descricao+"¬"+legenda;

  var postData = new FormData();
  postData.append('dataPost', data);

  var ajax = new XMLHttpRequest();

  ajax.addEventListener("load", sliderLoadComplete, false);
  ajax.open("POST", "../ajax/sliderADD.php?time="+Math.random(), true);
  ajax.send(postData);
}

function editarSlider_query(id) {
  var link = _("img-sctn").src;
  var descricao = _("txt_descricao").value;
  var legenda   = _("txt_legenda").value;
  link = link.split("http://divinapromessa.16mb.com/sliders/");

  var data = id+"¬"+link[1]+"¬"+descricao+"¬"+legenda;

  var postData = new FormData();
  postData.append('dataPost', data);

  var ajax = new XMLHttpRequest();

  ajax.addEventListener("load", editSlide, false);
  ajax.open("POST", "../ajax/sliderEDIT.php?time="+Math.random(), true);
  ajax.send(postData);

  function editSlide(evt) {
    var val = evt.target.responseText;

    if(val == 'true') {
      toasters('sucess', 'Editar', 'Slide Editado');
      getPage('slider/alterar');
    } else if(val == 'false') {
      toasters('error', 'Editar', 'Slide não Editado');        
    } else {
      toasters('warning', 'Editar', 'Erro interno');
    }
  }
}

function deletarSlide(id, link) {
  
  var holder = _("confirm-exclude-holder");
  var titulo = _("titulo-link");
  var imagem = _("img-slide");
  var yes    = _("btn-yes");
  var no     = _("btn-non");

  holder.style = "z-index: 10; background: rgba(18, 15, 15, 0.6);";
  titulo.innerText  = link;
  imagem.src        = '.'+link;

  yes.addEventListener('click', deletarSlideQuery, false);
  no.addEventListener('click', recalling, false);

  function deletarSlideQuery(e) {
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", finishDelSlide, false);
    ajax.open("GET", "../ajax/sliderDEL.php?id="+id+"&time="+Math.random(), true);
    ajax.send();

    function finishDelSlide(e) {
      var val = e.target.responseText;
      if(val == 'true') {
        toasters('sucess', 'Deletar', 'Slide deletado');          
      } else if(val == 'false') {
        toasters('warning', 'Deletar', 'Slide não deletado');          
      } else {
        toasters('error', 'Deletar', 'Erro interno');          
      }
      getPage('slider/alterar');
    }
  }

  function recalling() {
    getPage('slider/alterar');
  }
}

function sliderLoadComplete(evt) {

  var result = evt.target.responseText;  

  if(result == 'true') {
    toasters('sucess', 'Novo Slide', 'Slide inserido');
    getPage('slider/alterar');
  } else if(result == 'false') {
    toasters('error', 'Novo Slide', 'Houve um erro');
  } else {
    console.log('erro interno!');
  }
}



/*************************************************************************************
EXCLUIR POST
*************************************************************************************/

function query_exclude(id) {

  var ajax = new XMLHttpRequest();

  ajax.onreadystatechange = function() {
    if(this.readyState = 4 && this.status == 200) {
      var resposta = this.responseText;

      if(resposta == "true") {
        getPage('posts/excluir&excluir=0');
        toasters('sucess', 'Deletar', 'post excluído');
      } else {
        toasters('error', 'Deletar', 'post não encontrado');
      }
    }
  }
  ajax.open("GET", "../ajax/queryDel.php?id="+id+"&time="+Math.random(), true);
  ajax.send();

}

/*************************************************************************************
FIM
*************************************************************************************/




/*************************************************************************************
ADICIONAR POST
*************************************************************************************/

function query_add() {

  var con = CKEDITOR.instances.conteudo.getData();

  var img = _("img_up").value;
  img = img.split("\\");
  var data = img[2]+"¬"+_("txt_unidade").value+"¬"+_("txt_categoria").value+"¬"+_("txt_titulo").value+"¬"+_("txt_resumo").value+"¬"+con;    

  var postData = new FormData();
  postData.append('dataPost', data);
  
  var ajax = new XMLHttpRequest();

  ajax.addEventListener("load", addComplete, false);    
  ajax.open("POST", "../ajax/queryAdd.php?time="+Math.random(), true);
  ajax.send(postData);
}

function addComplete(evt) {    

  if(evt.target.responseText == 'true') {

    toasters('sucess', 'Sucesso', 'post inserido');

    //Clear all fields
    _("img_up").value         = "";
    _("txt_unidade").value    = "";
    _("txt_categoria").value  = "";
    _("txt_titulo").value     = "";
    _("txt_resumo").value     = "";
    CKEDITOR.instances.conteudo.setData('');
    _("img-sctn").src         = "../img/developer-api.jpg";
    _("btn-upload").innerHTML = "Escolha a imagem";
    _("progress-data-send").style = "height: 0px; padding-top: 0px;";

  } else {
    toasters('Error', 'Falha', 'algo deu errado :(');  
  }
}

/*************************************************************************************
FIM
*************************************************************************************/




/*************************************************************************************
EDITAR POST
*************************************************************************************/

function query_edit() {

  var con = CKEDITOR.instances.conteudo.getData();
  var img = _("img-sctn").src.split('http://divinapromessa.16mb.com/uploads/');
  
  if (img[1] == 'undefined' || img[1] == 'developer-api.jpg') {
    img = 'developer-api.jpg';
  } else {
    img = img[1];
  }

  var data = img+"¬"+_("txt_ministerio").value+"¬"+_("txt_categoria").value+"¬"+_("txt_titulo").value+"¬"+_("txt_resumo").value+"¬"+con+"¬"+_("txt_id").innerText;

  var postData = new FormData();
  postData.append('dataPost', data);
  
  var ajax = new XMLHttpRequest();

  ajax.addEventListener("load", testete, false);
  ajax.open("POST", "../ajax/queryEdit.php?time="+Math.random(), true);
  ajax.send(postData);
}

function testete(evt) {   
  var id = _("txt_id").innerText;    
  getPage('posts/editar&editar='+id);
  toasters('sucess', 'Sucesso', 'post editado');
}

/*************************************************************************************
FIM
*************************************************************************************/

function toasters(tipo, titulo, mensagem) {
  var get_tipo      = _("idtoastimg");
  var get_titulo    = _("txt_toast_titulo");
  var get_mensagem  = _("txt_toast_mensagem");
  var toast         = _("toast");
  var animation     = _("animacao");

  if (tipo == 'sucess') { 
    
    tipo = 'glyphicon-ok'; 
    toast.style ="background: #72e4ca; transform: translateX(0px);";      

  } else if (tipo == 'info') { 
    
    tipo = 'glyphicon-exclamation-sign'; 
    toast.style ="background: #4dd2ff; transform: translateX(0px);";      

  } else if (tipo == 'warning') { 
    
    tipo = 'glyphicon-warning-sign'; 
    toast.style = "background: #f5d267; transform: translateX(0px);";           

  } else if (tipo == 'error') { 
    
    tipo = 'glyphicon-warning-sign';     
    toast.style ="background: #d75a4a; transform: translateX(0px);";      

  } else {}

  get_tipo.className      = "glyphicon "+tipo;
  get_titulo.innerHTML    = titulo;
  get_mensagem.innerHTML  = mensagem;
  animation.style         = " width: 0px;";

  setTimeout(function(){
    toast.style = "transform: translateX(200px)";
  }, 4000);  

  setTimeout(function(){
    animation.style = " width: 100%;";
  }, 4500);
}

function up_audio(element) {    

  if      (element == 0) { var audioSelected = _("low-quality-file").files[0]; } 
  else if (element == 1) { var audioSelected = _("med-quality-file").files[0]; } 
  else if (element == 2) { var audioSelected = _("hig-quality-file").files[0]; } 
  else if (element == 3) { var audioSelected = _("zip-file").files[0];         }
  else                   { toasters('error', 'Falha grave', 'E#>4'); }  

  if(element == 3) {
    var isProbZip = audioSelected.name.split('.');            
  }    
  
  if (audioSelected.type != 'audio/mp3' && audioSelected.type != 'audio/ogg') {
    toasters('error', 'Falha no envio', 'Extensão inválida!');
  } else {

    __('spinner')[element].style = "opacity: 1;";

    var data = audioSelected;

    var postData = new FormData();
    postData.append('dataPost', data);

    var ajax = new XMLHttpRequest();
    ajax.addEventListener('load',     audioUpComplete,  false);
    ajax.upload.addEventListener('progress', audioUpProgress,  false);
    ajax.open('POST', '../ajax/sendAUDIO.php?time='+Math.random(), true);
    ajax.send(postData);

    function audioUpComplete(e) {
      var retorno = JSON.parse(e.target.responseText);
      if(retorno.resultado == 'true') {
        
        __('spinner')[element].style    = "opacity: 0;";
        __('glyphicon')[element+23].className = "glyphicon glyphicon-ok";

        toasters('sucess', 'Envio de Audio', 'Envio com sucesso!');

      } else {
        toasters('error', 'Falha no envio', 'Arquivo muito grande!');
      }
    }

    function audioUpProgress(e) {
      
      var porcentagem = (e.loaded/e.total) * 100;

      __('progress-atual')[element].style = 'width: '+porcentagem+'%;';
      __('porcentagem-atual')[element].innerText = Math.round(porcentagem)+'%';
      
    }
  }    
}
  
function culto_add() {

  var pregador;
  var titulo;
  var resumo;
  var tags;
  var laudio;
  var maudio;
  var haudio;
//var zaudio;
  var date;
  var contPostagem;

  pregador      = __('form-input')[0].value;
  titulo        = __('form-input')[1].value;
  resumo        = __('form-input')[2].value;
  tags          = __('form-input')[3].value;
  laudio        = removalFakepath(__('form-input')[4].value);
  maudio        = removalFakepath(__('form-input')[5].value);
  haudio        = removalFakepath(__('form-input')[6].value);
  date          = __('form-input')[7].value;
  contPostagem  = CKEDITOR.instances.conteudo.getData();

  var data = pregador+"¬"+titulo+"¬"+resumo+"¬"+tags+"¬"+laudio+"¬"+maudio+"¬"+haudio/*+"¬"+zaudio*/+"¬"+date+"¬"+contPostagem;  

  var postData = new FormData();
  postData.append('dataPost', data);

  var ajax = new XMLHttpRequest();

  ajax.addEventListener('load', enviarPostCultoAdd, false);
  ajax.open('POST', '../ajax/cultoADD.php?time='+Math.random(), true);
  ajax.send(postData);

  function enviarPostCultoAdd(e) {
    var result = e.target.responseText;

    if(result == 'true') {
      
      toasters('sucess', 'Post', 'publicado com sucesso!');

      // Clear of all fields
      for(var i=0; i<9; i++) { __('form-input')[i].value = ''; }
      CKEDITOR.instances.conteudo.setData('');

    } else {

      toasters('error', 'Post', 'falha na publicação!');

    }
  }
}

function culto_editar(id) {

  var pregador;
  var titulo;
  var resumo;
  var tags;
  var laudio;
  var maudio;
  var haudio;
//var zaudio;
  var date;
  var contPostagem;
  var selector_id = id;

  pregador      = __('form-input')[0].value;
  titulo        = __('form-input')[1].value;
  resumo        = __('form-input')[2].value;
  tags          = __('form-input')[3].value;

  if( removalFakepath(__('form-input')[4].value) == ""        || 
      removalFakepath(__('form-input')[4].value) == null      || 
      removalFakepath(__('form-input')[4].value) == undefined) {

    laudio        = __('form-input')[4].dataset.baix;    

  } else {
    laudio        = removalFakepath(__('form-input')[4].value);
  }

  if( removalFakepath(__('form-input')[5].value) == ""        || 
      removalFakepath(__('form-input')[5].value) == null      ||
      removalFakepath(__('form-input')[5].value) == undefined) {    

    maudio        = __('form-input')[5].dataset.medi;      

  } else {
    maudio        = removalFakepath(__('form-input')[5].value);
  }

  if( removalFakepath(__('form-input')[6].value) == ""        ||
      removalFakepath(__('form-input')[6].value) == null      ||
      removalFakepath(__('form-input')[6].value) == undefined) {
    
    haudio        = __('form-input')[6].dataset.alta;  

  } else {
    laudio        = removalFakepath(__('form-input')[6].value);
  }

  
  date          = __('form-input')[7].value;
  contPostagem  = CKEDITOR.instances.conteudo.getData();

  var caminho = '../audios/';

  var data = pregador+"¬"+titulo+"¬"+resumo+"¬"+tags+"¬"+laudio+"¬"+maudio+"¬"+haudio/*+"¬"+zaudio*/+"¬"+date+"¬"+contPostagem+"¬"+selector_id;

  var postContent = new FormData();
  postContent.append('dataPost', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", enviarPostCultoEdit, false);
  ajax.open("POST", "../ajax/cultoEDT.php?time="+Math.random(), true);
  ajax.send(postContent);

  function enviarPostCultoEdit(e) {
    var resposta = e.target.responseText;
    if(resposta == "true") {
      toasters("sucess", "Edição", "Alterações efetuadas!");
      getPage("cultos/edit&editar="+selector_id);
    } else {
      toasters("error", "Edição", "Falha nas alterações!");
    }
  }
}

function culto_deletar(post_id) {

  var dataPost = new FormData();
  dataPost.append('dataPost', post_id);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", enviarPostCultoDel, false);
  ajax.open("POST", "../ajax/cultoDEL.php?time="+Math.random(), true);
  ajax.send(dataPost);

  function enviarPostCultoDel(e) {
    var resposta = e.target.responseText;
    if(resposta == 'true') {
      toasters("sucess", "Excluir", "Culto excluído");
      getPage("cultos/del");
    } else {
      toasters("error", "Excluir", "Culto não excluído");
    }
  }

}

function agenda_add() {

  var categoria = __("form-input")[0].value;
  var titulo    = __("form-input")[1].value;
  var resumo    = __("form-input")[2].value;
  var date      = __("form-input")[3].value;

  var data = categoria+"¬"+titulo+"¬"+resumo+"¬"+date;  

  var dataPost = new FormData();
  dataPost.append('dataPost', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", enviarPostAgendaAdd, false);
  ajax.open("POST", "../ajax/agendaADD.php?time="+Math.random(), true);
  ajax.send(dataPost);

  function enviarPostAgendaAdd(e) {
    var resposta = e.target.responseText;
    if(resposta == 'true') {
      toasters("sucess", "Adicionar evento", "concluído!");
      getPage("agenda/edit");
    } else {
      toasters("error", "Adicionar evento", "algo deu errado!");
    }
  }
}

function agenda_editar(id) {
  
    var categoria = __("form-input")[0].value;
    var titulo    = __("form-input")[1].value;
    var resumo    = __("form-input")[2].value;
    var date      = __("form-input")[3].value;
  
    var data = categoria+"¬"+titulo+"¬"+resumo+"¬"+date+"¬"+id;
  
    var dataPost = new FormData();
    dataPost.append('dataPost', data);
  
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", enviarPostAgendaEditar, false);
    ajax.open("POST", "../ajax/agendaEDITAR.php?time="+Math.random(), true);
    ajax.send(dataPost);
  
    function enviarPostAgendaEditar(e) {
      var resposta = e.target.responseText;
      if(resposta == 'true') {
        toasters("sucess", "Editar evento", "concluído!");
        getPage("agenda/edit");
      } else {
        toasters("error", "Editar evento", "houve algum erro");
      }  
    }  
  }

function destaquePost(tabela, operation, value) {
  var data = operation+"¬"+value+"¬"+tabela; 

  var dataPost = new FormData();
  dataPost.append('dataPost', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", retirarPostDestaque, false);
  ajax.open("POST", "../ajax/removerDestaque.php?time="+Math.random(), true);
  ajax.send(dataPost);

  function retirarPostDestaque(e) {
    var resposta = e.target.responseText;    
    
    if(resposta == "true") {
      
      if(tabela == "cultos")  { getPage('cultos/destaques');  }
      else                    { getPage('posts/destaques');   }
      
      toasters('sucess','Destaque','Removido dos destaques');
    } else {
      toasters('erro','Destaque','erro interno');
    }
  }
}
