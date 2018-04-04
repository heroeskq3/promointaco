<?php
if ($form_add) {
    $SurveyId = null;
    if (isset($_POST['SurveyId'])) {
        $SurveyId = $_POST['SurveyId'];
    }
    class_surveyQuestionsAdd($SurveyId, $Question, $Description, $Order, $Status);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}
//Survey Info
$surveyinfo = class_surveyInfo($Id);
$row_surveyinfo = $surveyinfo['response'][0];

//Services LANG_LIST
$surveylist       = class_surveyList($row_surveyinfo['ServicesId']);
$array_surveylist = array();
if ($surveylist['rows']) {
    foreach ($surveylist['response'] as $row_surveylist) {
        $array_surveylist[] = array('label' => $row_surveylist['Name'], 'value' => $row_surveylist['Id'], 'selected' => $Id);
    }
}

//Order LANG_LIST
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
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $Status);

//Form Generator
$formFields = array(
    'form_add'       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    LANG_SURVEY         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'SurveyId', 'value' => $array_surveylist),
    LANG_QUESTION       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Question', 'value' => null),
    LANG_OTHERSDETAILS => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => null),
    LANG_ORDER          => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Order', 'value' => $array_order),
    LANG_STATUS         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => true, 'position' => 0, 'name' => 'Status', 'value' => 1),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('addbutton' => null, 'placeholder' => null, 'buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'survey_surveys.php?Id='.$row_surveyinfo['ServicesId']),
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