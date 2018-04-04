<?php
if ($form_add) {
    class_surveyAnswersAdd($QuestionId, $Answer, $Points, $Status);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

if ($Id) {
    $surveyquestionsinfo     = class_surveyQuestionsInfo($Id);
    $row_surveyquestionsinfo = $surveyquestionsinfo['response'][0];
}

//Services LANG_LIST
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
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $Status);

//Form Generator
$formFields = array(
    'form_add' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    LANG_QUESTION => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'QuestionId', 'value' => $array_surveyquestionslist),
    LANG_ANSWER   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Answer', 'value' => null),
    LANG_POINTS   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Points', 'value' => $array_points),
    LANG_STATUS   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'Status', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey_questions.php?Id='.$row_surveyquestionsinfo['SurveyId']),
);

//set params for form
$formParams = array(
    'name'    => LANG_ADD,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
    'addnew'  => null,
);

class_formGenerator($formParams, $formFields, $formButtons);
