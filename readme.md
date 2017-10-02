SITE DIVINA PROMESSA
=================

Você pode visitar o nosso site (estamos em fase de testes) [Site oficial Divinapromessa](http://divinapromessa.16mb.com) ou me procurar no facebook [Paulo Marques](https://facebook.com.br/paulohsmarques).

O Projeto
---------------

o principal motivo de eu ter começado esse site é que eu precisava aprender um pouco de PHP, coloquei em meta estudar e aplicar no site todos os conhecimentos durante aproximadamente 1 ano e meio, o resultado ainda é pouco do que eu pretendo chegar mas já entendo o bastante para caminhar sozinho.

No projeto criei um site de post onde eu tenho o controle dele por um cPanel que desenvolvi e ele é todo modular, ele contem algumas coisas legais como API de redução do tamanho da imagem (em todos os sentidos), controle de sliders, upload de música (mp3/wma/ogg) e estou implantando o MVC últimamente

```PHP
class Slide extends Connection {

  public function controlador($dados) {

    switch($dados[0]) {
      case "slide_add": return($this->slide_add($dados)); break;
      case "slide_edt": return($this->slide_edt($dados)); break;
      case "slide_del": return($this->slide_del($dados)); break;
    }
  }

  private function slide_add($dados) {    
    $tools = new Tools();
    $query = "INSERT INTO 
                dp_slider (link, descricao, legenda) 
              VALUES 
                ('$dados[1]', '$dados[2]', '$dados[3]')";
  
    $tools->runQuery($query);    
  }

  //...

}
``` 

Contribuidores
------------

Please see our [guidelines](CONTRIBUTING.md) for contributing to the driver.

### Maintainers:
* Paulo Marques             paulohsmarques@gmail.com
* Priscila Marques          priscila_s.sales@gmail.com

### Contributors:
* Isaque Ferreira           https://www.facebook.com/isaque.ferreira.39
* Damaris Mota              https://www.facebook.com/damaris.mota.5

If you have contributed and we have neglected to add you to this list please contact one of the maintainers to be added to the list (with apologies).