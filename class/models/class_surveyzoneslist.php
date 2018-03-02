<?php
function class_surveyZonesList($ZonesId)
{
    if($ZonesId){
    	$mysql_query    = "SELECT z.* FROM survey_zones z WHERE z.ZonesId = $ZonesId";
    }else{
		$mysql_query    = "SELECT z.* FROM survey_zones z";
    }
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
