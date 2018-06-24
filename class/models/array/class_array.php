<?php
//MYSQL - RECORDSET
function class_array($array, $debug)
{

    if ($array) {
        $status          = 1;
        $array_totalRows = count($array);
    } else {
        $status          = 0;
        $array_totalRows = 0;
    }

    //API Array Results
    $request  = null;
    $response = $array;
    $rows     = $array_totalRows;

    $results = api($status, $request, $response, $rows, $debug);

    return $results;
}
