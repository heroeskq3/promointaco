<?php
function class_usersTypeUpdate($Id, $Name, $Admin, $Level, $Status)
{
    $mysql_query    = "UPDATE admin_userstype ut SET ut.Name = '$Name', ut.Admin = '$Admin', ut.Level = '$Level', ut.Status = '$Status' WHERE ut.Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
