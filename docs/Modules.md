## Criando Módulos para o CMS ##

Para se criar os módulos para o CMS é simples basta seguir a seguinte estrutura da pasta do modulo:


	[1] NomeModulo
		[2] Controller
			[3] IndexController.php
		[4] View
			[5] index
				[6] index.phtml
		
Seguindo a ordem vamos esclarecer as coisas:

[ 1 ] `Módulo`: O nome da pasta do Módulo deve sempre começar com a primeira letra Maiuscula e todo o nome junto utilizando o conceito de nomeclatura `CamelCase` mais informações no link: http://pt.wikipedia.org/wiki/CamelCase
E adotado esse padrão pois a leitura das classes criadas dentro do modulo irá utilizar como namespace o nome da pasta para não termos conflitos entre modulos e para auxiliar a inclução dos mesmos dinamicamente


Estrutura pasta:

	app
    	module
  			NomeModulo
  				Controller
  					IndexController.php
  
######IndexController.php

```php
<?php 
namespace NomeModulo\Controller;

class IndexController extends AbstractController { 
  
  public function indexAction() {
  	
  }
  
}
```

[ 2 ] `Controller`: Pasta onde é salvo as classes ref ao controller do módulo. [ 3 ] Toda classe Controller também se utiliza o padrão de nomeclatura `CamelCase`, todo arquivo de controle termina com `Controller.php`, por exemplo se você está montando um controle para de usuario e queria dar o nome do controlle de usuario ficaria: `UsuarioController.php` e o nome da classe seria `class UsuarioController { ... }` é necessário que siga esse padrão pois o sistema irá entender automaticamente baseado pelo nome do arquivo o nome da classe que ele precisa estar olhando.

[ 4 ] `View`: Aqui fica todos os arquivo que irão representar a parte vizual do modulo caso ele exista. Por padrão quando um Controller necessita de renderização é utilizado um padrão de conversão de nomes para automaticamente a aplicação encontrar o arquivo de vizualição por si só. No Rabbit utilizamos o seguinte.

[ 5 ] Imaginamos que temos o UsuarioController.php então dentro da pasta `View` iremos criar uma pasta `usuario` pois todas as vizualizações ref ao controller Usuario irão ficar dentro dessa pasta, isso se você estiver mandando o controller renderizar por padrão. Pois a qualquer momento você pode iforma no controller que quer que o mesmo renderize algo de outro controller e ou modulo.

[ 6 ] Dentro da pasta `usuario` que foi criada dentro da pasta `View` iremos colocar os arquivos .phtml que representa a vizualicação html de conteúdo. O nome do arquivo também é utilizado conversão de nome por padrão utilizamos o nome do `metodo` que está sendo chamado dentro do `controller` lembrando que esse valor pode ser mudado no proprio controle caso seja necessário renderizar outro action de algum outro controller ou outro modulo.
