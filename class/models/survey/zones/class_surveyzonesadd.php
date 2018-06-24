<?php
function class_surveyZonesAdd($ZonesId, $Name, $Details, $Image, $Status)
{
    $mysql_query    = "INSERT INTO survey_zones (ZonesId, Name, Details, Image, `Status`) VALUES('$ZonesId', '$Name', '$Details', '$Image', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
