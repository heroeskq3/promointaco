<?php
//Menu LANG_LIST Definition
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $submenulist = class_submenuList($row_array['Id']);

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_NAME        => $row_array['Name'],
                LANG_DESCRIPTION => $row_array['Description'],
                LANG_URL         => $row_array['Url'],
                LANG_ICON        => $row_array['Icon'],
                LANG_STATUS      => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'       => $row_array['Id'],
                'status'      => $row_array['Status'], //use = 1 or 0
                'childs'      => class_tableChildList($submenulist), //define array
            );
        }
    }

    return $results;
}

//SubMenu LANG_LIST Definition
function class_tableChildList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $results[] = array(
                //Define custom Child Table Alias Keys => Values
                LANG_NAME        => $row_array['Name'],
                LANG_DESCRIPTION => $row_array['Description'],
                LANG_URL         => $row_array['Url'],
                LANG_ICON        => $row_array['Icon'],
                LANG_STATUS      => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'       => $row_array['Id'],
                'status'      => $row_array['Status'], //use = 1 or 0
                'childs'      => null, //define array
            );
        }
    }

    return $results;
}

//menu list
$menulist    = class_menuList($Id);
$table_array = class_tableMainList($menulist);

//Table params
$table_params = array(
    'name'        => LANG_LIST,
    'searchbar'   => true,
    'rowsbypage'  => 0, //0 = when childs
    'showactions' => true,
    'showmore'    => true,
    'checkbox'    => 0,
    'addnew'      => false,
);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);