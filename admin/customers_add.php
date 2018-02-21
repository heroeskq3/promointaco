<?php
//Section Parameters
$section_tittle      = "Customers";
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
    class_customersAdd($Identification, $FirstName, $LastName, $MiddleName, $Company, $Position, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status);
    header('Location: customers_list.php');
    die();
}

//Status list
$Status         = 1;
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Status list
$Status         = 1;
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//¿Cuánto tiempo tiene de comprar INTACO?
$array_CustomInfo2   = array();
$array_CustomInfo2[] = array('label' => 'Menos de 1 año', 'value' => 'Menos de 1 año', 'selected' => null);
$array_CustomInfo2[] = array('label' => 'Entre 1 y 3', 'value' => 'Entre 1 y 3', 'selected' => null);
$array_CustomInfo2[] = array('label' => 'Entre 3 y 5', 'value' => 'Entre 3 y 5', 'selected' => null);
$array_CustomInfo2[] = array('label' => 'Entre 5 y 10 años', 'value' => 'Entre 5 y 10 años', 'selected' => null);
$array_CustomInfo2[] = array('label' => 'Más de 10 años', 'value' => 'Más de 10 años', 'selected' => null);

//Tipo
$array_CustomInfo3   = array();
$array_CustomInfo3[] = array('label' => 'Distribuidor', 'value' => 'Distribuidor', 'selected' => null);
$array_CustomInfo3[] = array('label' => 'Constructor ', 'value' => 'Constructor ', 'selected' => null);
$array_CustomInfo3[] = array('label' => 'Cliente final', 'value' => 'Cliente final', 'selected' => null);

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
    'form_add'                                => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),

    //active
    'Identification No.'                      => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Identification', 'value' => $Identification),
    'First Name'                              => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'FirstName', 'value' => $FirstName),
    'Last Name'                               => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'LastName', 'value' => $LastName),
    'Company'                                 => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Company', 'value' => $Company),
    'Position'                                => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Position', 'value' => $Position),
    'Phone'                                   => array('inputType' => 'tel', 'required' => true, 'position' => 1, 'name' => 'Phone', 'value' => $Phone),
    'Mobile'                                  => array('inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Mobile', 'value' => $Mobile),
    'Email'                                   => array('inputType' => 'email', 'required' => true, 'position' => 1, 'name' => 'Email', 'value' => $Email),
    'Country'                                 => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Country', 'value' => $array_countrylist),
    'Zone'                                    => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'CustomInfo1', 'value' => $CustomInfo1),
    '¿Cuánto tiempo tiene de comprar INTACO?' => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'CustomInfo2', 'value' => $array_CustomInfo2),
    'Tipo'                                    => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'CustomInfo3', 'value' => $array_CustomInfo3),

    //Inactive
    'Responsible'                             => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Responsible', 'value' => $Responsible),
    'Middle Name'                             => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'MiddleName', 'value' => $MiddleName),
    'State'                                   => array('inputType' => 'select', 'required' => false, 'position' => 0, 'name' => 'State', 'value' => $State),
    'City'                                    => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'City', 'value' => $City),
    'Address'                                 => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'Address', 'value' => $Address),
    'Details'                                 => array('inputType' => 'textarea', 'required' => false, 'position' => 0, 'name' => 'Details', 'value' => $Details),
    'CustomInfo4'                             => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'CustomInfo4', 'value' => $CustomInfo4),
    'CustomInfo5'                             => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'CustomInfo5', 'value' => $CustomInfo5),
    'Image'                                   => array('inputType' => 'image', 'required' => false, 'position' => 0, 'name' => 'Image', 'value' => $Image),
    'Status'                                  => array('inputType' => 'select', 'required' => true, 'position' => 0, 'name' => 'Status', 'value' => $Status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'cancel', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
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
