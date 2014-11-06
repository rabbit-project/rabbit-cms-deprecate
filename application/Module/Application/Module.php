<?php
namespace Application;

use Application\Main\Controller\IndexController;
use Rabbit\Application\Front;
use Rabbit\Service\ServiceLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Module {

    /**
     * @var \Composer\Autoload\ClassLoader
     */
    private $load;

    public function __construct(){
        $this->load = ServiceLocator::getService('Rabbit\Load');
    }

	public function getConfig() {
		return array(
			'services' => array(
				'Application\Rabbit\Index' => function () {
					return ServiceLocator::getService('Application\Main\Controller\IndexController');
				},
				'Application\Rabbit\Index2' => array(
					'fn' => function () {
						return new IndexController(new Request, new Response);
					},
					'unique' => true
				)
			),
			'plugins' => array(
                'Application\Plugin\MyPlugin'
            ),
            'listeners' => array(
                'Rabbit\Event\Front\MappingModuleDefault' => function (){

                    $this->load->add('Installer', RABBIT_PATH_MODULE);
                    $module = new \Rabbit\Application\Module(new \SplFileInfo(RABBIT_PATH_MODULE . '\Installer'));
                    Front::addModulePath($module);
                }
            ),
		);
	}
	
}