<?php
function class_surveyWorkareasList($ZonesId)
{
    if($ZonesId){
    	$mysql_query    = "SELECT a.* FROM survey_workareas a WHERE a.ZonesId = $ZonesId OR a.ZonesId = 0";
    }else{
    	$mysql_query    = "SELECT a.* FROM survey_workareas a";
    }
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
