<?php
function class_surveyProfessionsInfo($Id)
{
    $mysql_query    = "SELECT a.* FROM survey_professions a WHERE a.Id = '$Id'";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
