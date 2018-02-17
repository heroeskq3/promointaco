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
if ($form_update) {
    class_customersUpdate($Id, $Identification, $FirstName, $LastName, $MiddleName, $Company, $Position, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status);
    header('Location: customers_list.php');
    die();
}

//Users DetailsInfo
$customersinfo     = class_customersInfo($Id);
$row_customersinfo = $customersinfo['response'][0];

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_customersinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_customersinfo['Status']);

//Country list
$countrylist       = class_countryList();
$array_countrylist = array();
foreach ($countrylist['response'] as $row_countrylist) {
    $array_countrylist[] = array('label' => $row_countrylist['Name'], 'value' => $row_countrylist['Id'], 'selected' => $row_customersinfo['Country']);
}

//¿Cuánto tiempo tiene de comprar INTACO?
$array_CustomInfo2   = array();
$array_CustomInfo2[] = array('label' => 'Menos de 1 año', 'value' => 'Menos de 1 año', 'selected' => $row_customersinfo['CustomInfo2']);
$array_CustomInfo2[] = array('label' => 'Entre 1 y 3', 'value' => 'Entre 1 y 3', 'selected' => $row_customersinfo['CustomInfo2']);
$array_CustomInfo2[] = array('label' => 'Entre 3 y 5', 'value' => 'Entre 3 y 5', 'selected' => $row_customersinfo['CustomInfo2']);
$array_CustomInfo2[] = array('label' => 'Entre 5 y 10 años', 'value' => 'Entre 5 y 10 años', 'selected' => $row_customersinfo['CustomInfo2']);
$array_CustomInfo2[] = array('label' => 'Más de 10 años', 'value' => 'Más de 10 años', 'selected' => $row_customersinfo['CustomInfo2']);

//Tipo
$array_CustomInfo3   = array();
$array_CustomInfo3[] = array('label' => 'Distribuidor', 'value' => 'Distribuidor', 'selected' => $row_customersinfo['CustomInfo3']);
$array_CustomInfo3[] = array('label' => 'Constructor ', 'value' => 'Constructor ', 'selected' => $row_customersinfo['CustomInfo3']);
$array_CustomInfo3[] = array('label' => 'Cliente final', 'value' => 'Cliente final', 'selected' => $row_customersinfo['CustomInfo3']);

$formFields = array(
    'form_update'                             => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),

    //active
    'Identification'                          => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Identification', 'value' => $row_customersinfo['Identification']),
    'First Name'                              => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'FirstName', 'value' => $row_customersinfo['FirstName']),
    'Last Name'                               => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'LastName', 'value' => $row_customersinfo['LastName']),
    'Company'                                 => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Company', 'value' => $row_customersinfo['Company']),
    'Position'                                => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Position', 'value' => $row_customersinfo['Position']),
    'Phone'                                   => array('inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Phone', 'value' => $row_customersinfo['Phone']),
    'Mobile'                                  => array('inputType' => 'tel', 'required' => false, 'position' => 1, 'name' => 'Mobile', 'value' => $row_customersinfo['Mobile']),
    'Email'                                   => array('inputType' => 'email', 'required' => false, 'position' => 1, 'name' => 'Email', 'value' => $row_customersinfo['Email']),
    'Country'                                 => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'Country', 'value' => $array_countrylist),
    'Zone'                                    => array('inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'CustomInfo1', 'value' => $row_customersinfo['CustomInfo1']),
    '¿Cuánto tiempo tiene de comprar INTACO?' => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'CustomInfo2', 'value' => $array_CustomInfo2),
    'Tipo'                                    => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'CustomInfo3', 'value' => $array_CustomInfo3),
    'Status'                                  => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),

    //Inactive
    'Responsible'                             => array('inputType' => 'select', 'required' => false, 'position' => 0, 'name' => 'Responsible', 'value' => $row_customersinfo['Responsible']),
    'Middle Name'                             => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'MiddleName', 'value' => $row_customersinfo['MiddleName']),
    'State'                                   => array('inputType' => 'select', 'required' => false, 'position' => 0, 'name' => 'State', 'value' => $row_customersinfo['State']),
    'City'                                    => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'City', 'value' => $row_customersinfo['City']),
    'Address'                                 => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'Address', 'value' => $row_customersinfo['Address']),
    'Details'                                 => array('inputType' => 'textarea', 'required' => false, 'position' => 0, 'name' => 'Details', 'value' => $row_customersinfo['Details']),
    'CustomInfo4'                             => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'CustomInfo4', 'value' => $row_customersinfo['CustomInfo4']),
    'CustomInfo5'                             => array('inputType' => 'text', 'required' => false, 'position' => 0, 'name' => 'CustomInfo5', 'value' => $row_customersinfo['CustomInfo5']),
    'Image'                                   => array('inputType' => 'image', 'required' => false, 'position' => 0, 'name' => 'Image', 'value' => $row_customersinfo['Image']),
);

// define buttons for form
$formButtons = array(
    'Submit'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Cancel'     => array('buttonType' => 'link', 'class' => null, 'name' => null, 'value' => null, 'action' => 'test.php'),
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
