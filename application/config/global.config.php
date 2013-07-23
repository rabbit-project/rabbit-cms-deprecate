<?php
use Rabbit\Logger\LoggerType;

return array(
	'moduleDefault'	=> 'application',
	'environment' 	=> 'production',
	'loggerManager'	=> array(
		'nivel'	 	=> LoggerType::get('DEBUG'),
		'active' 	=> true,
		'trace'  	=> true,
		'export'	=> array(
			'filePath'			=> RABBIT_PATH_TEMP . DS . 'logger',
			'fileName'			=> 'rabbit-cms.log',
			'maxSizeRotation'	=> 1024 * 2, // a cada 2MB ele rotaciona o arquivo
		)
	),
);