<?php
function class_surveyAnswersUpdate($Id, $QuestionId, $Answer, $Points, $Status)
{
    $mysql_query    = "UPDATE survey_answers SET QuestionId = '$QuestionId', Answer = '$Answer', Points = '$Points', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
