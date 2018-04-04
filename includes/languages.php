<?php
switch (CONFIG_LANG) {
    case 'en': //English
        require_once PATH_LANG . 'en.php';
        break;
    case 'es': //Spanish
        require_once PATH_LANG . 'es.php';
        break;
}