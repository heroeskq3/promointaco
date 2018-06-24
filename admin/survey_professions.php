<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Profesiones',
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
        require_once '../class/views/survey/professions/survey_professionsadd.php';
        require_once '../class/views/survey/professions/survey_professionslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/professions/survey_professionsadd.php';
        require_once '../class/views/survey/professions/survey_professionslist.php';
        break;

    case 'update':
        require_once '../class/views/survey/professions/survey_professionsupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/professions/survey_professionsdelete.php';
        break;
}

require_once 'footer.php';
