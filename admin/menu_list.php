<?php
//Section Parameters
$section_tittle      = "Menu Manager";
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
    header('Location: menu_update.php?Id=' . $Id);
    die();
}

//Delete menu item
if ($action == "delete") {
    class_menuDelete($Id);
    header('Location: menu_list.php');
    die();
}

//Show more
if ($action == "add") {
    header('Location: menulevel2.php?Id=' . $Id);
    die();
}

//Menu List Definition
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $submenulist = class_submenuList($row_array['Id']);

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Name'        => $row_array['Name'],
                'Description' => $row_array['Description'],
                'Url'         => $row_array['Url'],
                'Icon'        => $row_array['Icon'],
                'Status'      => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'       => $row_array['Id'],
                'status'      => $row_array['Status'], //use = 1 or 0
                'childs'      => class_tableChildList($submenulist), //define array
            );
        }
    }

    return $results;
}

//SubMenu List Definition
function class_tableChildList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            $results[] = array(
                //Define custom Child Table Alias Keys => Values
                'Name'        => $row_array['Name'],
                'Description' => $row_array['Description'],
                'Url'         => $row_array['Url'],
                'Icon'        => $row_array['Icon'],
                'Status'      => class_statusInfo($row_array['Status']),

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
$menulist    = class_menuList(null);
$table_array = class_tableMainList($menulist);

//Table params
$table_params = array(
    'name'        => "List",
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
?>
<?php require_once 'footer.php';
