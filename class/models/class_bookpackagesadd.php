<?php
function class_bookPackagesAdd($PackCode, $Name, $Price, $IV, $IS, $VigenciaDel, $VigenciaAl, $SectorId, $Status)
{
    $mysql_query    = "INSERT INTO book_packages (PackCode, Name, Price, IV, `IS`, VigenciaDel, VigenciaAl, SectorId, Status) VALUES('$PackCode', '$Name', '$Price', '$IV', '$IS', '$VigenciaDel', '$VigenciaAl', '$SectorId', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
