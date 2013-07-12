<?php
namespace Application\Namespaces\Main\Dao;


use Rabbit\ORM\AbstractDao;

class UsuarioDao extends AbstractDao{

	protected $entityName = 'Application\Namespaces\Main\Entity\Usuario';

	public function __construct(){
		parent::__construct('dataSourceName');
	}


}