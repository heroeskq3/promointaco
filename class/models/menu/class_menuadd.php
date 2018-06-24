<?php
function class_menuAdd($Name, $Description, $Url, $Icon, $MenuId, $Order, $Status)
{
    $mysql_query    = "INSERT INTO admin_menu (Name, Description, Url, Icon, MenuId, `Order`, Status) VALUES('$Name', '$Description', '$Url', '$Icon', '$MenuId', '$Order', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
