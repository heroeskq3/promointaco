<?php
function class_menuList()
{
    $mysql_query    = "SELECT m.* FROM menu m WHERE MenuId = 0 ORDER BY m.Order ASC";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
