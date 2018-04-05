<?php
function class_surveyUpdate($Id, $ServicesId, $Name, $Description, $Details, $InputType, $InputImage, $InputHover, $Rows, $Order, $Status)
{
    $mysql_query    = "UPDATE survey SET ServicesId = '$ServicesId', Name = '$Name', Description = '$Description', Details = '$Details', InputType = '$InputType', InputImage = '$InputImage', InputHover = '$InputHover', Rows = '$Rows', `Order` = '$Order', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
