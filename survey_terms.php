<?php
//Section Parameters
$section_tittle      = "Terms";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$section_step        = 3;

require_once 'header.php';

//restrict
if (!$_SESSION['ServicesId']) {
    header('Location: survey_services.php');
    die();
}
if (isset($_POST['TermsId'])) {
    $_SESSION['TermsId'] = $_POST['TermsId'];
    header('Location: survey_register.php');
    die();
}

if ($button == "next") {
    header('Location: survey_terms.php');
    die();
}

$surveyservicesinfo     = class_surveyServicesInfo($ServicesId);
$row_surveyservicesinfo = $surveyservicesinfo['response'][0];

$formFields = array(
    null => array('inputType' => 'html', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_surveyservicesinfo['Details']),    'TermsId' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'TermsId', 'value' => 1),
);

// define buttons for form
$formButtons = null;

//set params for form
$formParams = array(
    'name'    => 'Encuesta de '.$row_surveyservicesinfo['Name'],
    'action'  => '',
    'method'  => 'post',
    'enctype' => null,
);

class_formGenerator2($formParams, $formFields, $formButtons);

$modalsParams = array(
    'label'  => 'Ver reglamento',
    'tittle' => 'Términos y Condiciones',
    'style'  => null,
    'body'   => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo error ratione adipisci, maiores excepturi aut voluptatibus veniam nemo ipsam? Blanditiis atque soluta qui consequatur hic incidunt autem iste voluptas? Ipsum.',
);

$modalsButtons = array(
    'Close' => array('label' => 'Close', 'type' => 'close', 'action' => null),
);
class_modals($modalsParams, $modalsButtons);

$formFields = array(
    'Image' => array('inputType' => 'image', 'required' => false, 'position' => 1, 'name' => 'Image', 'value' => $row_surveyservicesinfo['Image']),
    'TermsId' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'TermsId', 'value' => 1),
);
// define buttons for form
$formButtons = array(
    'Previous' => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey_services.php'),
    'Next'     => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);
//set params for form
$formParams = array(
    'name'    => '',
    'action'  => '',
    'method'  => 'post',
    'enctype' => null,
);
class_formGenerator2($formParams, $formFields, $formButtons);
require_once 'footer.php';?>