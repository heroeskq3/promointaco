<?php
if ($form_add) {
    class_surveyCaresAdd($ZonesId, $Name, $Status);
    header('Location: surveycares.php');
    die();
}
//zones List
$surveyzoneslist = class_surveyZonesList(null);
$surveyzoneslist = $surveyzoneslist['response'];
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');
$array_surveyzones = array();
if ($surveyzoneslist['rows']) {
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'image' => $row_surveyzoneslist['Image'], 'selected' => null);
    }
}
//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Form Generator
$formFields = array(
    'form_add' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Zones'   => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    'Name'     => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    'Status'   => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Home'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'index.php'),
);

//set params for form
$formParams = array(
    'name'    => 'Add New',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);
//TODO: aqui
class_formGenerator($formParams, $formFields, $formButtons);
