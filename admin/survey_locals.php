<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Locales',
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
        require_once '../class/views/survey/locals/survey_localsadd.php';
        require_once '../class/views/survey/locals/survey_localslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/locals/survey_localsadd.php';
        require_once '../class/views/survey/locals/survey_localslist.php';
        break;

    case 'update':
        require_once '../class/views/survey/locals/survey_localsupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/locals/survey_localsdelete.php';
        break;
}

require_once 'footer.php';
