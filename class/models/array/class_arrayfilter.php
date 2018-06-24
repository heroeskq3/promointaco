<?php
/*
Filtra un Array
$surveyzoneslist = class_arrayFilter($surveyzoneslist, 'Status', '1', '=');
 */
function class_arrayFilter($array, $field, $value, $condition)
{
    //equal
    if ($condition == '=') {
        $condition_1 = true;
        $condition_2 = false;
        $condition_3 = false;
    }
    //mayor igual que
    if ($condition == '>=') {
        $condition_1 = false;
        $condition_2 = false;
        $condition_3 = true;
    }

    //special all
    if ($condition == 'all') {
        $condition_1 = true;
        $condition_2 = true;
        $condition_3 = false;
    }

    if ($array) {
        $array_filter = array();
        foreach ($array as $row) {

            //Condition 1
            if ($condition_1) {
                if ($row[$field] == $value) {
                    $array_filter[] = $row;
                }
            }

            //Condition 2
            if ($condition_2) {
                if ($row[$field] == 0) {
                    $array_filter[] = $row;
                }
            }
            //Condition 3
            if ($condition_3) {
                if ($row[$field] >= $value) {
                    $array_filter[] = $row;
                }
            }

        }
        $debug = 0;

        $results = class_array($array_filter, $debug);
    } else {
        $results = null;
    }

    return $results;
}
