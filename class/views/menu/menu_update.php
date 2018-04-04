<?php
if ($form_update) {
    $menuupdate = class_menuUpdate($Id, $Name, $Description, $Url, $Icon, $MenuId, $Order, $Status);

    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}
//Menu Info
$menuinfo     = class_menuInfo($Id);
$row_menuinfo = $menuinfo['response'][0]; //poner los info

//Menu Info 2
if ($row_menuinfo['MenuId']) {
    $menuinfo2     = class_menuInfo($row_menuinfo['MenuId']);
    $row_menuinfo2 = $menuinfo2['response'][0]; //poner los info
    $MenuId        = $row_menuinfo2['MenuId'];
} else {
    $MenuId = null;
}

//Menu LANG_LIST
$menulist       = class_menuList($MenuId);
$array_menulist = array();
foreach ($menulist['response'] as $row_menulist) {
    $array_menulist[] = array('label' => $row_menulist['Name'], 'value' => $row_menulist['Id'], 'selected' => $row_menuinfo['MenuId']);
}

//Icon LANG_LIST
$iconslist       = class_iconsList();
$array_iconslist = array();
foreach ($iconslist['response'] as $row_iconslist) {
    $array_iconslist[] = array('label' => $row_iconslist, 'value' => $row_iconslist, 'selected' => $row_menuinfo['Icon']);
}

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => 1, 'selected' => $row_menuinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => 0, 'selected' => $row_menuinfo['Status']);

//Order LANG_LIST
$menu_order  = $menulist;
$array_order = array();
foreach ($menu_order['response'] as $row_order) {
    $array_order[] = array('label' => '[Up] - ' . $row_order['Name'], 'value' => $row_order['Order'] - 1, 'selected' => $row_menuinfo['Order']);
    $array_order[] = array('label' => '[Down] - ' . $row_order['Name'], 'value' => $row_order['Order'] + 1, 'selected' => $row_menuinfo['Order']);
}

$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_ID          => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'Id', 'value' => $row_menuinfo['Id']),
    LANG_NAME        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => true, 'position' => 1, 'name' => 'Name', 'value' => $row_menuinfo['Name']),
    LANG_DESCRIPTION => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 1, 'name' => 'Description', 'value' => $row_menuinfo['Description']),
    LANG_URL         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'text', 'required' => false, 'position' => 2, 'name' => 'Url', 'value' => $row_menuinfo['Url']),
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
    'name'    => LANG_UPDATE,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

class_formGenerator($formParams, $formFields, $formButtons);
