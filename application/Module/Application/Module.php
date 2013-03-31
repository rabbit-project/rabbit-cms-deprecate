<?php
namespace Application;

use Application\Main\Controller\IndexController;
use Rabbit\Service\ServiceLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Module {
	
	public function getConfig() {
		return array(
			'services' => array(
				'Application\Rabbit\Index' => function () {
					return ServiceLocator::getService('Application\Main\Controller\IndexController');
				},
				'Application\Rabbit\Index2' => array(
					'fn' => function () {
						return new IndexController(new Request, new Response);
					},
					'unique' => true
				)
			),
			'plugins' => array(
                'Application\Plugin\MyPlugin'
            ),
            'events' => array(
                '' => array()
            ),
		);
	}
	
}