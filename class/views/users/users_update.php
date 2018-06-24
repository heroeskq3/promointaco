<?php
if ($form_update) {
    class_usersUpdate($Id, $UsersIndex, $UserName, $Password, $TypeId, $OwnerId, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

//Users Info
$usersinfo     = class_usersInfo($Id);
$row_usersinfo = $usersinfo['response'][0];

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_usersinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_usersinfo['Status']);

//Users Type LANG_LIST
$userstypelist       = class_usersTypeList();
$userstypelist       = class_arrayFilter($userstypelist['response'], 'Level', $row_userstypeinfo['Level'], '>=');
$array_userstypelist = array();
foreach ($userstypelist['response'] as $row_userstypelist) {
    $array_userstypelist[] = array('label' => $row_userstypelist['Name'], 'value' => $row_userstypelist['Id'], 'selected' => $row_usersinfo['TypeId']);
}

//users list
if ($row_userstypeinfo['Admin']) {
    $userslist = class_usersList(null);
    $userslist = class_arrayFilter($userslist['response'], 'Level', $row_userstypeinfo['Level'], '>=');
} else {
    $userslist = class_usersList($_SESSION['UserId']);
}
$array_userslist = array();
foreach ($userslist['response'] as $row_userslist) {
    $array_userslist[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['Id'], 'selected' => $row_usersinfo['OwnerId']);
}

//Users Details LANG_LIST
$usersdetailslist       = class_usersDetailsList();
$array_usersdetailslist = array();
if ($usersdetailslist['rows']) {
    foreach ($usersdetailslist['response'] as $row_usersdetailslist) {
        $array_usersdetailslist[] = array('label' => '[' . $row_usersdetailslist['Id'] . '] - ' . $row_usersdetailslist['FirstName'] . ' ' . $row_usersdetailslist['LastName'], 'value' => $row_usersdetailslist['Id'], 'selected' => $row_usersinfo['UsersIndex']);
    }
}

//form priv
if ($row_userstypeinfo['Admin']) {
    $form_info  = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'UsersIndex', 'value' => $array_usersdetailslist);
    $form_owner = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'OwnerId', 'value' => $array_userslist);
} else {
    $form_info  = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'UsersIndex', 'value' => $row_usersinfo['UsersIndex']);
    $form_owner = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'OwnerId', 'value' => $row_usersinfo['OwnerId']);
}

$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'name' => 'form_update', 'label' => 'form_update', 'value' => 1, 'dataType' => 'Int', 'inputType' => 'hidden', 'required' => false, 'position' => 0),
    LANG_USERSINDEX  => $form_info,
    LANG_USERNAME    => array('addbutton' => null, 'placeholder' => null, 'name' => 'UserName', 'label' => LANG_USERNAME, 'value' => $row_usersinfo['UserName'], 'dataType' => 'Int', 'inputType' => 'text', 'required' => true, 'position' => 1),
    LANG_PASSWORD    => array('addbutton' => null, 'placeholder' => null, 'name' => 'Password', 'label' => LANG_PASSWORD, 'value' => $row_usersinfo['Password'], 'dataType' => 'Str', 'inputType' => 'password', 'required' => true, 'position' => 1),
    LANG_TYPE      => array('addbutton' => null, 'placeholder' => null, 'name' => 'TypeId', 'label' => LANG_TYPE, 'value' => $array_userstypelist, 'dataType' => 'Str', 'inputType' => 'select', 'required' => true, 'position' => 3),
    LANG_OWNER     => $form_owner,
    LANG_STATUS      => array('addbutton' => null, 'placeholder' => null, 'name' => 'Status', 'label' => LANG_STATUS, 'value' => $array_status, 'dataType' => 'Int', 'inputType' => 'select', 'required' => true, 'position' => 3),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('buttonType' => 'home', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_UPDATE,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
