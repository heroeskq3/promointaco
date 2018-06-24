<?php
function class_tableMainList($array)
{
    $results = array();
    if ($array['rows']) {
        foreach ($array['response'] as $row_array) {

            if($row_array['SurveyFinish']){
                $SurveyFinish = "Finalizada";
            }else{
                $SurveyFinish = "Incompleta";
            }


            $results[] = array(

                //Define custom Patern Table Alias Keys => Values
                'ID'          => $row_array['CustomersId'],
                'Nombre'      => $row_array['Customer'],
                'País'        => $row_array['Country'],
                'Campaña'     => $row_array['Service'],
                'Encuesta'    => $row_array['Survey'],
                'Pregunta'    => $row_array['Question'],
                'Respuesta'   => $row_array['Answer'],
                'Puntos'      => $row_array['Points'],
                'Position'    => $row_array['Position'],
                'Agente'      => $row_array['Care'],
                'Fecha'       => $row_array['CreateDate'],
                'Finalizada'  => $SurveyFinish,

                //Define Index, Status, Childs
                'index'       => $row_array['CustomersId'],
                'status'      => 0, //use = 1 or 0
                'childs'      => null, //define array
            );
        }
    }
    return $results;
}

$reportsParams = array(

    'searchbar' => true,
    'filterbar' => true,
    'filter'    => true,
    'resume'    => true,
    'order'     => true,
    'table'     => true,
    'limit'     => 10,
    'hidecols'  => null,
);

//answers generator
$qaresultsanswers = class_surveyResultsAnswers();
//echo "<pre>";
//print_r($qaresultsanswers);
//$qaresultsanswers = class_arrayFilter($qaresultsanswers, 'CustomersId', '923', '=');

//echo "<pre>";
//print_r($qaresultsanswers);

$array_qaresultsanswers = class_tableMainList($qaresultsanswers);

//generate reports
print class_reportsGenerator($array_qaresultsanswers, $reportsParams, null);
