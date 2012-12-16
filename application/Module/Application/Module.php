<?php
namespace Application;

use Rabbit\Service\ServiceLocator;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class Module {
	
	public function getConfig() {
		return array(
			"services" => array(
				"Application\Rabbit\Index" => function () {
					return ServiceLocator::getService("Application\Main\Controller\IndexController");
				},
				"Application\Rabbit\Index2" => array(
					"fn" => function () {
						return new \Application\Main\Controller\IndexController(new Request(), new Response());
					},
					"unique" => true
				)
			)
		);
	}
	
}