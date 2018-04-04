<?php
//Section Parameters
$sectionParams = array(
    'tittle'      => 'Survey - Zonas',
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
        require_once '../class/views/survey/zones/survey_zonesadd.php';
        require_once '../class/views/survey/zones/survey_zoneslist.php';
        break;

    case 'add':
        require_once '../class/views/survey/zones/survey_zonesadd.php';
        require_once '../class/views/survey/zones/survey_zoneslist.php';
        break;

    case 'update':
        require_once '../class/views/survey/zones/survey_zonesupdate.php';
        break;

    case 'delete':
        require_once '../class/views/survey/zones/survey_zonesdelete.php';
        break;
}

require_once 'footer.php';
