<?php
namespace Application\Plugin;

use Rabbit\Application\Front;
use Rabbit\Application\PluginInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MyPlugin implements PluginInterface {
	
	/** @var Request **/
	private $_request;
	
	/** @var Response **/
	private $_response;
	
	public function __construct(Request $request, Response $response) {
		$this->_request = $request;
		$this->_response = $response;
	}
	
	public function execute() {
	}
	
}