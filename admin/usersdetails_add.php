<?php
//Section Parameters
$section_tittle      = "Users Details";
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

if ($form_add) {
    class_usersDetailsAdd($FirstName, $LastName, $MiddleName, $Company, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status);
    header('Location: usersdetails_list.php');
    die();
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Users list
$userslist      = class_usersList();
$array_menulist = array();
foreach ($userslist['response'] as $row_userslist) {
    $array_userslist[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['Id'], 'selected' => null);
}

//Country list
$countrylist       = class_countryList();
$array_countrylist = array();
foreach ($countrylist['response'] as $row_countrylist) {
    $array_countrylist[] = array('label' => $row_countrylist['Name'], 'value' => $row_countrylist['Id'], 'selected' => null);
}

//State list
$statelist       = class_stateList();
$array_statelist = array();
foreach ($statelist['response'] as $row_statelist) {
    $array_statelist[] = array('label' => $row_statelist['Name'], 'value' => $row_statelist['Id'], 'selected' => null);
}

$formFields = array(
    'form_add'    => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Responsible' => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Responsible', 'value' => $array_userslist),
    'First Name'  => array('inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'FirstName', 'value' => $FirstName),
    'Last Name'   => array('inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'LastName', 'value' => $LastName),
    'Middle Name' => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'MiddleName', 'value' => $MiddleName),
    'Company'     => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'Company', 'value' => $Company),
    'Phone'       => array('inputType' => 'tel', 'required' => false, 'position' => 2, 'name' => 'Phone', 'value' => $Phone),
    'Mobile'      => array('inputType' => 'tel', 'required' => false, 'position' => 2, 'name' => 'Mobile', 'value' => $Mobile),
    'Email'       => array('inputType' => 'email', 'required' => false, 'position' => 2, 'name' => 'Email', 'value' => $Email),
    'Country'     => array('inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'Country', 'value' => $array_countrylist),
    'State'       => array('inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'State', 'value' => $array_statelist),
    'City'        => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'City', 'value' => $City),
    'Address'     => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Address', 'value' => $Address),
    'Details'     => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $Details),
    'CustomInfo1' => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'CustomInfo1', 'value' => $CustomInfo1),
    'CustomInfo2' => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'CustomInfo2', 'value' => $CustomInfo2),
    'CustomInfo3' => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'CustomInfo3', 'value' => $CustomInfo3),
    'CustomInfo4' => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'CustomInfo4', 'value' => $CustomInfo4),
    'CustomInfo5' => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'CustomInfo5', 'value' => $CustomInfo5),
    'Image'       => array('inputType' => 'image', 'required' => false, 'position' => 1, 'name' => 'Image', 'value' => $Image),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Cancel' => array('buttonType' => 'cancel', 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => 'Add',
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
