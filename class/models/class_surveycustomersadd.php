<?php
function class_surveyCustomersAdd($FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $CustomInfo4, $CustomInfo2, $Country, $SessionId, $Status)
{
    $mysql_query    = "INSERT INTO users_details (FirstName, LastName, Identification, Phone, Email, Company, Position, CustomInfo4, CustomInfo2, Country, SessionId, `Status`) VALUES('$FirstName', '$LastName', '$Identification', '$Phone', '$Email', '$Company', '$Position', '$CustomInfo4', '$CustomInfo2', '$Country', '$SessionId', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
