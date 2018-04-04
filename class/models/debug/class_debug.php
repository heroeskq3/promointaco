<?php
function class_debug($debug)
{
    $_SESSION['debug'] = $debug;

    $results = $_SESSION['debug'];

    return $results;
}
