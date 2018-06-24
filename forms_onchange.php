<?php
//Section Parameters
$sectionParams = array(
    'section_tittle'      => "Registro",
    'section_description' => null,
    'section_restrict'    => false,
    'section_navbar'      => false,
    'section_sidebar'     => false,
    'section_searchbar'   => false,
    'section_style'       => false,
    'section_homedir'     => null,
    'section_step'        => 4,
    'homedir'             => null,
);

require_once 'header.php';

//methods
switch ($action) {
    default:
        require_once 'class/views/forms/forms_onchange.php';
        break;
}

require_once 'footer.php';