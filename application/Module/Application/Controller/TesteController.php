<?php
namespace Application\Controller;

use Rabbit\Controller\Action;
use Rabbit\Service\ServiceLocator;

use Application\Namespaces\Main\Vo\UsuarioVo;

use Rabbit\View\View;

use Rabbit\Controller\AbstractController;

class TesteController extends AbstractController {
	
	/** @var UsuarioVo */
	private $usuario;
	
	public function indexAction() {
		print_pre($this->usuario);
		return Action::render(array("usuario"=>$this->usuario));
	}
	
	public function resultAction() {
		return Action::render(array("usuario"=>$this->usuario));
	}
	
	public function getUsuario() {
		return $this->usuario;
	}
	
	public function setUsuario(UsuarioVo $usuario) {
		$this->usuario = $usuario;
	}
	
}