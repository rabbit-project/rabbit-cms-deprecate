<?php
namespace Security\Namespaces\Main\Controller;

use Application\Namespaces\Main\Business\ApplicationBusiness;
use Rabbit\Acl\AclManager;
use Rabbit\Acl\Actor;
use Rabbit\Controller\AbstractController;

class IndexController extends AbstractController{

	public function indexAction() {
		// recurso
		$resources = array(
			array(
				'id_resource' => '1',
				'actions' => array(
					array('action'=>'create:topic', 'description'=>'criação de topicos'),
					array('action'=>'read:topic',   'description'=>'ler topico'),
					array('action'=>'update:topic', 'description'=>'atualizar topico'),
					array('action'=>'delete:topic', 'description'=>'deletar topico'),
					array('action'=>'reply:topic',  'description'=>'responder topico')
				),
				'name' => 'board\forum\ext4.0'
			)
		);

		// perfil
		$actors = array(
			array('id_actor'=>1, 'name'=>'guest'),
			array('id_actor'=>2, 'name'=>'moderador', 'parents'=>array('guest')),
			array('id_actor'=>3, 'name'=>'administrador')
		);

		// permissão
		$permissions = array(
			array(
				'actor'=>'guest',
				'resource'=>'board\forum\ext4.0',
				'actions' => array('read:topic')
			),
			array(
				'actor'=>'moderador',
				'resource'=>'board\forum\ext4.0',
				'actions' => array('update:topic','delete:topic','reply:topic')
			),
			array(
				'actor'=>'administrador',
				'resource'=>'board\forum\ext4.0',
				'actions' => array()
			)
		);

		// montando ACL
		foreach($resources as $resource){
			$res = AclManager::createResource($resource['name']);

			// montando as ações
			foreach($resource['actions'] as $action)
				$res->addAction($action['action']);

			// montando actors / permission
			foreach($actors as $actor){
				
				$actor = new Actor($actor['name'], null, (isset($actor['parents'])? $actor['parents'] : array()));

				// monta permissão
				foreach($permissions as $permission){
					if($permission['resource'] != $resource['name'])
						continue;

					if($permission['actor'] == $actor)
						$res->addGrantPermission($actor, $permission['actions']);
				}
			}
		}

		// verificando permissão
		echo (AclManager::hasGrant('administrador', 'update:topic', 'board\forum\ext4.0'))? 'Administrador pode Editar Tópico<br />' : 'Administrador não pode Editar Tópico - Permissão Negado<br />';
		echo (AclManager::hasGrant('guest', 'update:topic', 'board\forum\ext4.0'))? 'Guest pode Editar Tópico<br />' : 'Guest não pode Editar Tópico - Permissão Negado<br />';
		echo (AclManager::hasGrant('moderador', 'read:topic', 'board\forum\ext4.0'))? 'Moderador pode Ler Tópico<br />' : 'Moderador não pode Ler Tópico - Permissão Negado<br />';

		$ap = new ApplicationBusiness();
		$ap->teste();
	}

	public function loginAction() {

	}

}