<?php
function class_countryList()
{
    $array = array(
        array('Id' => 506,'Prefix' => "CR",'Name' => "Costa Rica"),
        array('Id' => 00,'Prefix' => "ECU",'Name' => "Ecuador"),
        array('Id' => 00,'Prefix' => "PAN",'Name' => "Panamá"),
        array('Id' => 00,'Prefix' => "NIC",'Name' => "Nicaragua"),
    );

    asort($array);
    $array_debug   = 0;
    $array_results = class_array($array, $array_debug);

    $results = $array_results;

    return $results;
}
