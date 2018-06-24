<?php
function class_surveyAnswersCustomers()
{
    $mysql_query = "UPDATE survey_results a,
	survey_customers b,
	(SELECT Id, SessionId FROM survey_results WHERE CustomersId IS NULL) c
	SET a.CustomersId = b.Id
	WHERE c.SessionId = b.SessionId
	AND a.Id = c.Id
	AND b.SurveyFinish IS NULL
    ";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
