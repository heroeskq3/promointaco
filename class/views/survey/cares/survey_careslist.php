<?php
//Define Main Table
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //childs
            $array_childs = null;

            if ($row_array['ZonesId']) {
                $surveyzonesinfo     = class_surveyZonesInfo($row_array['ZonesId']);
                $row_surveyzonesinfo = $surveyzonesinfo['response'][0];
                $zones_name          = $row_surveyzonesinfo['Name'];
            } else {
                $zones_name = 'All';
            }

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_NAME   => $row_array['Name'],
                LANG_ZONES  => $zones_name,
                LANG_STATUS => class_statusInfo($row_array['Status']),

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
    'name'        => LANG_LIST,
    'searchbar'   => true,
    'rowsbypage'  => 10, //0 = when childs
    'showactions' => true,
    'showmore'    => false,
    'checkbox'    => 0,
    'addnew'      => false,
);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
