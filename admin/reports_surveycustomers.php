<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Informe de Clientes',
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
        require_once '../class/views/reports/survey/survey_customers.php';
        break;
}

require_once 'footer.php';
