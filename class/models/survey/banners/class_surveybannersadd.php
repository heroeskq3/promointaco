<?php
function class_surveyBannersAdd($ServicesId, $Name, $Description, $Image, $Target, $Url, $Position, $Status)
{
    $mysql_query    = "INSERT INTO survey_banners (ServicesId, Name, Description, Image, Target, Url, Position, `Status`) VALUES('$ServicesId', '$Name', '$Description', '$Image', '$Target', '$Url', '$Position', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
