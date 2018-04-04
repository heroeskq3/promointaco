<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Asesores',
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
        require_once '../class/views/survey/cares/survey_caresadd.php';
        require_once '../class/views/survey/cares/survey_careslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/cares/survey_caresadd.php';
        require_once '../class/views/survey/cares/survey_careslist.php';
        break;

    case 'update':
        require_once '../class/views/survey/cares/survey_caresupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/cares/survey_caresdelete.php';
        break;
}

require_once 'footer.php';
