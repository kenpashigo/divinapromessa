var audio = 0;
var patch = null;
var player = null;
var tempoAtual = null;
var tempoTotal = null;
var estado = 0;
var oldTexto = null;
var baixa = null;
var media = null;
var altas = null;

document.addEventListener("DOMContentLoaded", function(){
	player = document.getElementById('audio-src');
	tempoTotal = document.getElementById('tempo-restante').childNodes;		
	tempoAtual = document.getElementById('tempo-atual').childNodes;
	playButton = document.getElementById('play-pause').childNodes;
	playerHolder = document.getElementById('blue');
	oldTexto = document.getElementById('player-title').childNodes;
	darken = document.getElementById('darken');
 	hidden = document.getElementById('hidden-menu'); 	

	baixa = document.getElementById('lown').dataset.baixa;
	media = document.getElementById('medi').dataset.media;
	altas = document.getElementById('high').dataset.altas;	
});

//Qualidade Baixa
function low() {

	patch = baixa;

	if(patch != 'nada') {
		playerHolder.style = "height: 60px;";
		playerHolder.style.height = "60px";	
		
		audio = document.getElementById('audio-src');
		audio.src = patch;
		console.log(audio.src);
		audio.play();
		playButton[1].src = "../ico/pause.png"; 	

		duracao(audio);
		title();

	}	else {
		crose();
	}

}

function med(a) {

	patch = media;

	if(patch != 'nada') {
		playerHolder.style = "height: 60px;";
		playerHolder.style.height = "60px";	
		audio = document.getElementById('audio-src');
		audio.src = patch;
		audio.play();
		playButton[1].src = "../ico/pause.png"; 	

		duracao(audio);
		title(a);

	} else {
		crose();
	}
}

function hig(a) {

	patch = altas;

	if(patch != 'nada') {
		playerHolder.style = "height: 60px;";	
		playerHolder.style.height = "60px";	
		
		audio = document.getElementById('audio-src');
		audio.src = patch;
		audio.play();
		playButton[1].src = "../ico/pause.png"; 	

		duracao(audio);
		title(a);

	} else {
		crose();
	}
	
}

function duracao(audio) {
	audio.addEventListener('loadedmetadata', function() {
		var duration = audio.duration;
		
		var horas = parseInt(audio.duration / 3600, 10);
		if(horas < 10) { horas = '0'+horas; }

		var minutos = parseInt(audio.duration / 60, 10);
		if(minutos < 10) { minutos = '0'+minutos; }
		if(minutos == 60) { minutos = '00'; }

		var segundos = parseInt(audio.duration % 60);
		if(segundos < 10) { segundos = '0'+segundos; }

		var time = horas+':'+minutos+':'+segundos;
		
		var ranger = document.getElementById('ragerino');
		ranger.max = Math.round(duration);		

		for(var i=0; i< (Math.round(duration % 7200)); i++) {
			setTimeout(function(){

				var tA = converteTempo(audio.currentTime);
				var tR = converteTempo(audio.duration - (audio.currentTime-1));				
				
				tempoAtual[1].innerText = tA;
				tempoTotal[1].innerText = '-'+tR;
				ranger.value = parseInt(audio.currentTime);

			}, 1000*(i+1));
		}
	});
}

function title(a) {	
	var newTexto = document.getElementById('titulo').childNodes;

	
	oldTexto[1].innerText = newTexto[1].innerText;
}

function volume(a) {
	var vol = document.getElementById('volume');
	vol.value = a;
	a /= 100;
	audio.volume = a;	
}

function range(a) {
	audio.currentTime = a;	
}

function converteTempo(a) {
	var horas = parseInt(a / 3600);	

	var minutos = parseInt(a / 60, 10);
	if(minutos < 10) { minutos = '0'+minutos; }
	if(minutos == 60) { minutos = '00'; }

	var segundos = parseInt(a % 60);
	if(segundos < 10) { segundos = '0'+segundos; }
	if(segundos == 60) { segundos = '00'; }

	var time = horas+':'+minutos+':'+segundos;
	return time;
}

function playPause(a) {	
	estado += a;
	if(estado == 1) {
		audio.pause();		
		playButton[1].src = "../ico/play.png";
	} else {
		audio.play();
		playButton[1].src = "../ico/pause.png";
		estado = 0;
	}
}

function crose() {
	tempoAtual[1].innerText = '-:--:--';
	tempoTotal[1].innerText = '-:--:--';
	oldTexto[1].innerText = '--------';
	audio.pause();
	audio.src = "";
	playerHolder.style = "height: 0px;";
	playerHolder.style.height = "0px";	
}