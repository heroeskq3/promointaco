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

$i = 0;
foreach ($surveylist['response'] as $row_surveylist) {
    $num = $i++;

    $step = 0;
    if (isset($_POST['step'])) {
        $step = $_POST['step'];
    }

    if ($step == $surveylist['rows']) {
        header('Location: survey_thanks.php');
        die();
    }
    if ($step < 0) {
        header('Location: survey_register.php');
        die();
    }

    if ($step == $num) {

        $SurveyId       = $row_surveylist['Id'];
        $surveyinfo     = class_surveyInfo($SurveyId);
        $row_surveyinfo = $surveyinfo['response'][0];

        $step_prev = $step - 1;
        $step_next = $step + 1;

// define buttons for form

        if ($surveylist['rows']==$step_next) {
            $button_next = 'Finish';
        } else {
            $button_next = 'Next';
        }
        $formButtons = array(
            'Previous'   => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => 'step', 'value' => $step_prev, 'action' => null),
            $button_next => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => 'step', 'value' => $step_next, 'action' => null),
        );

//set params for form
        $formParams = array(
            'name'        => $row_surveyinfo['Name'],
            'description' => $row_surveyinfo['Details'],
            'action'      => '',
            'method'      => 'post',
            'enctype'     => '',
        );
//set params for form
        $FormSteps = null;

        $formArray = class_survey($SurveyId);

        class_formSurvey($FormSteps, $formParams, $formButtons, $formArray);
    }
}

require_once 'footer.php';
