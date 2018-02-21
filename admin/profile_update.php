<?php
//Section Parameters
$section_tittle      = "Settings";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';

require_once 'header.php';

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
    'form_update'          => array('position' => 0, 'inputType' => 'hidden', 'required' => false, 'name' => 'form_update', 'value' => 1),

    //personal information
    'Personal Information' => array('position' => 1, 'inputType' => 'label', 'required' => false, 'name' => null, 'value' => null),
    'Username'             => array('position' => 1, 'inputType' => 'hidden', 'required' => false, 'name' => 'UserName', 'value' => $UserName),
    'First Name'           => array('position' => 1, 'inputType' => 'text', 'required' => true, 'name' => 'FirstName', 'value' => $FirstName),
    'Last Name'            => array('position' => 1, 'inputType' => 'text', 'required' => true, 'name' => 'LastName', 'value' => $LastName),
    'Phone'                => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Phone', 'value' => $Phone),
    'Mobile'               => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Mobile', 'value' => $Mobile),
    'Email'                => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Email', 'value' => $Email),
    'Image'                => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'Image', 'value' => $Image),

    //Change Pasword
    'Change Password'      => array('position' => 1, 'inputType' => 'label', 'required' => false, 'name' => null, 'value' => null),
    'Password'             => array('position' => 1, 'inputType' => 'password', 'required' => true, 'name' => 'Password', 'value' => $Password),
    'Retry Password'       => array('position' => 1, 'inputType' => 'password', 'required' => true, 'name' => 'Password', 'value' => $Password),

    //Inactive
    'Responsible'          => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Responsible', 'value' => $Responsible),
    'Middle Name'          => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'MiddleName', 'value' => $MiddleName),
    'Company'              => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Company', 'value' => $Company),
    'Country'              => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Country', 'value' => $State),
    'State'                => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'State', 'value' => $State),
    'City'                 => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'City', 'value' => $City),
    'Address'              => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Address', 'value' => $Address),
    'Details'              => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Details', 'value' => $Details),
    'CustomInfo1'          => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo1', 'value' => $CustomInfo1),
    'CustomInfo2'          => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo2', 'value' => $CustomInfo2),
    'CustomInfo3'          => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo3', 'value' => $CustomInfo3),
    'CustomInfo4'          => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo4', 'value' => $CustomInfo4),
    'CustomInfo5'          => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'CustomInfo5', 'value' => $CustomInfo5),
    'Status'               => array('position' => 0, 'inputType' => 'select', 'required' => true, 'name' => 'Status', 'value' => $Status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'cancel', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'cancel', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => 'Edit Profile',
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);

require_once 'footer.php';
