<?php
if ($form_update) {
    $usersupdate = class_usersTypeUpdate($Id, $Name, $Admin, $Level, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}
//Info
$userstypeinfo     = class_usersTypeInfo($Id);
$row_userstypeinfo = $userstypeinfo['response'][0]; //poner los info

//Rows per Page list
$array_level = array();
for ($i = 1; $i < 10; ++$i) {
    $array_level[] = array('label' => $i, 'value' => $i, 'selected' => $row_userstypeinfo['Level']);
}
//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => 1, 'selected' => $row_userstypeinfo['Status']);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => 0, 'selected' => $row_userstypeinfo['Status']);

$formFields = array(
    'form_update' => array('addbutton' => null, 'placeholder' => null, 'name' => 'form_update', 'label' => 'form_update', 'value' => 1, 'dataType' => 'Int', 'inputType' => 'hidden', 'required' => false, 'position' => 0),
    LANG_NAME        => array('addbutton' => null, 'placeholder' => null, 'name' => 'Name', 'label' => LANG_NAME, 'value' => $row_userstypeinfo['Name'], 'dataType' => 'Int', 'inputType' => 'text', 'required' => true, 'position' => 1),
    LANG_ADMIN       => array('addbutton' => null, 'placeholder' => null, 'name' => 'Admin', 'label' => LANG_ADMIN, 'value' => $row_userstypeinfo['Admin'], 'dataType' => 'Int', 'inputType' => 'checkbox', 'required' => true, 'position' => 1),
    LANG_LEVEL       => array('addbutton' => null, 'placeholder' => null, 'name' => 'Level', 'label' => LANG_LEVEL, 'value' => $array_level, 'dataType' => 'Int', 'inputType' => 'select', 'required' => true, 'position' => 1),
    LANG_STATUS      => array('addbutton' => null, 'placeholder' => null, 'name' => 'Status', 'label' => LANG_STATUS, 'value' => $array_status, 'dataType' => 'Int', 'inputType' => 'select', 'required' => true, 'position' => 1),
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
