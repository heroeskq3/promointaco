<?php
//define config
define('CONFIG_FAVICON', 'favicon.ico');
define('CONFIG_IMAGEPROFILEDEFAULT', 'signup_male.png');

define('CONFIG_LANG', 'es'); //define default language
define('CONFIG_LOGOICON', 'logo-promointaco3.png');
define('CONFIG_LOGOHEADER', 'logo-promointaco.png');
define('CONFIG_LOGOHEADER2', 'logo-promointaco2.png');
define('CONFIG_LOGOHEADER3', 'logo-promointaco3.png');
define('CONFIG_LOGOFOOTER', null);
define('CONFIG_FOOTER', '© 2018 Todos los Derechos Reservados');
define('CONFIG_SUPPORTPHONE', '2222-0000');
define('CONFIG_SUPPORTEMAIL', 'info@promointaco.com');
define('CONFIG_LICENSEDUNDER', 'http://www.promointaco.com');

//DEFINE META
define('CONFIG_METATITTLE', 'INTACO');
define('CONFIG_METADESCRIPTION', 'Sin definir');
define('CONFIG_METAKEYWORDS', 'Si, Definir');

//MYSQL DEFINE ACCESS INFORMATION
define('CONFIG_MYSQLHOST', 'localhost');
define('CONFIG_MYSQLDB', 'promointaco');
define('CONFIG_MYSQLUSER', 'root');
define('CONFIG_MYSQLPASS', 'sk101080');
define('CONFIG_MYSQLPORT', ''); //Default 3306s
define('CONFIG_MYSQLCHARSET', 'utf8'); //Default 3306s

//FTP DEFINE ACCESS INFORMATION
define('FTP_HOST', '127.0.0.1');
define('FTP_USER', 'daemon');
define('FTP_PASS', 'sk101080');
define('FTP_PORT', '21'); //Default 21

//TIME ZONE
date_default_timezone_set('America/Costa_Rica');

//DEFINE PATH
define('PATH_HOME', $sectionParams['homedir']);
define('PATH_CONTROLLERS', PATH_HOME . 'class/controllers/');
define('PATH_MODELS', PATH_HOME . 'class/models/');
define('PATH_VIEWS', PATH_HOME . 'class/views/');
define('PATH_INCLUDES', PATH_HOME . 'includes/');
define('PATH_RESOURCES', PATH_HOME . 'resources/');
define('PATH_ASSETS', PATH_HOME . 'assets/');
define('PATH_VENDOR', PATH_HOME . 'assets/vendor/');
define('PATH_DIST', PATH_HOME . 'assets/dist/');
define('PATH_PROFILEPICTURE', PATH_HOME . 'resources/profile/');
define('PATH_LANG', PATH_HOME . 'lang/');

//DEFINE INCLUDES
require_once PATH_CONTROLLERS . 'controllers.php';
