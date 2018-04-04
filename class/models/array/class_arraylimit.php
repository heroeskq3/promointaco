<?php
function class_arrayLimit($array, $start, $end)
{
    $results = array_slice($array, $start, $end);
    $results = class_array($results, 0);

    return $results;
}