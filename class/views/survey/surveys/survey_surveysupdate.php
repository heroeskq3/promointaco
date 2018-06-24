<?php
if ($form_update) {
    $surveyupdate = class_surveyUpdate($Id, $ServicesId, $Name, $Description, $Details, $InputType, $InputImage, $InputHover, $Rows, $Order, $Status);
    header('Location: ' . $_SERVER['PHP_SELF'] . '?Id=' . $ServicesId);
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

//Order LANG_LIST
$menu_order  = class_surveyList($row_surveyinfo['ServicesId']);
$array_order = array();
if ($menu_order['rows']) {
    $i = 1;
    foreach ($menu_order['response'] as $row_order) {
        $pos = $i++;

        $array_order[] = array('label' => '[Pos] - ' . $pos, 'value' => $pos, 'selected' => $row_surveyinfo['Order']);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_surveyinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_surveyinfo['Status']);

//Input Type list
$array_inputtype   = array();
$array_inputtype[] = array('label' => 'Radio', 'value' => 'radio', 'selected' => $row_surveyinfo['InputType']);
$array_inputtype[] = array('label' => 'Check', 'value' => 'checkbox', 'selected' => $row_surveyinfo['InputType']);
$array_inputtype[] = array('label' => 'Image Radio', 'value' => 'radio_img', 'selected' => $row_surveyinfo['InputType']);
$array_inputtype[] = array('label' => 'Image Check', 'value' => 'check_img', 'selected' => $row_surveyinfo['InputType']);
$array_inputtype[] = array('label' => 'Text Area', 'value' => 'textarea', 'selected' => $row_surveyinfo['InputType']);

//Rows per Page list
$array_rowsperpage = array();
for ($i = 1; $i < 51; ++$i) {
    $array_rowsperpage[] = array('label' => $i, 'value' => $i, 'selected' => $row_surveyinfo['Rows']);
}

//Form Generator
$formFields = array(
    'form_update'        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_SERVICES        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'ServicesId', 'value' => $array_services),
    LANG_NAME            => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveyinfo['Name']),
    LANG_DESCRIPTION     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $row_surveyinfo['Description']),
    LANG_DETAILS         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_surveyinfo['Details']),
    LANG_INPUTTYPE       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'InputType', 'value' => $array_inputtype),

    LANG_INPUTIMAGE      => array('addbutton' => null, 'placeholder' => 'surveys', 'inputType' => 'upload', 'required' => false, 'position' => 1, 'name' => 'InputImage', 'value' => $row_surveyinfo['InputImage']),
    LANG_INPUTHOVER      => array('addbutton' => null, 'placeholder' => 'surveys', 'inputType' => 'upload', 'required' => false, 'position' => 1, 'name' => 'InputHover', 'value' => $row_surveyinfo['InputHover']),

    LANG_QUESTIONPERPAGE => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Rows', 'value' => $array_rowsperpage),
    LANG_ORDER           => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Order', 'value' => $array_order),
    LANG_STATUS          => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'back', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_EDIT,
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);
