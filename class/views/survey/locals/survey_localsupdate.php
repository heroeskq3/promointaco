    <?php
if ($form_update) {
    class_surveyLocalsUpdate($Id, $ZonesId, $Name, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

if ($Id) {
    $surveylocalsinfo     = class_surveyLocalsInfo($Id);
    $row_surveylocalsinfo = $surveylocalsinfo['response'][0];
}

//zones LANG_LIST
$surveyzoneslist = class_surveyZonesList(null);
$surveyzoneslist = $surveyzoneslist['response'];
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');

if ($surveyzoneslist['rows']) {
    $array_surveyzones = array();
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'image' => $row_surveyzoneslist['Image'], 'selected' => $row_surveylocalsinfo['ZonesId']);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_surveylocalsinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_surveylocalsinfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_ZONES   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'ZonesId', 'value' => $array_surveyzones),
    LANG_NAME        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_surveylocalsinfo['Name']),
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
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);