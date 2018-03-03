<?php
if ($form_add) {
    $SurveyId = null;
    if (isset($_POST['SurveyId'])) {
        $SurveyId = $_POST['SurveyId'];
    }
    class_surveyQuestionsAdd($SurveyId, $Question, $Description, $Order, $Status);
    header('Location: surveyquestions.php?Id=' . $SurveyId);
    die();
}
//Survey Info
$surveyinfo = class_surveyInfo($Id);
$row_surveyinfo = $surveyinfo['response'][0];

//Services List
$surveylist       = class_surveyList($row_surveyinfo['ServicesId']);
$array_surveylist = array();
if ($surveylist['rows']) {
    foreach ($surveylist['response'] as $row_surveylist) {
        $array_surveylist[] = array('label' => $row_surveylist['Name'], 'value' => $row_surveylist['Id'], 'selected' => $Id);
    }
}

//Order List
$menu_order  = class_surveyQuestionsList($row_surveyinfo['Id']);
$array_order = array();
if ($menu_order['rows']) {
    foreach ($menu_order['response'] as $row_order) {
        $array_order[] = array('label' => '[Up] - ' . $row_order['Id'].'- '.$row_order['Question'], 'value' => $row_order['Order'] - 1, 'selected' => null);
        $array_order[] = array('label' => '[Down] - ' . $row_order['Question'], 'value' => $row_order['Order'] + 1, 'selected' => null);
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
    'Order'          => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Order', 'value' => $array_order),
    'Status'         => array('inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'Status', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey.php?Id='.$row_surveyinfo['ServicesId']),
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
