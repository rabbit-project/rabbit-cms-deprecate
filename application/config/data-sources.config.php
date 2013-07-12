<?php
return array(
	'dataSourceName' => array( // vamos falar que esse datasource é para poder acessar o banco de algum outro sistema
		'driver'   => 'pdo_mysql',
		'user'     => 'root',
		'password' => '123',
		'dbname'   => 'test',
		'prefix'   => ''
	),
	'default'		 => array( // aqui é datasource para acessar o sistema local
		'driver'   => 'pdo_mysql',
		'user'     => 'root',
		'password' => '',
		'dbname'   => 'test',
		'prefix'   => ''
	)
);
