<?php
if ($action == "add") {
    header('Location: surveycares.php?Id=' . $Id);
    die();
}
//Update survey item
if ($action == "update") {
    header('Location: surveycares_update.php?Id=' . $Id);
    die();
}

//Delete survey item
if ($action == "delete") {
    class_surveyCaresDelete($Id);
    header('Location: surveycares.php');
    die();
}

//Define Main Table
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //childs
            $array_childs = null;

            //zones info
            $surveyzonesinfo     = class_surveyZonesInfo($row_array['ZonesId']);
            $row_surveyzonesinfo = $surveyzonesinfo['response'][0];
            if(!$row_array['ZonesId']){
                $row_surveyzonesinfo['Name'] = 'Todas';
            }

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Name'   => $row_array['Name'],
                'Zones'  => $row_surveyzonesinfo['Name'],
                'Status' => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'  => $row_array['Id'],
                'status' => $row_array['Status'], //use = 1 or 0
                'childs' => $array_childs, //define array
            );
        }
    }

    return $results;
}

//survey list
$surveylist  = class_surveyCaresList();
$table_array = class_tableMainList($surveylist);

//Table params
$table_params = array(
    'name'        => "List",
    'searchbar'   => true,
    'rowsbypage'  => 10, //0 = when childs
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
