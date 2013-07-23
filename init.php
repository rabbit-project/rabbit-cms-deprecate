<?php
// Cofnigurando Paths
define('DS', DIRECTORY_SEPARATOR);
define('RABBIT_PATH', realpath(__DIR__));
define('RABBIT_PATH_APPLICATION', RABBIT_PATH . DS . 'application');
define('RABBIT_PATH_MODULE', RABBIT_PATH_APPLICATION . DS . 'module');
define('RABBIT_PATH_CONFIG', RABBIT_PATH_APPLICATION . DS . 'config');
define('RABBIT_PATH_TEMP', RABBIT_PATH . DS . 'temp');

// Configurando Layout
define('RABBIT_LAYOUT_THEMES_PATH', RABBIT_PATH . DS . 'public' . DS . 'themes');
define('RABBIT_LAYOUT_THEME_DEFAULT', 'default');
define('RABBIT_LAYOUT_HTML_COMMON_URI', RABBIT_PATH . DS . 'public' . DS . 'commons' . DS . 'layout.common.phtml');

define('RABBIT_DOCTRINE_ISDEVMOD', true);

// Carregar o autoload
if (!file_exists('vendor/autoload.php'))
	throw new RuntimeException('Necessário a instalação do "composer"');

/** @var $load \Composer\Autoload\ClassLoader */
$load = include 'vendor/autoload.php';

// Registrando o Servico do Load
Rabbit\Service\ServiceLocator::registerInstance('Rabbit\Load', $load);

// Locale
date_default_timezone_set('America/Sao_Paulo');

/**
 * Função de auxilio
 */ 
function print_pre($var, $printType='print_r') {
	ob_start();
	$printType((is_string($var))? htmlentities($var) : $var);
	echo sprintf('<pre><code>%s</code></pre>', ob_get_clean());
};