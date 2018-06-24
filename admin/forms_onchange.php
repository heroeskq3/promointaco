<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Forms - OnChange',
    'description' => '',
    'homedir'     => '../',
    'restrict'    => true,
    'navbar'      => false,
    'sidebar'     => false,
    'searchbar'   => false,
    'style'       => false,
    'debug'       => false,
);

require_once 'header.php';

//methods
switch ($action) {
    default:
        require_once '../class/views/forms/forms_onchange.php';
        break;
}

require_once 'footer.php';