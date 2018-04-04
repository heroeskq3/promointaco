<?php
function conn_mysql()
{
    $conn_hostname = CONFIG_MYSQLHOST;
    $conn_username = CONFIG_MYSQLUSER;
    $conn_password = CONFIG_MYSQLPASS;

    $conn = mysql_pconnect($conn_hostname, $conn_username, $conn_password) or die("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
	mysql_set_charset(CONFIG_MYSQLCHARSET,$conn);
    return $conn;
}