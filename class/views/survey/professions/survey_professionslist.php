<?php
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            if ($row_array['WorkareaId']) {
                $surveypositioninfo     = class_surveyWorkareasInfo($row_array['WorkareaId']);
                $row_surveypositioninfo = $surveypositioninfo['response'][0];
                $position_name          = $row_surveypositioninfo['Name'];
            } else {
                $position_name = LANG_ALL;
            }

            //childs
            $array_childs = null;

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_NAME   => $row_array['Name'],
                LANG_POSITION  => $position_name,
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
$surveylist  = class_surveyProfessionsList();
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