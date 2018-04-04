<?php
//restrict
if (!$_SESSION['ZonesId']) {
    header('Location: survey_home.php');
    die();
}
if ($button == "next") {
    header('Location: survey_terms.php');
    die();
}

if (isset($_POST['ServicesId'])) {
    $_SESSION['ServicesId'] = $_POST['ServicesId'];
    header('Location: survey_terms.php');
    die();
}
if ($button == 'next') {
    header('Location: index.php');
    die();
}

//Country Info
$surveyzonesinfo     = class_surveyZonesInfo($ZonesId);
$row_surveyzonesinfo = $surveyzonesinfo['response'][0];

//content
$formFields = array(
    null => array('placeholder' => null, 'inputType' => 'html', 'required' => false, 'position' => 1, 'name' => null, 'value' => $row_surveyzonesinfo['Details'], 'action' => null),
);

if ($ServicesId) {
    $buttondisabled = false;
} else {
    $buttondisabled = true;
}
// define buttons for form
$formButtons = null;

//set params for form
$formParams = array(
    'name'    => $row_surveyzonesinfo['Name'],
    'action'  => '',
    'method'  => '',
    'enctype' => '',
);

class_formGenerator2($formParams, $formFields, $formButtons);

//services list
$surveyserviceslist = class_surveyServicesList();
$surveyserviceslist = class_arrayFilter($surveyserviceslist['response'], 'Status', 1, '=');
$surveyserviceslist = class_arrayFilter($surveyserviceslist['response'], 'ZonesId', $ZonesId, 'all');


if ($surveyserviceslist['rows']) {
    $formWell = array();
    foreach ($surveyserviceslist['response'] as $row_surveyserviceslist) {
        $formWell[] = array('type' => 'submit', 'active' => $ServicesId, 'class' => null, 'label' => $row_surveyserviceslist['Name'], 'name' => 'ServicesId', 'details' => $row_surveyserviceslist['Description'], 'value' => $row_surveyserviceslist['Id'], 'position' => 3, 'action' => null);
    }
} else {
    $formWell = null;
}

if ($ServicesId) {
    $buttondisabled = false;
} else {
    $buttondisabled = true;
}
// define buttons for form
$formButtons = array(
    LANG_BTNPREVIOUS => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => 'null', 'value' => null, 'action' => 'survey_home.php'),
    LANG_BTNNEXT     => array('buttonType' => 'submit', 'disabled' => $buttondisabled, 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_SERVICE05,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_wellGenerator($formWell, $formParams, $formFields, $formButtons);
