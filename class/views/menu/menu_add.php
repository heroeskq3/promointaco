<?php
if ($form_add) {
    $menuadd = class_menuAdd($Name, $Description, $Url, $Icon, $MenuId, $Order, $Status);
    header('Location: '.$_SERVER['HTTP_REFERER']);
    die();
}

//Menu info
if ($Id) {
    $menuinfo     = class_menuInfo($Id);
    $row_menuinfo = $menuinfo['response'][0];
    $MenuId       = $row_menuinfo['MenuId'];
}

//Menu LANG_LIST
$menulist       = class_menuList($MenuId);
$array_menulist = array();
foreach ($menulist['response'] as $row_menulist) {
    $array_menulist[] = array('label' => $row_menulist['Name'], 'value' => $row_menulist['Id'], 'selected' => $Id);
}

//Icon LANG_LIST
$iconslist       = class_iconsList();
$array_iconslist = array();
foreach ($iconslist['response'] as $row_iconslist) {
    $array_iconslist[] = array('label' => $row_iconslist, 'value' => $row_iconslist, 'selected' => null);
}

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $Status);

//Order LANG_LIST
$menu_order = class_menuList($Id);

$array_order = array();
if ($menu_order['rows']) {
    foreach ($menu_order['response'] as $row_order) {
        $array_order[] = array('label' => '[Up] - ' . $row_order['Name'], 'value' => $row_order['Order'] - 1, 'selected' => null);
        $array_order[] = array('label' => '[Down] - ' . $row_order['Name'], 'value' => $row_order['Order'] + 1, 'selected' => null);
    }
}
$array_order[] = array('label' => '', 'value' => 0, 'selected' => null);

//Form Generator
$formFields = array(
    'form_add'    => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    LANG_ID          => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Id', 'value' => $Id),
    LANG_NAME        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $Name),
    LANG_DESCRIPTION => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $Description),
    LANG_URL         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'Url', 'value' => $Url),
    LANG_PATERNMENU => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 2, 'name' => 'MenuId', 'value' => $array_menulist),
    LANG_ICON        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'Icon', 'value' => $array_iconslist),
    LANG_ORDER       => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => false, 'position' => 3, 'name' => 'Order', 'value' => $array_order),
    LANG_STATUS      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 3, 'name' => 'Status', 'value' => $array_status),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('buttonType' => 'home', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_ADD,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
    'addnew'  => null,
);

class_formGenerator($formParams, $formFields, $formButtons);
