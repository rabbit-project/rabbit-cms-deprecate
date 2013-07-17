<?php
chdir(dirname(__DIR__));

require_once 'init.php';

try {

	Rabbit\Application\Front::getInstance()->run();


	$dao = new \Application\Namespaces\Main\Dao\UsuarioDao();
	/** @var \Application\Namespaces\Main\Entity\Usuario[] $user */
	$user = $dao->listAll(1);

	print_pre($user[0]->getNome());

	/*$paths = array(); #array(RABBIT_PATH_MODULE . '\Application\Namespaces\Main\Entity');

	$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, true);

	$dbParams = array(
		'driver'   => 'pdo_mysql',
		'user'     => 'root',
		'password' => '123',
		'dbname'   => 'test',
	);

	$evm = new \Doctrine\Common\EventManager;

	// Table Prefix
	$tablePrefix = new Rabbit\DoctrineExtensions\TablePrefix('');
	$evm->addEventListener(\Doctrine\ORM\Events::loadClassMetadata, $tablePrefix);

	$entityManager = \Doctrine\ORM\EntityManager::create($dbParams, $config, $evm);

	$rep = $entityManager->getRepository('Application\Namespaces\Main\Entity\Usuario');
	/** @var \Application\Namespaces\Main\Entity\Usuario $user /
	$user = $rep->find(1);
	print_pre($user->getNome());

	/*$tool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);

	$tool->updateSchema(array(
		$entityManager->getClassMetadata('Application\Namespaces\Main\Entity\Usuario')
	));*/

	//$usuario = $entityManager->getRepository('Usuario');

} catch (Exception $e) {
	echo "<h1>ERROR 500</h1>";
	echo "Error codigo: <strong>{$e->getCode()}</strong><br />";
	echo "Mensagem: {$e->getMessage()}<br />";
	echo "Printstack:<pre>{$e->getTraceAsString()}</pre>";
}