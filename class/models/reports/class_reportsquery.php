<?php
function class_reportsQuery($array)
{
    if ($array) {
        $array_key = array_keys(current($array));
        foreach ($array_key as $key) {
            if (($key !== 'index') && ($key !== 'status') && ($key !== 'childs')) {
                $get_key = null;
                if (isset($_GET[$key])) {
                    $get_key = $_GET[$key];
                }
                if ($get_key) {
                    $array = class_arrayFilter($array, $key, $get_key, '=');
                    $array = $array['response'];
                }
            }
        }
    }
    return $array;
}
