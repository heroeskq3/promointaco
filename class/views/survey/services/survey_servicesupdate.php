<?php
if ($form_update) {
    $surveyservicesupdate = class_surveyServicesUpdate($Id, $ZonesId, $Name, $Description, $Details, $Terms, $FormId, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

if ($Id) {
    $surveyservicesinfo     = class_surveyservicesInfo($Id);
    $row_surveyservicesinfo = $surveyservicesinfo['response'][0];
}
//zones LANG_LIST
$surveyzoneslist = class_surveyZonesList(null);
$surveyzoneslist = $surveyzoneslist['response'];
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');

if ($surveyzoneslist['rows']) {
    $array_surveyzones = array();
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'selected' => $row_surveyservicesinfo['ZonesId']);
    }
}

//Forms list
$array_forms   = array();
$array_forms[] = array('label' => 'Formulario v1', 'value' => '1', 'selected' => $row_surveyservicesinfo['FormId']);
$array_forms[] = array('label' => 'Formulario v2', 'value' => '2', 'selected' => $row_surveyservicesinfo['FormId']);

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_surveyservicesinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_surveyservicesinfo['Status']);

//Form Generator
$formFields = array(
    'form_update'    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_ZONE        => array('addbutton' => null, 'placeholder' => LANG_ALL, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    LANG_NAME        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveyservicesinfo['Name']),
    LANG_DESCRIPTION => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $row_surveyservicesinfo['Description']),
    LANG_DETAILS     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_surveyservicesinfo['Details']),
    LANG_TERMS       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Terms', 'value' => $row_surveyservicesinfo['Terms']),
    'FORMID'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'FormId', 'value' => $array_forms),
    LANG_STATUS      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
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
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);
