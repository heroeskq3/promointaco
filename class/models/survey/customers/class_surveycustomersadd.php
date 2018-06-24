<?php
function class_surveyCustomersAdd($FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $Workarea, $Profession, $Care, $Local, $CustomInfo1, $Country, $State, $City, $SessionId, $Status)
{
    $mysql_query    = "INSERT INTO survey_customers (FirstName, LastName, Identification, Phone, Email, Company, Position, Workarea, Profession, Care, Local, CustomInfo1, Country, State, City, SessionId, `Status`) VALUES('$FirstName', '$LastName', '$Identification', '$Phone', '$Email', '$Company', '$Position', '$Workarea', '$Profession', '$Care', '$Local', '$CustomInfo1', '$Country', '$State', '$City', '$SessionId', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
