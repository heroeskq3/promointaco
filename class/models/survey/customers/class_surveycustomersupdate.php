<?php
function class_surveyCustomersUpdate($Id, $FirstName, $LastName, $Identification, $Phone, $Email, $Company, $Position, $Workarea, $Profession, $Care, $Local, $CustomInfo1, $Country, $State, $City, $SessionId, $Status)
{
    $mysql_query    = "UPDATE survey_customers SET FirstName = '$FirstName', LastName = '$LastName', Identification = '$Identification', Phone = '$Phone', Email = '$Email', Company = '$Company', Position = '$Position', Workarea = '$Workarea', Profession = '$Profession', Care = '$Care', Local = '$Local', CustomInfo1 = '$CustomInfo1', Country = '$Country', State = '$State', City = '$City', SessionId = '$SessionId', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}
