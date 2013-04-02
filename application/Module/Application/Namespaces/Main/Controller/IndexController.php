<?php
namespace Application\Namespaces\Main\Controller;

use Rabbit\Application;
use Rabbit\Controller\AbstractController;
use Rabbit\Logger\LoggerManager;
use Rabbit\View\View;

class IndexController extends AbstractController {
	
	public function indexAction(){		
		$arr = array("grupos"=>array(
			array("nome"=>"Editor"),
			array("nome"=>"Administrador"),
		));
		
		/*try{
			throw new \Exception("Teste");
		}catch (\Exception $e){
			LoggerManager::getInstance()->getLogger(get_class())->log("Index Error", LoggerType::get("DEBUG"), $e);
		}*/

		View::getHelper('url');

		return View::render($arr);
	}
	
	public function myFormAction() {
		print_pre($this->usuario);
		return View::render(array('usuario'=>$this->usuario));
	}
	
	public function testeAction() {
		return View::render(array('nome'=>'erick','grupo'=>'Administrador'), array(
			'accepts' => array('xml','html','json')
		));
	}
	
}