<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Respuestas',
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
        require_once '../class/views/survey/answers/survey_answersadd.php';
        require_once '../class/views/survey/answers/survey_answerslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/answers/survey_answersadd.php';
        require_once '../class/views/survey/answers/survey_answerslist.php';
        break;

    case 'update':
        require_once '../class/views/survey/answers/survey_answersupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/answers/survey_answersdelete.php';
        break;
}

require_once 'footer.php';
