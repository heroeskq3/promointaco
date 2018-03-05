<?php
//Section Parameters
$section_tittle      = "Services";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';

require_once 'header.php';

//uppload files
if ($File['name']) {
    $upload = class_filesUpload($File, 'Image', 0);
    $Image  = $File['name'];
    //echo "<pre>";
    //print_r($File);
}

if ($form_update) {
    $surveyservicesupdate = class_surveyServicesUpdate($Id, $ZonesId, $Name, $Description, $Details, $Terms, $Image, $Status);
    header('Location: surveyservices.php');
    die();
}

if ($Id) {
    $surveyservicesinfo     = class_surveyservicesInfo($Id);
    $row_surveyservicesinfo = $surveyservicesinfo['response'][0];
}
//zones List
$surveyzoneslist = class_surveyZonesList(null);
$surveyzoneslist = $surveyzoneslist['response'];
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');

if ($surveyzoneslist['rows']) {
    $array_surveyzones = array();
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'selected' => $row_surveyservicesinfo['ZonesId']);
    }
}
//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_surveyservicesinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_surveyservicesinfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Zone'        => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    'Name'        => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveyservicesinfo['Name']),
    'Description' => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $row_surveyservicesinfo['Description']),
    'Details'     => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_surveyservicesinfo['Details']),
    'Terms'       => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Terms', 'value' => $row_surveyservicesinfo['Terms']),
    'Upload'      => array('inputType' => 'file', 'required' => false, 'position' => 1, 'name' => 'File', 'value' => null),
    'Image'       => array('inputType' => 'image', 'required' => false, 'position' => 1, 'name' => 'Image', 'value' => $row_surveyservicesinfo['Image']),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'surveyservices.php'),
);

//set params for form
$formParams = array(
    'name'    => 'Edit Services',
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);

require_once 'footer.php';
