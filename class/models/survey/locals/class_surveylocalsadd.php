<?php
function class_surveyLocalsAdd($ZonesId, $Name, $Status)
{
    $mysql_query    = "INSERT INTO survey_locals (ZonesId, Name, `Status`) VALUES('$ZonesId', '$Name', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
