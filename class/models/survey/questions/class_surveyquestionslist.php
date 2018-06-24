<?php
function class_surveyQuestionsList($SurveyId)
{
    if(isset($SurveyId)){
    	$mysql_query    = "SELECT sq.* FROM survey_questions sq WHERE sq.SurveyId = $SurveyId ORDER BY `ORDER` ASC";
    }else{
    	$mysql_query    = "SELECT sq.* FROM survey_questions sq";
    }
    
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
