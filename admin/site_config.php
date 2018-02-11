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
?>
<?php require_once 'header.php';?>
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
    header('Location: profile.php');
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

$formFields = array(
    'form_update' => array('name' => 'form_update', 'label' => 'form_update', 'value' => 1, 'dataType' => 'Int', 'inputType' => 'text', 'required' => false, 'position' => 0),
    'Image'       => array('position' => 1, 'inputType' => 'file', 'required' => false, 'name' => 'Image', 'value' => $Image),
    'Name'        => array('position' => 1, 'inputType' => 'text', 'required' => true, 'name' => 'FirstName', 'value' => $FirstName),
    'Company'     => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Company', 'value' => $Company),
    'Phone'       => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Phone', 'value' => $Phone),
    'Email'       => array('position' => 1, 'inputType' => 'text', 'required' => false, 'name' => 'Email', 'value' => $Email),
    'Country'     => array('position' => 0, 'inputType' => 'text', 'required' => false, 'name' => 'Country', 'value' => $State),
    'Status'      => array('position' => 0, 'inputType' => 'select', 'required' => true, 'name' => 'Status', 'value' => $Status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'action' => null),
    'Cancel' => array('buttonType' => 'cancel', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => 'Site Information',
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

echo class_formGenerator2($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
