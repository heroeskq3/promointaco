<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Areas de Trabajo',
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
        require_once '../class/views/survey/workareas/survey_workareasadd.php';
        require_once '../class/views/survey/workareas/survey_workareaslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/workareas/survey_workareasadd.php';
        require_once '../class/views/survey/workareas/survey_workareaslist.php';
        break;

    case 'update':
        require_once '../class/views/survey/workareas/survey_workareasupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/workareas/survey_workareasdelete.php';
        break;
}

require_once 'footer.php';
