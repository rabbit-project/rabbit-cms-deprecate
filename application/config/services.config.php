<?php
return array(
	'Rabbit\Service\Translator' => array(
		'fn' => function () {
			$locale = \Rabbit\Application\Front::getInstance()->getRequest()->getLocale();
			$tr = new \Symfony\Component\Translation\Translator($locale);
			$tr->addLoader('yml', new \Symfony\Component\Translation\Loader\YamlFileLoader());
			return $tr;
		},
		'unique' => true
	)
);