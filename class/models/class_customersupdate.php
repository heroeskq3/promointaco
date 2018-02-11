<?php
function class_customersUpdate($Id, $Identification, $FirstName, $LastName, $MiddleName, $Company, $Position, $Phone, $Mobile, $Email, $Country, $State, $City, $Address, $Details, $Responsible, $CustomInfo1, $CustomInfo2, $CustomInfo3, $CustomInfo4, $CustomInfo5, $Image, $Status)
{
    $mysql_query    = "UPDATE users_details SET Identification = '$Identification', FirstName = '$FirstName', LastName = '$LastName', MiddleName = '$MiddleName', Company = '$Company', Position = '$Position', Phone = '$Phone', Mobile = '$Mobile', Email = '$Email', Country = '$Country', State = '$State', City = '$City', Address = '$Address', Details = '$Details', Responsible = '$Responsible', CustomInfo1 = '$CustomInfo1', CustomInfo2 = '$CustomInfo2', CustomInfo3 = '$CustomInfo3', CustomInfo4 = '$CustomInfo4', CustomInfo5 = '$CustomInfo5', Image = '$Image', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 1;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}


//se debe hacer el pase de profile2 a profile, tambien se debe crear el metodo de gallery y mas adelante otro de resources
//tambien se debe probar el upload images y crear metodos de upload o mejorar el existente