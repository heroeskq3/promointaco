<?php
function class_customersAdd($Identification, $FirstName, $LastName, $MiddleName, $Company, $Position, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $SessionId, $Status)
{
    $mysql_query    = "INSERT INTO users_details (Identification,FirstName, LastName, MiddleName, Company, Position, Phone, Mobile, Email, Country, State, City, Address, Details, Responsible, CustomInfo1, CustomInfo2, CustomInfo3, CustomInfo4, CustomInfo5, Image, SessionId, `Status`) VALUES('$Identification','$FirstName', '$LastName', '$MiddleName', '$Company', '$Position', '$Phone', '$Mobile', '$Email', '$Country', '$State', '$City', '$Address', '$Details', '$Responsible', '$CustomInfo1', '$CustomInfo2', '$CustomInfo3', '$CustomInfo4', '$CustomInfo5', '$Image', '$SessionId', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
