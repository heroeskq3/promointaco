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
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

//Users DetailsInfo
$usersdetailsinfo     = class_usersDetailsInfo($Id);
$row_usersdetailsinfo = $usersdetailsinfo['response'][0];

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $row_usersdetailsinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $row_usersdetailsinfo['Status']);

//Users list
$userslist      = class_usersList(null);
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
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_RESPONSIBLE => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Responsible', 'value' => $array_userslist),
    LANG_FIRSTNAME  => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'FirstName', 'value' => $row_usersdetailsinfo['FirstName']),
    LANG_LASTNAME   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 3, 'name' => 'LastName', 'value' => $row_usersdetailsinfo['LastName']),
    LANG_MIDDLENAME => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'MiddleName', 'value' => $row_usersdetailsinfo['MiddleName']),
    LANG_COMPANY     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'Company', 'value' => $row_usersdetailsinfo['Company']),
    LANG_PHONE       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'tel', 'required' => false, 'position' => 2, 'name' => 'Phone', 'value' => $row_usersdetailsinfo['Phone']),
    LANG_MOBILE      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'tel', 'required' => false, 'position' => 2, 'name' => 'Mobile', 'value' => $row_usersdetailsinfo['Mobile']),
    LANG_EMAIL       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'email', 'required' => false, 'position' => 2, 'name' => 'Email', 'value' => $row_usersdetailsinfo['Email']),
    LANG_COUNTRY     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 3, 'name' => LANG_COUNTRY, 'value' => $array_countrylist),
    LANG_STATE       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'State', 'value' => $array_statelist),
    LANG_CITY        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'City', 'value' => $row_usersdetailsinfo['City']),
    LANG_ADDRESS     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Address', 'value' => $row_usersdetailsinfo['Address']),
    LANG_DETAILS     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Details', 'value' => $row_usersdetailsinfo['Details']),
    LANG_CUSTOMINFO1 => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'CustomInfo1', 'value' => $row_usersdetailsinfo['CustomInfo1']),
    LANG_CUSTOMINFO2 => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'CustomInfo2', 'value' => $row_usersdetailsinfo['CustomInfo2']),
    LANG_CUSTOMINFO3 => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'CustomInfo3', 'value' => $row_usersdetailsinfo['CustomInfo3']),
    LANG_CUSTOMINFO4 => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'CustomInfo4', 'value' => $row_usersdetailsinfo['CustomInfo4']),
    LANG_CUSTOMINFO5 => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 3, 'name' => 'CustomInfo5', 'value' => $row_usersdetailsinfo['CustomInfo5']),
    LANG_IMAGE       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'image', 'required' => false, 'position' => 0, 'name' => 'Image', 'value' => $row_usersdetailsinfo['Image']),
    LANG_STATUS      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
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
    'enctype' => 'multipart/form-data',
);

print class_formGenerator($formParams, $formFields, $formButtons);
