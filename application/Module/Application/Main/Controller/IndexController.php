<?php
namespace Application\Main\Controller;

use Rabbit\Application;
use Rabbit\View\View;
use Rabbit\Controller\AbstractController;

class IndexController extends AbstractController {
	
	public function indexAction(){
		return new View();
	}
	
}