<?php
//views Library
function ClassViews($key)
{
    switch ($key) {
        case 'class_html':
            require_once PATH_VIEWS . 'class_html.php';
            break;
        case 'class_nav':
            require_once PATH_VIEWS . 'class_nav.php';
            break;
        case 'class_asside':
            require_once PATH_VIEWS . 'class_asside.php';
            break;
        case 'class_assideprofile':
            require_once PATH_VIEWS . 'class_assideprofile.php';
            break;
        case 'class_assidemenu':
            require_once PATH_VIEWS . 'class_assidemenu.php';
            break;
        case 'class_debug':
            require_once PATH_VIEWS . 'class_debug.php';
            break;
        case 'class_phpError':
            require_once PATH_VIEWS . 'class_phperror.php';
            break;
        case 'class_footer':
            require_once PATH_VIEWS . 'class_footer.php';
            break;
        case 'class_profile':
            require_once PATH_VIEWS . 'class_profile.php';
            break;
        case 'class_dashboard':
            require_once PATH_VIEWS . 'class_dashboard.php';
            break;
        case 'class_contentArea':
            require_once PATH_VIEWS . 'class_contentarea.php';
            break;
    }
}
