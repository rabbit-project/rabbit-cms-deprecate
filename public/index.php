<?php
use Rabbit\Reflection\ReflectionUtil;
chdir(dirname(__DIR__));


require_once 'init.php';



use RabbitTest\Annotation\MyAnnotation;


try {
	
	Rabbit\Application\Front::getInstance()->run();
	
} catch (Exception $e) {
	echo "<h1>ERROR 500</h1>";
	echo "Error codigo: <strong>{$e->getCode()}</strong><br />";
	echo "Mensagem: {$e->getMessage()}<br />";
	echo "Printstack:<pre>{$e->getTraceAsString()}</pre>";
}