<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Profile',
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

switch ($action) {
    default:
    require_once '../class/views/profile/profile_update.php';
        break;
}

require_once 'footer.php';
