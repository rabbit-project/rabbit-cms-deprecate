<?php
namespace TemplateModule\Controller;

use Rabbit\Controller\AbstractController;
use Rabbit\Controller\Action;

class IndexController extends AbstractController {

    public function actionNameAction() {
        return Action::render();
    }

} 