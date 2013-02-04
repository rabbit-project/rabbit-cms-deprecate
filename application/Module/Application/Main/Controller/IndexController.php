<?php
namespace Application\Main\Controller;

use Rabbit\Application;
use Rabbit\View\View;
use Rabbit\Controller\AbstractController;

class IndexController extends AbstractController {
	
	public function indexAction(){
		$arr = array("grupos"=>array(
			array("nome"=>"Editor"),
			array("nome"=>"Administrador"),
		));
		
		return new View($arr, array(
			"accepts" => array("xml","json","html","rss")
		));
	}
	
}