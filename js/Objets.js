function Connection() {
	var nome;
	var idade;
	var etinia;
	var sexo;
	var profissao;

	function Connection(nome, idade, etinia, sexo, profissao) {
		this.name = nome;
		this.name = idade;
		this.name = etinia;
		this.name = sexo;
		this.name = profissao;		
	}

	Connection.imprimir = function () {
		console.log("Eu sou "+this.nome+" e tenho "+this.idade+" anos, sou "+this.etinia+" e meu sexo é "+this.sexo+" e trabalho com "+this.profissao);
	}




}

