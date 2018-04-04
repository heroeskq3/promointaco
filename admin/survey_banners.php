<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Banners',
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
        require_once '../class/views/survey/banners/survey_bannersadd.php';
        require_once '../class/views/survey/banners/survey_bannerslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/banners/survey_bannersadd.php';
        require_once '../class/views/survey/banners/survey_bannerslist.php';
        break;

    case 'update':
        require_once '../class/views/survey/banners/survey_bannersupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/banners/survey_bannersdelete.php';
        break;
}

require_once 'footer.php';