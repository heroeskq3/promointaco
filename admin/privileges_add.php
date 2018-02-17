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
if ($form_add) {
    $privilegesadd = class_privilegesAdd($TypeId, $MenuId, $Add, $Update, $Delete);
    header('Location: privileges_list.php');
    die();
}

//Users Type List
$userstypelist       = class_usersTypeList();
$array_userstypelist = array();
foreach ($userstypelist['response'] as $row_userstypelist) {
    $array_userstypelist[] = array('label' => $row_userstypelist['Name'], 'value' => $row_userstypelist['Id'], 'selected' => null);
}

//Menu List
$menulist       = class_menuList();
$array_menulist = array();
$array_menulist[] = array('label' => "All", 'value' => 0, 'selected' => 0);
foreach ($menulist['response'] as $row_menulist) {
    $array_menulist[] = array('label' => $row_menulist['Name'], 'value' => $row_menulist['Id'], 'selected' => $MenuId);
}

//Form Generator
$formFields = array(
    'form_add' => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Type'     => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'TypeId', 'value' => $array_userstypelist),
    
    //se debe tarbajar en alguna opcion apra mostrar los list con checkbox
    'Menu'     => array('inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'MenuId', 'value' => $array_menulist),
    
    //esta aprte debe trbaajar ocmo checkbox individuales
    'Add'      => array('inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Add', 'value' => $Add),
    'Update'   => array('inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Update', 'value' => $Update),
    'Delete'   => array('inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Delete', 'value' => $Delete),
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
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
?>
<?php require_once 'footer.php';
