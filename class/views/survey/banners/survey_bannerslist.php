<?php
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //childs
            $array_childs = null;

            $surveyservicesinfo = class_surveyServicesInfo($row_array['ServicesId']);
            $row_surveyservicesinfo = $surveyservicesinfo['response'][0];

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_SURVEY      => $row_surveyservicesinfo['Name'],
                LANG_NAME        => $row_array['Name'],
                LANG_DESCRIPTION => $row_array['Description'],
                LANG_IMAGE       => $row_array['Image'],
                LANG_TARGET      => $row_array['Target'],
                LANG_URL         => $row_array['Url'],
                LANG_POSITION    => $row_array['Position'],
                LANG_STATUS      => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'          => $row_array['Id'],
                'status'         => $row_array['Status'], //use = 1 or 0
                'childs'         => $array_childs, //define array
            );
        }
    }

    return $results;
}

//survey list
$bannerslist = class_surveyBannersList();
$table_array = class_tableMainList($bannerslist);

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
