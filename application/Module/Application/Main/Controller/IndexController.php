<?php
namespace Application\Main\Controller;

use Application\Main\Vo\UsuarioVo;

use Rabbit\Logger\LoggerType;

use Rabbit\Logger\LoggerManager;

use Rabbit\Application;
use Rabbit\View\View;
use Rabbit\Controller\AbstractController;

class IndexController extends AbstractController {
	
	public function indexAction(){		
		$arr = array("grupos"=>array(
			array("nome"=>"Editor"),
			array("nome"=>"Administrador"),
		));
		
		try{
			throw new \Exception("Teste");
		}catch (\Exception $e){
			LoggerManager::getInstance()->getLogger(get_class())->log("Index Error", LoggerType::get("DEBUG"), $e);
		}
		
		return new View($arr, array(
			"accepts" => array("xml","json","html","rss")
		));
	}
	
	public function myFormAction() {
		print_pre($this->usuario);
		return new View(array("usuario"=>$this->usuario));
	}
	
}