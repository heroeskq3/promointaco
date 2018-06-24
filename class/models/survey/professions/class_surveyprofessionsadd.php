<?php
function class_surveyProfessionsAdd($WorkareaId, $Name, $Status)
{
    $mysql_query    = "INSERT INTO survey_professions (WorkareaId, Name, `Status`) VALUES('$WorkareaId', '$Name', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
