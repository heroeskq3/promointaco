<?php
//Section Parameters
$section_tittle      = "Surveys";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$section_step        = 2;

require_once 'header.php';

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
if ($button == 'previous') {
    header('Location: index.php');
    die();
}

//Country Info
$surveyzonesinfo     = class_surveyZonesInfo($ZonesId);
$row_surveyzonesinfo = $surveyzonesinfo['response'][0];

//content
$formFields = array(
    null => array('inputType' => 'html', 'required' => false, 'position' => 1, 'name' => null, 'value' => $row_surveyzonesinfo['Details'], 'action' => null),
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

//Country list
function class_surveyservices($Country, $SurveyId)
{
    $array_surveyserviceslist   = array();
    $array_surveyserviceslist[] = array('label' => $row_surveyserviceslist['Name'], 'value' => $row_surveyserviceslist['Id'], 'selected' => $SurveyId);
    return class_formInput('select', 'SurveyId', 'Select Survey', $array_surveyserviceslist, 'required');
}

//Services List - // define buttons for form
$surveyserviceslist = class_surveyServicesList();

//filter by status
$surveyserviceslist = $surveyserviceslist['response'];
$surveyserviceslist = class_arrayFilter($surveyserviceslist, 'Status', '1', '=');

//filter by zones
$surveyserviceslist = $surveyserviceslist['response'];
$surveyserviceslist = class_arrayFilter($surveyserviceslist, 'ZonesId', $ZonesId, 'all');

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
    'Previous' => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => 'null', 'value' => null, 'action' => 'survey_home.php'),
    'Next'     => array('buttonType' => 'submit', 'disabled' => $buttondisabled, 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => 'Encuestas disponibles:',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_wellGenerator($formWell, $formParams, $formFields, $formButtons);

require_once 'footer.php';
