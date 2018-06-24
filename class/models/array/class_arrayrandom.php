<?php
function class_arrayRandom($array)
{

    function shuffle_assoc($list)
    {
        if (!is_array($list)) {
            return $list;
        }

        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
            $random[$key] = $list[$key];
        }

        return $random;
    }

    $results = shuffle_assoc($array);

    $results = class_array($results, 0);

    return $results;
}
