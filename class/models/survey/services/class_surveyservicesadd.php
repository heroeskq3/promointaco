<?php
function class_surveyServicesAdd($ZonesId, $Name, $Description, $Details, $Terms, $FormId, $Status)
{
    $mysql_query    = "INSERT INTO survey_services (ZonesId, Name, Description, Details, Terms, FormId, Status) VALUES('$ZonesId', '$Name', '$Description', '$Details', '$Terms', '$FormId', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
