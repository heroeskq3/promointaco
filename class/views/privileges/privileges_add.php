    <?php
if ($form_add) {
    $privilegesadd = class_privilegesAdd($TypeId, $MenuId, $Add, $Update, $Delete);
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
}

//Users Type LANG_LIST
$userstypelist       = class_usersTypeList();
$array_userstypelist = array();
foreach ($userstypelist['response'] as $row_userstypelist) {
    $array_userstypelist[] = array('label' => $row_userstypelist['Name'], 'value' => $row_userstypelist['Id'], 'selected' => null);
}

//Menu LANG_LIST
$menulist         = class_menuList(null);
$array_menulist   = array();
$array_menulist[] = array('label' => "All", 'value' => 0, 'selected' => 0);
foreach ($menulist['response'] as $row_menulist) {
    $array_menulist[] = array('label' => $row_menulist['Name'], 'value' => $row_menulist['Id'], 'selected' => $MenuId);

    //submenu - level 2
    $submenulist = class_submenuList($row_menulist['Id']);
    if ($submenulist['rows']) {
        foreach ($submenulist['response'] as $row_submenulist) {
            $array_menulist[] = array('label' => '-> ' . $row_submenulist['Name'], 'value' => $row_submenulist['Id'], 'selected' => $MenuId);

            //submenu - level 3
            $submenulistl3 = class_submenuList($row_submenulist['Id']);
            if ($submenulistl3['rows']) {
                foreach ($submenulistl3['response'] as $row_submenulistl3) {

                    $array_menulist[] = array('label' => '-----> ' . $row_submenulistl3['Name'], 'value' => $row_submenulistl3['Id'], 'selected' => $MenuId);
                }
            }
        }
    }
}

//Form Generator
$formFields = array(
    'form_add' => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'hidden', 'required' => false, 'position' => 0, 'name' => 'form_add', 'value' => 1),
    LANG_TYPE     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'TypeId', 'value' => $array_userstypelist),

    //se debe tarbajar en alguna opcion apra mostrar los list con checkbox
    'Menu'     => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'select', 'required' => true, 'position' => 1, 'name' => 'MenuId', 'value' => $array_menulist),

    //esta aprte debe trbaajar ocmo checkbox individuales
    'Add'      => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Add', 'value' => $Add),
    'Update'   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Update', 'value' => $Update),
    'Delete'   => array('addbutton' => null, 'placeholder' => null, 'inputType' => 'checkbox', 'required' => false, 'position' => 1, 'name' => 'Delete', 'value' => $Delete),
);

// define buttons for form
$formButtons = array(
    LANG_SUBMIT => array('buttonType' => 'submit', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
    LANG_BACK   => array('buttonType' => 'cancel', 'disabled' => null, 'class' => null, 'name' => null, 'value' => null, 'action' => null),
);

//set params for form
$formParams = array(
    'name'    => LANG_ADD,
    'action'  => '',
    'method'  => 'post',
    'enctype' => '',
    'addnew'  => null,
);

print class_formGenerator($formParams, $formFields, $formButtons);