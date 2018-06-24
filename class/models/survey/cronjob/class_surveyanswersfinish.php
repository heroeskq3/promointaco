<?php
function class_surveyAnswersFinish()
{
    $mysql_query    = "UPDATE (SELECT Customer FROM(SELECT * FROM
		(SELECT tb.Customer, COUNT(1) AS QNTY
		FROM (SELECT a.*,b.Id AS Customer
		FROM survey_results a
		INNER JOIN survey_customers b ON b.Id = a.CustomersId
		GROUP BY a.CustomersId, a.QuestionId
		)tb
		GROUP BY tb.CustomersId)tb2
		WHERE QNTY = 50)tb3) a, survey_customers b
		SET b.SurveyFinish = 1
		WHERE a.Customer = b.Id
		AND b.SurveyFinish IS NULL
    ";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
