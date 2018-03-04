<?php
function class_surveyCaresAdd($ZonesId, $Name, $Status)
{
    $mysql_query    = "INSERT INTO survey_cares (ZonesId, Name, `Status`) VALUES('$ZonesId', '$Name', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
