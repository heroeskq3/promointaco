<?php
function class_usersdetailsAdd($FirstName, $LastName, $MiddleName, $Company, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status)
{
    $mysql_query    = "INSERT INTO admin_usersdetails (FirstName, LastName, MiddleName, Company, Phone, Mobile, Email, Country, State, City, Address, Details, Responsible, CustomInfo1, CustomInfo2, CustomInfo3, CustomInfo4, CustomInfo5, Image, `Status`) VALUES('$FirstName', '$LastName', '$MiddleName', '$Company', '$Phone', '$Mobile', '$Email', '$Country', '$State', '$City', '$Address', '$Details', '$Responsible', '$CustomInfo1', '$CustomInfo2', '$CustomInfo3', '$CustomInfo4', '$CustomInfo5', '$Image', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
