<?php
function class_surveyList($ServicesId)
{
    if($ServicesId){
    	$mysql_query = "SELECT s.* FROM survey s WHERE s.ServicesId = $ServicesId ORDER BY s.`Order` ASC";
    }else{
    	$mysql_query = "SELECT s.* FROM survey s ORDER BY s.`Order` ASC";
    }
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
