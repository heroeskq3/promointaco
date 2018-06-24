<?php
//Section Parameters
$sectionParams = array(
    'section_tittle'      => "Preguntas",
    'section_description' => null,
    'section_restrict'    => 1,
    'section_navbar'      => 1,
    'section_sidebar'     => 1,
    'section_searchbar'   => 0,
    'section_style'       => 1,
    'section_homedir'     => null,
    'section_step'        => 5,
    'homedir'             => null,
);
require_once 'header.php';

//methods
switch ($action) {
    default:
        require_once 'class/views/survey/site/survey_questions.php';
        break;
}

require_once 'footer.php';
