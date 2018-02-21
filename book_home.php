<?php
//Section Parameters
$section_tittle      = "Welcome";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$step                = 1;

require_once 'header.php';

$formFields = array(
    'form_add' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    'Next' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => 'Welcome',
    'action'  => 'book_search.php',
    'method'  => 'post',
    'enctype' => null,
);

class_formGenerator2($formParams, $formFields, $formButtons);

require_once 'footer.php';
