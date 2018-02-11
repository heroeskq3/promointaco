<?php 

function class_sectionInfoUrl($url){

    $mysql_query    = "SELECT m.* FROM menu m WHERE m.Url = '$url'";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

	return $results;
}
?>