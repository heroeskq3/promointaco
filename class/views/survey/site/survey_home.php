<?php
if ($Id) {

    session_unset(); //destroy all sessions
    session_regenerate_id(); //regenerate new session id

    $_SESSION['ZonesId'] = $Id;
    header('Location: survey_services.php');
    die();
}
if ($button == "next") {
    header('Location: survey_services.php');
    die();
}
?>
    <h3><?php echo LANG_HOME01; ?></h3>
    <p><?php echo LANG_HOME02; ?></p>
    <h5><strong><?php echo LANG_HOME03; ?></strong></h5>
    <ul class="list-unstyled">
        <li><?php echo LANG_HOME04; ?></li>
        <li><?php echo LANG_HOME05; ?></li>
        <li><?php echo LANG_HOME06; ?></li>
    </ul>
<?php
//zones LANG_LIST
$surveyzoneslist = class_surveyzonesList(null);
$surveyzoneslist = $surveyzoneslist['response'];

//echo "<pre>";
//print_r($surveyzoneslist);
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');

$array_surveyzones = array();
if ($surveyzoneslist['rows']) {
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'image' => $row_surveyzoneslist['Image'], 'selected' => $ZonesId);
    }
}

$formFields = array(
    null => array('placeholder' => null, 'inputType' => 'country_well', 'required' => true, 'position' => 6, 'name' => 'ZonesId', 'value' => $array_surveyzones, 'action' => 'survey_home.php'),
);

if ($ZonesId) {
    $buttondisabled = false;
} else {
    $buttondisabled = true;
}

// define buttons for form
$formButtons = array(
    LANG_BTNNEXT => array('buttonType' => 'submit', 'disabled' => $buttondisabled, 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_PLEASESELECTCOUNTRY,
    'action'  => 'survey_home.php',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator2($formParams, $formFields, $formButtons);