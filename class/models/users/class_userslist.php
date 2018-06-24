<?php
function class_usersList($UsersId)
{
    if($UsersId){
    	$mysql_query    = "SELECT u.* FROM admin_users u WHERE u.OwnerId = $UsersId OR u.Id = $UsersId";
    }else{
    	$mysql_query    = "SELECT a.*, b.Level FROM admin_users a INNER JOIN admin_userstype b ON b.Id = a.TypeId";
    }
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
