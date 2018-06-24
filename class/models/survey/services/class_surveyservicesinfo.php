<?php
function class_surveyServicesInfo($Id)
{
    $mysql_query    = "SELECT a.* FROM survey_services a WHERE a.Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
