<?php
//Section Parameters
$sectionParams = array(
    'section_tittle'      => "Registro",
    'section_description' => null,
    'section_restrict'    => 1,
    'section_navbar'      => 1,
    'section_sidebar'     => 1,
    'section_searchbar'   => 0,
    'section_style'       => 1,
    'section_homedir'     => null,
    'section_step'        => 4,
    'homedir'             => null,
);
require_once 'header.php';

//methods
switch ($_SESSION['FormId']) {
    case 1:
        require_once 'class/views/survey/site/survey_register.php';
        break;
    case 2:
        require_once 'class/views/survey/site/survey_register_v2.php';
        break;
}

require_once 'footer.php';
