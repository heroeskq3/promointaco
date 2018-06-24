<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Preguntas',
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
        require_once '../class/views/survey/questions/survey_questionsadd.php';
        require_once '../class/views/survey/questions/survey_questionslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/questions/survey_questionsadd.php';
        require_once '../class/views/survey/questions/survey_questionslist.php';
        break;

    case 'answers':
        header('Location: survey_answers.php?Id='.$Id);
        break;

    case 'update':
        require_once '../class/views/survey/questions/survey_questionsupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/questions/survey_questionsdelete.php';
        break;
}

require_once 'footer.php';
