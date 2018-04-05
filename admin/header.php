<?php
ob_start();

require_once $sectionParams['homedir'].'includes/config.php';

require_once PATH_INCLUDES . 'upload.php';
require_once PATH_INCLUDES . 'globals.php';
require_once PATH_INCLUDES . 'languages.php';

if ($sectionParams['restrict']) {
    require_once PATH_INCLUDES . 'restrict.php';
}

if ($sectionParams['debug']) {
    error_reporting(1); //php error & warning on/off
    set_error_handler("class_phpError"); //php debugger
}

//user info
if (isset($_SESSION['UserId'])) {
    $usersinfo     = class_usersInfo($_SESSION['UserId']);
    $row_usersinfo = $usersinfo['response'][0];

    $userstypeinfo     = class_UsersTypeInfo($row_usersinfo['TypeId']);
    $row_userstypeinfo = $userstypeinfo['response'][0];
}


	//html header
	require_once PATH_VIEWS . 'html/html.php';
if($sectionParams['style']){
	//wrapper
	require_once PATH_VIEWS . 'html/wrapper.php';

	//scripts
	require_once PATH_VIEWS . 'html/scripts.php';
}
?>


