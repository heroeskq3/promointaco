<?php
if ($form_add) {
    class_surveyBannersAdd($ServicesId, $Name, $Description, $Image, $Target, $Url, $Position, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

//zones
$zoneslist   = class_surveyZonesList(null);
$zoneslist   = class_arrayFilter($zoneslist['response'], 'Status', '1', '=');
$array_zones = array();
if ($zoneslist['rows']) {
    foreach ($zoneslist['response'] as $row_zoneslist) {
        $array_zones[] = array('label' => $row_zoneslist['Name'], 'value' => $row_zoneslist['Id'], 'selected' => $ZonesId);
    }
}

//services
$serviceslist   = class_surveyServicesList();
$serviceslist   = class_arrayFilter($serviceslist['response'], 'Status', '1', '=');
$array_services = array();
if ($serviceslist['rows']) {
    foreach ($serviceslist['response'] as $row_serviceslist) {
        $array_services[] = array('patern' => $row_serviceslist['ZonesId'], 'label' => $row_serviceslist['Name'], 'value' => $row_serviceslist['Id'], 'selected' => $ServicesId);
    }
}

//targets
$array_targets   = array();
$array_targets[] = array('label' => '_blank', 'value' => '_blank', 'selected' => $Target);
$array_targets[] = array('label' => '_self', 'value' => '_self', 'selected' => $Target);
$array_targets[] = array('label' => '_parent', 'value' => '_parent', 'selected' => $Target);
$array_targets[] = array('label' => '_top', 'value' => '_top', 'selected' => $Target);

//positions
$array_positions   = array();
$array_positions[] = array('label' => LANG_TOP, 'value' => 'top', 'selected' => $Position);
$array_positions[] = array('label' => LANG_BOTTOM, 'value' => 'bottom', 'selected' => $Position);

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $Status);

//Form Generator
$formFields = array(
    'form_add'       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),

    //SELECT AJAX ONCHANGE
    LANG_COUNTRY     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select_onchange1', 'required' => true, 'position' => 2, 'name' => 'ZonesId', 'value' => $array_zones),
    LANG_SURVEYS     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select_onchange2', 'required' => true, 'position' => 2, 'name' => 'ServicesId', 'value' => $array_services),

    LANG_NAME        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    LANG_DESCRIPTION => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $Description),
    LANG_IMAGE       => array('addbutton' => null, 'placeholder' => 'banners', 'inputType' => 'upload', 'required' => true, 'position' => 1, 'name' => 'Image', 'value' => $Image),
    LANG_TARGET      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Target', 'value' => $array_targets),
    LANG_URL         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Url', 'value' => $Url),
    LANG_POSITION    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Position', 'value' => $array_positions),
    LANG_STATUS      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
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
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);
