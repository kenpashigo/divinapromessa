//vars
var menuPos = [];
var textBoxValue = 0;

// SOON THE PAGE LOADS, INCLUDE HOMEPAGE
document.addEventListener('DOMContentLoaded', function(){
  getPage('inicio');  

  setTimeout(function() {
    __("sidder-left")[0].style = "transform: translateX(-100%);";
    __("sidder-right")[0].style = "transform: translateX(100%);";    
  }, 2000);

  setTimeout(function() {    
    _("loader").style = "display: none;";
  }, 2420);
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

  var postData  = new FormData();
  var ajax      = new XMLHttpRequest();

  var funct     = "login_redirect";
  var data      =  funct+"¬"+user;
  postData.append("postData", data);

  ajax.addEventListener('load', login_redirect_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function login_redirect_response(evt) {
    
    var resultado = evt.target.responseText;

    if(resultado == "true") {
      window.location = "http://divinapromessa.16mb.com/admin";
    }
  }
}

// ALTERA O STATUS DE UM DESTAQUE
function destaquePost(funct, operation, id) {  
  var data    = funct+"¬"+operation+"¬"+id;     

  var postData = new FormData();
  postData.append('postData', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", retirarPostDestaque, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function retirarPostDestaque(e) {
    var resposta = e.target.responseText;    
    
    if(resposta == "true") {
      
      if(funct == "culto_dtq") { getPage('cultos/destaques');  }
      else                     { getPage('posts/destaques');   }
      
      toasters('sucess','Destaque','Removido dos destaques');
    } else {
      toasters('erro','Destaque','erro interno');
    }
  }
}

// NOTIFICADOR DE MUDANÇA DE ESTADO
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

// NAVEGAÇÃO
function getPage(pagename, id) {
  var funct     = "tools_getPage";
  var separado  = pagename.split('/');
  var num       = pagename.split('=');

  if(separado.length > 1) {
      nav(separado, pagename);
  } else {

    removeAllChilds();

    var tipo = document.createElement('p');
    var text = document.createTextNode('Home');
    tipo.appendChild(text);                              
    _("nav-span").appendChild(tipo);  
  }

  var data = funct+"¬"+pagename+"¬"+id;  
  var postData = new FormData();
  postData.append("postData", data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", getPageResponse, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);
  
  function getPageResponse(e) {    
    
    _("body-content").innerHTML = e.target.responseText;

    var pagAtual = pagename.split("/");
    if((pagAtual[0] == "posts" || pagAtual[0] == "cultos") && ((pagAtual[1] == "editar" && id != 0) || (pagAtual[1] == "add"))) {
      CKEDITOR.replace("conteudo");
    }
  }
}

// SLIDES

function addSlide() {
  var funct     = "slide_add";
  var img       = _("img_up").value;
  var descricao = _("txt_descricao").value;
  var legenda   = _("txt_legenda").value;

  var data = funct+"¬"+img[2]+"¬"+descricao+"¬"+legenda;

  var postData = new FormData();
  postData.append('postData', data);

  var ajax = new XMLHttpRequest();

  ajax.addEventListener("load", sliderLoadComplete, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function sliderLoadComplete(evt) {
    
    var result = evt.target.responseText;  
    console.log(result);
  
    if(result == "true") {
      toasters('sucess', 'Novo Slide', 'Slide inserido');
      getPage('slider/alterar');
    } else if(result == 'false') {
      toasters('error', 'Novo Slide', 'Houve um erro');
    } else {
      console.log('erro interno!');
    }
  }

}

function editarSlide(id) {
  var funct     = "slide_edt";
  var link      = _("img-sctn").src;
  var descricao = _("txt_descricao").value;
  var legenda   = _("txt_legenda").value;
  link          = link.split("http://divinapromessa.16mb.com/sliders/");

  var data = funct+"¬"+id+"¬"+link[1]+"¬"+descricao+"¬"+legenda;

  var postData = new FormData();
  postData.append('postData', data);

  var ajax = new XMLHttpRequest();

  ajax.addEventListener("load", editSlide, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function editSlide(evt) {
    
    var val = evt.target.responseText;    

    if(val == "true") {
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
    var funct = "slide_del";
    
    var data = funct+"¬"+id;

    var postData = new FormData();
    postData.append('postData', data);

    ajax.addEventListener("load", finishDelSlide, false);
    ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
    ajax.send(postData);

    function finishDelSlide(e) {
      var val = e.target.responseText;
      if(val == "true") {
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

//POSTS

function posts_add() {
  
  var funct = "posts_add";
  var con = CKEDITOR.instances.conteudo.getData();
  
  var img = _("img_up").value;
  img = img.split("\\");
  var data = funct+"¬"+img[2]+"¬"+_("txt_unidade").value+"¬"+_("txt_categoria").value+"¬"+_("txt_titulo").value+"¬"+_("txt_resumo").value+"¬"+con;    
  
  var postData = new FormData();
  postData.append('postData', data);
  
  var ajax = new XMLHttpRequest();
  
  ajax.addEventListener("load", posts_add_resposta, false);    
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);
  function posts_add_resposta(evt) {    
    
    if(evt.target.responseText == "true") {
      
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
}

function posts_edt() {
  
  var funct = "posts_edt";
  var con = CKEDITOR.instances.conteudo.getData();
  var img = _("img-sctn").src.split('http://divinapromessa.16mb.com/uploads/');
  
  if (img[1] == 'undefined' || img[1] == 'developer-api.jpg') {
    img = 'developer-api.jpg';
  } else {
    img = img[1];
  }
  
  var data = funct+"¬"+img+"¬"+_("txt_ministerio").value+"¬"+_("txt_categoria").value+"¬"+_("txt_titulo").value+"¬"+_("txt_resumo").value+"¬"+con+"¬"+_("txt_id").innerText;

  var postData = new FormData();
  postData.append('postData', data);
  
  var ajax = new XMLHttpRequest();

  ajax.addEventListener("load", posts_edt_resposta, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);
  
  function posts_edt_resposta(evt) {   
    var id = _("txt_id").innerText;    
    getPage('posts/editar&editar='+id);
    toasters('sucess', 'Sucesso', 'post editado');
  }
}

function posts_del(id) {
  
  var funct = "posts_del";
  var data = funct+"¬"+id;
  
  var postData = new FormData();
  postData.append("postData", data);

  var ajax = new XMLHttpRequest();

  ajax.addEventListener("load", post_del_resposta, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function post_del_resposta(e) {
    var resposta = this.responseText;    
    if(resposta == "true") {
      getPage('posts/excluir', 0);
      toasters('sucess', 'Deletar', 'post excluído');
    } else {
      toasters('error', 'Deletar', 'post não encontrado');
    }
  }
}

//CULTOS
  
function culto_add() {
  var funct = "culto_add";
  var imagem;
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

  imagem        = _('img-sctn').src.split("http://divinapromessa.16mb.com/uploads/cultos/");  
  pregador      = __('form-input')[0].value;
  titulo        = __('form-input')[1].value;
  resumo        = __('form-input')[2].value;
  tags          = __('form-input')[3].value;
  laudio        = removalFakepath(__('form-input')[4].value);
  maudio        = removalFakepath(__('form-input')[5].value);
  haudio        = removalFakepath(__('form-input')[6].value);
  date          = __('form-input')[7].value;
  contPostagem  = CKEDITOR.instances.conteudo.getData();

  var data = funct+"¬"+pregador+"¬"+titulo+"¬"+resumo+"¬"+tags+"¬"+laudio+"¬"+maudio+"¬"+haudio/*+"¬"+zaudio*/+"¬"+date+"¬"+contPostagem+"¬"+imagem[1];  

  var postData = new FormData();
  postData.append('postData', data);

  var ajax = new XMLHttpRequest();

  ajax.addEventListener('load', enviarPostCultoAdd, false);
  ajax.open('POST', '../system/controller.php?time='+Math.random(), true);
  ajax.send(postData);

  function enviarPostCultoAdd(e) {
    var result = e.target.responseText;
    if(result == "true") {      
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
  var funct = "culto_edt";
  var imagem;
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

  imagem        = _("img-sctn").src.split("http://divinapromessa.16mb.com/uploads/cultos/");
  pregador      = __('form-input')[0].value;
  titulo        = __('form-input')[1].value;
  resumo        = __('form-input')[2].value;
  tags          = __('form-input')[3].value;

  if( removalFakepath(__('form-input')[4].value) == ""        || 
      removalFakepath(__('form-input')[4].value) == null      || 
      removalFakepath(__('form-input')[4].value) == undefined) {

    if(__('form-input')[4].dataset.baix == "" ||
      __('form-input')[4].dataset.baix == undefined) {
      laudio        = "";    
    } else {
      laudio        = __('form-input')[4].dataset.baix;    
    }

  } else {
    laudio        = "../audios/"+removalFakepath(__('form-input')[4].value);
  }

  if( removalFakepath(__('form-input')[5].value) == ""        || 
      removalFakepath(__('form-input')[5].value) == null      ||
      removalFakepath(__('form-input')[5].value) == undefined) {    

    if(__('form-input')[5].dataset.medi == "" ||
       __('form-input')[5].dataset.medi == undefined) {
      maudio        = "";    
    } else {
      maudio        = __('form-input')[5].dataset.baix;    
    }

  } else {
    maudio        = "../audios/"+removalFakepath(__('form-input')[5].value);
  }

  if( removalFakepath(__('form-input')[6].value) == ""        ||
      removalFakepath(__('form-input')[6].value) == null      ||
      removalFakepath(__('form-input')[6].value) == undefined) {
    
    if(__('form-input')[6].dataset.alta == "" ||
       __('form-input')[6].dataset.alta == undefined) {
      haudio        = "";    
    } else {
      haudio        = __('form-input')[6].dataset.alta;    
    }

  } else {
    haudio        = "../audios/"+removalFakepath(__('form-input')[6].value);
  }

  
  date          = __('form-input')[7].value;
  contPostagem  = CKEDITOR.instances.conteudo.getData();

  var caminho = '../audios/';

  var data = funct+"¬"+pregador+"¬"+titulo+"¬"+resumo+"¬"+tags+"¬"+laudio+"¬"+maudio+"¬"+haudio/*+"¬"+zaudio*/+"¬"+date+"¬"+contPostagem+"¬"+selector_id+"¬"+imagem[1];  

  var postContent = new FormData();
  postContent.append('postData', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", culto_edt_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postContent);
  
  function culto_edt_response(e) {
    var resposta = e.target.responseText;
    if(resposta == "true") {
      toasters("sucess", "Edição", "Alterações efetuadas!");
      getPage("cultos/editar");
    } else {
      toasters("error", "Edição", "Falha nas alterações!");
    }
  }
}

function culto_deletar(post_id) {

  var funct = "culto_del";
  var data = funct+"¬"+post_id;

  var postData = new FormData();
  postData.append('postData', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", post_del_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function post_del_response(e) {
    var resposta = e.target.responseText;
    if(resposta == "true") {
      toasters("sucess", "Excluir", "Culto excluído");
      getPage("cultos/del");
    } else {
      toasters("error", "Excluir", "Culto não excluído");
    }
  }

}

//AGENDA

function agenda_add() {
                  
  var funct     = "event_add";
  var categoria = __("form-input")[0].value;
  var titulo    = __("form-input")[1].value;
  var resumo    = __("form-input")[2].value;
  var date      = __("form-input")[3].value;

  var data = funct+"¬"+categoria+"¬"+titulo+"¬"+resumo+"¬"+date;  

  var postData = new FormData();
  postData.append('postData', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", event_add_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function event_add_response(e) {
    var resposta = e.target.responseText;
    if(resposta == "true") {
      toasters("sucess", "Adicionar evento", "concluído!");
      getPage("agenda/editar");
    } else {
      toasters("error", "Adicionar evento", "algo deu errado!");
    }
  }
}

function agenda_editar(id) {
  
  var funct     = "event_edt";
  var categoria = __("form-input")[0].value;
  var titulo    = __("form-input")[1].value;
  var resumo    = __("form-input")[2].value;
  var date      = __("form-input")[3].value;

  var data = funct+"¬"+categoria+"¬"+titulo+"¬"+resumo+"¬"+date+"¬"+id;

  var postData = new FormData();
  postData.append('postData', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", event_edt_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function event_edt_response(e) {
    var resposta = e.target.responseText;
    if(resposta == "true") {
      toasters("sucess", "Editar evento", "concluído!");
      getPage("agenda/editar");
    } else {
      toasters("error", "Editar evento", "houve algum erro");
    }  
  }  
}

function agenda_deletar(id) {

  var funct = "event_del";

  var data = funct+"¬"+id;
  var postData = new FormData();
  postData.append("postData", data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", event_del_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function event_del_response(e) {
    
    var res = e.target.responseText;    

    if(res == "true") {
      toasters("sucess", "Deletar Evento", "Deletado com sucesso!");
      getPage("agenda/del");
    } else {
      toasters("error", "Deletar Evento", "Erro interno");
    }    
  }
}

//SOBRE

function sobre_add() {
  
  var funct       = "sobre_add";
  var hierarquia  = __("form-input")[0].value;
  var nome        = __("form-input")[1].value;
  var integrantes = __("form-input")[2].value;
  var ordem       = __("form-input")[3].value;
  var descricao   = __("form-input")[4].value;
  var imagem      = _("img-sctn").src;

  if(imagem == "http://divinapromessa.16mb.com/img/developer-api.jpg") { imagem = ""; }

  var data = funct+"¬"+hierarquia+"¬"+nome+"¬"+integrantes+"¬"+ordem+"¬"+descricao+"¬"+imagem;

  var postData = new FormData();
  postData.append('postData', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", sobre_add_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function sobre_add_response(e) {
    var res = e.target.responseText;
    if(res == "true") {
      toasters("sucess", "Sobre", "Adicionado com sucesso!");
      getPage("sobre/editar");
    } else {
      toasters("error", "Sobre", "erro interno");
    }
  }
}

function sobre_edt(id) {

  var funct       = "sobre_edt";
  var hierarquia  = __("form-input")[0].value;
  var nome        = __("form-input")[1].value;
  var integrantes = __("form-input")[2].value;
  var ordem       = __("form-input")[3].value;
  var descricao   = __("form-input")[4].value;
  var imagem      = _("img-sctn").src;  

  if(imagem == "http://divinapromessa.16mb.com/cpanel") { imagem = ""; }

  var data = funct+"¬"+hierarquia+"¬"+nome+"¬"+integrantes+"¬"+ordem+"¬"+descricao+"¬"+imagem+"¬"+id;

  var postData = new FormData();
  postData.append('postData', data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", sobre_edt_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function sobre_edt_response(e) {
    var res = e.target.responseText;
    if(res == "true") {
      toasters('sucess', 'Editar descrição', 'Completado!');
      getPage('sobre/editar');
    } else {
      toasters('erro', 'Editar descrição', 'Erro');
    }
  }
}

function sobre_del(id) {
  var ajax      = new XMLHttpRequest();
  var postData  = new FormData();

  var data      = "sobre_del¬"+id;

  postData.append("postData", data);

  ajax.addEventListener("load", sobre_del_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function sobre_del_response(e) {
    var res = e.target.responseText;
    if(res == "true") {
      getPage("sobre/del", 0);
      toasters("sucess", "Deletar", "Descrição Excluída");
    } else {
      toasters("error", "Deletar", "An internal error ocurred. file.js");
    }
  }
}

//USUÁRIO

function usuario_add() {
  var funct     = "users_add";
  var usuario   = __("form-input")[0].value;
  var password  = __("form-input")[1].value;
  var funcao    = __("form-input")[2].value;
  var imagem    = _("img-sctn").src;

  if(imagem == "http://divinapromessa.16mb.com/img/developer-api.jpg") { imagem = ""; }

  var data = funct+"¬"+usuario+"¬"+password+"¬"+funcao+"¬"+imagem;

  var postData = new FormData();
  postData.append("postData", data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", users_add_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function users_add_response(e) {
    var res = e.target.responseText;
    
    if(res == "exist") {

      toasters("warning", "Cadastro", "Usuário já existe!");
      var usuario   = __("form-input")[0].focus();

    } else if(res == "true") {

      toasters("sucess", "Cadastro", "Usuário cadastrado!");
      getPage('inicio');

    } else {

      toasters("erro", "Cadastro", "Erro interno");      
    }

  }
}

function usuario_editar(id) {
  var funct     = "users_edt";
  var usuario   = __("form-input")[0].value;
  var password  = __("form-input")[1].value;
  var funcao    = __("form-input")[2].value;
  var imagem    = _("img-sctn").src;

  if(imagem == "http://divinapromessa.16mb.com/img/developer-api.jpg") { imagem = ""; }

  var data = funct+"¬"+usuario+"¬"+password+"¬"+funcao+"¬"+imagem+"¬"+id;

  var postData = new FormData();
  postData.append("postData", data);

  var ajax = new XMLHttpRequest();
  ajax.addEventListener("load", users_edt_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function users_edt_response(e) {
    let res = e.target.responseText;    
    
    if(res == "exist") {
      toasters("warning", "Usuário", "Usuário já existe!");
      var usuario   = __("form-input")[0].focus();
    } else if(res == "true") {
      toasters("sucess", "Usuário", "Usuário editado!");
      getPage("usuario/gerenciar");
    } else {
      toasters("erro", "Usuário", "Erro interno");
    }

  }
}

function usuario_del(id) {
  var ajax      = new XMLHttpRequest();
  var postData  = new FormData();

  var data      = "users_del¬"+id;

  postData.append("postData", data);

  ajax.addEventListener("load", users_del_response, false);
  ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
  ajax.send(postData);

  function users_del_response(e) {
    var res = e.target.responseText;
    if(res == "true") {
      getPage("usuario/del", 0);
      toasters("sucess", "Deletar", "Usuário Excluído");
    } else {
      toasters("error", "Deletar", "An internal error ocurred. file.js");
    }
  }
}

//UPLOAD IMAGEM

function upload_img (path) {

  var postContent = new FormData();
  var ajax        = new XMLHttpRequest();
  var data        = "image_upload";
  var file        = _("img_up").files[0];      
  var size        = ((file.size/Math.pow(2, 20)).toFixed(2));

  if(size > 3) {

    toasters('error', 'Upload', 'falha no envio');
    alert("Escolha um arquivo menor que 4mb!");
    
  } else {

    _("tmh-img-size").innerHTML = size+" mb";    
    postContent.append("postData", data);
    postContent.append("filePath", path);
    postContent.append("postFile", file);    
    
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completado, false);

    ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
    ajax.send(postContent);

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
      if(resposta.resultado == "true") {    
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
  }  
}

//UPLOAD AUDIOS

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
    postData.append('postData', "audio_cultos");    
    postData.append('postFile', data);

    var ajax = new XMLHttpRequest();
    ajax.addEventListener('load',     audioUpComplete,  false);
    ajax.upload.addEventListener('progress', audioUpProgress,  false);
    ajax.open('POST', '../system/controller.php?time='+Math.random(), true);
    ajax.send(postData);

    function audioUpComplete(e) {
      
      var retorno = JSON.parse(e.target.responseText);
      if(retorno.resultado == "true") {
        
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