<?php
//Section Parameters
$section_tittle      = "Questions";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$section_step        = 5;

require_once 'header.php';

//restrict
if (!$_SESSION['CustomersId']) {
    header('Location: survey_register.php');
    die();
}

$surveylist = class_surveyList($_SESSION['ServicesId']);
?>
<fieldset>
<?php $i = 0; ?>
<?php foreach ($surveylist['response'] as $row_surveylist) {?>
<?php $num = $i++; ?>
<?php 
$step = 0;
if (isset($_POST['step'])) {
	$step = $_POST['step'];
}
$step_next = $step+1;

if (0) {
    header('Location: survey_thanks.php');
    die();
}
?>
<?php if($step == $num){ ?>
<?php
$SurveyId = $row_surveylist['Id'];

$surveyinfo     = class_surveyInfo($SurveyId);
$row_surveyinfo = $surveyinfo['response'][0];

// define buttons for form
$formButtons = array(
    'Previous' => array('buttonType' => 'link', 'class' => null, 'name' => 'null', 'value' => null, 'action' => 'survey_register.php'),
    'Next'     => array('buttonType' => 'submit', 'class' => null, 'name' => 'button', 'value' => 'next', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => $row_surveyinfo['Name'],
    'description'    => $row_surveyinfo['Details'],
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);
//set params for form
$FormSteps = array(
    'step'    => $step_next
);

$formArray = class_survey($SurveyId);
// echo "<pre>";
// print_r($formArray);
class_formSurvey($FormSteps,$formParams, $formButtons, $formArray);
?>
<?php } ?>
<?php } ?>
</fieldset>
<?php
require_once 'footer.php';
