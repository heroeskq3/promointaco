<?php
function class_surveyServicesUpdate($Id, $ZonesId, $Name, $Description, $Details, $Terms, $Image, $Status)
{
    $mysql_query    = "UPDATE survey_services SET ZonesId = '$ZonesId', Name = '$Name', Description = '$Description', Details = '$Details', Terms = '$Terms', Image = '$Image', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
