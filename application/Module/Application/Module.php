<?php
namespace Application;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class Module {
	
	public function routers() {
		return array (
			"Application\Usuario" => array(
				"uri" => "/usuario",
				"type" => "Rabbit\Routing\Mapping\Restful",
				"defaults" => array(
					"module" => "application",
					"namespace" => "usuario"
				),
			),
		);
	}
	
	public function getConfig() {
		return array(
			"services" => array(
				"Application\Rabbit\Index" => function () {
					return new \Application\Main\Controller\IndexController(new Request(), new Response());
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