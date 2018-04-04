<?php
function class_assideMenuList($TypeId)
{
    if(isset($TypeId)){
		$mysql_query    = "SELECT m.* FROM admin_menu m INNER JOIN `qa_customers` p ON p.MenuId = m.Id WHERE m.Status = 1 AND m.MenuId = 0 AND p.TypeId = $TypeId ORDER BY m.Order, m.Name ASC";
    }else{
    	$mysql_query    = "SELECT m.* FROM admin_menu m WHERE m.Status = 1 AND MenuId = 0 ORDER BY m.Order, m.Name ASC";
    }
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
