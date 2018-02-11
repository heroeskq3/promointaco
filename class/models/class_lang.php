<?php
//Language Library
function lang($lang)
{
    switch ($lang) {
        case 'en': //English
            require_once PATH_LANG . 'en.php';
            break;
        case 'es': //Spanish
            require_once PATH_LANG . 'es.php';
            break;
    }
}
