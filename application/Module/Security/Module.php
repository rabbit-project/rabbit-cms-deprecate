<?php
namespace Security;

use Application\Main\Controller\IndexController;
use Rabbit\Controller\AbstractController;
use Rabbit\Service\ServiceLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Module {
	
	public function getConfig() {
		return array(
			'listeners' => array(
				'Rabbit\Event\Controller\Start' => function(AbstractController $controler) {
					$controler->getRequest()->query->set('key','value');
				}
			)
		);
	}
	
}