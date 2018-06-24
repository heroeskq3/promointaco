<?php
function class_login($UserName, $Password)
{
    $mysql_query    = "SELECT u.Id FROM admin_users u WHERE u.Status = 1 AND u.UserName = '$UserName' AND u.Password = '$Password'";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $result = $mysql_result;

    return $result;
}
