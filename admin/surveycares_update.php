<?php
//Section Parameters
$section_tittle      = "Cares";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';

require_once 'header.php';

if ($form_update) {
    class_surveyCaresUpdate($Id, $ZonesId, $Name, $Status);
    header('Location: surveycares.php');
    die();
}

if ($Id) {
    $surveycaresinfo     = class_surveyCaresInfo($Id);
    $row_surveycaresinfo = $surveycaresinfo['response'][0];
}

//zones List
$surveyzoneslist = class_surveyZonesList(null);
$array_surveyzones = array();
if ($surveyzoneslist['rows']) {
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'image' => $row_surveyzoneslist['Image'], 'selected' => $row_surveycaresinfo['ZonesId']);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_surveycaresinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_surveycaresinfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Zones'   => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    'Name'        => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveycaresinfo['Name']),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'surveycares.php'),
);

//set params for form
$formParams = array(
    'name'    => 'Edit',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);

require_once 'footer.php';