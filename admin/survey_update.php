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
if ($form_update) {
    $surveyupdate = class_surveyUpdate($Id, $ServicesId, $Name, $Details, $InputType, $Rows, $Order, $Status);
    header('Location: survey.php?Id=' . $ServicesId);
    die();
}

if ($Id) {
    $surveyinfo     = class_surveyInfo($Id);
    $row_surveyinfo = $surveyinfo['response'][0];
}

//services list
$surveyserviceslist = class_surveyServicesList();
$array_services     = array();
if ($surveyserviceslist['rows']) {
    foreach ($surveyserviceslist['response'] as $row_surveyserviceslist) {
        $array_services[] = array('label' => $row_surveyserviceslist['Name'], 'value' => $row_surveyserviceslist['Id'], 'selected' => $row_surveyinfo['ServicesId']);
    }
}

//Order List
$menu_order  = class_surveyList($row_surveyinfo['ServicesId']);
$array_order = array();
if ($menu_order['rows']) {
    foreach ($menu_order['response'] as $row_order) {
        $array_order[] = array('label' => '[Up] - ' . $row_order['Name'], 'value' => $row_order['Order'] - 1, 'selected' => $row_surveyinfo['Order']);
        $array_order[] = array('label' => '[Down] - ' . $row_order['Name'], 'value' => $row_order['Order'] + 1, 'selected' => $row_surveyinfo['Order']);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_surveyinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_surveyinfo['Status']);

//Input Type list
$array_inputtype   = array();
$array_inputtype[] = array('label' => 'Radio', 'value' => 'radio', 'selected' => $row_surveyinfo['InputType']);
$array_inputtype[] = array('label' => 'Text Area', 'value' => 'textarea', 'selected' => $row_surveyinfo['InputType']);

//Rows per Page list
$array_rowsperpage = array();
for ($i = 1; $i < 51; ++$i) {
    $array_rowsperpage[] = array('label' => $i, 'value' => $i, 'selected' => $row_surveyinfo['Rows']);
}

//Form Generator
$formFields = array(
    'form_update'        => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Service'            => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'ServicesId', 'value' => $array_services),
    'Name'               => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveyinfo['Name']),
    'Details'            => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_surveyinfo['Details']),
    'Input Type'         => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'InputType', 'value' => $array_inputtype),
    'Questions per Page' => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Rows', 'value' => $array_rowsperpage),
    'Order'              => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Order', 'value' => $array_order),
    'Status'             => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey.php?Id=' . $row_surveyinfo['ServicesId']),
);

//set params for form
$formParams = array(
    'name'    => 'Edit Survey',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
