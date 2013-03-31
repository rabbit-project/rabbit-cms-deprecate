<?php
namespace Application\Main\Controller;

use Rabbit\Service\ServiceLocator;

use Application\Main\Vo\UsuarioVo;

use Rabbit\View\View;

use Rabbit\Controller\AbstractController;

class TesteController extends AbstractController {
	
	/** @var UsuarioVo */
	private $myObjeto;
	
	public function indexAction() {
		return View::render(array("usuario"=>$this->myObjeto));
	}
	
	public function resultAction() {
		return View::render(array("usuario"=>$this->myObjeto));
	}
	
	public function getMyObjeto() {
		return $this->myObjeto;
	}
	
	public function setMyObjeto(UsuarioVo $usuario) {
		$this->myObjeto = $usuario;
	}
	
}