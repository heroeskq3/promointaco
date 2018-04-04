<?php
function class_submenuList($MenuId)
{
    $mysql_query    = "SELECT m.* FROM admin_menu m WHERE m.MenuId = '$MenuId' ORDER BY m.Order, m.Name ASC";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}