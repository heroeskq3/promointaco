<?php
//Section Parameters
$section_tittle      = "Users Type";
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
    class_usersTypeAdd($Name, $Admin, $Status);
    header('Location: userstype_list.php');
    die();
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

$formFields = array(
    'form_add'   => array('name' => 'form_add', 'label' => 'form_add', 'value' => 1, 'dataType' => 'Int', 'inputType' => 'hidden', 'required' => false, 'position' => 0),
    'Name'       => array('name' => 'Name', 'label' => 'Name', 'value' => $Name, 'dataType' => 'Int', 'inputType' => 'text', 'required' => true, 'position' => 1),
    'Admin'      => array('name' => 'Admin', 'label' => 'Admin', 'value' => $Admin, 'dataType' => 'Int', 'inputType' => 'checkbox', 'required' => true, 'position' => 1),
    'Status'     => array('name' => 'Status', 'label' => 'Status', 'value' => $array_status, 'dataType' => 'Int', 'inputType' => 'select', 'required' => true, 'position' => 1),
);

// define buttons for form
$formButtons = array(
    'Submit' => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Back'   => array('buttonType' => 'cancel', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'   => 'Add',
    'action' => '',
    'method' => 'post',
    'enctype' => ''
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
