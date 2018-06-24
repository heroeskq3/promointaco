<?php
function class_menuUpdate($Id, $Name, $Description, $Url, $Icon, $MenuId, $Order, $Status)
{
    $mysql_query    = "UPDATE admin_menu SET Name = '$Name',Description = '$Description',Url = '$Url',Icon = '$Icon', MenuId = '$MenuId', `Order` = '$Order', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
