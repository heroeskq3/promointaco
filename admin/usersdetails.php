<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Users Info Manager',
    'description' => '',
    'homedir'     => '../',
    'restrict'    => true,
    'navbar'      => true,
    'sidebar'     => true,
    'searchbar'   => false,
    'style'       => true,
    'debug'       => false,
);
require_once 'header.php';

//methods
switch ($action) {
    
    default:
        require_once '../class/views/usersdetails/usersdetails_add.php';
        require_once '../class/views/usersdetails/usersdetails_list.php';
        break;

    case 'add':
        require_once '../class/views/usersdetails/usersdetails_add.php';
        require_once '../class/views/usersdetails/usersdetails_list.php';
        break;

    case 'update':
        require_once '../class/views/usersdetails/usersdetails_update.php';
        break;

    case 'delete':
        require_once '../class/views/usersdetails/usersdetails_delete.php';
        break;     
}

require_once 'footer.php';
