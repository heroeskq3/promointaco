<?php
//API ARRAY RESULTS - JSON FOR DEBBUGER - FAULT CODE
function api($status,$request, $response, $rows, $debug)
{
    $results = array(
        "status"   => $status,
        "request"  => $request,
        "rows"     => $rows,
        "response" => $response
    );

    if ($debug) {
        class_debug($results);
    }

    return $results;
}
