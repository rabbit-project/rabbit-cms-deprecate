RabbitCMS [![Build Status](https://travis-ci.org/rabbit-project/rabbit-cms.png?branch=develop)](https://travis-ci.org/rabbit-project/rabbit-cms)
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

Linux:
 - $ curl -s https://getcomposer.org/installer | php

Windows:
 - php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"

Atualize o composer:
 - $ php composer.phar self-update

Instalar o CMS Rabbit:
 - $ php composer.phar create-project rabbit-project/rabbit-cms nomedasuapasta versaox

Pronto feito isso só acessar o projeto "localhost/nomedasuapasta"