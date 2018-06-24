<?php
function class_usersDetailsUpdate($Id, $FirstName, $LastName, $MiddleName, $Company, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status)
{
    $mysql_query    = "UPDATE admin_usersdetails SET FirstName = '$FirstName', LastName = '$LastName', MiddleName = '$MiddleName', Company = '$Company', Phone = '$Phone', Mobile = '$Mobile', Email = '$Email', Country = '$Country', State = '$State', City = '$City', Address = '$Address', Details = '$Details', Responsible = '$Responsible', CustomInfo1 = '$CustomInfo1', CustomInfo2 = '$CustomInfo2', CustomInfo3 = '$CustomInfo3', CustomInfo4 = '$CustomInfo4', CustomInfo5 = '$CustomInfo5', Image = '$Image', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}