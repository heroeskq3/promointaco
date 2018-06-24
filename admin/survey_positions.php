<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Puestos',
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
        require_once '../class/views/survey/positions/survey_positionsadd.php';
        require_once '../class/views/survey/positions/survey_positionslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/positions/survey_positionsadd.php';
        require_once '../class/views/survey/positions/survey_positionslist.php';
        break;

    case 'update':
        require_once '../class/views/survey/positions/survey_positionsupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/positions/survey_positionsdelete.php';
        break;
}

require_once 'footer.php';
