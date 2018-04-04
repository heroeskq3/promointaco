<?php
if ($form_update) {
    class_surveyZonesUpdate($Id, $ZonesId, $Name, $Details, $Image, $Status);
    header('Location: ' . $_SERVER['PHP_SELF'].'?Id='.$ZonesId);
    die();
}

//determine info zone
if ($Id) {
    $surveyzonesinfo     = class_surveyZonesInfo($Id);
    $row_surveyzonesinfo = $surveyzonesinfo['response'][0];

//determine paterns zone

    $surveycountryinfo     = class_surveyZonesInfo($row_surveyzonesinfo['ZonesId']);
    $row_surveycountryinfo = $surveycountryinfo['response'][0];
}
//zones LANG_LIST
$surveyzoneslist = class_surveyzonesList($row_surveycountryinfo['ZonesId']);
//class_debug($surveyzoneslist);
$surveyzoneslist = $surveyzoneslist['response'];
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');

if ($surveyzoneslist['rows']) {
    $array_surveyzones = array();
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'selected' => $row_surveyzonesinfo['ZonesId']);
    }
}
//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_surveyzonesinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_surveyzonesinfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_ZONES     => array('addbutton' => null, 'placeholder' => LANG_NONE, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    LANG_NAME        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveyzonesinfo['Name']),
    LANG_DETAILS     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_surveyzonesinfo['Details']),
    LANG_IMAGE       => array('addbutton' => null, 'placeholder' => 'flags', 'inputType' => 'upload', 'required' => false, 'position' => 1, 'name' => 'Image', 'value' => $row_surveyzonesinfo['Image']),
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
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);
