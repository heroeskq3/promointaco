<?php
function class_privilegesUpdate($Id, $TypeId, $MenuId, $Add, $Update, $Delete)
{
    $mysql_query    = "UPDATE privileges SET TypeId = '$TypeId', MenuId = '$MenuId', `Add` = '$Add', `Update` = '$Update', `Delete` = '$Delete' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
