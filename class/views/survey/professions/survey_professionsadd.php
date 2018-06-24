<?php
if ($form_add) {
    $test = class_surveyProfessionsAdd($WorkareaId, $Name, $Status);

    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}
//Positions list
$surveyworkareaslist = class_surveyWorkareasList(null);
$surveyworkareaslist = $surveyworkareaslist['response'];
$surveyworkareaslist = class_arrayFilter($surveyworkareaslist, 'Status', '1', '=');

if ($surveyworkareaslist['rows']) {
    $array_surveyworkareas = array();
    foreach ($surveyworkareaslist['response'] as $row_surveyworkareaslist) {
        $array_surveyworkareas[] = array('label' => $row_surveyworkareaslist['Name'], 'value' => $row_surveyworkareaslist['Id'], 'image' => $row_surveyworkareaslist['Image'], 'selected' => $WorkareaId);
    }
}
//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $Status);

//Form Generator
$formFields = array(
    'form_add'   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    LANG_WORKAREA => array('addbutton' => null, 'placeholder' => LANG_ALL, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'WorkareaId', 'value' => $array_surveyworkareas),
    LANG_NAME    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    LANG_STATUS  => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_HOME   => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'home', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_ADD,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
