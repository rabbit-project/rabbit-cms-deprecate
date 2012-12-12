RabbitCMS
======

RabbitCMS é um sistema para auxiliar a criação de sistemas/portais, traz para os desenvolvedores agilidade focando somente no problema do cliente.

RabbitCMS oferece:

	- Gerenciamento de Módulos;
	- Gerenciamento de Usuários;
	- Gerenciamento de Grupos;
	- Gerenciamento de Perfils;
	- Segurança ACL;

Instalação
======

Antes de tudo é necessário a instalação do composer.

Instalação do composer:

Caso não venha com o composer.phar para instalar segue informação abaixo:

Acessar a pasta do projeto "rabbit"

Linux:
$ curl -s https://getcomposer.org/installer | php

Windows:
php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"

Depois executar o comando:

Atualizar o composer:
$ php composer.phar self-update

Instalando as dependencias do rabbit:
$ php composer.phar create-project rabbit-project/rabbit-cms suapasta versaox

Pronto feito isso só acessar o projeto "localhost/suapasta"