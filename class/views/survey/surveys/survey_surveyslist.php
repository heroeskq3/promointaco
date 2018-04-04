<?php
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            //childs
            $surveyquestionslist = class_surveyQuestionsList($row_array['Id']);
            $array_childs        = $surveyquestionslist['response'];

            //services info
            $surveyservicesinfo     = class_surveyServicesInfo($row_array['ServicesId']);
            $row_surveyservicesinfo = $surveyservicesinfo['response'][0];

            //suma valores
            $suma_answers = 0;
            if ($array_childs) {
                foreach ($array_childs as $row_surveyquestions) {
                    $surveyanswers = class_surveyAnswersList($row_surveyquestions['Id']);
                    if ($surveyanswers['rows']) {
                        foreach ($surveyanswers['response'] as $row_surveyanswers) {
                            $suma_answers = $suma_answers + $row_surveyanswers['Points'];
                        }
                    }
                }
            }

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                LANG_ORDER     => $row_array['Order'],
                LANG_NAME      => $row_array['Name'],
                LANG_SERVICES   => $row_surveyservicesinfo['Name'],
                LANG_QUESTIONS => $surveyquestionslist['rows'],
                LANG_POINTS     => $suma_answers . ' Points',
                LANG_INPUT     => $row_array['InputType'],
                LANG_PERPAGE  => $row_array['Rows'],
                LANG_STATUS    => class_statusInfo($row_array['Status']),

                //Define Index, Status, Childs
                'index'     => $row_array['Id'],
                'status'    => $row_array['Status'], //use = 1 or 0
                'childs'    => $array_childs, //define array
            );
        }
    }

    return $results;
}

//survey list
$surveylist  = class_surveyList($Id);
$table_array = class_tableMainList($surveylist);

//Table params
$table_params = array(
    'name'        => LANG_LIST,
    'searchbar'   => true,
    'rowsbypage'  => 10, //0 = when childs
    'showactions' => true,
    'showmore'    => 'questions',
    'checkbox'    => 0,
    'addnew'      => false,
);

//set params for form
$formParams = null;

// define buttons for form
$formButtons = null;

//generate table list
class_tableGenerator($table_array, $table_params, $formParams, $formButtons);
