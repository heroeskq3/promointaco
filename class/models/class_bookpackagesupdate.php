<?php
function class_bookPackagesUpdate($Id, $PackCode, $Name, $Price, $IV, $IS, $VigenciaDel, $VigenciaAl, $SectorId, $Status)
{
    $mysql_query    = "UPDATE book_packages SET PackCode = '$PackCode', Name = '$Name', Price = '$Price', IV = '$IV', `IS` = '$IS', VigenciaDel = '$VigenciaDel', VigenciaAl = '$VigenciaAl', SectorId = '$SectorId', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}