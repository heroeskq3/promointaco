<?php
//Section Parameters
$section_tittle      = "Survey Answers";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';
?>
<?php require_once 'header.php';?>
<?php

if ($form_update) {
    $surveyanswersupdate = class_surveyAnswersUpdate($Id, $QuestionId, $Answer, $Points, $Status);
}

//answer info
$surveyanswersinfo     = class_surveyAnswersInfo($Id);
$row_surveyanswersinfo = $surveyanswersinfo['response'][0];

if ($form_update) {    
    //redirect
    header('Location: surveyanswers.php?Id='.$row_surveyanswersinfo['QuestionId']);
    die();
}

//question info
$surveyquestionsinfo     = class_surveyQuestionsInfo($row_surveyanswersinfo['QuestionId']);
$row_surveyquestionsinfo = $surveyquestionsinfo['response'][0];

//Questions List
$surveyquestionslist = class_surveyquestionsList($row_surveyquestionsinfo['SurveyId']);
if ($surveyquestionslist['rows']) {
    $array_surveyquestionslist = array();
    foreach ($surveyquestionslist['response'] as $row_surveyquestionslist) {
        $array_surveyquestionslist[] = array('label' => $row_surveyquestionslist['Question'], 'value' => $row_surveyquestionslist['Id'], 'selected' => $row_surveyanswersinfo['QuestionId']);
    }
}

//Points list
$array_points = array();
for ($i = 0; $i < 11; ++$i) {
    $array_points[] = array('label' => $i, 'value' => $i, 'selected' => $row_surveyanswersinfo['Points']);
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_surveyanswersinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_surveyanswersinfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Question'    => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'QuestionId', 'value' => $array_surveyquestionslist),
    'Answer'      => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Answer', 'value' => $row_surveyanswersinfo['Answer']),
    'Points'      => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Points', 'value' => $array_points),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'class' => null, 'name' => null, 'value' => null, 'action' => 'surveyanswers.php?Id='.$row_surveyanswersinfo['QuestionId']),
);

//set params for form
$formParams = array(
    'name'    => 'Edit Survey Question',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
