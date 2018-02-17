<?php
//Section Parameters
$section_tittle      = "Survey Questions";
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
    $surveyquestionsupdate = class_surveyQuestionsUpdate($Id, $SurveyId, $Question, $Description, $Status);
    header('Location: surveyquestions.php?Id='.$SurveyId);
    die();
}

if ($Id) {
    $surveyQuestionsinfo     = class_surveyQuestionsInfo($Id);
    $row_surveyquestionsinfo = $surveyQuestionsinfo['response'][0];
}

//Services List
$surveylist       = class_surveyList();
if($surveylist['rows']){
    $array_surveylist = array();
    foreach ($surveylist['response'] as $row_surveylist) {
        $array_surveylist[] = array('label' => $row_surveylist['Name'], 'value' => $row_surveylist['Id'], 'selected' => $row_surveyquestionsinfo['SurveyId']);
    }
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_surveyquestionsinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_surveyquestionsinfo['Status']);

//Form Generator
$formFields = array(
    'form_update'       => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Survey'         => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'SurveyId', 'value' => $array_surveylist),
    'Question'       => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Question', 'value' => $row_surveyquestionsinfo['Question']),
    'Others Details' => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $row_surveyquestionsinfo['Description']),
    'Status'         => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'link', 'action' => 'surveyquestions.php?Id='.$row_surveyquestionsinfo['SurveyId']),
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
