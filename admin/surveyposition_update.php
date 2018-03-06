<?php
//Section Parameters
$section_tittle      = "Positions";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';

require_once 'header.php';

if ($form_update) {
    class_surveyPositionUpdate($Id, $ZonesId, $Name, $Status);
    header('Location: surveyposition.php');
    die();
}

if ($Id) {
    $surveypositioninfo     = class_surveyPositionInfo($Id);
    $row_surveypositioninfo = $surveypositioninfo['response'][0];
}

//zones List
$surveyzoneslist = class_surveyZonesList(null);
$surveyzoneslist = $surveyzoneslist['response'];
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');

if ($surveyzoneslist['rows']) {
    $array_surveyzones = array();
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'image' => $row_surveyzoneslist['Image'], 'selected' => $row_surveypositioninfo['ZonesId']);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_surveypositioninfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_surveypositioninfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Zones'   => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    'Name'        => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveypositioninfo['Name']),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'surveyposition.php'),
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