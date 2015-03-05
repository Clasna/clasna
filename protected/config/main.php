<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Clasna - Интернет магазин одежды.',
	/*'sourceLanguage'=>'ru',*/
	'language'=>'ua',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'admin'=>array(
			    'layoutPath' => 'protected/modules/admin/views/layouts',
       			'layout' => 'main'
       	),
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'authManager' => array(
             // Будем использовать свой менеджер авторизации
            'class' => 'PhpAuthManager',
            // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
            'defaultRoles' => array('guest'),
                ),
		'user'=>array(
			'class' => 'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'phpThumb'=>array(
		    'class'=>'ext.EPhpThumb.EPhpThumb',
		    //'options'=>array(),
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'class'=>'UrlManager',
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'/admin/' => array('/admin/default/index'),
				'/admin/login' => array('/admin/default/login'),
                '/admin/logout' => array('/admin/default/logout'),
                '/admin/error' => array('/admin/default/error'),
                '/admin/index' => 'admin/index',

                /*'/product/<url:[a-zA-Z0-9_@.\-]+>' => '/product/',
                '/content/<url:[a-zA-Z0-9_@.\-]+>' => '/content/',
                '/catalog/<cat:[a-zA-Z0-9_@.\-]+>/' => '/catalog/',
                '/catalog/<url:[a-zA-Z0-9_@.\-]+>/' => '/catalog/',
                '/user/order/<order:[a-zA-Z0-9_@.\-]+>' => '/user/order/',
                '/user/active/<hash:[a-zA-Z0-9_@.\-]+>' => '/user/active/',

                'registration' => '/site/registration',
                'login' => '/site/login',
                'logout' => '/site/logout',*/
				'<language:(ua|ru|en)>/woman/' => array('site/woman'),
				'<language:(ua|ru|en)>/men/' => array('site/men'),
				'<language:(ua|ru|en)>/wholesale/' => array('site/wholesale'),
				'<language:(ua|ru|en)>/stores/' => array('site/stores'),
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<language:(ua|ru|en)>/blog/' => 'blog/index',
				'<language:(ua|ru|en)>/filter/<get:[a-zA-Z0-9_@.\-]+>/' => '/filter',
				'<language:(ua|ru|en)>/catalog/<url:[a-zA-Z0-9_@.\-]+>/' => '/catalog',
				'<language:(ua|ru|en)>/product/<url:[a-zA-Z0-9_@.\-]+>/' => '/product',
				'<language:(ua|ru|en)>/content/<url:[a-zA-Z0-9_@.\-]+>/' => '/content',
				'<language:(ua|ru|en)>/user/active/<hash:[a-zA-Z0-9_@.\-]+>' => '/user/active/',
				'<language:(ua|ru|en)>/user/registration/' => 'user/registration',
				'<language:(ua|ru|en)>/user/login/' => 'user/login',
				'<language:(ua|ru|en)>/user/recovery/' => 'user/recovery',
				'<language:(ua|ru|en)>/' => 'site/index',
				'<language:(ua|ru|en)>/basket/' => '/basket/shopping/',
				'<language:(ua|ru|en)>/basket/' => '/basket/address/',

			    '<language:(ua|ru|en)>/<action:(contact|login|logout)>' => 'site/<action>',

			    '<language:(ua|ru|en)>/<controller:\w+>/<id:\d+>'=>'<controller>/view',
			    '<language:(ua|ru|en)>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
			    '<language:(ua|ru|en)>/<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

			    '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>',
				'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
			),
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=clasna.mysql.ukraine.com.ua;dbname=clasna_db',
			'emulatePrepare' => true,
			'username' => 'clasna_db',
			'password' => 'ujsDwWZS',
			'charset' => 'utf8',
			'tablePrefix' => 'alex_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
        /*'translatedLanguages'=>array(
            'ua'=>'Ukraine',
            'ru'=>'Russian',
            'en'=>'English',
        ),
        'defaultLanguage'=>'ru',*/
		// this is used in contact page
		'adminEmail'=>'',
	),
);
