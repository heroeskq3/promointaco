<?php
//restrict
if (!$_SESSION['CustomersId']) {
    header('Location: survey_register.php');
    die();
}

$surveylist = class_surveyList($_SESSION['ServicesId']);

//survey list
$i = 0;
if ($surveylist['rows']) {
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

            //define input image
            if ($row_surveyinfo['InputImage']) {
                define('IMG_SURVEYINPUT', $row_surveyinfo['InputImage']);
            } else {
                define('IMG_SURVEYINPUT', null);
            }

            $step_prev = $step - 1;
            $step_next = $step + 1;

// define buttons for form

            if ($surveylist['rows'] == $step_next) {
                $button_next = LANG_BTNFINISH;
            } else {
                $button_next = LANG_BTNNEXT;
            }
            $formButtons = array(
                LANG_BTNPREVIOUS => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => 'step', 'value' => $step_prev, 'action' => null),
                $button_next     => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => 'step', 'value' => $step_next, 'action' => null),
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
} else {
    $FormSteps   = null;
    $formParams  = null;
    $formButtons = array(
        LANG_BTNPREVIOUS => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => 'step', 'value' => null, 'action' => 'survey_register.php'),
        LANG_BTNNEXT     => array('buttonType' => 'submit', 'disabled' => true, 'class' => null, 'name' => 'step', 'value' => null, 'action' => null),
    );
    $formArray = null;
    class_formSurvey($FormSteps, $formParams, $formButtons, $formArray);

}

require_once 'footer.php';
