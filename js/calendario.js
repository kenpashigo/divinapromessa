function getallFieldsInMonth(month, year) {
  // Since no month has fewer than 28 allFields
  var date = new Date(year, month, 1);
  var allFields = [];         
  while (date.getMonth() === month) {
    allFields.push(new Date(date));
    date.setDate(date.getDate() + 1);
  }
  return allFields;
}

var now = new Date();
var year = now.getFullYear();
var month = now.getMonth();
var change = now.getMonth();
// Efetua a requisição AJAX do php para preencher a tabela 'Próximos eventos'
  calendario_change(change);
var mesFor = change+1;
var dday = now.getDate();
var mes = getallFieldsInMonth(month, year);
var nome = [];
nome[0] = "Janeiro";
nome[1] = "Fevereiro";
nome[2] = "Março";
nome[3] = "Abril";
nome[4] = "Maio";
nome[5] = "Junho";
nome[6] = "Julho";
nome[7] = "Agosto";
nome[8] = "Setembro";
nome[9] = "Outubro";
nome[10] = "Novembro";
nome[11] = "Dezembro";

document.addEventListener("DOMContentLoaded", function(){
  moveCalendario();      
});

function limpaDias() {
  var campoCalendario = document.getElementsByClassName('index');   

  for(var i=0;i<42;i++) {
    campoCalendario[i].innerHTML = "";
  }
}

function changeMonth(x){      
  
  limpaDias();

  // Atribui a var se o mês foi alterado para < ou >
  change += x;

  // Determina um limitador ao mes atual
  if(change < 0) { change = 11; } else if(change > 11) { change = 0; }

  // Efetua a requisição AJAX do php para preencher a tabela 'Próximos eventos'
  calendario_change(change);   
}

function moveCalendario() {   

  // Chama função getallFieldsInMonth com os valores novos
  var mes = getallFieldsInMonth(change, year);

  // Muda o nome do mês
  document.getElementById('cldr').innerHTML = nome[change];

  // Pega a tabela para execução de jscript
  var resultados = document.getElementsByClassName('eventos-data');   

  // Pega os elementos allFields NOTA: os 7 primeiros não contam logo: allFields[i+7]
  var allFields = document.getElementsByClassName('day');

  // Pega os elementos index. somente os campoCalendario. 6 semanas no máximo   
  var campoCalendario = document.getElementsByClassName('index');   
  var dia = 0;
  var counter = 0;  

  for(var i=0;i<42;i++) {      
    var diaDaSemana = mes[dia].getDay();
    var campoIndex = campoCalendario[i].dataset.index;     

    if(campoIndex == diaDaSemana) {

      // Pega o dia do mes atual e atribui a var diaValor
      var diaValor = mes[dia].getDate();

      // Se for DOMINGO ou SÁBADO mudar a cor
      if(campoIndex == 0 || campoIndex == 6) {campoCalendario[i].style = "color: #cacab8;";}

      // Se o dia atual for igual ao processador no FOR então marcar ele. os outros ganham bg transparente         
      if(diaValor == dday && month == change) { campoCalendario[i].style = "background: #02bcaa;";} 
      else {campoCalendario[i].style = "background: transparent;";}

      for(var j=0;j<resultados.length;j++){            

        if(diaValor == resultados[j].childNodes[1].innerText) {
          // Muda a cor do dia em questão            
          campoCalendario[i].style = "color: #02bcaa; font-size: 20px; font-weight: 700;";          
        }
      }

      // finalmente atribui o valor do dia atual no campo do calendario correto
      campoCalendario[i].innerHTML = diaValor;

      // enquanto não preencher todos os dias do mês atual continuar o for
      if(dia < (mes.length-1)) { dia++; } else { break; }

    // Se o campo não tiver um dia registrado então o campo será nulo   
    } else {
      campoCalendario[i].innerHTML = "";
    }
  }  
}

function calendario_change(a){     
   a += 1;
   if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
   } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         var option = document.getElementById('response');            
         option.innerHTML = this.responseText;
         moveCalendario();
      }
   };
   xmlhttp.open("GET", "./calendario/calendario-evento.php?call="+a+"&time="+Math.random(), true);
   xmlhttp.send();   
}




 
