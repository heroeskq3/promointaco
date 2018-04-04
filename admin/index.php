<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Home',
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
        echo "Welcome";
        break;
}

require_once 'footer.php';
