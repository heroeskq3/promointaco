<?php
//upload resource
if ($File["name"]) {
    $debug      = 0;
    $resource   = "profile";
    $fileUpload = class_filesUpload($File, $resource, $debug);
    $Image      = $File["name"];
}

//Users Info
$usersinfo     = class_usersInfo($_SESSION['UserId']);
$row_usersinfo = $usersinfo['response'][0];

//Users Details Info
$usersdetailsinfo     = class_usersDetailsInfo($row_usersinfo['UsersIndex']);
$row_usersdetailsinfo = $usersdetailsinfo['response'][0];

if ($form_update) {
    class_usersDetailsUpdate($row_usersinfo['UsersIndex'], $FirstName, $LastName, $MiddleName, $Company, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status);
    header('Location: profile_update.php');
    die();
}

//define forms var
$UserName    = $row_usersinfo['UserName'];
$Responsible = $row_usersdetailsinfo['Responsible'];
$FirstName   = $row_usersdetailsinfo['FirstName'];
$LastName    = $row_usersdetailsinfo['LastName'];
$MiddleName  = $row_usersdetailsinfo['MiddleName'];
$Company     = $row_usersdetailsinfo['Company'];
$Phone       = $row_usersdetailsinfo['Phone'];
$Mobile      = $row_usersdetailsinfo['Mobile'];
$Email       = $row_usersdetailsinfo['Email'];
$Country     = $row_usersdetailsinfo['State'];
$State       = $row_usersdetailsinfo['State'];
$City        = $row_usersdetailsinfo['City'];
$Address     = $row_usersdetailsinfo['Address'];
$Details     = $row_usersdetailsinfo['Details'];
$CustomInfo1 = $row_usersdetailsinfo['CustomInfo1'];
$CustomInfo2 = $row_usersdetailsinfo['CustomInfo2'];
$CustomInfo3 = $row_usersdetailsinfo['CustomInfo3'];
$CustomInfo4 = $row_usersdetailsinfo['CustomInfo4'];
$CustomInfo5 = $row_usersdetailsinfo['CustomInfo5'];
$Image       = $row_usersdetailsinfo['Image'];
$Status      = $row_usersdetailsinfo['Status'];
$Password    = $row_usersinfo['Password'];

$formFields = array(
    'form_update'          => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'hidden', 'required' => false, 'name' => 'form_update', 'value' => 1),

    //personal information
    'Personal Information' => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'label', 'required' => false, 'name' => null, 'value' => null),
    LANG_USERNAME          => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'hidden', 'required' => false, 'name' => 'UserName', 'value' => $UserName),
    LANG_FIRSTNAME         => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'text', 'required' => true, 'name' => 'FirstName', 'value' => $FirstName),
    LANG_LASTNAME          => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'text', 'required' => true, 'name' => 'LastName', 'value' => $LastName),
    LANG_PHONE             => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Phone', 'value' => $Phone),
    LANG_MOBILE            => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Mobile', 'value' => $Mobile),
    LANG_EMAIL             => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Email', 'value' => $Email),
    LANG_IMAGE             => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'Image', 'value' => $Image),

    //Change Pasword
    LANG_CHANGEPASSWORD    => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'label', 'required' => false, 'name' => null, 'value' => null),
    LANG_PASSWORD          => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'password', 'required' => true, 'name' => 'Password', 'value' => $Password),
    LANG_RETRYPASSWORD     => array('addbutton' => null, 'placeholder' => null, 'position' => 1, 'inputType' => 'password', 'required' => true, 'name' => 'Password', 'value' => $Password),

    //Inactive
    LANG_RESPONSIBLE       => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Responsible', 'value' => $Responsible),
    LANG_MIDDLENAME        => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'MiddleName', 'value' => $MiddleName),
    LANG_COMPANY           => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Company', 'value' => $Company),
    LANG_COUNTRY           => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Country', 'value' => $State),
    LANG_STATE             => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'State', 'value' => $State),
    LANG_CITY              => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'City', 'value' => $City),
    LANG_ADDRESS           => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Address', 'value' => $Address),
    LANG_DETAILS           => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Details', 'value' => $Details),
    LANG_CUSTOMINFO1       => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo1', 'value' => $CustomInfo1),
    LANG_CUSTOMINFO2       => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo2', 'value' => $CustomInfo2),
    LANG_CUSTOMINFO3       => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo3', 'value' => $CustomInfo3),
    LANG_CUSTOMINFO4       => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo4', 'value' => $CustomInfo4),
    LANG_CUSTOMINFO5       => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo5', 'value' => $CustomInfo5),
    LANG_STATUS            => array('addbutton' => null, 'placeholder' => null, 'position' => 0, 'inputType' => 'select', 'required' => true, 'name' => 'Status', 'value' => $Status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('buttonType' => 'cancel', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('buttonType' => 'cancel', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_EDIT,
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);
