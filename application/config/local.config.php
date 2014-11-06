<?php
use Rabbit\Logger\LoggerType;
use Rabbit\Application\EnvironmentType;

return array(
    'environment' 	=> EnvironmentType::get(EnvironmentType::DEVELOPER),
	'loggerManager'	=> array(
		'nivel'	 	=> LoggerType::get(LoggerType::RABBIT),
		'active' 	=> true,
		'trace'  	=> true,
		'export'	=> array(
			'filePath'			=> RABBIT_PATH_TEMP . DS . 'logger',
			'fileName'			=>'rabbit-cms.log',
			'maxSizeRotation'	=> 1024 * 2, // a cada 2MB ele rotaciona o arquivo
		)
	),
);