<?php
namespace Security;

use Application\Main\Controller\IndexController;
use Rabbit\Service\ServiceLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Module {
	
	public function getConfig() {
		return array( /***/ );
	}
	
}