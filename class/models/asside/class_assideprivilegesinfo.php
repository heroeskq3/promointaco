<?php
function class_privilegesValidate($TypeId,$MenuId)
{
    $mysql_query    = "SELECT p.* FROM admin_privileges p WHERE p.TypeId = $TypeId";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
