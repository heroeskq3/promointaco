<?php
function class_surveyServicesAdd($Name, $Details, $Status)
{
    $mysql_query    = "INSERT INTO survey_services (Name, Details, Status) VALUES('$Name', '$Details', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
