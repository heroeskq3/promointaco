<?php
ini_set('memory_limit', '9999M');
//ini_set('max_execution_time', 300); //5 minutes

//Section Parameters
$sectionParams = array(
    'tittle'      => 'Informe de Encuestas',
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
        require_once '../class/views/reports/survey/survey_answers.php';
        break;
}

require_once 'footer.php';
