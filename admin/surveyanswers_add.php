<?php
if ($form_add) {
    class_surveyAnswersAdd($QuestionId, $Answer, $Points, $Status);
    header('Location: surveyanswers.php?Id=' . $QuestionId);
    die();
}

if ($Id) {
    $surveyquestionsinfo     = class_surveyQuestionsInfo($Id);
    $row_surveyquestionsinfo = $surveyquestionsinfo['response'][0];
}

//Services List
$surveyquestionslist = class_surveyQuestionsList($row_surveyquestionsinfo['SurveyId']);
if ($surveyquestionslist['rows']) {
    $array_surveyquestionslist = array();
    foreach ($surveyquestionslist['response'] as $row_surveyquestionslist) {
        $array_surveyquestionslist[] = array('label' => $row_surveyquestionslist['Question'], 'value' => $row_surveyquestionslist['Id'], 'selected' => $Id);
    }
}

//Points list
$array_points = array();
for ($i = 0; $i < 11; ++$i) {
    $array_points[] = array('label' => $i, 'value' => $i, 'selected' => $Points);
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Form Generator
$formFields = array(
    'form_add' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Question' => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'QuestionId', 'value' => $array_surveyquestionslist),
    'Answer'   => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Answer', 'value' => null),
    'Points'   => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Points', 'value' => $array_points),
    'Status'   => array('inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'Status', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    'Submit'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'action' => 'surveyquestions.php?Id='.$row_surveyquestionsinfo['SurveyId']),
);

//set params for form
$formParams = array(
    'name'    => 'Add',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
