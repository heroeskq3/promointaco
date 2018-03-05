<?php
//Section Parameters
$section_tittle      = "Zones";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';

require_once 'header.php';

if ($form_update) {
    $surveyservicesupdate = class_surveyZonesUpdate($Id, $ZonesId, $Name, $Details, $Image, $Status);
    header('Location: surveyzones.php?Id='.$ZonesId);
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
//zones List
$surveyzoneslist   = class_surveyzonesList($row_surveycountryinfo['ZonesId']);
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
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_surveyzonesinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_surveyzonesinfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'ZonesId'     => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    'Name'        => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveyzonesinfo['Name']),
    'Details'     => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_surveyzonesinfo['Details']),
    'Image'       => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Image', 'value' => $row_surveyzonesinfo['Image']),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'surveyzones.php'),
);

//set params for form
$formParams = array(
    'name'    => 'Edit Zones',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);

require_once 'footer.php';
