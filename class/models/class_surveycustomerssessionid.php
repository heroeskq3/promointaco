<?php
function class_surveyCustomersSessionId($SessionId)
{
    $mysql_query    = "SELECT a.Id FROM survey_customers a WHERE a.SessionId = '$SessionId'";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
