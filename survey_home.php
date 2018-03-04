<?php
//Section Parameters
$section_tittle      = "Welcome";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$section_step        = 1;

require_once 'header.php';

if ($Id) {

    session_unset(); //destroy all sessions
    session_regenerate_id(); //regenerate new session id

    $_SESSION['ZonesId'] = $Id;
    header('Location: survey_home.php');
    die();
}
if ($button == "next") {
    header('Location: survey_services.php');
    die();
}
?>
    <h3>¡Bienvenidos al portal de Experiencia INTACO!</h3>
    <p>Un portal en donde todas sus recomendaciones son bienvenidas.</p>
    <h5><strong>Su retroalPimentación nos ayuda a cumplir nuestra promesa de valor:</strong></h5>
    <ul class="list-unstyled">
        <li>INTACO es cercano</li>
        <li>INTACO se preocupa</li>
        <li>INTACO trabaja para hacer crecer a sus clientes</li>
    </ul>
    <hr>
    <h3>Please select country:</h3>

<?php
//zones List
$surveyzoneslist   = class_surveyzonesList(null);
$array_surveyzones = array();
if ($surveyzoneslist['rows']) {
    foreach ($surveyzoneslist['response'] as $row_surveyzoneslist) {
        $array_surveyzones[] = array('label' => $row_surveyzoneslist['Name'], 'value' => $row_surveyzoneslist['Id'], 'image' => $row_surveyzoneslist['Image'], 'selected' => $ZonesId);
    }
}

$formFields = array(
    null => array('inputType' => 'country', 'required' => true, 'position' => 4, 'name' => 'ZonesId', 'value' => $array_surveyzones, 'action' => 'survey_home.php'),
);

if ($ZonesId) {
    $buttondisabled = false;
} else {
    $buttondisabled = true;
}

// define buttons for form
$formButtons = array(
    'Next' => array('buttonType' => 'submit', 'disabled' => $buttondisabled, 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => null,
    'action'  => 'survey_home.php',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator2($formParams, $formFields, $formButtons);

require_once 'footer.php';
?>