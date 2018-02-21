<?php
function class_sitesUpdate($Id, $ThemeId, $MetaTittle, $MetaDescription, $MetaKeywords, $BgColor, $BgImage, $LogoHeader, $LogoFooter, $Favicon, $Language, $Phone, $Email, $Url, $Status)
{
    $mysql_query    = "UPDATE sites SET ThemeId = '$ThemeId', MetaTittle = '$MetaTittle', MetaDescription = '$MetaDescription', MetaKeywords = '$MetaKeywords', BgColor = '$BgColor', BgImage = '$BgImage', LogoHeader = '$LogoHeader', LogoFooter = '$LogoFooter', Favicon = '$Favicon', Language = '$Language', Phone = '$Phone', Email = '$Email', Url = '$Url', Status = '$Status' WHERE Id = $Id";
    $mysql_database = CONFIG_MYSQLDB;
    $mysql_conn     = conn_mysql();
    $mysql_debug    = 0;
    $mysql_result   = class_mysql($mysql_query, $mysql_database, $mysql_conn, $mysql_debug);

    $results = $mysql_result;

    return $results;
}