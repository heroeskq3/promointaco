<?php
function class_surveyBannersUpdate($Id, $ServicesId, $Name, $Description, $Image, $Target, $Url, $Position, $Status)
{
    $mysql_query    = "UPDATE survey_banners SET ServicesId = '$ServicesId', Name = '$Name', Description = '$Description', Image = '$Image', Target = '$Target', Url = '$Url', Position = '$Position', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
