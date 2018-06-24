<?php
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //childs
            $array_childs = null;

            //info
            $surveyquestionsinfo = class_surveyQuestionsInfo($row_array['QuestionId']);

            $row_surveyquestionsinfo = $surveyquestionsinfo['response'][0];

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_POINTS      => $row_array['Points'],
                LANG_ANSWER      => $row_array['Answer'],
                LANG_LASTUPDATE => $row_array['LastUpdate'],
                LANG_STATUS      => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'       => $row_array['Id'],
                'status'      => $row_array['Status'], //use = 1 or 0
                'childs'      => null, //define array
            );
        }
    }

    return $results;
}

//survey list
$surveyanswerslist = class_surveyAnswersList($Id);

//generate main table definition
$table_array = class_tableMainList($surveyanswerslist);

//Table params
$table_params = array(
    'name'        => LANG_LIST,
    'searchbar'   => true,
    'rowsbypage'  => 0, //0 = when childs
    'showactions' => true,
    'showmore'    => false,
    'checkbox'    => false,
    'addnew'      => false,
);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
