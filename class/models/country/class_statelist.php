<?php
function class_stateList()
{
    $array = array(
        array('Id' => 4,'Prefix' => "AL",'Name' => "Alajuela"),
        array('Id' => 3,'Prefix' => "HER",'Name' => "Heredia"),
        array('Id' => 2,'Prefix' => "SJ",'Name' => "San José"),
        array('Id' => 5,'Prefix' => "CA",'Name' => "Cartago"),
        array('Id' => 7,'Prefix' => "LM",'Name' => "Limón"),
        array('Id' => 1,'Prefix' => "PA",'Name' => "Puntarenas"),
        array('Id' => 6,'Prefix' => "GC",'Name' => "Guanacaste"),
    );

    asort($array);
    $array_debug   = 0;
    $array_results = class_array($array, $array_debug);

    $results = $array_results;

    return $results;
}
