<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$db = include_once("database.php");
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'jiliansai',
	'language'=>'zh_cn',
	// preloading 'log' component
	// 'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'application.helpers.*',
		// 'ext.easyimage.EasyImage',
	),


	'defaultController'=>'index',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
     
		),
		'easyImage'=>array(
			'class' => 'application.extensions.easyimage.EasyImage',
		),
		// uncomment the following to use a MySQL database
		/*'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=tengtong',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			// 'tablePrefix' => 'tbl_',
		),*/
		'db'=>$db,
		// 'errorHandler'=>array(
		// 	// use 'site/error' action to display errors
		// 	'errorAction'=>'site/error',
		// ),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'urlSuffix'=>'.html',
			'rules'=>array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//				'login'=>'passport/login',
//				'logout'=>'passport/logout',

				// 'sys'=>'sys/main',
				// 'fabu'=>'passport/poster/loc/fabu',

			),
		),
		// 'log'=>array(
		// 	'class'=>'CLogRouter',
		// 	'routes'=>array(
		// 		array(
		// 			'class'=>'CFileLogRoute',
		// 			'levels'=>'error, warning',
		// 		),
		// 		// uncomment the following to show log messages on web pages
		// 		/*
		// 		array(
		// 			'class'=>'CWebLogRoute',
		// 		),
		// 		*/
		// 	),
		// ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	// 'params'=>require(dirname(__FILE__).'/params.php'),
);
