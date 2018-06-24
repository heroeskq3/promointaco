<?php
if ($form_add) {
    class_surveyZonesAdd($ZonesId, $Name, $Details, $Image, $Status);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}
//Zones Info
$surveyzonesinfo     = class_surveyZonesInfo($Id);
$row_surveyzonesinfo = $surveyzonesinfo['response'][0];
if ($surveyzonesinfo['rows']) {
    $ZonesId = $row_surveyzonesinfo['ZonesId'];
}
//zones LANG_LIST
$surveyzoneslist = class_surveyZonesList($ZonesId);
$surveyzoneslist = $surveyzoneslist['response'];
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');

if ($surveyzoneslist['rows']) {
    $array_surveyzones = array();
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'selected' => $Id);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $Status);

//Form Generator
$formFields = array(
    'form_add'   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    LANG_ZONES   => array('addbutton' => null, 'placeholder' => LANG_NONE, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    LANG_NAME    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    LANG_DETAILS => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $Details),
    LANG_IMAGE   => array('addbutton' => null, 'placeholder' => 'flags', 'inputType' => 'upload', 'required' => true, 'position' => 1, 'name' => 'Image', 'value' => $Image),
    LANG_STATUS  => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'home', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_ADD,
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);
