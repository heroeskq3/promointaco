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
if ($form_add) {
    class_usersAdd($UsersIndex, $UserName, $Password, $TypeId, $OwnerId, $Status);
    header('Location: users_list.php');
    die();
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Users Type List
$userstypelist       = class_usersTypeList();
$array_userstypelist = array();
foreach ($userstypelist['response'] as $row_userstypelist) {
    $array_userstypelist[] = array('label' => $row_userstypelist['Name'], 'value' => $row_userstypelist['Id'], 'selected' => null);
}

//Users List
$userslist       = class_usersList();
$array_userslist = array();
foreach ($userslist['response'] as $row_userslist) {
    $array_userslist[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['Id'], 'selected' => null);
}

//Users Details List
$usersdetailslist       = class_usersDetailsList();
$array_usersdetailslist = array();
foreach ($usersdetailslist['response'] as $row_usersdetailslist) {
    $array_usersdetailslist[] = array('label' => '['.$row_usersdetailslist['Id'].'] - '.$row_usersdetailslist['FirstName'].' '.$row_usersdetailslist['LastName'], 'value' => $row_usersdetailslist['Id'], 'selected' => null);
}

$formFields = array(
    'form_add'   => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1, ),
    'Info' => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'UsersIndex', 'value' => $array_usersdetailslist, ),
    'Username'     => array('inputType' => 'text', 'required' => true, 'position' => 2, 'name' => 'UserName', 'value' => $UserName, ),
    'Password'  => array('inputType' => 'password', 'required' => true, 'position' => 2, 'name' => 'Password', 'value' => $Password, ),
    'Type'   => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'TypeId', 'value' => $array_userstypelist, ),
    'Owner' => array('inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'OwnerId', 'value' => $array_userslist, ),
    'Status'     => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status, ),
);

// define buttons for form
$formButtons = array(
    'Submit'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Cancel' => array('buttonType' => 'back'),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'cancel', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name' => 'Add',
    'action' => '',
    'method' => 'post',
    'enctype' => ''
);

$formadd = class_formGenerator($formParams, $formFields, $formButtons);
echo $formadd;
?>
<?php require_once 'footer.php';
