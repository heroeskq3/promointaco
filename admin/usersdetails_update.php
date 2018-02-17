<?php
//Section Parameters
$section_tittle      = "Details Manager";
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

if ($form_update) {
    class_usersDetailsUpdate($Id, $FirstName, $LastName, $MiddleName, $Company, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status);
    header('Location: usersdetails_list.php');
    die();
}

//Users DetailsInfo
$usersdetailsinfo     = class_usersDetailsInfo($Id);
$row_usersdetailsinfo = $usersdetailsinfo['response'][0];

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_usersdetailsinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_usersdetailsinfo['Status']);

//Users list
$userslist      = class_usersList();
$array_menulist = array();
foreach ($userslist['response'] as $row_userslist) {
    $array_userslist[] = array('label' => $row_userslist['UserName'], 'value' => $row_userslist['Id'], 'selected' => $row_usersdetailsinfo['Responsible']);
}

//Country list
$countrylist       = class_countryList();
$array_countrylist = array();
foreach ($countrylist['response'] as $row_countrylist) {
    $array_countrylist[] = array('label' => $row_countrylist['Name'], 'value' => $row_countrylist['Id'], 'selected' => $row_usersdetailsinfo['Country']);
}

//State list
$statelist       = class_stateList();
$array_statelist = array();
foreach ($statelist['response'] as $row_statelist) {
    $array_statelist[] = array('label' => $row_statelist['Name'], 'value' => $row_statelist['Id'], 'selected' => $row_usersdetailsinfo['State']);
}

$formFields = array(
    'form_update' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Responsible' => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Responsible', 'value' => $array_userslist),
    'First Name'   => array('inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'FirstName', 'value' => $row_usersdetailsinfo['FirstName']),
    'Last Name'    => array('inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'LastName', 'value' => $row_usersdetailsinfo['LastName']),
    'Middle Name'  => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'MiddleName', 'value' => $row_usersdetailsinfo['MiddleName']),
    'Company'     => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'Company', 'value' => $row_usersdetailsinfo['Company']),
    'Phone'       => array('inputType' => 'tel', 'required' => false, 'position' => 2, 'name' => 'Phone', 'value' => $row_usersdetailsinfo['Phone']),
    'Mobile'      => array('inputType' => 'tel', 'required' => false, 'position' => 2, 'name' => 'Mobile', 'value' => $row_usersdetailsinfo['Mobile']),
    'Email'       => array('inputType' => 'email', 'required' => false, 'position' => 2, 'name' => 'Email', 'value' => $row_usersdetailsinfo['Email']),
    'Country'     => array('inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'Country', 'value' => $array_countrylist),
    'State'       => array('inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'State', 'value' => $array_statelist),
    'City'        => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'City', 'value' => $row_usersdetailsinfo['City']),
    'Address'     => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Address', 'value' => $row_usersdetailsinfo['Address']),
    'Details'     => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_usersdetailsinfo['Details']),
    'CustomInfo1' => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'CustomInfo1', 'value' => $row_usersdetailsinfo['CustomInfo1']),
    'CustomInfo2' => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'CustomInfo2', 'value' => $row_usersdetailsinfo['CustomInfo2']),
    'CustomInfo3' => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'CustomInfo3', 'value' => $row_usersdetailsinfo['CustomInfo3']),
    'CustomInfo4' => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'CustomInfo4', 'value' => $row_usersdetailsinfo['CustomInfo4']),
    'CustomInfo5' => array('inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'CustomInfo5', 'value' => $row_usersdetailsinfo['CustomInfo5']),
    'Image'       => array('inputType' => 'image', 'required' => false, 'position' => 1, 'name' => 'Image', 'value' => $row_usersdetailsinfo['Image']),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Cancel' => array('buttonType' => 'back'),
);

//set params for form
$formParams = array(
    'name'    => 'Update',
    'action'  => '',
    'method'  => 'post',
    'enctype' => 'multipart/form-data',
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
