<?php
//Privileges Info
$privilegesinfo     = class_privilegesInfo($Id);
$row_privilegesinfo = $privilegesinfo['response'][0]; //poner los info

if ($form_update) {
    $privilegesupdate = class_privilegesUpdate($Id, $TypeId, $MenuId, $Add, $Update, $Delete);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

//Users Type LANG_LIST
$userstypelist       = class_usersTypeList();
$array_userstypelist = array();
foreach ($userstypelist['response'] as $row_userstypelist) {
    $array_userstypelist[] = array('label' => $row_userstypelist['Name'], 'value' => $row_userstypelist['Id'], 'selected' => $row_privilegesinfo['TypeId']);
}

//Menu LANG_LIST
$menulist         = class_menuList(null);
$array_menulist   = array();
$array_menulist[] = array('label' => "All", 'value' => 0, 'selected' => 0);
foreach ($menulist['response'] as $row_menulist) {
    $array_menulist[] = array('label' => $row_menulist['Name'], 'value' => $row_menulist['Id'], 'selected' => $row_privilegesinfo['MenuId']);

    //submenu - level 2
    $submenulist = class_submenuList($row_menulist['Id']);
    if ($submenulist['rows']) {
        foreach ($submenulist['response'] as $row_submenulist) {
            $array_menulist[] = array('label' => '-> ' . $row_submenulist['Name'], 'value' => $row_submenulist['Id'], 'selected' => $row_privilegesinfo['MenuId']);

            //submenu - level 3
            $submenulistl3 = class_submenuList($row_submenulist['Id']);
            if ($submenulistl3['rows']) {
                foreach ($submenulistl3['response'] as $row_submenulistl3) {

                    $array_menulist[] = array('label' => '-----> ' . $row_submenulistl3['Name'], 'value' => $row_submenulistl3['Id'], 'selected' => $row_privilegesinfo['MenuId']);
                }
            }
        }
    }
}

//Form Generator
$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_update', 'value' => 1),
    LANG_TYPE        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'TypeId', 'value' => $array_userstypelist),
    'Menu'        => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'MenuId', 'value' => $array_menulist),
    'Add'         => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Add', 'value' => $row_privilegesinfo['Add']),
    'Update'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Update', 'value' => $row_privilegesinfo['Update']),
    'Delete'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Delete', 'value' => $row_privilegesinfo['Delete']),
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

print class_formGenerator($formParams, $formFields, $formButtons);
