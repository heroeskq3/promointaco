<?php
function class_privilegesAdd($TypeId, $MenuId, $Add, $Update, $Delete)
{
    $mysql_query    = "INSERT INTO admin_privileges (TypeId, MenuId, `Add`, `Update`, `Delete`) VALUES('$TypeId', '$MenuId', '$Add', '$Update', '$Delete')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
