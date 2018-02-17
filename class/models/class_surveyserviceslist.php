<?php
function class_surveyServicesList($Country)
{
	if(isset($Country)){
		$mysql_query    = "SELECT s.* FROM survey s WHERE s.Status = 1 AND (s.Country = '$Country' OR s.Country = '' OR s.Country IS NULL)";
	}else{
		$mysql_query    = "SELECT s.* FROM survey s WHERE s.Status = 1";
	}
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
