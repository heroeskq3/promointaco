<?php
function class_sitesAdd($ThemeId, $MetaTittle, $MetaDescription, $MetaKeywords, $BgColor, $BgImage, $LogoHeader, $LogoFooter, $Favicon, $Language, $Phone, $Email, $Url, $Status)
{
    $mysql_query    = "INSERT INTO sites (ThemeId, MetaTittle, MetaDescription, MetaKeywords, BgColor, BgImage, LogoHeader, LogoFooter, Favicon, Language, Phone, Email, Url, `Status`) VALUES('$ThemeId', '$MetaTittle', '$MetaDescription', '$MetaKeywords', '$BgColor', '$BgImage', '$LogoHeader', '$LogoFooter', '$Favicon', '$Language', '$Phone', '$Email', '$Url', '$Status')";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 1;
    $mysql_results  = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_results;

    return $results;
}
