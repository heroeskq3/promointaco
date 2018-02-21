<?php
//Section Parameters
$section_tittle      = "Booking";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = null;
$step                = 3;
?>
<?php require_once 'header.php';?>
<h3>Packages</h3>
<hr>
<?php
//Update survey item
if ($action == "update") {
    header('Location: survey_update.php?Id=' . $Id);
    die();
}

if ($action == "add") {
    header('Location: surveyquestions.php?Id=' . $Id);
    die();
}

//Delete survey item
if ($action == "delete") {
    class_surveyDelete($Id);
    header('Location: survey_list.php');
    die();
}

//Define Main Table
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //childs
            $array_childs        = null;

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Name'        => $row_array['Name'],
                'Price'       => $row_array['Price'],
                'IV'          => $row_array['IV'],
                'IS'          => $row_array['IS'],
                'VigenciaDel' => $row_array['VigenciaDel'],
                'VigenciaAl'  => $row_array['VigenciaAl'],
                'Sector'      => $row_array['SectorId'],

                //Define Index, Status, Childs
                'index'       => $row_array['Id'],
                'status'      => $row_array['Status'], //use = 1 or 0
                'childs'      => $array_childs, //define array
            );
        }
    }

    return $results;
}

//book packages list
$bookpackageslist  = class_bookPackagesList();
$table_array = class_tableMainList($bookpackageslist);

//Table params
$table_params = array(
    'name'        => 'List',
    'searchbar'   => null,
    'rowsbypage'  => 10, //0 = when childs
    'showactions' => false,
    'showmore'    => false,
    'checkbox'    => 0,
);

//set params for form
$formParams = array(
    'name'    => null,
    'action'  => 'book_register.php',
    'method'  => 'post',
    'enctype' => null,
);

// define buttons for form
$formButtons = array(
    'Back' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' => 'button', 'value' => 'back', 'action' => null),
    'Next' => array('buttonType' => 'submit', 'class' => 'btn btn-submit', 'name' => 'button', 'value' => 'next', 'action' => null),
);

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
?>
<?php require_once 'footer.php';?>
