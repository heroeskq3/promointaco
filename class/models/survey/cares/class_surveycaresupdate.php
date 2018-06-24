<?php
function class_surveyCaresUpdate($Id, $ZonesId, $Name, $Status)
{
    $mysql_query    = "UPDATE survey_cares SET ZonesId = '$ZonesId', Name = '$Name', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
