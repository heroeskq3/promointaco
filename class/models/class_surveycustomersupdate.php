<?php
function class_surveyCustomersUpdate($Id, $Company, $FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $CustomInfo4, $CustomInfo2, $Country, $Status)
{
    $mysql_query    = "UPDATE users_details SET Company = '$Company', FirstName = '$FirstName', LastName = '$LastName', Identification = '$Identification', Phone = '$Phone', Email = '$Email', Company = '$Company', Position = '$Position', CustomInfo4 = '$CustomInfo4', CustomInfo2 = '$CustomInfo2', Country = '$Country', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
