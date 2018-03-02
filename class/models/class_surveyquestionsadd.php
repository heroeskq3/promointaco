<?php
function class_surveyQuestionsAdd($SurveyId, $Question, $Description, $Order, $Status)
{
    $mysql_query    = "INSERT INTO survey_questions (SurveyId, Question, Description, `Order`, Status) VALUES('$SurveyId', '$Question', '$Description', '$Order', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
