<?php
$table_params = array(
    'name'        => LANG_LIST,
    'searchbar'   => true,
    'rowsbypage'  => 10,
    'showactions' => true,
    'showmore'    => false,
    'checkbox'    => false,
);

//Table Main
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //Type Info
            $typeinfo     = class_usersTypeInfo($row_array['TypeId']);
            $row_typeinfo = $typeinfo['response'][0];

            //Menu Info
            if ($row_array['MenuId']) {
                $menuinfo     = class_menuInfo($row_array['MenuId']);
                $row_menuinfo = $menuinfo['response'][0];
            } else {
                $row_menuinfo['Name'] = "All";
            }

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_TYPE   => $row_typeinfo['Name'],
                'Menu'   => $row_menuinfo['Name'],
                'Add'    => class_statusIcon($row_array['Add']),
                'Update' => class_statusIcon($row_array['Update']),
                'Delete' => class_statusIcon($row_array['Delete']),

                //Define Index, Status, Childs
                'index'  => $row_array['Id'],
                'status' => null, //use = 1 or 0
                'childs' => null, //define array
            );
        }
    }

    return $results;
}

$privilegeslist = class_privilegesList();
$table_array    = class_tableMainList($privilegeslist);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
print class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
