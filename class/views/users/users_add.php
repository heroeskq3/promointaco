    <?php
if ($form_add) {
    class_usersAdd($UsersIndex, $UserName, $Password, $TypeId, $OwnerId, $Status);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $Status);

//Users Type LANG_LIST
$userstypelist       = class_usersTypeList();
$userstypelist       = class_arrayFilter($userstypelist['response'], 'Level', $row_userstypeinfo['Level'], '>=');
$array_userstypelist = array();
foreach ($userstypelist['response'] as $row_userstypelist) {
    $array_userstypelist[] = array('label' => $row_userstypelist['Name'], 'value' => $row_userstypelist['Id'], 'selected' => null);
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
    $array_userslist[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['Id'], 'selected' => $_SESSION['UserId']);
}

//Users Details LANG_LIST
$usersdetailslist       = class_usersDetailsList();
$array_usersdetailslist = array();
if ($usersdetailslist['rows']) {
    foreach ($usersdetailslist['response'] as $row_usersdetailslist) {
        $array_usersdetailslist[] = array('label' => '[' . $row_usersdetailslist['Id'] . '] - ' . $row_usersdetailslist['FirstName'] . ' ' . $row_usersdetailslist['LastName'], 'value' => $row_usersdetailslist['Id'], 'selected' => null);
    }
}

//form priv
if ($row_userstypeinfo['Admin']) {
    $form_info  = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'UsersIndex', 'value' => $array_usersdetailslist);
    $form_owner = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'OwnerId', 'value' => $array_userslist);
} else {
    $form_info  = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'UsersIndex', 'value' => $UsersIndex);
    $form_owner = array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'OwnerId', 'value' => $_SESSION['UserId']);
}

$formFields = array(
    'form_add' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    LANG_INFO     => $form_info,
    LANG_USERNAME => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 2, 'name' => 'UserName', 'value' => $UserName),
    LANG_PASSWORD => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'password', 'required' => true, 'position' => 2, 'name' => 'Password', 'value' => $Password),
    LANG_TYPE     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'TypeId', 'value' => $array_userstypelist),
    LANG_OWNER    => $form_owner,
    LANG_STATUS   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Cancel' => array('buttonType' => 'back'),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('buttonType' => 'cancel', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_ADD,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

print class_formGenerator($formParams, $formFields, $formButtons);
