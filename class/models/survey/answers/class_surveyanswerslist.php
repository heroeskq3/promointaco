<?php
function class_surveyAnswersList($QuestionId)
{
    $mysql_query    = "SELECT sa.* FROM survey_answers sa WHERE sa.QuestionId = $QuestionId";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
