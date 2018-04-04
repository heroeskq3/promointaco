<?php
function class_usersAdd($UsersIndex, $UserName, $Password, $TypeId, $OwnerId, $Status)
{
    $mysql_query    = "INSERT INTO admin_users (UsersIndex, UserName, Password, TypeId, OwnerId, `Status`) VALUES('$UsersIndex', '$UserName', '$Password', '$TypeId', '$OwnerId', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
