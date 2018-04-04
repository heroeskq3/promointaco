<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Servicios',
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
        require_once '../class/views/survey/services/survey_servicesadd.php';
        require_once '../class/views/survey/services/survey_serviceslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/surveys/survey_surveysadd.php';
        require_once '../class/views/survey/surveys/survey_surveyslist.php';
        break;

    case 'surveys':
        header('Location: survey_surveys.php?Id='.$Id);
        break;

    case 'update':
        require_once '../class/views/survey/services/survey_servicesupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/services/survey_servicesdelete.php';
        break;
}

require_once 'footer.php';
