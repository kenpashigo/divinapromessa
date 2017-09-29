var srS109asj10 = 0;
var funct = 'login_check';

function _(caminho) {
	return document.getElementById(caminho);
}

document.addEventListener("DOMContentLoaded", function(){
	
		_("submit-button").addEventListener("click", verifyFields, false);	
		_("password").addEventListener("keydown", verifyKeyPressed, false);
		_("usuario").addEventListener("keydown", verifyKeyPressed, false);
	
});

function verifyKeyPressed(event) {
	if(event.key == 'Enter') {
		verifyFields();		
	} else {
		
	}
}

function verifyFields() {	

	if(srS109asj10 < 3) {
		if (_("usuario").value == "" || _("password").value == "") {
			
			// Verifica o campo login
			if (_("usuario").value == ""){
				_("alert").style = "width: 180px";
				_("alert").innerHTML = "Digite seu usuario";	
			} else {
				_("alert").style = "width: 0px";
			}

			// Verifica o campo password
			if (_("password").value == "") {
				_("alert2").style = "width: 180px";
				_("alert2").innerHTML = "Digite o password";	
			} else {			
				_("alert2").style = "width: 0px";
			}
		} else {
			_("alert").style = "width: 0px";
			_("alert2").style = "width: 0px";

			var user =  _("usuario").value;
			var pass = _("password").value;
			
			var data = funct+"¬"+user+"¬"+pass;		

			var postData = new FormData();
			postData.append("postData", data);

			var ajax = new XMLHttpRequest();
			ajax.addEventListener("load", sendData, true);
			ajax.open("POST", "../system/controller.php?time="+Math.random(), true);
			ajax.send(postData);
			
			function sendData(e) {						

				var resultado = e.target.responseText;
				if(resultado == 'non-user') {
					_("alert").style = "width: 180px; background: #f44336;";
					_("alert").innerHTML = "Usuário não encontrado!";
					srS109asj10++;					
				} else if(resultado == 'false') {
					_("alert2").style = "width: 180px; background: #f44336;";
					_("alert2").innerHTML = "Password incorreto!";
				} else if(resultado == 'true') {
					
					_("alert").style = "width: 0px";
					_("alert2").style = "width: 0px";
					
					for(var i=0;i<3;i++) {
						setTimeout(function(){
							if(i == 0) {
								_("submit-button").value = "Redirecionando.";		
							} else if(i == 1) {
								_("submit-button").value = "Redirecionando..";		
							} else {
								_("submit-button").value = "Redirecionando...";		
							}						
						}, 500*i);
					}

					setTimeout(function(){
						window.location = "./cpanel";
					}, 1500);
				}
			}
		}
	}
}