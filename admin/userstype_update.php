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
if ($form_update) {
    $usersupdate = class_usersTypeUpdate($Id, $Name, $Admin, $Status);
    header('Location: userstype_list.php');
    die();
}
//Info
$userstypeinfo     = class_usersTypeInfo($Id);
$row_userstypeinfo = $userstypeinfo['response'][0]; //poner los info

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => 1, 'selected' => $row_userstypeinfo['Status']);
$array_status[] = array('label' => 'Inactive', 'value' => 0, 'selected' => $row_userstypeinfo['Status']);

$formFields = array(
    'form_update' => array('name' => 'form_update', 'label' => 'form_update', 'value' => 1, 'dataType' => 'Int', 'inputType' => 'hidden', 'required' => false, 'position' => 0),
    'Name'        => array('name' => 'Name', 'label' => 'Name', 'value' => $row_userstypeinfo['Name'], 'dataType' => 'Int', 'inputType' => 'text', 'required' => true, 'position' => 1),
    'Admin'       => array('name' => 'Admin', 'label' => 'Admin', 'value' => $row_userstypeinfo['Admin'], 'dataType' => 'Int', 'inputType' => 'checkbox', 'required' => true, 'position' => 1),
    'Status'      => array('name' => 'Status', 'label' => 'Status', 'value' => $array_status, 'dataType' => 'Int', 'inputType' => 'select', 'required' => true, 'position' => 1),
);

// define buttons for form
$formButtons = array(
    'Submit'     => array('buttonType' => 'submit', 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    'Cancel' => array('buttonType' => 'back'),
);

//set params for form
$formParams = array(
    'name'   => 'Update',
    'action' => '',
    'method' => 'post',
    'enctype' => ''
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
