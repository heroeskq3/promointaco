<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Encuestas',
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
        require_once '../class/views/survey/surveys/survey_surveysadd.php';
        require_once '../class/views/survey/surveys/survey_surveyslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/surveys/survey_surveysadd.php';
        require_once '../class/views/survey/surveys/survey_surveyslist.php';
        break;

    case 'questions':
        header('Location: survey_questions.php?Id='.$Id);
        break;

    case 'update':
        require_once '../class/views/survey/surveys/survey_surveysupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/surveys/survey_surveysdelete.php';
        break;
}

require_once 'footer.php';
