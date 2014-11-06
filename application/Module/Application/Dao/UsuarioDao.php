<?php
namespace Application\Dao;


use Rabbit\ORM\AbstractDao;

class UsuarioDao extends AbstractDao{

	protected $entity = 'Application\Entity\Usuario';

	public function __construct(){
		parent::__construct('dtLocal');
	}

}
