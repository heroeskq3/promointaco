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
if ($form_add) {
    class_bookPackagesAdd($Name, $Price, $IV, $IS, $VigenciaDel, $VigenciaAl, $SectorId, $Status);
    header('Location: book_packages.php');
    die();
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Rows per Page list
$array_rowsperpage = array();
for ($i = 1; $i < 51; ++$i) {
    $array_rowsperpage[] = array('label' => $i, 'value' => $i, 'selected' => $Order);
}

//sector
$array_sector = array();
for ($i = 1; $i < 51; ++$i) {
    $array_sector[] = array('label' => 'Sector ' . $i, 'value' => $i, 'selected' => $Order);
}

//Form Generator
$formFields = array(
    'form_add'    => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Name'        => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    'Price'       => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Price', 'value' => $Details),
    'IV'          => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'IV', 'value' => $array_rowsperpage),
    'IS'          => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'IS', 'value' => $array_rowsperpage),
    'VigenciaDel' => array('inputType' => 'date', 'required' => false, 'position' => 1, 'name' => 'VigenciaDel', 'value' => $VigenciaDel),
    'VigenciaAl'  => array('inputType' => 'date', 'required' => false, 'position' => 1, 'name' => 'VigenciaAl', 'value' => $VigenciaAl),
    'Sector'      => array('inputType' => 'select', 'required' => false, 'position' => 1, 'name' => 'SectorId', 'value' => $array_sector),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'cancel', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => 'New Package',
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
