<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Menu Manager',
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
        require_once '../class/views/menu/menu_add.php';
        require_once '../class/views/menu/menu_list.php';
        break;

    case 'add':
        require_once '../class/views/menu/menu_add.php';
        require_once '../class/views/menu/menu_list.php';
        break;

    case 'update':
        require_once '../class/views/menu/menu_update.php';
        break;

    case 'delete':
        require_once '../class/views/menu/menu_delete.php';
        break;

    case 'icons':
        require_once '../class/views/menu/menu_icons.php';
        break;
        
}

require_once 'footer.php';
