<?php
namespace Application\Controller;

use Rabbit\Application;
use Rabbit\Controller\AbstractController;
use Rabbit\Controller\Action;
use Rabbit\Logger\LoggerManager;
use Rabbit\Logger\LoggerType;
use Rabbit\Application\Module;
use Rabbit\View\View;

class IndexController extends AbstractController {
	
	public function indexAction(){

      /*  $module = new Module(new \SplFileInfo(RABBIT_PATH_MODULE . '\Application'));
        print_pre($module->getName()); exit;*/

		$arr = array("grupos"=>array(
			array("nome"=>"Editor"),
			array("nome"=>"Administrador"),
		));
		
		/*try{
			throw new \Exception("Teste");
		}catch (\Exception $e){
			LoggerManager::getInstance()->getLogger(get_class())->log("Aqui deu um erro num sei porque", LoggerType::get("DEBUG"), $e);
		}*/

		View::getHelper('url', 'joao');

		return Action::render($arr);
	}
	
	public function myFormAction() {
		print_pre($this->usuario);
		return Action::render(array('usuario'=>$this->usuario));
	}
	
	public function testeAction() {
		return Action::render(array('nome'=>'erick','grupo'=>'Administrador'), array(
			'accepts' => array('xml','html','json')
		));
	}

	public function artigoAction() {
		$conteudo =  sprintf('<pre>URLMap: %s<br />Titulo: %s<br />Id: %s<br />Formato: %s</pre>',
			htmlentities(Application\Front::getInstance()->getRouter()->getMapped()->getUrlMap()),
			$this->getRequest()->get('title'),
			$this->getRequest()->get('id'),
			$this->getRequest()->get('_format')
		);
        return Action::render(array('conteudo'=>$conteudo));
	}

	public function forwardAction() {
		return Action::forward(array(
			'controller' => 'teste',
			'action' 	 => 'index'
		));

		//Action::redirectTo(View::getHelper('baseUrl','index/teste'));
	}
}
