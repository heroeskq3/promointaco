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

if ($button == 'next') {
    $_SESSION['SurveyId'] = $_POST['SurveyId'];
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
    <ul>
        <li><h5>Aceptamos tus críticas constructivas.</h5></li>
        <li><h5>Agradecemos tu honestidad.</h5></li>
        <li><h5>Cualquier sugerencia que tengas nos ayuda a mejorar nuestro servicio. </h5></li>
    </ul>
    <hr>
    <h3>Encuestas disponibles:</h3>
<?php
//Survey list
//$surveyserviceslist       = class_surveyServicesList($Country);
$array_surveyserviceslist = array();
//foreach ($surveyserviceslist['response'] as $row_surveyserviceslist) {
    $array_surveyserviceslist[] = array('label' => 'INTACO es cercano', 'value' => 1, 'selected' => $ServicesId);
    $array_surveyserviceslist[] = array('label' => 'INTACO se preocupa', 'value' => 2, 'selected' => $ServicesId);
    $array_surveyserviceslist[] = array('label' => 'INTACO trabaja para hacer crecer a sus clientes', 'value' => 3, 'selected' => $ServicesId);
//}

$formFields = array(
    'SercicesId' => array('inputType' => 'select', 'required' => true, 'position' => 4, 'name' => 'SurveyId', 'value' => $array_surveyserviceslist),
);

// define buttons for form
$formButtons = array(
    'Previous' => array('buttonType' => 'link', 'class' => null, 'name' => 'null', 'value' => null, 'action' => 'survey_home.php'),
    'Next'     => array('buttonType' => 'submit', 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => null,
    'action'  => 'survey_services.php',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator2($formParams, $formFields, $formButtons);
?>
</fieldset>
<?php
require_once 'footer.php';
?>