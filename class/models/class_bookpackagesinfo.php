<?php
function class_bookPackagesInfo($Id)
{
    $mysql_query    = "SELECT bp.* FROM book_packages bp WHERE bp.Id = '$Id'";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
