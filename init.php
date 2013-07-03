<?php
// Carregar o autoload
if (!file_exists('vendor/autoload.php'))
	throw new RuntimeException('Necessário a instalação do "composer"');

/** @var $load \Composer\Autoload\ClassLoader */
$load = include 'vendor/autoload.php';
//$load->add("Rabbit", realpath("vendor/rabbit/library"));

// Registrando o Servico do Load
Rabbit\Service\ServiceLocator::registerInstance('Rabbit\Load', $load);

// Cofnigurando Paths
define("DS", DIRECTORY_SEPARATOR);
define("RABBIT_PATH", realpath(__DIR__));
define("RABBIT_PATH_APPLICATION", RABBIT_PATH . DS . "application");
define("RABBIT_PATH_MODULE", RABBIT_PATH_APPLICATION . DS . "Module");


/**
 * Função de auxilio
 */ 
function print_pre($var) {
	echo "<pre><code>";
	if(is_string($var)){
		echo htmlentities($var);
	}else{
		print_r($var);
	}
	echo "</code></pre>";
};