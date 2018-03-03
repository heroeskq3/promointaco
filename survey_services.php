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

//Country list
function class_surveyservices($Country, $SurveyId)
{
    $array_surveyserviceslist = array();
    $array_surveyserviceslist[] = array('label' => $row_surveyserviceslist['Name'], 'value' => $row_surveyserviceslist['Id'], 'selected' => $SurveyId);
    return class_formInput('select', 'SurveyId', 'Select Survey', $array_surveyserviceslist, 'required');
}
?>
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
$formWell           = array();
if ($surveyserviceslist['rows']) {
    foreach ($surveyserviceslist['response'] as $row_surveyserviceslist) {
        if ($row_surveyserviceslist['Status']) {
            $formWell[] = array('type' => 'submit', 'active' => $ServicesId, 'class' => null, 'label' => $row_surveyserviceslist['Name'], 'name' => 'ServicesId', 'details' => $row_surveyserviceslist['Details'], 'value' => $row_surveyserviceslist['Id'], 'position' => 3, 'action' => null);
        }
    }
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

$formFields = null;

//set params for form
$formParams = array(
    'name'    => 'Encuestas disponibles:',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_wellGenerator($formWell, $formParams, $formFields, $formButtons);

require_once 'footer.php';
?>