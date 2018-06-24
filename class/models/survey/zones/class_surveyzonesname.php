<?php
function class_surveyZonesGetId($Country,$State)
{
	$mysql_subquery = "
		SELECT
			a.Id AS CountryId,
			a.Name AS Country,
			b.Id AS StateId,
			b.Name AS State 
		FROM
			survey_zones a
			INNER JOIN survey_zones b ON b.ZonesId = a.Id 
		WHERE
			a.`Name` = '$Country' 
			AND b.`Name` = '$State'
	";
    $mysql_query    = "SELECT tb.* FROM ($mysql_subquery)tb";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
