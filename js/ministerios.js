var load = null;
var s=15;
var opt = null;
var img = null;
var atual = null;

document.addEventListener("DOMContentLoaded", function() {
	load = document.getElementById('loaded');
	opt = document.getElementById('selector-opt');	
	img = document.getElementById('img-source');		

	load.style = "width: 0%;";
	updates();
	
});

function updates() {
	for(var l=0;l<50;l++) {
		looping(l);		
	}	
}

function looping(a) {
	setTimeout(function(){
		var seg = 15;

		for( atual=0 ; atual<(seg*1000) ; atual++ ) {
			size(atual);					
		}
	}, 15000*(a));
}

function size(a) {
	setTimeout(function(){	

		var retorno = ((a+1) * 100) / (s*1000);
		load.style = 'width: '+retorno+'%;';

		change(retorno);

	}, 1*(a+1));
}

function change(a) {

	if(a > 66.66 && a < 68.99) {
		opt.style = "transform: translateX(201%);";
		img.src = "./uploads/-Tree 1024x768 Wallpapers 1024x768 Wallpapers  Pictures Free Download.jpg";
	} else if(a > 33.33 && a < 35) {
		opt.style = "transform: translateX(100.67%);";
		img.src = "./uploads/1280px-Stonehenge_back_wide.jpg";
	} else if(a > 0 && a < 5) {
		opt.style = "transform: translateX(0);";
		img.src = "./uploads/2014-11-03 15.10.32.jpg";
	}
}

function pos(a) {
	
	if(a == 0) {
		opt.style = "transform: translateX(0);";
		img.src = "./uploads/2014-11-03 15.10.32.jpg";
	} else if(a == 1) {
		opt.style = "transform: translateX(100.67%);";
		img.src = "./uploads/1280px-Stonehenge_back_wide.jpg";
	} else {
		opt.style = "transform: translateX(201%);";
		img.src = "./uploads/-Tree 1024x768 Wallpapers 1024x768 Wallpapers  Pictures Free Download.jpg";
	}
}