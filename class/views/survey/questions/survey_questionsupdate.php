<?php
if ($form_update) {
    $SurveyId = null;
    if (isset($_POST['SurveyId'])) {
        $SurveyId = $_POST['SurveyId'];
    }
    $surveyquestionsupdate = class_surveyQuestionsUpdate($Id, $SurveyId, $Question, $Description, $Order, $Status);

    header('Location: ' . $_SERVER['PHP_SELF'].'?Id='.$SurveyId);
    die();
}

if ($Id) {
    $surveyQuestionsinfo     = class_surveyQuestionsInfo($Id);
    $row_surveyquestionsinfo = $surveyQuestionsinfo['response'][0];
}

//Survey Info
$surveyinfo     = class_surveyInfo($row_surveyquestionsinfo['SurveyId']);
$row_surveyinfo = $surveyinfo['response'][0];

//Survey LANG_LIST
$surveylist       = class_surveyList($row_surveyinfo['ServicesId']);
$array_surveylist = array();
if ($surveylist['rows']) {
    foreach ($surveylist['response'] as $row_surveylist) {
        $array_surveylist[] = array('label' => $row_surveylist['Name'], 'value' => $row_surveylist['Id'], 'selected' => $row_surveyquestionsinfo['SurveyId']);
    }
}

//Order LANG_LIST
$menu_order  = class_surveyQuestionsList($row_surveyinfo['Id']);
$array_order = array();
if ($menu_order['rows']) {
    foreach ($menu_order['response'] as $row_order) {
        $array_order[] = array('label' => '[Up] - ' . $row_order['Question'], 'value' => $row_order['Order'] - 1, 'selected' => $row_surveyquestionsinfo['Order']);
        $array_order[] = array('label' => '[Down] - ' . $row_order['Question'], 'value' => $row_order['Order'] + 1, 'selected' => $row_surveyquestionsinfo['Order']);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_surveyquestionsinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_surveyquestionsinfo['Status']);

//Form Generator
$formFields = array(
    'form_update'    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_SURVEY         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'SurveyId', 'value' => $array_surveylist),
    LANG_QUESTION       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Question', 'value' => $row_surveyquestionsinfo['Question']),
    LANG_OTHERSDETAILS => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $row_surveyquestionsinfo['Description']),
    LANG_ORDER          => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Order', 'value' => $array_order),
    LANG_STATUS         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'back', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_EDIT,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
