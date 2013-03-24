<?php
use Rabbit\Logger\LoggerType;

use Rabbit\Logger\LoggerManager;

chdir(dirname(__DIR__));

require_once 'init.php';

try {

	Rabbit\Application\Front::getInstance()->run();
	
} catch (Exception $e) {
	echo "<h1>ERROR</h1>";
	echo "Error codigo: <strong>{$e->getCode()}</strong><br />";
	echo "Mensagem: {$e->getMessage()}<br />";
	echo "Printstack:<pre>{$e->getTraceAsString()}</pre>";
}