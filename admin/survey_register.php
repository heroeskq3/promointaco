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
    'style'       => false,
    'debug'       => false,
);
require_once 'header.php';

$ZonesId = 4;

//methods
switch ($action) {
    default:
        require_once '../class/views/survey/site/survey_register.php';
        break;
}

require_once 'footer.php';
?>
<script src="../assets/js/jquery-1.11.1.min.js"></script>