<?php
function class_surveyQuestionsUpdate($Id, $SurveyId, $Question, $Description, $Order, $Status)
{
    $mysql_query    = "UPDATE survey_questions SET SurveyId = '$SurveyId', Question = '$Question', Description = '$Description', `Order` = '$Order', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
