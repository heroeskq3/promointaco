<?php
if ($form_update) {
    class_surveyProfessionsUpdate($Id, $WorkareaId, $Name, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

if ($Id) {
    $surveypositioninfo     = class_surveyProfessionsInfo($Id);
    $row_surveypositioninfo = $surveypositioninfo['response'][0];
}

//zones LANG_LIST
$surveyworkareaslist = class_surveyworkareasList(null);
$surveyworkareaslist = $surveyworkareaslist['response'];
$surveyworkareaslist = class_arrayFilter($surveyworkareaslist, 'Status', '1', '=');

if ($surveyworkareaslist['rows']) {
    $array_surveyworkareas = array();
    foreach ($surveyworkareaslist['response'] as $row_surveyworkareaslist) {
        $array_surveyworkareas[] = array('label' => $row_surveyworkareaslist['Name'], 'value' => $row_surveyworkareaslist['Id'], 'image' => $row_surveyworkareaslist['Image'], 'selected' => $row_surveypositioninfo['WorkareaId']);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_surveypositioninfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_surveypositioninfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_WORKAREA       => array('addbutton' => null, 'placeholder' => LANG_ALL, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'WorkareaId', 'value' => $array_surveyworkareas),
    LANG_NAME        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveypositioninfo['Name']),
    LANG_STATUS      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'home', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_EDIT,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
