<?php
function class_assideSubmenuList($MenuId,$TypeId)
{
    $mysql_query    = "SELECT m.* FROM admin_menu m INNER JOIN `admin_privileges` p ON (p.MenuId = m.Id OR p.MenuId = 0) WHERE m.STATUS = 1 AND m.MenuId = $MenuId AND p.TypeId = $TypeId ORDER BY m.ORDER ASC";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
