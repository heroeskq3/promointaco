<?php
function class_surveyAdd($ServicesId, $Name, $Details, $InputType, $InputImage, $Rows, $Order, $Status)
{
    $mysql_query    = "INSERT INTO survey (ServicesId, Name, Details, InputType, InputImage, Rows, `Order`, Status) VALUES('$ServicesId', '$Name', '$Details', '$InputType', '$InputImage', '$Rows', '$Order', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
