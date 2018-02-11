<?php
function class_assideSubmenuList($MenuId,$TypeId)
{
    if(isset($TypeId)){
		$mysql_query    = "SELECT m.* FROM menu m INNER JOIN `privileges` p ON p.MenuId = m.Id WHERE m.Status = 1 AND m.MenuId > 0 AND p.TypeId = $TypeId ORDER BY m.Order, m.Name ASC";
	}else{
    	$mysql_query    = "SELECT m.* FROM menu m WHERE m.MenuId = '$MenuId' AND m.Status = 1 ORDER BY m.Order, m.Name ASC";
	}
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
