<?php
if ($form_add) {
    $surveyadd = class_surveyAdd($ServicesId, $Name, $Details, $InputType, $Rows, $Order, $Status);
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
        $array_services[] = array('label' => $row_surveyserviceslist['Name'], 'value' => $row_surveyserviceslist['Id'], 'selected' => $Id);
    }
}

//Order List
$menu_order  = class_surveyList($Id);
$array_order = array();
if ($menu_order['rows']) {
    foreach ($menu_order['response'] as $row_order) {
        $array_order[] = array('label' => '[Up] - ' . $row_order['Name'], 'value' => $row_order['Order'] - 1, 'selected' => null);
        $array_order[] = array('label' => '[Down] - ' . $row_order['Name'], 'value' => $row_order['Order'] + 1, 'selected' => null);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Input Type list
$array_inputtype   = array();
$array_inputtype[] = array('label' => 'Radio', 'value' => 'radio', 'selected' => null);
$array_inputtype[] = array('label' => 'Text Area', 'value' => 'textarea', 'selected' => null);

//Rows per Page list
$array_rowsperpage = array();
for ($i = 1; $i < 51; ++$i) {
    $array_rowsperpage[] = array('label' => $i, 'value' => $i, 'selected' => $Order);
}

//Form Generator
$formFields = array(
    'form_add'           => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Service'            => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'ServicesId', 'value' => $array_services),
    'Name'               => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    'Details'            => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $Details),
    'Input Type'         => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'InputType', 'value' => $array_inputtype),
    'Questions per Page' => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Rows', 'value' => $array_rowsperpage),
    'Order'              => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Order', 'value' => $array_order),
    'Status'             => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'surveyservices.php'),
);

//set params for form
$formParams = array(
    'name'    => 'New Survey',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
