<?php
function class_menuList($MenuId)
{
	if(isset($MenuId)){
		$mysql_query    = "SELECT m.* FROM menu m WHERE MenuId = $MenuId ORDER BY m.Order ASC";
	}else{
		$mysql_query    = "SELECT m.* FROM menu m WHERE MenuId = 0 ORDER BY m.Order ASC";
	}
    
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
