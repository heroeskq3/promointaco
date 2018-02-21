<?php
//Section Parameters
$section_tittle      = "Privileges";
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
//Privileges Info
$privilegesinfo     = class_privilegesInfo($Id);
$row_privilegesinfo = $privilegesinfo['response'][0]; //poner los info

if ($form_update) {
    $privilegesupdate = class_privilegesUpdate($Id, $TypeId, $MenuId, $Add, $Update, $Delete);
    header('Location: privileges_list.php');
    die();
}

//Users Type List
$userstypelist       = class_usersTypeList();
$array_userstypelist = array();
foreach ($userstypelist['response'] as $row_userstypelist) {
    $array_userstypelist[] = array('label' => $row_userstypelist['Name'], 'value' => $row_userstypelist['Id'], 'selected' => $row_privilegesinfo['TypeId']);
}

//Menu List
$menulist       = class_menuList(null);
$array_menulist = array();
$array_menulist[] = array('label' => "All", 'value' => 0, 'selected' => $row_privilegesinfo['MenuId']);
foreach ($menulist['response'] as $row_menulist) {
    $array_menulist[] = array('label' => $row_menulist['Name'], 'value' => $row_menulist['Id'], 'selected' => $row_privilegesinfo['MenuId']);
}

//Form Generator
$formFields = array(
    'form_update' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    'Type'        => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'TypeId', 'value' => $array_userstypelist),
    'Menu'        => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'MenuId', 'value' => $array_menulist),
    'Add'         => array('inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Add', 'value' => $row_privilegesinfo['Add']),
    'Update'      => array('inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Update', 'value' => $row_privilegesinfo['Update']),
    'Delete'      => array('inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Delete', 'value' => $row_privilegesinfo['Delete']),
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
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
