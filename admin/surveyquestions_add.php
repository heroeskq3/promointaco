<?php
if ($form_add) {
$SurveyId = null;
if(isset($_POST['SurveyId'])){
    $SurveyId = $_POST['SurveyId'];
}
    class_surveyQuestionsAdd($SurveyId, $Question, $Description, $Status);
    header('Location: surveyquestions.php?Id=' . $SurveyId);
    die();
}

//Services List
$surveylist = class_surveyList();
if ($surveylist['rows']) {
    $array_surveylist = array();
    foreach ($surveylist['response'] as $row_surveylist) {
        $array_surveylist[] = array('label' => $row_surveylist['Name'], 'value' => $row_surveylist['Id'], 'selected' => $Id);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Form Generator
$formFields = array(
    'form_add'       => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Survey'         => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'SurveyId', 'value' => $array_surveylist),
    'Question'       => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Question', 'value' => null),
    'Others Details' => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => null),
    'Status'         => array('inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'Status', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey_list.php'),
);

//set params for form
$formParams = array(
    'name'    => 'Add',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
    'addnew'  => null,
);

class_formGenerator($formParams, $formFields, $formButtons);
