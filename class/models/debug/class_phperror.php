<?php
//error handler function
function class_phpError($errno, $errstr, $errfile, $errline)
{
    $error_code              = "<b>Error_No:</b> [$errno] <br>";
    $error_str              = "<b>Error_Str:</b> $errstr<br>";
    $error_file              = "<b>Error_File:</b> $errfile<br>";
    $error_line              = "<b>Error_Line:</b> $errline<br>";

    $results = $error_code.$error_str.$error_file.$error_line;

    //ignore php code error
    $ignorre_error = 8192;

    if($ignorre_error!==$errno){
    	$_SESSION['phperror'] = $results;
    }
    return true;
}