<?php
$table_params = array(
    'name'        => LANG_LIST,
    'searchbar'   => true,
    'rowsbypage'  => 10,
    'showactions' => false,
    'showmore'    => false,
    'checkbox'    => false,
);

//users list
$iconslist = class_iconsList();

if ($iconslist['rows']) {
    $table_array = array();
    foreach ($iconslist['response'] as $row_iconslist) {

        $table_array[] = array(
            //Define custom Patern Table Alias Keys => Values
            LANG_NAME   => $row_iconslist,
            LANG_ICON   => '<i class="fa ' . $row_iconslist . ' fa-fw" style="font-size:19px;"></i>',

            //Define Index, Status, Childs
            'index'  => null,
            'status' => null, //use = 1 or 0
            'childs' => null, //define array
        );
    }
}

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
