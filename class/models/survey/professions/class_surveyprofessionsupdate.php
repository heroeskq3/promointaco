<?php
function class_surveyProfessionsUpdate($Id, $WorkareaId, $Name, $Status)
{
    $mysql_query    = "UPDATE survey_professions SET WorkareaId = '$WorkareaId', Name = '$Name', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
