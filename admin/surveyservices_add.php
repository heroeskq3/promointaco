<?php
//uppload files
if ($File['name']) {
    $upload = class_filesUpload($File, 'Image', 0);
    $Image  = $File['name'];
    //echo "<pre>";
    //print_r($File);
}

if ($form_add) {
    class_surveyServicesAdd($ZonesId, $Name, $Description, $Details, $Terms, $Image, $Status);
    header('Location: surveyservices.php');
    die();
}
//zones List
$surveyzoneslist = class_surveyZonesList(null);
$surveyzoneslist = $surveyzoneslist['response'];
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');

if ($surveyzoneslist['rows']) {
    $array_surveyzones = array();
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'selected' => null);
    }
}
//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Rows per Page list
$array_rowsperpage = array();
for ($i = 1; $i < 51; ++$i) {
    $array_rowsperpage[] = array('label' => $i, 'value' => $i, 'selected' => $Order);
}

//Form Generator
$formFields = array(
    'form_add'    => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Zone'        => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    'Name'        => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    'Description' => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $Description),
    'Details'     => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $Details),
    'Terms'       => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Terms', 'value' => $Terms),
    'Upload'      => array('inputType' => 'file', 'required' => false, 'position' => 1, 'name' => 'File', 'value' => null),
    'Image'       => array('inputType' => 'image', 'required' => false, 'position' => 1, 'name' => 'Image', 'value' => 'default.png'),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Home'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'index.php'),
);

//set params for form
$formParams = array(
    'name'    => 'New Services',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
