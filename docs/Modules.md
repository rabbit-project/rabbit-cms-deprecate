## Criando Módulos para o CMS ##

###Introdução

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



```php
IndexController.php
<?php 
namespace NomeModulo\Controller;

class IndexController extends AbstractController { 
  
  public function indexAction() {
  	
  }
  
}
```

[ 2 ] `Controller`: Pasta onde é salvo as classes ref ao controller do módulo. [ 3 ] Toda classe Controller também se utiliza o padrão de nomeclatura `CamelCase`, todo arquivo de controle termina com `Controller.php`, por exemplo se você está montando um controle para de usuario e queria dar o nome do controlle de usuario ficaria: `UsuarioController.php` e o nome da classe seria `class UsuarioController { ... }` é necessário que siga esse padrão pois o sistema irá entender automaticamente baseado pelo nome do arquivo o nome da classe que ele precisa estar olhando.

[ 4 ] `View`: Aqui fica todos os arquivo que irão representar a parte vizual do modulo caso ele exista. Por padrão quando um Controller necessita de renderização é utilizado um padrão de conversão de nomes para automaticamente a aplicação encontrar o arquivo de vizualição por si só. No Rabbit utilizamos o seguinte.

[ 5 ] Vamos supor que temos o controller `UsuarioController.php` então dentro da pasta `View` iremos criar uma pasta `usuario` pois todas as vizualizações ref ao controller Usuario irão ficar dentro dessa pasta, isso se você estiver mandando o controller renderizar por padrão. Pois a qualquer momento você pode iforma no controller que quer que o mesmo renderize algo de outro controller e ou modulo.

[ 6 ] Dentro da pasta `usuario` que foi criada dentro da pasta `View` iremos colocar os arquivos .phtml que representa a vizualicação html de conteúdo. O nome do arquivo também é utilizado conversão de nome por padrão utilizamos o nome do `metodo` que está sendo chamado dentro do `controller` lembrando que esse valor pode ser mudado no proprio controle caso seja necessário renderizar outro action de algum outro controller ou outro modulo.

### Controller

##### Oque é controller?

O Controller na tradução purista seria um `controlador` resposavel por receber requisições e controlar os dados indo no Model para verificar as regras de negocio, acesso ao banco e indo no View para renderizar um conteúdo. O controller existe baseando no conceito HMVC "Hierarchical Model View Controller" mais informação: http://en.wikipedia.org/wiki/Hierarchical_model%E2%80%93view%E2%80%93controller com isso podemos chamar outros modulos dentro dos nosso proprio modulo assim desacoplando ainda mais as funcionalidades e tornando modulos reutilizavéis para outros módulos caso necessário.

O Controller no Rabbit fica percisa ser salvo dentro da pasta Controller como vimos já na introdução. Todo controller deve ter o nome de seu arquivo .php o mesmo nome da classe utilizando-se do `CamelCase` em seu nome se seu controler tem mais de 1 nome como por exemplo "Usuario Perfil" então seu arquivo ficara: "UsuarioPerfilController.php" e o nome da classe gerada dentro do arquivo será chamada de "class UsuarioPerfilController".


##### Namespace

Todas as classes criadas no seu módulo precisam de um scopo e definimos isso utilizando namespace o namespace segue um padrão da seguinte forma:

	namespace NomeModulo\Pasta1\Pasta2;
    
Se você tiver criado uma estrutura parecida com o seguinte:

	Usuario
    	Entity
        	User.php
            

```php
User.php
<?php 
namespace Usuario\Entiry;

class User { ... }
```
    
Veja que o `namespace` seguiu a seguencia de pastas onde se localiza a classe User.php, é necessário seguir essa estrurura pois assim você não irá precisar fazer includes dos arquivos de classes na sua aplicação a apropria aplicação já irá entender onde está o arquivo quando a mesma for instanciada.

##### Action

As actions são os metodos que define as ações dentro do seu controller por padrão ao se criar um controller a aplicação irá procurar por um metodo chamado indexAction. Todos os actions devem ser publicos e o nome deve sempre começar com a primeira letra em minúsculo seguindo depois o CamelCase.

ex imagina que vamos criar uma ação para nosso controller Listar Pedidos o nosso action irá ficar:

	...
	public function listarPedidosAction() { ... }
    ...
    
Veja que no exemplo sempre que terminamos o nome devemos colocar a palavra Action depois, pois isso define que a quele metodo é um metodo de ação que possui um roteamento para o mesmo. Dentro do controller você pode criar vários outros metodos que auxiliam no seu desenvolvimento que o mesmo não irá atrapalhar a logica por traz das actions.

Toda action pode ou não ser renderizada algum conteúdo vizual para que o usuário final possa ou não ver oque está acontecendo para isso basta fazer com que sua action retorne uma classe `Action` e o tipo de ação que a sua action irá efetuar.

Temos as seguintes ações:

	[1] Action::forward(array $args) : string | mixed
    [2] Action::render([array $args [, array $config]]) : string
    [3] Action::redirectTo(string $url [, integer $status [, array $headers]]) : void
    
1. **Action::forward**	
*Forwad* deixa que nós na mesma action que estamos possa acessar outra `modulo, controller ou action` assim na mesma requisição pode estar acessando outros lugares caso necessite, para isso devemos passar um *array* alguns argumentos para o metodo conforme a lista abaixo:

  <table width="100%">
      <thead>
        <tr style="text-align: left;">
            <th>args</th>
            <th>descrição</th>
            <th>default</th>
        </tr>
      </thead>
      <tbody>
          <tr>
              <td>module</td>
              <td>informa o nome do módulo, os nomes `CamelCase`deve ser informado `-` separando as palavras e deve ser tudo minusculo ex: <br /> module: UsuarioPerfil <br /> $arg['module'] = 'usuario-perfil'</td>
              <td>modulo atual</td>
          </tr>
          <tr>
              <td>controller</td>
              <td>nome do action sem o Controller do final do nome `Controller`, os nomes `CamelCase` deve ser informado `-` separando as palavras  e deve ser tudo minusculo ex: <br /> controller: UsuarioPerfilController <br /> $arg['controller'] = 'usuario-perfil'</td>
              <td>controller atual</td>
          </tr>
          <tr>
              <td>action</td>
                <td>nome do action sem o Action do final do nome 'Action', os nomes `CamelCase` deve ser informado `-` separando as palavras  e deve ser tudo minusculo ex: <br /> action: usuarioPefilAction <br /> $arg['action'] = 'usuario-perfil'</td>
              <td>action atual</td>
          </tr>
          <tr>
              <td>args..</td>
               <td>arqumentos a mais caso necessário</td>
              <td> -- </td>
          </tr>
      </tbody>
  </table>
  

1. **Action::render**	
*Render* essa ação irá renderizar ou seja retorna um texto formatado HTML, JSON, XML enfim baseando-se nos arquiovs `.phtml` de dentro da pasta View de algum, `modulo, controller ou action` onde o mesmo irá por si só encontrar algum arquivo baseado em um padrão em sua configuração.
