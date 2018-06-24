<?php
function class_usersTypeAdd($Name, $Admin, $Level, $Status)
{
    $mysql_query    = "INSERT INTO admin_userstype (Name, Admin, Level, `Status`) VALUES('$Name', '$Admin', '$Level', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
