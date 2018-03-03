<?php
//Section Parameters
$section_tittle      = "Users Manager";
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
    class_usersUpdate($Id, $UsersIndex, $UserName, $Password, $TypeId, $OwnerId, $Status);
    header('Location: users_list.php');
    die();
}

//Users Info
$usersinfo     = class_usersInfo($Id);
$row_usersinfo = $usersinfo['response'][0];

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_usersinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_usersinfo['Status']);

//Users Type List
$userstypelist       = class_usersTypeList();
$array_userstypelist = array();
foreach ($userstypelist['response'] as $row_userstypelist) {
    $array_userstypelist[] = array('label' => $row_userstypelist['Name'], 'value' => $row_userstypelist['Id'], 'selected' => $row_usersinfo['TypeId']);
}

//Users List
$userslist       = class_usersList();
$array_userslist = array();
foreach ($userslist['response'] as $row_userslist) {
    $array_userslist[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['Id'], 'selected' => $row_usersinfo['OwnerId']);
}

//Users Details List
$usersdetailslist       = class_usersDetailsList();
$array_usersdetailslist = array();
foreach ($usersdetailslist['response'] as $row_usersdetailslist) {
    $array_usersdetailslist[] = array('label' => '[' . $row_usersdetailslist['Id'] . '] - ' . $row_usersdetailslist['FirstName'] . ' ' . $row_usersdetailslist['LastName'], 'value' => $row_usersdetailslist['Id'], 'selected' => $row_usersinfo['UsersIndex']);
}

/* * * * *
 * FORMS GENERATOR - Create Forms fields
 * value = use variable request
 * dataType = int, str, datetime, date, time, bool
 * inputType = hiddem, text, textarea, select, checkbox, email, datetime, datepick, jumpmenu, file
 * required = true or false
 * buttonType = submit or back
 * position = 1 = 1cols, 2 = 2cols, 3 = 3cols / based Materialized Framework
 * * * * */

$formFields = array(
    'form_update' => array('name' => 'form_update', 'label' => 'form_update', 'value' => 1, 'dataType' => 'Int', 'inputType' => 'hidden', 'required' => false, 'position' => 0),
    'UsersIndex'  => array('name' => 'UsersIndex', 'label' => 'Users Info', 'value' => $array_usersdetailslist, 'dataType' => 'Int', 'inputType' => 'select', 'required' => false, 'position' => 1),
    'UserName'    => array('name' => 'UserName', 'label' => 'Username', 'value' => $row_usersinfo['UserName'], 'dataType' => 'Int', 'inputType' => 'text', 'required' => true, 'position' => 1),
    'Password'    => array('name' => 'Password', 'label' => 'Password', 'value' => $row_usersinfo['Password'], 'dataType' => 'Str', 'inputType' => 'password', 'required' => true, 'position' => 1),
    'TypeId'      => array('name' => 'TypeId', 'label' => 'Type', 'value' => $array_userstypelist, 'dataType' => 'Str', 'inputType' => 'select', 'required' => true, 'position' => 3),
    'OwnerId'     => array('name' => 'OwnerId', 'label' => 'Owner', 'value' => $array_userslist, 'dataType' => 'Str', 'inputType' => 'select', 'required' => false, 'position' => 3),
    'Status'      => array('name' => 'Status', 'label' => 'Status', 'value' => $array_status, 'dataType' => 'Int', 'inputType' => 'select', 'required' => true, 'position' => 3),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'cancel', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'   => 'Update',
    'action' => '',
    'method' => 'post',
    'enctype' => ''
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
