<?php
//Update survey item
if ($action == "update") {
    header('Location: surveyanswers_update.php?Id=' . $Id);
    die();
}

//Delete survey item
if ($action == "delete") {
    //answer info
    $surveyanswersinfo     = class_surveyAnswersInfo($Id);
    $row_surveyanswersinfo = $surveyanswersinfo['response'][0];
    
    //delete
    class_surveyAnswersDelete($Id);

    //redirect
    header('Location: surveyanswers.php?Id='.$row_surveyanswersinfo['QuestionId']);
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

            //info
            $surveyquestionsinfo = class_surveyQuestionsInfo($row_array['QuestionId']);

            $row_surveyquestionsinfo = $surveyquestionsinfo['response'][0];

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Answer'    => $row_array['Answer'],
                'Points'    => $row_array['Points'],
                'Points2'    => $row_array['Points'],
                'Last Update' => $row_array['LastUpdate'],
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

//survey list
$surveyanswerslist = class_surveyAnswersList($Id);

//generate main table definition
$table_array = class_tableMainList($surveyanswerslist);

//Table params
$table_params = array(
    'name'        => "List",
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
