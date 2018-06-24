<?php
if ($form_add) {
    class_usersTypeAdd($Name, $Admin, $Level, $Status);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}
//Rows per Page list
$array_level = array();
for ($i = 1; $i < 10; ++$i) {
    $array_level[] = array('label' => $i, 'value' => $i, 'selected' => null);
}

//Status list
$array_status   = array();
$array_status[] = array('label' => LANG_ACTIVE, 'value' => '1', 'selected' => $Status);
$array_status[] = array('label' => LANG_INACTIVE, 'value' => '0', 'selected' => $Status);

$formFields = array(
    'form_add'  => array('addbutton' => null, 'placeholder' => null, 'name' => 'form_add', 'label' => 'form_add', 'value' => 1, 'dataType' => 'Int', 'inputType' => 'hidden', 'required' => false, 'position' => 0),
    LANG_NAME   => array('addbutton' => null, 'placeholder' => null, 'name' => 'Name', 'label' => LANG_NAME, 'value' => $Name, 'dataType' => 'Int', 'inputType' => 'text', 'required' => true, 'position' => 1),
    LANG_ADMIN  => array('addbutton' => null, 'placeholder' => null, 'name' => 'Admin', 'label' => LANG_ADMIN, 'value' => $Admin, 'dataType' => 'Int', 'inputType' => 'checkbox', 'required' => true, 'position' => 1),
    LANG_LEVEL  => array('addbutton' => null, 'placeholder' => null, 'name' => 'Level', 'label' => LANG_LEVEL, 'value' => $array_level, 'dataType' => 'Int', 'inputType' => 'select', 'required' => false, 'position' => 1),
    LANG_STATUS => array('addbutton' => null, 'placeholder' => null, 'name' => 'Status', 'label' => LANG_STATUS, 'value' => $array_status, 'dataType' => 'Int', 'inputType' => 'select', 'required' => true, 'position' => 1),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('buttonType' => 'link', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => 'userstype_list.php'),
);

//set params for form
$formParams = array(
    'name'    => LANG_ADD,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
);

print class_formGenerator($formParams, $formFields, $formButtons);
