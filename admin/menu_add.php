<?php
//Section Parameters
$section_tittle      = "Menu Manager";
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
    $menuadd = class_menuAdd($Name, $Description, $Url, $Icon, $MenuId, $Order, $Status);
    header('Location: menu_list.php');
    die();
}

//Menu List
$menulist       = class_menuList();
$array_menulist = array();
foreach ($menulist['response'] as $row_menulist) {
    $array_menulist[] = array('label' => $row_menulist['Name'], 'value' => $row_menulist['Id'], 'selected' => $MenuId);
}

//Icon List
$iconslist       = class_iconsList();
$array_iconslist = array();
foreach ($iconslist['response'] as $row_iconslist) {
    $array_iconslist[] = array('label' => $row_iconslist, 'value' => $row_iconslist, 'selected' => null);
}

//Status list
$array_status   = array();
$array_status[] = array('label' => 'Active', 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => 'Inactive', 'value' => '0', 'selected' => $Status);

//Order List
$menu_order = class_assideMenuList($TypeId);

$array_order = array();
foreach ($menu_order['response'] as $row_order) {
    $array_order[] = array('label' => '[Up] - '.$row_order['Name'], 'value' => $row_order['Order']-1, 'selected' => null);
    $array_order[] = array('label' => '[Down] - '.$row_order['Name'], 'value' => $row_order['Order']+1, 'selected' => null);
}
$array_order[] = array('label' => '', 'value' => 0, 'selected' => null);

//Form Generator
$formFields = array(
    'form_add'    => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    'Id'          => array('inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Id', 'value' => $Id),
    'Name'        => array('inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    'Description' => array('inputType' => 'textarea', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $Description),
    'Url'         => array('inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'Url', 'value' => $Url),
    'Patern Menu' => array('inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'MenuId', 'value' => $array_menulist),
    'Icon'        => array('inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'Icon', 'value' => $array_iconslist),
    'Order'       => array('inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'Order', 'value' => $array_order),
    'Status'      => array('inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
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
