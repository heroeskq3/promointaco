<?php
function class_surveyServicesUpdate($Id, $Name, $Details, $Status)
{
    $mysql_query    = "UPDATE survey_services SET Name = '$Name', Details = '$Details', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
