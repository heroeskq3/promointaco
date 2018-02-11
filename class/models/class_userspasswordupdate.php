<?php
function class_usersPasswordUpdate($UserId,$Password)
{
    $mysql_query    = "UPDATE users u SET u.Password = '$Password' WHERE u.Id = $UserId";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
