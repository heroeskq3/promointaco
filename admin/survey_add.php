<?php
//Section Parameters
$section_tittle      = "Survey";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';
?>
<?php require_once 'header.php';?>
<?php
if ($form_add) {
    $surveyadd = class_surveyAdd($Name, $Details, $Rows, $Status);
    header('Location: survey_list.php');
    die();
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Rows per Page list
$array_rowsperpage = array();
for ($i = 1; $i < 51; ++$i) {
    $array_rowsperpage[] = array('label' => $i, 'value' => $i, 'selected' => $Order);
}

//Form Generator
$formFields = array(
    'form_add'           => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Name'               => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    'Details'            => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $Details),
    'Questions per Page' => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Rows', 'value' => $array_rowsperpage),
    'Status'             => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey_list.php'),
);

//set params for form
$formParams = array(
    'name'    => 'New Survey',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
