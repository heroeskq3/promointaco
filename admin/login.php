<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Login',
    'description' => '',
    'homedir'     => '../',
    'restrict'    => false,
    'navbar'      => false,
    'sidebar'     => false,
    'searchbar'   => false,
    'style'       => false,
    'debug'       => false,
);

require_once 'header.php';

switch ($action) {
    default:
        require_once PATH_VIEWS . '/login/login.php';
        break;
}

require_once 'footer.php';
