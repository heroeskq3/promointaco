<?php
function class_surveyResultsAnswers()
{
    $mysql_query    = "SELECT b.Id AS CustomersId,
	CONCAT_WS( ' ', b.FirstName, b.LastName ) AS Customer,
	g.`Name` AS Country,
	f.`Name` AS Service,
	e.`Name` AS Survey,
	d.Question,
	c.Answer,
	c.Points,
	b.Position,
	b.Care,
	b.CreateDate,
	b.SurveyFinish
FROM
	survey_results a
	INNER JOIN survey_customers b ON b.Id = a.CustomersId
	INNER JOIN survey_answers c ON c.Id = a.AnswerId
	INNER JOIN survey_questions d ON d.Id = c.QuestionId
	INNER JOIN survey e ON e.Id = d.SurveyId
	INNER JOIN survey_services f ON f.Id = e.ServicesId
	INNER JOIN survey_zones g ON g.Id = f.ZonesId
	WHERE DATE(a.DateAdd) = DATE(NOW())
    ";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
