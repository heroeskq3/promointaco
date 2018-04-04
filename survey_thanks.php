<?php
//Section Parameters
$sectionParams = array(
    'section_tittle'      => "Gracias",
    'section_description' => null,
    'section_restrict'    => 1,
    'section_navbar'      => 1,
    'section_sidebar'     => 1,
    'section_searchbar'   => 0,
    'section_style'       => 1,
    'section_homedir'     => null,
    'section_step'        => 6,
    'homedir'             => null,
);
require_once 'header.php';

//methods
switch ($action) {
    default:
        require_once 'class/views/survey/site/survey_thanks.php';
        break;
}

require_once 'footer.php';
