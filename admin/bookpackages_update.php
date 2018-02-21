<?php
//Section Parameters
$section_tittle      = "Booking";
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
    class_bookPackagesUpdate($Id, $PackCode, $Name, $Price, $IV, $IS, $VigenciaDel, $VigenciaAl, $SectorId, $Status);
    header('Location: bookpackages_list.php');
    die();
}

//Packages Info
$bookpackagesinfo     = class_bookPackagesInfo($Id);
$row_bookpackagesinfo = $bookpackagesinfo['response'][0];

//sector
$array_sector = array();
for ($i = 1; $i < 51; ++$i) {
    $array_sector[] = array('label' => 'Sector ' . $i, 'value' => $i, 'selected' => $row_bookpackagesinfo['SectorId']);
}

//SI / NO
$array_IV   = array();
$array_IV[] = array('label' => 'Si', 'value' => '1', 'selected' => $row_bookpackagesinfo['IV']);
$array_IV[] = array('label' => 'No', 'value' => '0', 'selected' => $row_bookpackagesinfo['IV']);

//SI / NO
$array_IS   = array();
$array_IS[] = array('label' => 'Si', 'value' => '1', 'selected' => $row_bookpackagesinfo['IS']);
$array_IS[] = array('label' => 'No', 'value' => '0', 'selected' => $row_bookpackagesinfo['IS']);

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $row_bookpackagesinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $row_bookpackagesinfo['Status']);

$formFields = array(
    'form_update' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'PackCode'    => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'PackCode', 'value' => $row_bookpackagesinfo['PackCode']),
    'Name'        => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_bookpackagesinfo['Name']),
    'Price'       => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Price', 'value' => $row_bookpackagesinfo['Price']),
    'IV'          => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'IV', 'value' => $array_IV),
    'IS'          => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'IS', 'value' => $array_IS),
    'VigenciaDel' => array('inputType' => 'date', 'required' => true, 'position' => 1, 'name' => 'VigenciaDel', 'value' => $row_bookpackagesinfo['VigenciaDel']),
    'VigenciaAl'  => array('inputType' => 'date', 'required' => true, 'position' => 1, 'name' => 'VigenciaAl', 'value' => $row_bookpackagesinfo['VigenciaAl']),
    'Sector'      => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'SectorId', 'value' => $array_sector),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'cancel', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
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
