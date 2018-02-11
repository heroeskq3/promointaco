<?php
//Section Parameters
$section_tittle      = "Survey";
$section_description = null;
$section_restrict    = 1;
$section_navbar      = 1;
$section_sidebar     = 1;
$section_searchbar   = 0;
$section_style       = 1;
$section_homedir     = '../';
?>
<?php require_once 'header.php';?>
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
    class_surveyDelete($Id);
    header('Location: survey_list.php');
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

            //suma valores
            $suma_answers = 0;
            if($array_childs){
                foreach ($array_childs as $row_surveyquestions) {
                    $surveyanswers = class_surveyAnswersList($row_surveyquestions['Id']);
                    if($surveyanswers['rows']){
                        foreach ($surveyanswers['response'] as $row_surveyanswers) {
                        $suma_answers = $suma_answers+$row_surveyanswers['Points'];
                        }
                    }
                }
            }

            $results[] = array(
                //Define custom Patern Table Alias Keys => Values
                'Name'      => $row_array['Name'],
                'Questions' => $surveyquestionslist['rows'],
                'Valor'     => $suma_answers.' Points',
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
$surveylist  = class_surveyList();
$table_array = class_tableMainList($surveylist);

//Table params
$table_params = array(
    'name'        => "List",
    'searchbar'   => true,
    'rowsbypage'  => 10, //0 = when childs
    'showactions' => true,
    'showmore'    => true,
    'checkbox'    => 0,
);

//generate table list
class_tableGenerator($table_array, $table_params);
?>
<?php require_once 'footer.php';
