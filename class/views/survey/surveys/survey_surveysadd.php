<?php
if ($form_add) {
    $surveyadd = class_surveyAdd($ServicesId, $Name, $Description, $Details, $InputType, $InputImage, $Rows, $Order, $Status);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
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

//Order LANG_LIST
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
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $Status);

//Input Type list
$array_inputtype   = array();
$array_inputtype[] = array('label' => 'Radio', 'value' => 'radio', 'selected' => null);
$array_inputtype[] = array('label' => 'Check', 'value' => 'checkbox', 'selected' => null);
$array_inputtype[] = array('label' => 'Image Radio', 'value' => 'radio_img', 'selected' => null);
$array_inputtype[] = array('label' => 'Image Check', 'value' => 'check_img', 'selected' => null);
$array_inputtype[] = array('label' => 'Text Area', 'value' => 'textarea', 'selected' => null);

//Input Image
$array_inputimage   = array();
$array_inputimage[] = array('label' => 'None', 'value' => null, 'selected' => null);
$array_inputimage[] = array('label' => 'Gold-Star.J10.2k-300x300.png', 'value' => 'Gold-Star.J10.2k-300x300.png', 'selected' => null);

//Rows per Page list
$array_rowsperpage = array();
for ($i = 1; $i < 51; ++$i) {
    $array_rowsperpage[] = array('label' => $i, 'value' => $i, 'selected' => $Order);
}

//Form Generator
$formFields = array(
    'form_add'           => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    LANG_SERVICES        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'ServicesId', 'value' => $array_services),
    LANG_NAME            => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    LANG_DESCRIPTION     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $Description),
    LANG_DETAILS         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $Details),
    LANG_INPUTTYPE       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'InputType', 'value' => $array_inputtype),

    LANG_INPUTIMAGE           => array('addbutton' => null, 'placeholder' => 'surveys', 'inputType' => 'upload', 'required' => false, 'position' => 1, 'name' => 'InputImage', 'value' => $InputImage),

    LANG_QUESTIONPERPAGE => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Rows', 'value' => $array_rowsperpage),
    LANG_ORDER           => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Order', 'value' => $array_order),
    LANG_STATUS          => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey_services.php?Id=' . $row_surveyinfo['ServicesId']),
);

//set params for form
$formParams = array(
    'name'    => LANG_ADD,
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);
