<?php
if ($form_update) {
    $surveyanswersupdate = class_surveyAnswersUpdate($Id, $QuestionId, $Answer, $Points, $Status);
    header('Location: ' . $_SERVER['PHP_SELF'] . '?Id=' . $QuestionId);
}

//answers info
$surveyanswersinfo     = class_surveyAnswersInfo($Id);
$row_surveyanswersinfo = $surveyanswersinfo['response'][0];

//question info
$surveyquestionsinfo     = class_surveyQuestionsInfo($row_surveyanswersinfo['QuestionId']);
$row_surveyquestionsinfo = $surveyquestionsinfo['response'][0];

//Questions LANG_LIST
$surveyquestionslist = class_surveyquestionsList($row_surveyquestionsinfo['SurveyId']);

//echo "<pre>";
//print_r($surveyanswersinfo);

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
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_surveyanswersinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_surveyanswersinfo['Status']);

//Form Generator
$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_QUESTION    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'QuestionId', 'value' => $array_surveyquestionslist),
    LANG_ANSWER      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Answer', 'value' => $row_surveyanswersinfo['Answer']),
    LANG_POINTS      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Points', 'value' => $array_points),
    LANG_STATUS      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => $_SERVER['PHP_SELF'].'?Id='.$row_surveyanswersinfo['QuestionId']),
);

//set params for form
$formParams = array(
    'name'    => LANG_EDIT,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
