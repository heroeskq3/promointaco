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

    //Survey info
    $surveyinfo     = class_surveyInfo($Id);
    $row_surveyinfo = $surveyinfo['response'][0];

    class_surveyDelete($Id);

    header('Location: survey.php?Id=' . $row_surveyinfo['ServicesId']);
    die();
}

//Define Main Table
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
                'Order'     => $row_array['Order'],
                'Name'      => $row_array['Name'],
                'Service'   => $row_surveyservicesinfo['Name'],
                'Questions' => $surveyquestionslist['rows'],
                'Valor'     => $suma_answers . ' Points',
                'Per Page'  => $row_array['Rows'],
                'Status'    => class_statusInfo($row_array['Status']),

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
