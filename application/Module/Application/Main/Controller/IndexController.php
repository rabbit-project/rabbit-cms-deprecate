<?php
namespace Application\Main\Controller;

use Rabbit\Application;

use Rabbit\View;
use Rabbit\Controller\AbstractController;

class IndexController extends AbstractController {
	
	public function indexAction(){
		return new View(array("teste"=>"joao"));
	}
	
}