<?php
//Section Parameters
$section_tittle      = "Privileges";
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
//Update menu item
if ($action == "update") {
    header('Location: privileges_update.php?Id=' . $Id);
    die();
}

//Delete menu item
if ($action == "delete") {
    class_privilegesDelete($Id);
    header('Location: privileges_list.php');
    die();
}

$table_params = array(
    'name'        => "List",
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
                'Type'   => $row_typeinfo['Name'],
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
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
?>
<?php require_once 'footer.php';?>
<?php class_formScripts();
