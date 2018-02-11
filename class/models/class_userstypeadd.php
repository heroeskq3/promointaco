<?php
function class_usersTypeAdd($Name, $Admin, $Status)
{
    $mysql_query    = "INSERT INTO users_type (Name, Admin, `Status`) VALUES('$Name', '$Admin', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
