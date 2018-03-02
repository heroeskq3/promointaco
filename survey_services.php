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

if (isset($_POST['ServicesId'])) {
    $_SESSION['ServicesId'] = $_POST['ServicesId'];
    header('Location: survey_terms.php');
    die();
}
if ($button == 'previous') {
    header('Location: index.php');
    die();
}

//Country list
function class_surveyservices($Country, $SurveyId)
{
    //$surveyserviceslist       = class_surveyServicesList($Country);
    $array_surveyserviceslist = array();
    //foreach ($surveyserviceslist['response'] as $row_surveyserviceslist) {
    $array_surveyserviceslist[] = array('label' => $row_surveyserviceslist['Name'], 'value' => $row_surveyserviceslist['Id'], 'selected' => $SurveyId);
    //}
    return class_formInput('select', 'SurveyId', 'Select Survey', $array_surveyserviceslist, 'required');
}
?>
    <fieldset>
        <h3>Comparte tu experiencia con nosotros.</h3>
        <ul class="list-unstyled">
            <li>Aceptamos tus críticas constructivas.</li>
            <li>Agradecemos tu honestidad.</li>
            <li>Cualquier sugerencia que tengas nos ayuda a mejorar nuestro servicio. </li>
        </ul>
        <hr>
        <?php
//Services List - // define buttons for form
$surveyserviceslist = class_surveyServicesList();
$formButtons        = array();
if ($surveyserviceslist['rows']) {
    foreach ($surveyserviceslist['response'] as $row_surveyserviceslist) {
        if ($row_surveyserviceslist['Status']) {
            $formButtons[] = array('type' => 'submit', 'class' => null, 'label' => $row_surveyserviceslist['Name'], 'name' => 'ServicesId', 'details' => $row_surveyserviceslist['Details'], 'value' => $row_surveyserviceslist['Id'], 'position' => 3, 'action' => null);
        }
    }
}

// echo "<pre>";
// print_r($formButtons);

$formFields = null;

//set params for form
$formParams = array(
    'name'    => 'Encuestas disponibles:',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_wellGenerator($formParams, $formFields, $formButtons);
?>
    </fieldset>
    <?php
require_once 'footer.php';
?>