<?php
function class_sitesInfo($Id)
{
    $mysql_query    = "SELECT s.* FROM admin_sites s WHERE s.Id = '$Id'";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
