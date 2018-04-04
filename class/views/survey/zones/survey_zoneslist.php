<?php
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //childs
            $surveyzoneslist   = class_surveyZonesList($row_array['Id']);
            $array_childs = $surveyzoneslist['response'];

            $surveyzonesinfo = class_surveyZonesInfo($row_array['ZonesId']);
            $row_surveyzonesinfo = $surveyzonesinfo['response'][0];

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_NAME    => $row_array['Name'],
                LANG_ZONE    => $row_surveyzonesinfo['Name'],
                LANG_QNTY    => $surveyzoneslist['rows'],
                LANG_IMAGE    => $row_array['Image'],
                LANG_STATUS  => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'   => $row_array['Id'],
                'status'  => $row_array['Status'], //use = 1 or 0
                'childs'  => $array_childs, //define array
            );
        }
    }

    return $results;
}
if($Id){
    $ZonesId = $Id;
}
//survey list
$surveylist  = class_surveyZonesList($ZonesId);
$table_array = class_tableMainList($surveylist);

//Table params
$table_params = array(
    'name'        => LANG_LIST,
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