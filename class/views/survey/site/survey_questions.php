<?php
//restrict
if (!$_SESSION['CustomersId']) {
    header('Location: survey_register.php');
    die();
}

//echo "<pre>";
//print_r($_POST);

if ($form_add) {

    $Answer = array();
    for ($i = 0; $i < $form_qnty; ++$i) {

        //01
        $questionid     = 'QuestionId_' . $i;
        $answerid       = 'AnswerId_' . $i;
        $answertextarea = 'AnswerTextarea_' . $i;

        //02
        $questionid2     = 'QuestionId2_' . $i;
        $answerid2       = 'AnswerId2_' . $i;
        $answertextarea2 = 'AnswerTextarea2_' . $i;

        $QuestionId     = null;
        $AnswerId       = null;
        $AnswerTextarea = null;

        if ($_POST[$questionid][0]) {
            $QuestionId = $_POST[$questionid][0];
        }
        if ($_POST[$questionid2][0]) {
            $QuestionId = $_POST[$questionid2][0];
        }

        if ($_POST[$answerid][0]) {
            $AnswerId = $_POST[$answerid][0];
        }
        if ($_POST[$answerid2][0]) {
            $AnswerId = $_POST[$answerid2][0];
        }

        if ($_POST[$answertextarea][0]) {
            $AnswerTextarea = $_POST[$answertextarea][0];
        }
        if ($_POST[$answertextarea2][0]) {
            $AnswerTextarea = $_POST[$answertextarea2][0];
        }

        if ($AnswerId) {
            $Answer[] = array('question' => $QuestionId, 'id' => $AnswerId, 'textarea' => $AnswerTextarea);
        }

    }

    //echo $form_qnty;
    //echo "<br>";
    //echo count($Answer);
    //echo "<pre>";
    //print_r($_POST);

    $answer_count = count($Answer);
    $answer_qnty  = $form_qnty;

    //basado en el array anterior revisa si 0 es verdadero
    if ($answer_count == $answer_qnty) {
        $Answer = $Answer;
    } else {
        $Answer = null;
    }

    //validacion si viene vacio
    if ($Answer) {

        foreach ($Answer as $row_answerid) {

            $QuestionId = $row_answerid['question'];
            $AnswerId   = $row_answerid['id'];

            if ($row_answerid['textarea']) {
                $AnswerTextarea = $row_answerid['textarea'];
            } else {
                $AnswerTextarea = null;
            }

            class_surveyResultsAdd($SessionId, $QuestionId, $AnswerId, $AnswerTextarea);
        }
    } else {
        if ($_POST['step'] > 1) {
            $_POST['step']        = $_POST['step'] - 1;
            $_POST['AnswerError'] = 1;
        } else {
            $_POST['step']        = 0;
            $_POST['AnswerError'] = 1;
        }
    }
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
        //$step = 12;
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
                define('IMG_INPUTIMAGE', $row_surveyinfo['InputImage']);
            } else {
                define('IMG_INPUTIMAGE', null);
            }

            //iut hover
            if ($row_surveyinfo['InputHover']) {
                define('IMG_INPUTHOVER', $row_surveyinfo['InputHover']);
            } else {
                define('IMG_INPUTHOVER', null);
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
                'id'          => $row_surveyinfo['Id'],
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