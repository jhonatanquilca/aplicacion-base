<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Aplicacion Base',
    'language' => 'es',
    //Uncoment if you have a theme on folder themes
//    'theme' => 'thin-admin',
    // preloading 'log' component
    'preload' => array(
        'log',
        'bootstrap'
    ),
    //Descomenta esta linea para tener un controlador por defecto
//    'defaultController' => 'module/controller/action',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.AweCrud.components.*', // AweCrud components
        'application.modules.cruge.components.*',
        'application.modules.cruge.extensions.crugemailer.*',
    ),
    'modules' => array(
// aqui pones tus modulos
        // uncomment the following to enable the Gii tool   
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'Enter Your Password Here',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'application.gii', // a path alias
                'bootstrap.gii',
                'application.gii.widget',
                'ext.AweCrud.generators',
            ),
        ),
        'cruge' => array(
            'tableprefix' => 'cruge_',
            // para que utilice a protected.modules.cruge.models.auth.CrugeAuthDefault.php
            //
				// en vez de 'default' pon 'authdemo' para que utilice el demo de autenticacion alterna
            // para saber mas lee documentacion de la clase modules/cruge/models/auth/AlternateAuthDemo.php
            //
            'availableAuthMethods' => array('default'),
            'availableAuthModes' => array('username', 'email'),
            // url base para los links de activacion de cuenta de usuario
            'baseUrl' => 'http://localhost',
            // NO OLVIDES PONER EN FALSE TRAS INSTALAR
            'debug' => false,
            'rbacSetupEnabled' => true,
            'allowUserAlways' => false,
            // MIENTRAS INSTALAS..PONLO EN: false
            // lee mas abajo respecto a 'Encriptando las claves'
            //
	    'useEncryptedPassword' => false,
            // Algoritmo de la función hash que deseas usar
            // Los valores admitidos están en: http://www.php.net/manual/en/function.hash-algos.php
            'hash' => 'md5',
            // Estos tres atributos controlan la redirección del usuario. Solo serán son usados si no
            // hay un filtro de sesion definido (el componente MiSesionCruge), es mejor usar un filtro.
            //  lee en la wiki acerca de:
            //   "CONTROL AVANZADO DE SESIONES Y EVENTOS DE AUTENTICACION Y SESION"
            //
				// ejemplo:
            //		'afterLoginUrl'=>array('/site/welcome'),  ( !!! no olvidar el slash inicial / )
            //		'afterLogoutUrl'=>array('/site/page','view'=>'about'),
            //
	    'afterLoginUrl' => null,
            'afterLogoutUrl' => null,
            'afterSessionExpiredUrl' => null,
            // manejo del layout con cruge.
            //
//            'loginLayout' => '//layouts/column2',
            'loginLayout' => '//layouts/login',
//            'registrationLayout' => '//layouts/column2',
            'registrationLayout' => '//layouts/message',
//            'activateAccountLayout' => '//layouts/column2',
            'activateAccountLayout' => '//layouts/message',
//            'editProfileLayout' => '//layouts/column2',
            'editProfileLayout' => '//layouts/column2',
            // en la siguiente puedes especificar el valor "ui" o "column2" para que use el layout
            // de fabrica, es basico pero funcional.  si pones otro valor considera que cruge
            // requerirá de un portlet para desplegar un menu con las opciones de administrador.
            //
            'generalUserManagementLayout' => 'ui',
            // permite indicar un array con los nombres de campos personalizados, 
            // incluyendo username y/o email para personalizar la respuesta de una consulta a: 
            // $usuario->getUserDescription(); 
            'userDescriptionFieldsArray' => array('email'),
            'superuserName' => 'admin',
        ),
    ),
    // application components
    'components' => array(
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
//            'ajaxCssImport' => false,
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'application.modules.cruge.components.CrugeWebUser',
            'loginUrl' => array('/cruge/ui/login'),
        ),
        'messages' => array(
            // 'class' => 'MessageSource',
            //'basePath'=>Yiibase::getPathOfAlias('application.messages'),
            'extensionPaths' => array(
                'AweCrud' => 'ext.AweCrud.messages', // AweCrud messages directory.
            ),
        ),
        // uncomment the following to enable URLs in path-format        
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            //false no muestrael nombre del archivo en url
            //Configura tambien el htaccces principal
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=testdrive',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
//            'errorAction' => 'site/error',
//            'errorAction' => '/modulo/controlador/accion',
//           @TODO cambiar esto es un jemplo
            'errorAction' => '/crm/dashboard/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'authManager' => array(
            'class' => 'application.modules.cruge.components.CrugeAuthManager',
        ),
        'crugemailer' => array(
            'class' => 'application.modules.cruge.components.CrugeMailer',
            'mailfrom' => 'email-desde-donde-quieres-enviar-los-mensajes@xxxx.com',
            'subjectprefix' => 'Bliblioteca CRM - ',
            'debug' => true,
        ),
        'format' => array(
            'datetimeFormat' => "d M, Y h:m:s a",
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
