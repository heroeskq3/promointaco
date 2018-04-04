<?php
if ($form_update) {
    class_surveyBannersUpdate($Id, $ServicesId, $Name, $Description, $Image, $Target, $Url, $Position, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

if ($Id) {
    $surveybannersinfo     = class_surveyBannersInfo($Id);
    $row_surveybannersinfo = $surveybannersinfo['response'][0];
}

if ($row_surveybannersinfo['ServicesId']) {
    $surveyservicesinfo     = class_surveyServicesInfo($row_surveybannersinfo['ServicesId']);
    $row_surveyservicesinfo = $surveyservicesinfo['response'][0];
}

//zones
$zoneslist   = class_surveyZonesList(null);
$zoneslist   = class_arrayFilter($zoneslist['response'], 'Status', '1', '=');
$array_zones = array();
if ($zoneslist['rows']) {
    foreach ($zoneslist['response'] as $row_zoneslist) {
        $array_zones[] = array('label' => $row_zoneslist['Name'], 'value' => $row_zoneslist['Id'], 'selected' => $row_surveyservicesinfo['ZonesId']);
    }
}

//services
$serviceslist   = class_surveyServicesList();
$serviceslist   = class_arrayFilter($serviceslist['response'], 'Status', '1', '=');
$array_services = array();
if ($serviceslist['rows']) {
    foreach ($serviceslist['response'] as $row_serviceslist) {
        $array_services[] = array('patern' => $row_serviceslist['ZonesId'], 'label' => $row_serviceslist['Name'], 'value' => $row_serviceslist['Id'], 'selected' => $row_surveybannersinfo['ServicesId']);
    }
}

//targets
$array_targets   = array();
$array_targets[] = array('label' => '_blank', 'value' => '_blank', 'selected' => $row_surveybannersinfo['Target']);
$array_targets[] = array('label' => '_self', 'value' => '_self', 'selected' => $row_surveybannersinfo['Target']);
$array_targets[] = array('label' => '_parent', 'value' => '_parent', 'selected' => $row_surveybannersinfo['Target']);
$array_targets[] = array('label' => '_top', 'value' => '_top', 'selected' => $row_surveybannersinfo['Target']);

//positions
$array_positions   = array();
$array_positions[] = array('label' => LANG_TOP, 'value' => 'top', 'selected' => $row_surveybannersinfo['Position']);
$array_positions[] = array('label' => LANG_BOTTOM, 'value' => 'bottom', 'selected' => $row_surveybannersinfo['Position']);

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_surveybannersinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_surveybannersinfo['Status']);

//Form Generator
$formFields = array(
    'form_update'    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),

    //SELECT AJAX ONCHANGE
    LANG_COUNTRY     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select_onchange1', 'required' => true, 'position' => 2, 'name' => 'ZonesId', 'value' => $array_zones),
    LANG_SURVEYS     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select_onchange2', 'required' => true, 'position' => 2, 'name' => 'ServicesId', 'value' => $array_services),

    LANG_NAME        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveybannersinfo['Name']),
    LANG_DESCRIPTION => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $row_surveybannersinfo['Description']),

    //image upload
    LANG_IMAGE       => array('addbutton' => null, 'placeholder' => 'banners', 'inputType' => 'upload', 'required' => false, 'position' => 1, 'name' => 'Image', 'value' => $row_surveybannersinfo['Image']),

    LANG_TARGET      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Target', 'value' => $array_targets),
    LANG_URL         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Url', 'value' => $row_surveybannersinfo['Url']),
    LANG_POSITION    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Position', 'value' => $array_positions),
    LANG_STATUS      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
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
