<?php
//Section Parameters
$section_tittle      = "Welcome";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$section_step        = 0;
?>
<?php require_once 'header.php';?>
<?php
//Define Main Table
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //childs
            $array_childs = null;

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Name'   => $row_array['MetaTittle'],

                //Define Index, Status, Childs
                'index'  => $row_array['Id'],
                'status' => $row_array['Status'], //use = 1 or 0
                'childs' => $array_childs, //define array
            );
        }
    }

    return $results;
}

//book packages list
$siteslist   = class_sitesList();
$table_array = class_tableMainList($siteslist);

//Table params
$table_params = array(
    'name'        => 'List',
    'searchbar'   => null,
    'rowsbypage'  => 10, //0 = when childs
    'showactions' => false,
    'showmore'    => false,
    'checkbox'    => false,
    'addnew'      => null,
);

//set params for form
$formParams = array(
    'name'    => null,
    'action'  => 'survey_home.php',
    'method'  => 'post',
    'enctype' => null,
);

// define buttons for form
$formButtons = null;

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
?>
<?php require_once 'footer.php';
