<?php
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //childs
            $surveyanswerslist = class_surveyAnswersList($row_array['Id']);
            $array_childs = $surveyanswerslist['response'];

            //suma valores
            $suma_answers = 0;
            if($array_childs){
                foreach ($array_childs as $row_surveyanswers) {
                        $suma_answers = $suma_answers+$row_surveyanswers['Points'];
                }
            }

            //info
            $surveyinfo = class_surveyInfo($row_array['SurveyId']);
            $row_surveyinfo = $surveyinfo['response'][0];

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_ORDER    => $row_array['Order'],
                LANG_QUESTION    => $row_array['Question'],
                'Answers'      => $surveyanswerslist['rows'],
                'Valor'      => $suma_answers.' Points',
                LANG_LASTUPDATE => $row_array['LastUpdate'],
                LANG_STATUS      => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'       => $row_array['Id'],
                'status'      => $row_array['Status'], //use = 1 or 0
                'childs'      => $array_childs, //define array
            );
        }
    }

    return $results;
}

//survey list
$surveylist = class_surveyQuestionsList($Id);

//generate main table definition
$table_array = class_tableMainList($surveylist);

//Table params
$table_params = array(
    'name'        => LANG_LIST,
    'searchbar'   => true,
    'rowsbypage'  => 0, //0 = when childs
    'showactions' => true,
    'showmore'    => 'answers',
    'checkbox'    => false,
    'addnew'      => false,
);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);